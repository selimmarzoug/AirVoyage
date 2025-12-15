<?php

namespace App\Http\Controllers\CompagnieAerienne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationStatusUpdated;
use Carbon\Carbon;
use App\Models\User;
use App\Models\offre;
use App\Models\reservation;




class CompagnieAerienneController extends Controller
{
    //
    public function CompagnieDashboard()
    {
        $user = auth()->user();

        $offerCounts = Offre::where('id_user', $user->id)
            ->selectRaw('DATE_FORMAT(created_at, "%m") as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $allMonths = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ];

        $labels = [];
        $data = [];

        foreach ($allMonths as $monthNumber => $monthName) {
            $labels[] = $monthName;
            $data[] = $offerCounts[$monthNumber] ?? 0;
        }

        return view('CompagnieAerienne.dashboard-compagnie-aerienne', compact('user', 'labels', 'data'));
    }


  
   public function showLogoUploadForm()
   {
       return view('upload_logo_form');
   }


    public function uploadLogo(Request $request)
        {
            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation du fichier image
            ]);
        
            $user = Auth::user();
        
            $logoFile = $request->file('logo');

            $logoFileName = time().'.'.$logoFile->extension();

            $logoPath = $logoFile->storeAs('images', $logoFileName, 'public');

            $logoFile->move(public_path('images'), $logoFileName);
            $user->logo = $logoPath;
        
            // Récupérer et stocker le type de fichier
            $user->logo_type = $logoFile->getClientMimeType();
        
            $user->save();
        
            return redirect()->back()->with('success', 'Logo uploaded successfully');
        }
        public function registercompagnie(Request $request)
        {
            // Validation des données du formulaire
            $request->validate([
                'name' => 'required', // Assuming 'name' is the field for company name
                'lastname' => 'required', // Add validation for lastname
                'nom_compagnie_aerienne' => 'required', // Add validation for airline company name
                'adresse' => 'required', // Add validation for address
                'ville' => 'required', // Add validation for city
                'pays' => 'required', // Add validation for country
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|digits:8', // Validation for phone number to be 8 digits
            ]);
        
            // Création d'une nouvelle instance d'utilisateur
            $user = new User();
            $user->name = $request->input('name');
            $user->lastname = $request->input('lastname');
            $user->nom_compagnie_aerienne = $request->input('nom_compagnie_aerienne'); // Correction de l'attribution du nom de la compagnie aérienne
            $user->adresse = $request->input('adresse');
            $user->ville = $request->input('ville');
            $user->pays = $request->input('pays');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->role = 'CompagnieAerienne';
        
            // Sauvegarde de l'utilisateur
            if ($user->save()) {
                return redirect()->back()->with('success', 'You are now registered successfully. Please wait for administrator approval.');
            } else {
                return redirect()->back()->with('fail', 'Something went wrong, failed to register');
            }
        }
        
    


public function AjouterOffre(Request $request)

{
            $request->validate([
        'num_vol' => 'required',
        'nom_compagnie' => 'required|',
        'airport_depart' => 'required',
        'airport_arrive' => 'required',
        'jour_depart' => 'required',
        'jour_arrive' => 'required',
        'capacite_avion' => 'required',
        'ticket_price' => 'required',
    ], [
        'name.required' => 'Le champ nom est requis.',
    ]);

    $offre = new offre();
    $offre->num_vol = $request->num_vol;
    $offre->id_user = Auth::User()->id;
    $offre->nom_compagnie = $request->nom_compagnie;
    $offre->airport_depart = $request->airport_depart;
    $offre->airport_arrive = $request->airport_arrive;
    $offre->jour_depart = $request->jour_depart;
    $offre->jour_arrive = $request->jour_arrive;
    $offre->capacite_avion = $request->capacite_avion;
    $offre->ticket_price = $request->ticket_price;
    $save = $offre->save();
if($save){
    return redirect('/AjouterOffre')->with('success', "L'offre est créé avec succès.");

}else {
    return redirect('/AjouterOffre')->with('fail', "L'offre est n'est pas créé .");
}

}

public function liste_offres()
{

    $offres = offre::where('id_user', Auth::User()->id)->get();
    return view('CompagnieAerienne.liste_offre', ['offres' => $offres]);

}

public function destroyOffres($id) 
{
    // Supprimer les réservations associées à cette offre
    Reservation::where('offre_id', $id)->delete();

    // Ensuite, supprimer l'offre
    $offre = Offre::find($id);
    $offre->delete();

    return redirect('liste_offre');
}

    
    public function liste_reservation()
    {
        $compagnieId = Auth::user()->id;
        $reservations = Reservation::with('Transitaire', 'offre')
            ->whereHas('offre', function ($query) use ($compagnieId) {
                $query->where('id_user', $compagnieId);
            })
            ->where('status', 'attente')
            ->get();
        return view('CompagnieAerienne.liste_reservation', ['reservations' => $reservations]);
    }

    public function updateStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        
        $offre = Offre::find($reservation->offre_id);
        
        if (!$offre) {
            return redirect()->back()->with('error', 'L\'offre associée à cette réservation est introuvable.');
        }
    
        // Vérifier la disponibilité de la capacité de l'avion
        $capacite_restante = $offre->capacite_avion - $reservation->Nombre_de_tickets;
        if ($capacite_restante < 0) {
            return redirect()->back()->with('error', 'La capacité de l\'avion est insuffisante pour cette réservation.');
        }
    
        // Mettre à jour le statut de la réservation
        $reservation->status = $request->input('status');
        $reservation->save();
        
        // Mettre à jour la capacité restante de l'avion
        $offre->capacite_avion = $capacite_restante;
        $offre->save();
        
        // Envoyer un e-mail de notification
        Mail::to($reservation->transitaire->email)->send(new ReservationStatusUpdated($reservation));
        
        return redirect()->back()->with('success', 'Le statut de la réservation a été mis à jour avec succès.');
    }
    

 
    public function liste_reservation_accepter()
    {
        $compagnieId = Auth::user()->id;
        $reservations = Reservation::with('Transitaire', 'offre')
            ->whereHas('offre', function ($query) use ($compagnieId) {
                $query->where('id_user', $compagnieId);
            })
            ->where('status', 'accepted')
            ->get();
        return view('CompagnieAerienne.liste_reservation_accepter', ['reservations' => $reservations]);
    }
       



       

    public function updateFlight(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'num_vol' => 'required',
            'nom_compagnie' => 'required',
            'airport_depart' => 'required',
            'airport_arrive' => 'required',
            'jour_depart' => 'required',
            'jour_arrive' => 'required',
            'capacite_avion' => 'required',
            'ticket_price' => 'required',
        ]);

        // Find the flight by ID
        $flight = Offre::findOrFail($id);

        // Update the flight details
        $flight->num_vol = $request->num_vol;
        $flight->nom_compagnie = $request->nom_compagnie;
        $flight->airport_depart = $request->airport_depart;
        $flight->airport_arrive = $request->airport_arrive;
        $flight->jour_depart = $request->jour_depart;
        $flight->jour_arrive = $request->jour_arrive;
        $flight->ticket_price = $request->ticket_price;
        $flight->capacite_avion = $request->capacite_avion;
        // Save the updated flight
        $flight->save();

        // Redirect back to the flight listing page or any other appropriate page
        return redirect()->route('liste_offres')->with('success', 'Flight details updated successfully.');
    }



}

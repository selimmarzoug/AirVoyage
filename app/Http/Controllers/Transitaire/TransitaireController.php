<?php

namespace App\Http\Controllers\Transitaire;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\offre;
use App\Models\reservation;
use App\Models\Contact;




class TransitaireController extends Controller
{
    //
    public function TransitaireDashboard()
    {
        $reservations = Reservation::where('id_Transitaire', Auth::user()->id)->get();
        $totalReservationsCount = $reservations->count();
        $acceptedReservationsCount = $reservations->where('status', 'accepted')->count();
        $rejectedReservationsCount = $reservations->where('status', 'rejected')->count();
        $attenteReservationsCount = $reservations->where('status', 'attente')->count();

        $labels = ['Total', 'Accepted', 'Rejected', 'Attente'];
        $data = [$totalReservationsCount, $acceptedReservationsCount, $rejectedReservationsCount, $attenteReservationsCount];

        return view('Transitaire.dashboard-transitaire', compact('totalReservationsCount', 'acceptedReservationsCount', 'rejectedReservationsCount', 'attenteReservationsCount', 'labels', 'data'));
    }

    public function registerClient(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required', // Assuming 'name' is the field for company name
            'lastname' => 'required', // Add validation for lastname
            'adresse' => 'required', // Add validation for address
            'ville' => 'required', // Add validation for city
            'pays' => 'required', // Add validation for country
            'num_passeport' => 'required|alpha_num', // Add validation for passport number to be alphanumeric
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:8', // Validation for phone number to be 8 digits
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password', // Ensures that 'confirm_password' matches 'password'
        ]);
    
        // Création d'une nouvelle instance d'utilisateur
        $user = new User();
        $user->name = $request->input('name'); // Assuming 'name' is the field for company name
        $user->lastname = $request->input('lastname'); // Assigning lastname from the request
        $user->adresse = $request->input('adresse'); // Assigning address from the request
        $user->ville = $request->input('ville'); // Assigning city from the request
        $user->pays = $request->input('pays'); // Assigning country from the request
        $user->num_passeport = $request->input('num_passeport'); // Assigning passport number from the request
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->phone = $request->input('phone');
        $user->role = 'Transitaire';
        $user->status = 'accepted';
        
    
        // Sauvegarde de l'utilisateur
        if ($user->save()) {
            
            return redirect()->back()->with('success', 'You are now registered successfully');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to register');
        }
    }

    public function search2(Request $request)
    {
        $nombre_de_tickets = $request->input('Nombre_de_tickets');
        $airport_depart = $request->input('airport_depart');
        $airport_arrive = $request->input('airport_arrive');
        $jour_depart = $request->input('jour_depart');
    
        // Stocker les données dans la session
        $request->session()->put('donnees', [
            'Nombre_de_tickets' => $nombre_de_tickets,
            'airport_depart' => $airport_depart,
            'airport_arrive' => $airport_arrive,
            'jour_depart' => $jour_depart,
        ]);
    
        $offres = offre::query()
            ->when($airport_depart, function ($query, $airport_depart) {
                return $query->where('airport_depart', $airport_depart);
            })
            ->when($airport_arrive, function ($query, $airport_arrive) {
                return $query->where('airport_arrive', $airport_arrive);
            })
            ->when($jour_depart, function ($query, $jour_depart) {
                return $query->whereDate('jour_depart', '>=', $jour_depart);
            })
            ->orderBy('jour_depart', 'asc')
            ->get();
    
        return view('Transitaire.Search', compact('offres', 'nombre_de_tickets'));
    }

    public function reservation(Request $request)
    {
        $id = $request->reservationId;
        $donnees = session('donnees');
        $offre = offre::with('user')->find($id);
    
        // Récupérer le nombre de tickets depuis la session donnees
        $Nombre_de_tickets = isset($donnees['Nombre_de_tickets']) ? $donnees['Nombre_de_tickets'] : 0;
    
        // Calculer le prix total
        $prixTotal = $offre->ticket_price * $Nombre_de_tickets;
    
        $reservation1 = [
            'offre_id' => $offre,
            'Nombre_de_tickets' => $Nombre_de_tickets,
            'prixTotal' => $prixTotal,
        ];
    
        $request->session()->put('reservation1', $reservation1);
    
        return view('Transitaire.reservation', ['donnees' => $donnees, 'offre' => $offre, 'prixTotal' => $prixTotal, 'Nombre_de_tickets' => $Nombre_de_tickets]);
    }
    
    public function store_reservation(Request $request)
    {
        $reservation = new reservation();
        $reservation1 = session('reservation1');
    
        // Récupérer les données de la session reservation1
        $Nombre_de_tickets = $reservation1['Nombre_de_tickets'];
        $prixTotal = $reservation1['prixTotal'];
        $offre = $reservation1['offre_id'];
    
        // Remplir les détails de la réservation
        $reservation->Nombre_de_tickets = $Nombre_de_tickets;
        $reservation->prixTotal = $prixTotal;
        $reservation->offre_id = $offre->id;
        $reservation->id_Transitaire = Auth::user()->id;
    
        // Sauvegarder la réservation
        $offre->reservation()->save($reservation);
    
        // Rediriger vers la vue de recherche
        return view('Transitaire.dashboard-transitaire');
    }

public function liste_des_reservations_transitaire()
{
    $reservations = Reservation::where('id_Transitaire', Auth::user()->id)->get();

    return view('Transitaire.liste_des_reservations_transitaire', compact('reservations'));
}



public function contactus(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'contact' => 'required', // Add validation for the 'contact' field
    ], [
        'name.required' => 'Le champ nom est requis.',
    ]);

    $contact = new Contact();
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->contact = $request->contact;

    $save = $contact->save();
    if ($save) {
        return redirect('/')->with('success', "Le contact est créé avec succès.");
    } else {
        return redirect('/')->with('fail', "Le contact n'est pas créé.");
    }
}

}

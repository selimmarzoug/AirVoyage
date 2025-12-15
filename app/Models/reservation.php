<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;

    protected $fillable = [

        'status',
        'id_Transitaire',
        'prixTotal',
        'Nombre_de_tickets',
        'id_offre',

    ];

    public function Transitaire()
    {
        return $this->belongsTo(User::class, 'id_Transitaire');
    }
    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }


}

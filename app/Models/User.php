<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * 
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'voornaam',
        'achternaam',
        'adress',
        'postcode',
        'telefoonnummer',
        'Rol_idRol',
    ];

    /**
     * 
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * relatie met gebruiker_has_resultaat.
     */
    public function resultaten()
    {
        return $this->hasMany('App\Models\GebruikerHasResultaat', 'user_id');
    }

    /**
     * relatie met gebruiker_has_sponsorloop.
     */
    public function sponsorlopen()
    {
        return $this->belongsToMany(Sponsorloop::class, 'gebruiker_has_sponsorloop', 'user_id', 'Sponsorloop_idSponsorloop');
    }

    /**
     * hier controlleerd of de user een admin is.
     *
     * @return bool
     */
    public function isAdmin()
    {
        // Controleer of de gebruiker een admin is, pas de rolwaarde aan zoals nodig
        return $this->Rol_idRol === 2; // 
    }
}

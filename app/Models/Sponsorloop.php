<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorloop extends Model
{
    use HasFactory;

    /**
     * De tabel die aan dit model is gekoppeld.
     *
     * @var string
     */
    protected $table = 'sponsorloop';
    protected $primaryKey = 'idSponsorloop';

    /**
     * De velden die massaal toegewezen mogen worden.
     *
     * @var array
     */
    protected $fillable = [
        'naam',
        'locatie',
        'standaardBedrag',
        'afstand',
        'beschrijving',
        'datum',
        'route',
        'foto',
        'Organisatie_idOrganisatie',
        'Doel_idDoel',
    ];

    /**
     * Geef aan dat timestamps niet gebruikt worden.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Relatie met de organisatie.
     */
    public function organisatie()
    {
        return $this->belongsTo(Organisatie::class, 'Organisatie_idOrganisatie');
    }

    /**
     * Relatie met het doel.
     */
    public function doel()
    {
        return $this->belongsTo(Doel::class, 'Doel_idDoel');
    }

    /**
     * Relatie met gebruikers die zich hebben ingeschreven.
     */
    public function gebruikers()
    {
        return $this->belongsToMany(User::class, 'gebruiker_has_sponsorloop', 'Sponsorloop_idSponsorloop', 'user_id');
    }
    


}

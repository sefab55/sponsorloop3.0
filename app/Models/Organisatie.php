<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisatie extends Model
{
    use HasFactory;

    protected $table = 'organisatie';

    protected $fillable = [
        'naam',

    ];

    public function sponsorloop()
    {
        return $this->hasMany(Sponsorloop::class, 'Organisatie_idOrganisatie');
    }
}

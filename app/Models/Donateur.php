<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Sponsorloop;

class Donateur extends Model
{
    use HasFactory;

   

    // Relatie met de sponsorloop
    public function sponsorloop()
    {
        return $this->belongsTo(Sponsorloop::class, 'sponsorloop_id', 'idSponsorloop');
    }

    // Relatie met de sponsor (user)
    public function sponsor()
    {
        return $this->belongsTo(User::class, 'sponsor_id');
    }

    // Relatie met de loper (user)
    public function loper()
    {
        return $this->belongsTo(User::class, 'loper_id');
    }
}

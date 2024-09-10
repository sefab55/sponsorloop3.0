<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultaat extends Model
{
    use HasFactory;

    protected $table = 'resultaat';

    protected $fillable = [
        'user_id',
        'sponsorloop_id',
        'afgelegdeAfstand',
        'opgehaaldeBedrag',
    ];

    /**
     * Relatie met de gebruiker die dit resultaat heeft.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relatie met de sponsorloop waaraan dit resultaat is gekoppeld.
     */
    public function sponsorloop()
    {
        return $this->belongsTo(Sponsorloop::class, 'sponsorloop_id', 'idSponsorloop');
    }
}

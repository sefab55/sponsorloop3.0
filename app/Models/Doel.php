<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doel extends Model
{
    use HasFactory;

    protected $table = 'doel';

    protected $fillable = [
        'naam',
    ];

    public function sponsorloop()
    {
        return $this->hasMany(Sponsorloop::class, 'Doel_idDoel');
    }
}

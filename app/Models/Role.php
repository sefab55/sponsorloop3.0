<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles'; 

    protected $fillable = ['naam'];

    // Zet timestamps uit als de tabel geen created_at en updated_at kolommen heeft
    public $timestamps = false;

    /**
     * Relatie met User model.
     * Een rol kan meerdere gebruikers hebben.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'Rol_idRol');
    }
}

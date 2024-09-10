<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('voornaam')->nullable();
            $table->string('achternaam')->nullable();
            $table->string('adress')->nullable();
            $table->unsignedInteger('Rol_idRol')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['voornaam', 'achternaam', 'adress', 'Rol_idRol']);
        });
    }
    
    
};

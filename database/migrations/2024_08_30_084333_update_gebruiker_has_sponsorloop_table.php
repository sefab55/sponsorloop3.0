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
        Schema::table('gebruiker_has_sponsorloop', function (Blueprint $table) {
            // Controleer of de foreign key en kolom bestaan voordat je ze verwijdert
            if (Schema::hasColumn('gebruiker_has_sponsorloop', 'Gebruiker_idGebruiker')) {
                $table->dropForeign(['Gebruiker_idGebruiker']);
                $table->dropColumn('Gebruiker_idGebruiker');
            }

            // Voeg de nieuwe user_id kolom toe en stel de foreign key in
            if (!Schema::hasColumn('gebruiker_has_sponsorloop', 'user_id')) {
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('gebruiker_has_sponsorloop', function (Blueprint $table) {
            // Verwijder de nieuwe foreign key en kolom
            if (Schema::hasColumn('gebruiker_has_sponsorloop', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }

            // Voeg de oude kolom terug toe en stel de oude foreign key in
            if (!Schema::hasColumn('gebruiker_has_sponsorloop', 'Gebruiker_idGebruiker')) {
                $table->unsignedInteger('Gebruiker_idGebruiker');
                $table->foreign('Gebruiker_idGebruiker')->references('idGebruiker')->on('gebruiker')->onDelete('cascade');
            }
        });
    }
};

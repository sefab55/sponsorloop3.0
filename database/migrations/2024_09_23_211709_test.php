<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // voorbeeld create een tabel
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('email');
        //     $table->timestamps();


        // update een tabel
        // Schema::table('users', function (Blueprint $table) {
        //     $table->integer('votes');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //hier kan je de database terug zetten en dit stuk verwijderen
        // Schema::dropIfExists('users');
    }
};

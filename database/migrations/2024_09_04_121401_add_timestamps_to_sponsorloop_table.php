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
        Schema::table('sponsorloop', function (Blueprint $table) {
            $table->timestamps(); // Dit voegt zowel `created_at` als `updated_at` kolommen toe
        });
    }
    
    public function down()
    {
        Schema::table('sponsorloop', function (Blueprint $table) {
            $table->dropTimestamps(); // Dit verwijdert `created_at` en `updated_at` kolommen
        });
    }
    
};

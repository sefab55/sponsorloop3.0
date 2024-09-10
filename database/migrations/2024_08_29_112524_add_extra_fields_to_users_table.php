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
            if (!Schema::hasColumn('users', 'voornaam')) {
                $table->string('voornaam')->nullable();
            }
            if (!Schema::hasColumn('users', 'achternaam')) {
                $table->string('achternaam')->nullable();
            }
            if (!Schema::hasColumn('users', 'adress')) {
                $table->string('adress')->nullable();
            }
            if (!Schema::hasColumn('users', 'Rol_idRol')) {
                $table->unsignedInteger('Rol_idRol')->nullable();
            }
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'voornaam')) {
                $table->dropColumn('voornaam');
            }
            if (Schema::hasColumn('users', 'achternaam')) {
                $table->dropColumn('achternaam');
            }
            if (Schema::hasColumn('users', 'adress')) {
                $table->dropColumn('adress');
            }
            if (Schema::hasColumn('users', 'Rol_idRol')) {
                $table->dropColumn('Rol_idRol');
            }
        });
    }
    

};

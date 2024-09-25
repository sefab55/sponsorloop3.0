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
        $table->float('gekozenAfstand')->nullable()->after('Sponsorloop_idSponsorloop');
    });
}

public function down()
{
    Schema::table('gebruiker_has_sponsorloop', function (Blueprint $table) {
        $table->dropColumn('gekozenAfstand');
    });
}

};

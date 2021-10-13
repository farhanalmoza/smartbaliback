<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToBackpackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('backpackers', function (Blueprint $table) {
            $table->string('phone')->after('name');
            $table->string('arrived_date')->after('phone');
            $table->string('departure_date')->after('arrived_date');
            $table->string('arrived_place')->after('departure_date');
            $table->string('accomodation')->after('arrived_place');
            $table->string('hotel')->after('accomodation');
            $table->string('tourist_attraction')->after('hotel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('backpackers', function (Blueprint $table) {
            $table->dropColumn(['phone', 'arrived_date', 'departure_date', 'arrived_place', 'accomodation', 'hotel', 'tourist_attraction']);
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->unsignedBigInteger('hotel_id')->index()->nullable()->after('car_id');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->unsignedBigInteger('worship_id')->index()->nullable()->after('car_id');
            $table->foreign('worship_id')->references('id')->on('worships')->onDelete('cascade');
            $table->unsignedBigInteger('souvenir_id')->index()->nullable()->after('car_id');
            $table->foreign('souvenir_id')->references('id')->on('souvenirs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn('hotel_id');
            $table->dropColumn('worship_id');
            $table->dropColumn('souvenir_id');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('profiles', 'admin_profiles');

        Schema::table('admin_profiles', function (Blueprint $table) {
            $table->dropColumn(['holder_name', 'bank', 'acc_bank']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('admin_profiles', 'profiles');
    }
}

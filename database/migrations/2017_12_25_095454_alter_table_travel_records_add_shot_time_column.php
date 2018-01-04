<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableTravelRecordsAddShotTimeColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('travel_records', function (Blueprint $table) {
            $table->integer('shot_time')->nullable()->comment('拍摄时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('travel_records', function (Blueprint $table) {
            $table->dropColumn('shot_time');
        });
    }
}

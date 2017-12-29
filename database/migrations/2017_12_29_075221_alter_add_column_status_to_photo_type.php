<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddColumnStatusToPhotoType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photo_types', function (Blueprint $table) {
            $table->tinyInteger('status')->default('1')->comment('0 不再使用,1继续使用');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photo_types', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}

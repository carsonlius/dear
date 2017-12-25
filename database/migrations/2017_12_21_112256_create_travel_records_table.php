<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 50)->comment('照片的类型');
            $table->string('protagonist', 50)->comment('上传人');
            $table->string('owner', 50);
            $table->string('title', 100);
            $table->text('content');
            $table->string('location', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travel_records');
    }
}

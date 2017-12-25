<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_nodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label', 100)->comment('描述');
            $table->string('name', 100)->comment('节点名称');
            $table->integer('pid')->default(0)->unsigned()->nullable()->comment('父ID');
            $table->tinyInteger('type')->default(1)->unsigned()->nullable(false)->comment('节点类型 1 菜单节点 2 内部节点');
            $table->string('node', 255)->nullable(false)->comment('节点');
            $table->integer('listorder')->default(0)->unsigned()->commit('排序 越大与靠前');
            $table->tinyInteger('is_show')->default(1)->unsigned()->nullable(false)->comment('是否显示 1显示 2不显示');
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
        Schema::dropIfExists('system_nodes');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBambooInstanceRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bamboo_instance_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('bamboo_instance_id')->comment('ID de la instancia bamboo');
            $table->integer('bb_room')->comment('ID de la clase de habitación en bamboo');
            $table->string('rg_room')->comment('ID de la calse de habitación en RateGain');
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
        Schema::dropIfExists('bamboo_instance_rooms');
    }
}

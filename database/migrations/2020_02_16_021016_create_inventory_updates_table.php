<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_updates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('booking_engine')->nullable();
            $table->string('room_class_cloud')->nullable();
            $table->string('room_class_local')->nullable();
            $table->date('date_updated')->nullable();
            $table->string('quantity')->nullable();
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
        Schema::dropIfExists('inventory_updates');
    }
}

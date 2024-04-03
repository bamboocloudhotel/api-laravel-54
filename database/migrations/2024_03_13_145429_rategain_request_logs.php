<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RategainRequestLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rategain_request_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference')->nullable();
            $table->string('type')->nullable();
            $table->longText('new')->nullable();
            $table->longText('old')->nullable();
            $table->longText('hotel_code')->nullable();
            $table->longText('reserva')->nullable();
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
        //
        Schema::dropIfExists('rategain_request_logs');
    }
}

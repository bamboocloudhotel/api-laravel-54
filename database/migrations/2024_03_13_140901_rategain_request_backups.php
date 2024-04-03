<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RategainRequestBackups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rategain_request_backups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference')->nullable();
            $table->string('type')->nullable();
            $table->longText('request')->nullable();
            $table->longText('xml')->nullable();
            $table->string('hotel')->nullable();
            $table->longText('response')->nullable();
            $table->string('confirmation_id')->nullable();
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
        Schema::dropIfExists('rategain_request_backups');
    }
}

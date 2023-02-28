<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBambooInstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bamboo_instances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('db_host');
            $table->string('db_port');
            $table->string('db_database');
            $table->string('db_username');
            $table->string('db_password');
            $table->string('rg_api');
            $table->string('rg_auth');
            $table->string('rg_hotel_code');
            $table->string('rg_username');
            $table->string('rg_password');
            $table->string('payment_type');
            $table->string('warranty_type');
            $table->string('program_type');
            $table->string('codpla');
            $table->string('tipres');
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
        Schema::dropIfExists('bamboo_instances');
    }
}

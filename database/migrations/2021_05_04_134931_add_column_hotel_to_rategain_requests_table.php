<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnHotelToRategainRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rategain_requests', function (Blueprint $table) {
            //
            $table->string('hotel')->nullable()->comment('ID del Hotel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rategain_requests', function (Blueprint $table) {
            //
            $table->dropIfExists('hotel');
        });
    }
}

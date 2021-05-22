<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveryservices', function (Blueprint $table) {
            $table->string('DeliveryServiceID');
            $table->string('DeliveryServiceName');
            $table->integer('DeliveryServicePrice');
            
            $table->primary('DeliveryServiceID');
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
        Schema::dropIfExists('deliveryservices');
    }
}

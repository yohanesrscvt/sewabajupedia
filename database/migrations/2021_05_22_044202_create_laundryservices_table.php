<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaundryservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laundryservices', function (Blueprint $table) {
            $table->string('LaundryServiceID');
            $table->string('LaundryServiceName');
            $table->integer('LaundryServicePrice');
            
            $table->primary('LaundryServiceID');
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
        Schema::dropIfExists('laundryservices');
    }
}

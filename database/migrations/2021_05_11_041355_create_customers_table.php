<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->string('CustomerID');
            $table->string('CustomerNama');
            $table->string('CustomerEmail')->unique();
            $table->string('CustomerPassword');
            $table->string('CustomerPhone');
            $table->integer('CustomerSaldo');
            $table->string('CustomerPicturePath');
            $table->string('CustomerAlamat');
            $table->primary('CustomerID');
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
        Schema::dropIfExists('customers');
    }
}

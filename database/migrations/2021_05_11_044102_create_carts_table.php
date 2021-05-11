<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->string('PakaianID');
            $table->string('CustomerID');
            $table->integer('RentQty');

            $table->primary(['PakaianID','CustomerID']);
            $table->foreign('PakaianID')->references('PakaianID')->on('pakaians');
            $table->foreign('CustomerID')->references('CustomerID')->on('customers');
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
        Schema::dropIfExists('carts');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_transaction', function (Blueprint $table) {
            $table->string('HeaderTransactionID');
            $table->string('CustomerID');
            $table->date('TransactionDate');
            $table->string('alamat');
            $table->integer('penalty');

            $table->primary('HeaderTransactionID');
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
        Schema::dropIfExists('header_transaction');
    }
}

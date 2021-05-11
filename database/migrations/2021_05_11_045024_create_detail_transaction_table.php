<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaction', function (Blueprint $table) {
            $table->string('HeaderTransactionID');
            $table->string('PakaianID');
            $table->integer('RentQty');
            $table->date('RentStart');
            $table->date('RentFinish');

            $table->primary(['HeaderTransactionID','PakaianID']);
            $table->foreign('PakaianID')->references('PakaianID')->on('pakaians');
            $table->foreign('HeaderTransactionID')->references('HeaderTransactionID')->on('header_transaction');
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
        Schema::dropIfExists('detail_transaction');
    }
}

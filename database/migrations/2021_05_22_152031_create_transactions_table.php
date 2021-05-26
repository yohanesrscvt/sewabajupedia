<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->string('TransactionID');
            $table->string('CustomerID');
            $table->string('PakaianID');
            $table->string('DeliveryServiceID');
            $table->string('LaundryServiceID');
            $table->string('TransactionStatusID');
            $table->string('PaymentMethodID');
            
            $table->date('TransactionDate');
            $table->integer('Penalty');
            $table->integer('RentQty');
            $table->date('MulaiSewa');
            $table->date('SelesaiSewa');

            $table->primary('TransactionID');
            $table->foreign('CustomerID')->references('CustomerID')->on('customers');
            $table->foreign('PakaianID')->references('PakaianID')->on('pakaians');
            $table->foreign('DeliveryServiceID')->references('DeliveryServiceID')->on('deliveryservices');
            $table->foreign('LaundryServiceID')->references('LaundryServiceID')->on('laundryservices');
            $table->foreign('TransactionStatusID')->references('TransactionStatusID')->on('transactionstatus');
            $table->foreign('PaymentMethodID')->references('PaymentMethodID')->on('paymentmethods');
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
        Schema::dropIfExists('transactions');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB; // query builder for database

class services extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // delivery
        DB::table('deliveryservices')->insert([
            'DeliveryServiceID' => 'DS1',
            'DeliveryServiceName' => 'Go-Jek',
            'DeliveryServicePrice' => 5000
        ]);

        // laundry
        DB::table('laundryservices')->insert([
            'LaundryServiceID' => 'LS1',
            'LaundryServiceName' => 'Aqualis',
            'LaundryServicePrice' => 50000
        ]);

        // transaction status
        DB::table('transactionstatus')->insert([
            'TransactionStatusID' => 'TS1',
            'TransactionStatusDesc' => 'Sedang Menyewa'
        ]);

        DB::table('transactionstatus')->insert([
            'TransactionStatusID' => 'TS2',
            'TransactionStatusDesc' => 'Selesai Menyewa'
        ]);

        DB::table('transactionstatus')->insert([
            'TransactionStatusID' => 'TS3',
            'TransactionStatusDesc' => 'Pesanan Diproses'
        ]);

        // payment
        DB::table('paymentmethods')->insert([
            'PaymentMethodID' => 'PM1',
            'PaymentMethodName' => 'COD'
        ]);

        DB::table('paymentmethods')->insert([
            'PaymentMethodID' => 'PM2',
            'PaymentMethodName' => 'E-wallet'
        ]);
    }
}

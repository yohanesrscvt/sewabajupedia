<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // query builder for database

use Carbon\Carbon; // date function

class CustomerController extends Controller
{
    // show kategori
    public function ShowKategori(){
        $KategoriData   =   DB::table('kategoris')->get();
        $CustomerData = DB::table('customers')
                        ->where('CustomerID',session()->get('LoginID'))
                        ->get();
        return view('customer-role\kategori',['KategoriData' => $KategoriData, 'CustomerData' => $CustomerData]);
    }

    // show pakaian based kategori id
    public function PakaianBasedKategori($id){
        $PakaianList    =   DB::table('pakaians')
                            ->where('KategoriID',$id)
                            ->where('AgentID','!=',session()->get('LoginID'))
                            ->where('StockQty','>',0)
                            ->get();
        $CustomerData   =   DB::table('customers')
                            ->where('CustomerID',session()->get('LoginID'))
                            ->get();
        $Kategori       =   DB::table('kategoris')
                            ->where('KategoriID',$id)
                            ->first();
        return view('customer-role\pakaian',['PakaianList' => $PakaianList,'CustomerData' => $CustomerData, 'Kategori' =>$Kategori]);
    }

    // show pakaian detail based pakaian id
    public function DetailBasedPakaian($id2){
        $PakaianDetail  =       DB::table('pakaians')
                                ->join('sizes','pakaians.SizeID','=','sizes.SizeID')
                                ->where('pakaians.PakaianID',$id2)
                                ->get();
        
        $PaymentType    =   DB::table('paymentmethods')
                            ->get();

        $DeliveryServices    =   DB::table('deliveryservices')
                            ->get();
        
        $LaundryServices   =   DB::table('laundryservices')
                            ->get();

        // return var_dump($PakaianDetail);
        $CustomerData   =   DB::table('customers')
                            ->where('CustomerID',session()->get('LoginID'))
                            ->get();
        return view('customer-role\detail-pakaian',['PakaianDetail' => $PakaianDetail,'PaymentType' => $PaymentType, 'DeliveryServices' => $DeliveryServices, 'LaundryServices' => $LaundryServices, 'CustomerData' => $CustomerData]);
    }

    // confirmation page to buy pakaian
    public function BuyPakaian(Request $r){
        // show detail pakaian
        $PakaianDetail  =       DB::table('pakaians')
                                ->join('sizes','pakaians.SizeID','=','sizes.SizeID')
                                ->where('pakaians.PakaianID',$r->PakaianID)
                                ->get();
        
        $PaymentType    =   DB::table('paymentmethods')
                            ->where('PaymentMethodID',$r->payment_type)
                            ->get();
    
        $DeliveryServices    =   DB::table('deliveryservices')
                                ->where('DeliveryServiceID',$r->delivery_services)
                                ->get();
        
        $LaundryServices   =   DB::table('laundryservices')
                                ->where('LaundryServiceID',$r->laundry_services)
                                ->get();
        $CustomerData   =   DB::table('customers')
                            ->where('CustomerID',session()->get('LoginID'))
                            ->get();
        // count rent days
        $StartRent=strtotime($r->date);
        $FinalRent=strtotime($r->date2);
        $CountDays= intval(abs($FinalRent-$StartRent)/86400);
        // references: https://stackoverflow.com/questions/3653882/how-to-count-days-between-two-dates-in-php

        return view('customer-role\konfirmasi',['PakaianDetail' => $PakaianDetail,'PaymentType' => $PaymentType, 'DeliveryServices' => $DeliveryServices, 'LaundryServices' => $LaundryServices, 'RentDays' => $CountDays, 'StartRent' => $r->date, 'FinalRent' => $r->date2,'CustomerData' => $CustomerData]);
    }

    // process buy pakaian
    public function ExecuteBuyPakaian(Request $r){
        // generate transaction id
        $DigitID = rand(0,9) . '' . rand(0,9) . '' . rand(0,9) . '' . rand(0,9);
        $TransactionID = 'TRANS-' . $DigitID;
        $TransactionDate = Carbon::now();
        
        // count total price
        $TotalPrice = (intval($r->LamaSewa) * intval($r->PakaianHarga2)) + $r->DeliveryServicePrice + $r->LaundryServicePrice;

        // var_dump($TotalPrice);
        // if customer use e-wallet, make sure that customer has sufficient balance

        if($r->PaymentMethodID == "PM2" && $r->CustomerSaldo < $TotalPrice){
            return var_dump(0); // failed
        }
        else{
            // insert data to db
            DB::table('transactions')->insert([
                'TransactionID' => $TransactionID,
                'CustomerID' => session()->get('LoginID'),
                'PakaianID' => $r->PakaianID,
                'DeliveryServiceID' => $r->DeliveryServiceID,
                'LaundryServiceID' => $r->LaundryServiceID,
                'TransactionStatusID' => 'TS3',
                'PaymentMethodID' => $r->PaymentMethodID,
                'Penalty' => 0,
                'MulaiSewa' => $r->MulaiSewa,
                'SelesaiSewa' => $r->SelesaiSewa,
                'TransactionDate' => $TransactionDate->toDateString()
            ]);

            // reduce and update pakaian stock (StockQty)
            DB::table('pakaians')->decrement('StockQty',1);

            // if customer use e-wallet, transfer money to agent
            if($r->PaymentMethodID == "PM2"){

                // update customer balance
                DB::table('customers')
                ->where('CustomerID', session()->get('LoginID'))
                ->decrement('CustomerSaldo',$TotalPrice);

                // update agent balance (still bugs, sisanya beres)
                DB::table('agents')
                ->where('AgentID', $r->AgentID)
                ->increment('AgentSaldo', (intval($r->LamaSewa) * intval($r->PakaianHarga2)));
            }
            var_dump(1); // success
        }
    }
}

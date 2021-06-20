<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // query builder for database

class CustomerController extends Controller
{
    // show kategori
    public function ShowKategori(){
        $KategoriData   =   DB::table('kategoris')->get();
        return view('customer-role\kategori',['KategoriData' => $KategoriData]);
    }

    // show pakaian based kategori id
    public function PakaianBasedKategori($id){
        $PakaianList    =   DB::table('pakaians')
                            ->where('KategoriID',$id)
                            ->where('AgentID','!=',session()->get('LoginID'))
                            ->where('StockQty','>',0)
                            ->get();
        return view('customer-role\pakaian',['PakaianList' => $PakaianList]);
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
        return view('customer-role\detail-pakaian',['PakaianDetail' => $PakaianDetail,'PaymentType' => $PaymentType, 'DeliveryServices' => $DeliveryServices, 'LaundryServices' => $LaundryServices]);
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
        
        // count rent days
        $StartRent=strtotime($r->date);
        $FinalRent=strtotime($r->date2);
        $CountDays= intval(abs($StartRent-$FinalRent)/86400);
        // references: https://stackoverflow.com/questions/3653882/how-to-count-days-between-two-dates-in-php

        return view('customer-role\konfirmasi',['PakaianDetail' => $PakaianDetail,'PaymentType' => $PaymentType, 'DeliveryServices' => $DeliveryServices, 'LaundryServices' => $LaundryServices, 'RentDays' => $CountDays]);
    }
}

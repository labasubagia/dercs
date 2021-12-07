<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //show service payment info
    public function paymentInfo(Request $req){
        $id = Auth::id();
        $serviceID = $req->id;
        $info = DB::select("select users.username, users.address, services.estimateCost, services.id
                            from users join services on users.id = services.userID
                            where users.id = '$id' AND services.id = '$serviceID'");

        return view('customer.payment', compact('info'));
    }

    //add payment data to database in COD method
    public function addpaymentCOD(Request $req){
        $userID = Auth::id();
        $serviceID = $req->serviceID;

        $payment = new Payment;
        //table = value
        $payment -> userID = $userID;
        $payment -> serviceID = $serviceID;
        $payment -> paymentMethod = $req -> paymentMethod;
        $payment -> total = $req->estimateCost;
        $payment -> save();

        $updatePayment = DB::select("update services set paymentStatus = 1 where id = '$serviceID'");

        $updateReturn = DB::select("update tracks set trackProgress = 'Returning' where id = '$serviceID'");

        $info = DB::select("select * from payments where serviceID = '$serviceID'");

        return view('customer.paymentSuccessful', compact('info'));
    }

    //add payment data to database in PayPal method
    public function addPaymentPayPal($serviceID, $total){
        $userID = Auth::id();
        $payment = new Payment;
        $payment -> userID = $userID;
        $payment -> serviceID = $serviceID;
        $payment -> paymentMethod = "PayPal";
        $payment -> total = $total;
        $payment -> save();

        $updatePayment = DB::select("update services set paymentStatus = 1 where id = '$serviceID'");

        $updateReturn = DB::select("update tracks set trackProgress = 'Returning' where id = '$serviceID'");

        $info = DB::select("select * from payments where serviceID = '$serviceID'");

        return view('customer.paymentSuccessful', compact('info'));
    }
}
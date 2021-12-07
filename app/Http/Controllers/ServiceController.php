<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    //customer view service list
    public function viewRepairServiceList(){
        $info = DB::select("select * from services where paymentStatus = 0");
        
        return view('staff.requestServiceList', compact('info'));
    }

    public function viewUpdateForm(Request $req){
        $serviceID = $req->id;
        $info = DB::select("select * from services  where id = '$serviceID'");
        
        return view('staff.itemInformation', compact('info'));
    }


    public function displayUpdateForm(Request $req){
        $serviceID = $req->id;
        $info = DB::select("select * from services where id = '$serviceID'");
        
        return view('staff.updateForm', compact('info'));
    }

    //staff update service detail
    public function updateForm(Request $req){
        $id = $req->id;
        $status = $req->repairStatus;
        $progress = $req->repairProgress;
        $estimateCost = $req->estimateCost;
        $reason = $req->reason;
        $detail = $req->detail;
        $update = DB::select("update services set repairStatus = '$status', repairProgress = '$progress',
                            estimateCost = '$estimateCost', reason = '$reason',
                            detail = '$detail' where id = '$id'");

        return $this->viewRepairServiceList(); 
    }

    public function displayItemList(){
        $userID = Auth::id();
        $info = DB::select("select * from services where userID = '$userID'");
        return view('customer.itemList', compact('info'));
    }

    public function displayItemDetail(Request $req){
        $id = $req->id;
        
        $info = DB::select("select * from services where id = '$id'");
        return view('customer.itemInformation', compact('info'));
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    //customer view service list
    public function viewRepairServiceList(){
        //$info = DB::select("select * from services where paymentStatus = 0");

        $info = Service::where('paymentStatus', '=', '0')->get();
        
        return view('staff.requestServiceList', compact('info'));
    }

    public function viewUpdateForm(Request $req){
        
       //$serviceID = $req->id;
        //$info = DB::select("select * from services  where id = '$serviceID'");

        $info = Service::findOrFail($req->get('id'));
        //return $info;

        return view('staff.itemInformation', compact('info'));
    }


    public function displayUpdateForm(Request $req){
        
       //$serviceID = $req->id;
        //$info = DB::select("select * from services where id = '$serviceID'");

        $info = Service::findOrFail($req->get('id'));
        

        return view('staff.updateForm', compact('info'));
    }

     //staff update service detail
     public function updateForm(Request $req){
        //$id = $req->id;
        //$status = $req->repairStatus;
        //$progress = $req->repairProgress;
        //$estimateCost = $req->estimateCost;
        //$reason = $req->reason;
        //$detail = $req->detail;
        //$update = DB::select("update services set repairStatus = '$status', repairProgress = '$progress',
                            //estimateCost = '$estimateCost', reason = '$reason',
                            //detail = '$detail' where id = '$id'");

                            Service::where('id', $req->get('id'))->update([
                                'repairStatus' => $req->get('status'),
                                'repairProgress' => $req->get('progress'),
                                'estimateCost' => $req->get('estimateCost'),
                                'reason' => $req->get('reason'),
                                'detail' => $req->get('detail'),
                            ]);

        return $this->viewRepairServiceList(); 
    }

    public function displayItemList(){
        //$userID = Auth::id();
        //$info = DB::select("select * from services where userID = '$userID'");

        //$info = Service::where('services', Auth::id())
        //->join('userID', '=', 'userID');
        $info = Service::findOrFail($req->get('useId'));

        return view('customer.itemList', compact('info'));
    }

    public function displayItemDetail(Request $req){
        //$id = $req->id;
        //$info = DB::select("select * from services where id = '$id'");

        $info = Service::findOrFail($req->get('id'));
        

        return view('customer.itemInformation', compact('info'));
    }


}
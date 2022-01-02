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
        $info = Service::where('paymentStatus', 0);
        
        return view('staff.requestServiceList', compact('info'));
    }

    public function viewUpdateForm(Request $req){
        
        $info = Service::where('id', $req->get('id'))
        ->join('services', '=', 'id');

        return view('staff.itemInformation', compact('info'));
    }


    public function displayUpdateForm(Request $req){
        
        $info = Service::where('id', $req->get('id'))
        ->join('services', '=', 'id');

        return view('staff.updateForm', compact('info'));
    }

    //staff update service detail
    public function updateForm(Request $req){

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

        $info = Service::where('services', Auth::id())
        ->join('userID', '=', 'userID');
    

        return view('customer.itemList', compact('info'));
    }

    public function displayItemDetail(Request $req){

        $info = Service::where('id', $req->get('id'))
        ->join('services', '=', 'id');

        return view('customer.itemInformation', compact('info'));
    }

}
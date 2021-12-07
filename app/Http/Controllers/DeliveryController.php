<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\Track;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    //customer view tracking list
    public function cViewTrackingList(){
        $id = Auth::id();
        $info = DB::select("select * from services inner join tracks 
                            on services.id = tracks.id 
                            where services.userID = '$id' AND tracks.trackProgress != 'Returned'");

        return view('customer.custList', compact('info'));
    }

    //customer view selected service tracking
    public function cViewProgress(Request $req){
        $serviceID = $req->id;

        $info = DB::select("select tracks.updated_at, services.device, tracks.trackProgress, tracks.id
                            from tracks 
                            inner join services on tracks.id = services.id
                            where tracks.id = '$serviceID'");

        return view('customer.custProgress', compact('info'));
    }

    //accept job page
    public function viewStatus(){
        $id = Auth::id();
        $unaccepted = DB::select("SELECT users.phoneNo, tracks.id, tracks.pickupAddress
                                FROM users JOIN services ON users.id = services.userID
                                JOIN tracks ON tracks.id = services.id
                                WHERE services.status = 0");

        $accepted = DB::select("SELECT users.phoneNo, tracks.id, tracks.pickupAddress, tracks.trackProgress
                                FROM users JOIN services ON users.id = services.userID
                                JOIN tracks ON tracks.id = services.id
                                WHERE services.status = 1 AND services.PIC = '$id'");
        
        return view('rider.servicePage', compact('unaccepted', 'accepted'));
    }

    //to accept job
    public function accept(Request $req){
        $PIC = Auth::id();

        $trackID = $req->id;
        $update = DB::select("update services set status = 1, PIC = '$PIC' 
                            where id = '$trackID'");

        return $this->viewStatus(); 
    }

    //view service progress
    public function viewAcceptedTask(Request $req){
        $id = Auth::id();
        $trackID = $req->id;
        $info = DB::select("select * from tracks where id = '$trackID'");

        $update = DB::select("update tracks set serviceID = '$trackID' where id = '$trackID'");

        return view('rider.deliveryProgress', compact('info'));
    }

    //update service progress
    public function updateProgress(Request $req){
        $time = $req->time;
        $date = $req->date;
        $trackID = $req->id;
        $trackProgress = $req->trackProgress;

        $update = DB::select("update tracks set trackDate = '$date', trackTime = '$time',
                            trackProgress = '$trackProgress' where id = '$trackID'");

        return $this->viewStatus(); 
    }

    
    public function sViewTrackingList(){
        $info = DB::select("select * from services");

        return view('staff.staffList', compact('info'));
    }

    public function sViewProgress(Request $req){
        $serviceID = $req->id;

        $info = DB::select("select * from tracks 
                            inner join services on tracks.id = services.id
                            where tracks.id = '$serviceID'");
        return view('staff.staffProgress', compact('info'));
    }

    //staff receive item from rider
    public function receive(Request $req){
        $trackID = $req -> id;
        $result = "Confirm Received";

        $update = DB::select("update tracks set trackProgress = '$result'
                            where id = '$trackID'");
        
        $update1 = DB::select("update services set status = 2
                            where id = '$trackID'");                    

        $info = DB::select("select * from tracks 
                           inner join services on tracks.id = services.id
                           where tracks.id = '$trackID'");
        return view('staff.staffProgress', compact('info'));
    }

    //customer received repaired item from rider
    public function returnedDevice(Request $req){
        $trackID = $req -> trackID;

        $update = DB::select("update tracks set trackProgress = 'Returned' where id = '$trackID'");

        return $this->cViewTrackingList();
    }
}

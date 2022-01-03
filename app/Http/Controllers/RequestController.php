<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\Track;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    //customer add service form
    public function displayCustInfo(){
        $id = Auth::id();
        // $info = DB::select("select * from users where id = '$id'");
        $info = User::where('id',$id)->first();

        return view('customer.requestService', compact('info'));
    }

    //customer add service
    public function saveRequest(Request $req){
        // $userID = $req->id;
        // $username = $req->username;
        // $address = $req->address;

        // $add = new Service;
        // $add -> userID = $req -> id;
        // $add -> username = $req -> username;
        // $add -> device = $req -> device;
        // $add -> symptom = $req -> symptom;
        // $add -> save();
        $service = Service::create([
                                    'userID' => $req->id,
                                    'username' => $req->username,
                                    'device' => $req->device,
                                    'symptom' => $req->symptom
                                ]);
        $track = Track::create([
                                'userID' => $req->id,
                                'pickupAddress' => $req->address
                            ]);

        // $delivery = new Track;
        // $delivery -> userID = $userID;
        // $delivery -> pickupAddress = $address;
        // $delivery -> save();

        //$getID = DB::select("select id from tracks where pickupAddress = '$address' AND
        //                    userID = '$userID'");

        //$update = DB::select("update tracks set serviceID = $getID where id = $getID");

        return redirect('/cTrackList')->with('alert', 'Submit Successfully!');
    }
}

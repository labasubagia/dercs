<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\Track;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    //customer view tracking list
    public function cViewTrackingList()
    {
        $info = Service::where('services.userID', Auth::id())
            ->where('tracks.trackProgress', '!=', 'Returned')
            ->join('tracks', 'tracks.id', '=', 'services.id')
            ->get();
        return view('customer.custList', compact('info'));
    }

    //customer view selected service tracking
    public function cViewProgress(Request $req)
    {
        $info = Track::where('tracks.id', $req->get('id'))
            ->select("tracks.updated_at", "services.device", "tracks.trackProgress", "tracks.id")
            ->join('services', 'services.id', '=', 'tracks.id')
            ->get();

        return view('customer.custProgress', compact('info'));
    }

    //accept job page
    public function viewStatus()
    {
        $selected = [
            "users.phoneNo",
            "users.email",
            "services.device",
            "services.estimateCost",
            "tracks.id",
            "tracks.pickupAddress",
            "tracks.trackProgress",
            "tracks.trackDate",
            "tracks.trackTime",
        ];

        $unaccepted = User::where('services.status', 0)
            ->where('services.repairProgress', 'Done')
            ->select($selected)
            ->join("services", "services.userID", "=", "users.id")
            ->join("tracks", "tracks.id", "=", "services.id")
            ->get();

        $accepted = User::where('services.status', 1)
            ->where("services.PIC", Auth::id())
            ->select($selected)
            ->join("services", "services.userID", "=", "users.id")
            ->join("tracks", "tracks.id", "=", "services.id")
            ->get();

        return view('rider.servicePage', compact('unaccepted', 'accepted'));
    }

    //to accept job
    public function accept(Request $req)
    {
        Service::where('id', $req->get('id'))->update([
            'status' => true,
            'PIC' => Auth::id(),
        ]);
        return redirect()->back();
    }

    //view service progress
    public function viewAcceptedTask(Request $req, $id)
    {
        $info = Track::find($id);
        return view('rider.deliveryProgress', compact('info'));
    }

    //update service progress
    public function updateProgress(Request $req)
    {
        Track::where('id', $req->get('id'))->update([
            'trackDate' => $req->get('date'),
            'trackTime' => $req->get('time'),
            'trackProgress' => $req->get('trackProgress'),
        ]);
        return redirect('/servicePage');
    }


    public function sViewTrackingList()
    {
        $info = Service::all();
        return view('staff.staffList', compact('info'));
    }

    public function sViewProgress(Request $req)
    {
        $info = Track::where('tracks.serviceID', $req->get('id'))
            ->join('services', 'services.id', '=', 'tracks.serviceID')
            ->get();
        return view('staff.staffProgress', compact('info'));
    }

    //staff receive item from rider
    public function receive(Request $req)
    {
        $trackId = $req->get('id');

        Track::where('id', $trackId)->update(['trackProgress' => 'Confirm Received']);

        $info = Track::where('tracks.id', $trackId)
            ->join('services', 'services.id', 'tracks.serviceID')
            ->get();

        return view('staff.staffProgress', compact('info'));
    }

    //customer received repaired item from rider
    public function returnedDevice(Request $req)
    {
        Track::where('id', $req->get('trackID'))->update(['trackProgress' => 'Returned']);
        return $this->cViewTrackingList();
    }
}

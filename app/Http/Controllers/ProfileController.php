<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // register module
    // Rider to view license
    public function riderLicenseView()
    {
        $image = Auth::user()->licensePhoto ?? null;
        return view('rider.license', compact('image'));
    }

    // register module
    // Rider to upload license
    public function riderLicenseUpload(Request $req)
    {
        $id = Auth::id();

        $imageName = $req->file('image')->getClientOriginalName();
        $status = $req->status;

        $req->file('image')->storeAs('public/licenseImages/', $imageName);

        $update = DB::select("update users set licensePhoto = '$imageName', status = '$status' where id = '$id'");
        return redirect()->back()->with('success', 'License added successfully.');
    }

    //view profile
    public function customerProfile()
    {
        $customerInfo = Auth::user();
        return view('customer.profile', compact('customerInfo'));
    }

    //update profile
    public function updateCustomerProfile(Request $req)
    {
        $id = Auth::id(); //getCurrentUserID
        $newUsername = $req->username;
        $newEmail = $req->email;
        $newPhone = $req->phoneNo;
        $newAddress = $req->address;
        $update = DB::select("update users set username = '$newUsername', email = '$newEmail', phoneNo = '$newPhone',
                            address = '$newAddress' where id = '$id'");

        return redirect()->back()->with('alert', 'Updated!');
    }

    //view profile
    public function riderProfile()
    {
        $riderInfo = Auth::user();
        return view('rider.profile', compact('riderInfo'));
    }

    //update profile
    public function updateRiderProfile(Request $req)
    {
        $id = Auth::id();
        $newUsername = $req->username;
        $newEmail = $req->email;
        $newPhone = $req->phoneNo;
        $update = DB::select("update users set username = '$newUsername', email = '$newEmail',
                            phoneNo = '$newPhone' where id = '$id'");

        return redirect()->back()->with('alert', 'Updated!');
    }

    //view profile
    public function staffProfile()
    {
        $staffInfo = Auth::user();
        return view('staff.profile', compact('staffInfo'));
    }

    //update profile
    public function updateStaffProfile(Request $req)
    {
        User::where('id', Auth::id())->update([
            'username' => $req->get('username'),
            'email' => $req->get('email'),
            'phoneNo' => $req->get('phoneNo'),
            'address' => $req->get('address'),
        ]);
        return redirect()->back()->with('alert', 'Updated!');
    }

    //admin view all users
    public function viewUsers()
    {
        $goodCustomer = DB::select("select * from users where userType = 'Customer' AND status = 0");
        $badCustomer = DB::select("select * from users where userType = 'Customer' AND status = 1");
        return view('staff.manageUsers', compact('goodCustomer', 'badCustomer'));
    }

    //admin delete selected user
    public function deleteCustomer(Request $req)
    {
        $deleteID = $req->id;
        DB::table('users')
            ->where('id', '=', $deleteID)
            ->delete();

        return $this->viewUsers();
    }

    //admin ban selected user
    public function banCustomer(Request $req)
    {
        $id = Auth::id();
        $banID = $req->id;
        $update = DB::select("update users set status = 1 where id = '$banID'");

        return $this->viewUsers();
    }

    //admin unban selected user
    public function unbanCustomer(Request $req)
    {
        $id = Auth::id();
        $unbanID = $req->id;
        $update = DB::select("update users set status = 0 where id = '$unbanID'");

        return $this->viewUsers();
    }
}

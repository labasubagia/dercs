<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
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
        DB::beginTransaction();
        try {
            if (!$req->hasFile('image')) {
                throw new Exception('New Image should provided');
            }

            $imageName = $req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('public/licenseImages/', $imageName);

            User::where('id', Auth::id())->update([
                'licensePhoto' => $imageName,
                'status' => $req->get('status'),
            ]);
            DB::commit();
            return redirect()->back()->with('msg', 'License upload success.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('msg', 'License upload failed, ' . $th->getMessage());
        }
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
        User::where('id', Auth::id())->update([
            'username' => $req->get('username'),
            'email' => $req->get('email'),
            'phoneNo' => $req->get('phoneNo'),
            'address' => $req->get('address'),
        ]);
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
        $goodCustomer = User::where('userType', 'Customer')->where('status', 0)->get();
        $badCustomer = User::where('userType', 'Customer')->where('status', 1)->get();
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function staffDashboard(){
        $id = Auth::id();

        $countuser = User::where('userType', '=' , 'customer')->count();
        return view("staff.staffDashboard", compact("countuser"));
    }

    public function customerHomepage(){

        return view("customer.customerHomepage");
    }

    public function riderHomepage(){
        $id = Auth::id();
        


        $status = DB::select("select * from users where id = '$id'");

        return view("rider.riderHomepage", compact('status'));

        
    }
}

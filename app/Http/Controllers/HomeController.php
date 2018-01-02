<?php

namespace App\Http\Controllers;

use App\SystemNode;
use App\TravelRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $travel_records = TravelRecord::orderBy('shot_time')->get();
        return view('home')->with(compact('travel_records'));
    }
}

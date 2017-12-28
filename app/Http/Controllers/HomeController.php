<?php

namespace App\Http\Controllers;

use App\SystemNode;
use Illuminate\Http\Request;

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
        $node_list = (new SystemNode())->where('pid', '0')->get()->toArray();

        return view('home')->with(compact('node_list'));
    }


}

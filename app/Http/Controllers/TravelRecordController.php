<?php

namespace App\Http\Controllers;

use App\TravelRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class TravelRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TravelRecord.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\TravelRecord $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\TravelRecord $request)
    {
        $params = $request->toArray();
        $params['owner'] = Auth::user()->name;


        $dir_name = 'uploadfiles/' . date('Ymd');
        dump(Input::file('img'));
        $file_name = Input::file('img')->getClientOriginalName();
        $params['location'] = $dir_name . '/' . $file_name;
        Input::file('img')->move($dir_name, $file_name);
        $photo_obj = \App\TravelRecord::create($params);
     

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TravelRecord $travelRecord
     * @return \Illuminate\Http\Response
     */
    public function show(TravelRecord $travelRecord)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TravelRecord $travelRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(TravelRecord $travelRecord)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\TravelRecord $travelRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TravelRecord $travelRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TravelRecord $travelRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(TravelRecord $travelRecord)
    {
        //
    }
}

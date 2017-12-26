<?php

namespace App\Http\Controllers;

use App\TravelRecord;
use Carbon\Carbon;
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
        $type_list = ['beijing' => '北京', 'zhengzhou' => '郑州', 'luoyang'=> '洛阳', 'hunan' => '湖南','incoming' => '计划中'];
        $type_first = key($type_list);
        return view('TravelRecord.create', compact('type_first'))->with(compact('type_list'));
    }


    /**
     * @param \App\Http\Requests\TravelRecord $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(\App\Http\Requests\TravelRecord $request)
    {
        // init params
        $params = $request->toArray();
        $params['owner'] = Auth::user()->name;
        $params['shot_time'] = strtotime($params['shot_time']);

        // upload file
        $dir_name = 'uploadfiles/' . date('Ymd');
        $file_name = Input::file('img')->getClientOriginalName();
        $params['location'] = $dir_name . '/' . $file_name;
        Input::file('img')->move($dir_name, $file_name);

        // gen data
        \App\TravelRecord::create($params);
        return redirect('TravelRecord/list');
    }

    /**
     * Display the specified resource.
     *
     * @param TravelRecord $id
     * @return \Illuminate\Http\Response
     */
    public function show(TravelRecord $id)
    {
        return \GuzzleHttp\json_encode($id);
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

    public function list () {
        $list_show  = \App\TravelRecord::all();
        return view('TravelRecord.list')->with(compact('list_show'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Protagonist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProtagonistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_show = Protagonist::all();
        return view('Protagonist.index')->with(compact('list_show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Protagonist.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param \App\Http\Requests\Protagonist $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(\App\Http\Requests\Protagonist $request)
    {
        $params = $request->toArray();

        // upload file
        $dir_name = 'uploadfiles/' . date('Ymd');
        $file_name = Input::file('location')->getClientOriginalName();
        $params['location'] = $dir_name . '/' . $file_name;
        Input::file('location')->move($dir_name, $file_name);

        Protagonist::create($params);
        return redirect('Protagonist/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Protagonist  $protagonist
     * @return \Illuminate\Http\Response
     */
    public function show(Protagonist $protagonist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Protagonist  $protagonist
     * @return \Illuminate\Http\Response
     */
    public function edit(Protagonist $protagonist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Protagonist  $protagonist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Protagonist $protagonist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Protagonist  $protagonist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Protagonist $protagonist)
    {
        //
    }
}

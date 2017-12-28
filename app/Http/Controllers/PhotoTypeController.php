<?php

namespace App\Http\Controllers;

use App\PhotoType;
use Illuminate\Http\Request;

class PhotoTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_show = (new PhotoType())->latest()->get();
        return view('PhotoType.index')->with(compact('list_show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('PhotoType.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param \App\Http\Requests\PhotoType $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(\App\Http\Requests\PhotoType $request)
    {
        PhotoType::create($request->toArray());
        return redirect('PhotoType/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PhotoType  $photoType
     * @return \Illuminate\Http\Response
     */
    public function show(PhotoType $photoType)
    {
        return \GuzzleHttp\json_encode($photoType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhotoType  $photoType
     * @return \Illuminate\Http\Response
     */
    public function edit(PhotoType $photoType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PhotoType  $photoType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhotoType $photoType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PhotoType  $photoType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhotoType $photoType)
    {
        //
    }
}

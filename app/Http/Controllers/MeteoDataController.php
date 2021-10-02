<?php

namespace App\Http\Controllers;

use App\Models\MeteoData;
use Illuminate\Http\Request;

class MeteoDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MeteoData::data();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MeteoData  $meteoData
     * @return \Illuminate\Http\Response
     */
    public function show(MeteoData $meteoData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MeteoData  $meteoData
     * @return \Illuminate\Http\Response
     */
    public function edit(MeteoData $meteoData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MeteoData  $meteoData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MeteoData $meteoData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MeteoData  $meteoData
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeteoData $meteoData)
    {
        //
    }
}

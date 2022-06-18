<?php

namespace App\Http\Controllers;

use App\Models\Barter;
use App\Http\Requests\StoreBarterRequest;
use App\Http\Requests\UpdateBarterRequest;

class BarterController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barter  $barter
     * @return \Illuminate\Http\Response
     */
    public function show(Barter $barter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barter  $barter
     * @return \Illuminate\Http\Response
     */
    public function edit(Barter $barter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarterRequest  $request
     * @param  \App\Models\Barter  $barter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarterRequest $request, Barter $barter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barter  $barter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barter $barter)
    {
        //
    }
}

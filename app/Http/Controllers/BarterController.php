<?php

namespace App\Http\Controllers;

use App\Models\Barter;
use App\Http\Requests\StoreBarterRequest;
use App\Http\Requests\UpdateBarterRequest;
use GuzzleHttp\Psr7\Request;

class BarterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        dd($request);
        // $validatedData = $request->validate([
        //     'title' => 'required|max:255',
        //     'slug' => 'required|unique:posts',
        //     'image' => 'image|file|max:1024',
        //     'category_id' => 'required',
        //     'body' => 'required'
        // ]);

        // if($request->file('image')){
        //     $validatedData['image'] = $request->file('image')->store('post-images');
        // }

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        // Barter::create($validatedData);

        // return redirect('dashboard/posts')->with('success', 'New Post Successfully Added');
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

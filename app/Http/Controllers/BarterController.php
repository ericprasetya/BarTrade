<?php

namespace App\Http\Controllers;

use App\Models\Barter;
use App\Http\Requests\StoreBarterRequest;
use App\Http\Requests\UpdateBarterRequest;
use GuzzleHttp\Psr7\Request;

use function PHPSTORM_META\type;

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
        // dd($request);
        $validatedData = $request->validate([
            'buyer_product_id' => 'required|exists:products,id|different:seller_product_id',
            'courier_id' => 'required|exists:couriers,id',
            'seller_product_id' => 'required|exists:products,id|different:buyer_product_id',
            'type' => 'required|in:FullBarter,TradeIn',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'address' => 'required|min:20',
            'payment_id' => 'required|exists:payments,id',
        ]);
        if($validatedData['type'] == "FullBarter"){
            $validatedData['type'] = "Full Barter";
        }else{
            $validatedData['type'] = "Trade In";
        }
        
        $barterData = collect($validatedData)->only([
            'buyer_product_id',
            'seller_product_id',
            'courier_id',
            'payment_id',
            'type',
            'address',
        ])->toArray();
        
        // dd($barterData);
        Barter::create($barterData);
        return redirect('/');
        // return redirect('dashboard/transactions')->with('success', 'New Post Successfully Added');
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

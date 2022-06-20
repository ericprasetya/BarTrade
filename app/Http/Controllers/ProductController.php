<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Courier;
use App\Models\Payment;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryName = '';
        if(request('category')){
            $category = ProductCategory::firstWhere('slug', request('category'));
            $categoryName = $category->name;
        }

        $products = Product::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString();
        if(Auth::check()){
            $products =  Product::latest()->filter(request(['search', 'category']))->where('user_id', 'not like', auth()->user()->id)->paginate(6)->withQueryString();
        }

        return view('products.index',[
            "products" => $products,
            "categoryName" => $categoryName,
            "categories" => ProductCategory::all()
        ]);
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
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', [
            "product" => $product,
            "categoryName" => "",
            "categories" => ProductCategory::all()
        ]);
    }

    public function transaction(Product $product)
    {
        
        if($product->user->id == auth()->user()->id){
            return redirect('/');
        }
        $type = request('type');
        $buyerProducts = Product::where('user_id', auth()->user()->id)->get();
        
        return view('products.transaction', [
            "product" => $product,
            "categoryName" => "",
            "categories" => ProductCategory::all(),
            "type" => $type,
            "buyerProducts" => $buyerProducts,
            "payments" => Payment::all(),
            "couriers" => Courier::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

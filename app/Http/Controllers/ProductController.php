<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Courier;
use App\Models\Payment;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        return view('products.create', [
            "categoryName" => "",
            "categories" => ProductCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|file|max:5120',
            'category_id' => 'required',
            'description' => 'required|max:255',
            'value' => 'required|numeric|min:10000',
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store(auth()->user()->username);
        }

        $validatedData['user_id'] = auth()->user()->id;
        Product::create($validatedData);

        return redirect('/dashboard')->with('success', 'New Product Successfully Added');
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
        if($product->user->id !== auth()->user()->id) {
            abort(403);
        }
        return view('products.edit', [
            "categoryName" => "",
            'categories' => ProductCategory::all(),
            'product' => $product
        ]);
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|file|max:5120',
            'category_id' => 'required',
            'description' => 'required|max:255',
            'value' => 'required|numeric|min:10000',
        ]);

        if($request->file('image')){
            if($product->image){
                Storage::delete($product->image);
            }
            $validatedData['image'] = $request->file('image')->store(auth()->user()->username);
        }

        $validatedData['user_id'] = auth()->user()->id;
        Product::where('id', $product->id)->update($validatedData);

        return redirect('/dashboard')->with('success', 'Product Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->image){
            Storage::delete($product->image);
        }
        Product::destroy($product->id);

        return redirect('dashboard')->with('success', 'Product has been deleted');
    }
}

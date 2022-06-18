<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('register.index', [
            "categories" => ProductCategory::all(),
            "categoryName" => ""
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'phone' => 'required|digits_between:9,12|numeric|starts_with:8|unique:users',
            'password' => 'required|min:5|max:15|alpha_num'
        ]);
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['phone'] = "62".$validatedData['phone'];
        User::create($validatedData);
        // $request->session()->flash('success', 'Registration successfull! Please Login');
        return redirect('/login')->with('success', 'Registration successfull! Please Login');
    }

}

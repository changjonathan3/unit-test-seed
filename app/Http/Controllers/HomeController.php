<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function about()
    {
        $user=Auth::user();
        return view('about', ['User' => $user]);
    }
    public function contact()
    {
        return view('contact');
    }

    function store(Request $request){
        $name = $request->name;
        return redirect()->route('thanks', ['name' => $name]);
    }
    function thanks($name, Request $request){
        return view('thankyou')->with(compact('name'));
    }
}

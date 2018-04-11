<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petshop;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petshops = Petshop::with('petshopservicos.servico')->get();
        return view('index', compact('petshops'));
    }
}

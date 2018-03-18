<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetshopController extends Controller
{
    public function create(){
        return view('cadastro-petshop');
    }
}

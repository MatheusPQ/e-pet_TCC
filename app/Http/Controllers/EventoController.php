<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Evento;

class EventoController extends Controller
{
    public function list(Request $req){

        $eventos = Evento::where('petshop_id', $req->petshop_id)->get();
        return response()->json($eventos);
        // dd($eventos->all());
        // return compact('eventos');
    }

    public function store(Request $req){
        dd($req->all());

        // $eventos = Evento::where('petshop_id', $req->petshop_id);

        // return $eventos;
    }
}

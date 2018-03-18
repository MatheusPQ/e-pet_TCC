<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Petshop;
use App\PetshopUser;

class PetshopController extends Controller
{
    function __construct(){
        //Verificar se user está logado
        $this->middleware('auth');
    }

    public function create(){
        return view('cadastro-petshop');
    }

    public function store(Request $req){
        $dados = $req->except('imagem');

        $petshop = Petshop::create($dados);
        $petshop_id = $petshop->id;

        if($req->hasFile('imagem')){
            $imagem = $req->file('imagem');
            $num = $petshop->id;
            $dir = "img/petshops";
            $ext = $imagem->guessClientExtension();
            $nomeImagem = "petshop_".$num.".".$ext;
            $imagem->move($dir, $nomeImagem);
            $petshop->imagem = $dir."/".$nomeImagem;
            $petshop->save();
        }

        $user = Auth::user();

        $petshopUser = [
            'petshop_id'    => $petshop_id,
            'user_id'       => $user->id
        ];

        PetshopUser::create($petshopUser);
        return view('index');
    }
}

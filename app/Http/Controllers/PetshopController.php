<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Petshop;
use App\PetshopUser;
use App\PetshopServicoRaca;

class PetshopController extends Controller
{
    function __construct(){
        //Verificar se user está logado
        $this->middleware('auth');
    }

    public function index(){
        $petshops = Petshop::with('petshopservicos.servico')->get();
        return view('index', compact('petshops'));
    }

    public function mostrarMeusPetshops(){
        $user_id = Auth::id();
        $petshops = PetshopUser::with('petshop.petshopservicos.servico')->where('user_id', $user_id)->get();
        // dd($petshops);
        return view('meuspetshops', compact('petshops'));
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

        $petshop = Petshop::find($petshop->id);
        return redirect()->route('admin.servicos', [$petshop]);
    }

    public function show($id){
        // $petshop = Petshop::find($id);
        $petshop = Petshop::with(['petshopservicos.servico', 'petshopservicoracas.raca'])->where('id', $id)->first();
        $racas = PetshopServicoRaca::select('raca_id')->where('petshop_id', $id)->distinct()->with('raca')->get();
        // dd($racas);
        return view('petshop', compact('petshop', 'racas'));
    }

    public function showAdmin($id){
        $petshop = Petshop::with('petshopservicos.servico')->with('petshopservicoracas')->find($id);
        return view('admin-petshop', compact('petshop'));
    }
}

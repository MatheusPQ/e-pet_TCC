<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Petshop;
use App\Servicos;
use App\PetshopServico;

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
        $servicos = Servicos::all();
        return view('index', compact('petshops', 'servicos'));
        // return view('tabelaPetshops', ['petshops' => $petshops])->render();
    }

    public function buscarPetshopPorNome(Request $req){
        $nomePetshop = $req->input('nomePetshop');

        if($req->input('cidade') == 1){
            $user = Auth::user();
            $petshops = Petshop::where('nomeFantasia', 'like', '%'.$nomePetshop.'%')->where('cidade', $user->cidade)->get();
        } else {
            $petshops = Petshop::where('nomeFantasia', 'like', '%'.$nomePetshop.'%')->get();
        }

        return view('tabelaPetshops', ['petshops' => $petshops])->render();        
    }

    public function buscarPetshopPorAvaliacao(Request $req){

        if($req->input('cidade') == 1){
            $user = Auth::user();
            $petshops = Petshop::where('cidade', $user->cidade)->orderBy('media_avaliacoes', 'desc')->get();
        } else {
            $petshops = Petshop::orderBy('media_avaliacoes', 'desc')->get();
        }

        return view('tabelaPetshops', ['petshops' => $petshops])->render();        
    }

    public function buscarPetshopPorServico(Request $req){
        $servico_id = $req->input('servico');
        $petshops = [];
        $petshopServicos = PetshopServico::where('servico_id', $servico_id)->with('petshop')->get();

        if($req->input('cidade') == 1){
            $user = Auth::user();

            foreach ($petshopServicos as $ps) {
                if($ps->petshop->cidade == $user->cidade){
                    $petshops[] = $ps->petshop;
                }
            }
        } else {
            foreach ($petshopServicos as $ps) {
                $petshops[] = $ps->petshop;
            }
        }

        return view('tabelaPetshops', ['petshops' => $petshops])->render();        
    }

    public function buscarPetshopPorCidade(){
        $user = Auth::user();
        
        $petshops = Petshop::where('cidade', $user->cidade)->get();
        return view('tabelaPetshops', ['petshops' => $petshops])->render();
    }

    public function mostrarEstatisticas(){
        if(Auth::check()){
            if( Auth::user()->nivel == 1 ){
                return view('estatisticas');
            }
        }
        
        session()->flash('erro', 'Não autorizado');
        return redirect('/');
    }
}

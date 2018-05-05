<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Petshop;
use App\PetshopUser;
use App\PetshopServicoRaca;
use App\Avaliacao;

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

    public function salvarAvaliacao(Request $req){

        $user_id = Auth::id();
        $petshop_id = $req->input('petshop_id');
        $numero_estrelas = $req->input('avaliacao');

        $where = [
            'petshop_id' => $petshop_id,
            'user_id' => $user_id
        ];

        //Se for nulo, ou é porque o usuário removeu sua avaliação, ou porque ele acabou de abrir a pág do petshop, mas não o avaliou ainda.
        if(is_null($numero_estrelas)){
            $avaliacao = Avaliacao::where($where)->first();

            //Verifica se a avaliação existe. Pra casos onde o usuário acabou de abrir a pág do petshop, mas não avaliou o petshop ainda.
            if($avaliacao){
                $avaliacao->delete();
                $petshop = Petshop::find($petshop_id);
                $petshop->recalcularMedia();
                return response()->json($petshop);
            }
            $petshop = Petshop::find($petshop_id);
            return response()->json($petshop);
        }

        $avaliacao = Avaliacao::where($where)->first();
    
        if($avaliacao){
            $avaliacao->salvarAvaliacaoDoPetshop($petshop_id, $numero_estrelas, $user_id);
        } else {
            $avaliacao = new Avaliacao;
            $avaliacao->salvarAvaliacaoDoPetshop($petshop_id, $numero_estrelas, $user_id);
        }
        $petshop = Petshop::find($petshop_id);
        return response()->json($petshop);
    }

    public function buscarAvaliacao(Request $req){
        $user_id = Auth::id();
        $petshop_id = $req->input('petshop_id');

        $where = [
            'petshop_id' => $petshop_id,
            'user_id' => $user_id
        ];

        $avaliacao = Avaliacao::where($where)->first();
    
        if($avaliacao){
            return response()->json($avaliacao);
        }
        
    }
}

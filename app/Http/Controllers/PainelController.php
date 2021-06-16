<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Painel;
use App\Models\Departamento;
use App\Models\Cargo;
use App\Models\Funcionario;
use App\Models\HistoricoFuncionario;

use App\Models\Presenca;
use App\Models\Jogador;

class PainelController extends Controller
{
    public function ver(){
        $jogadores = Jogador::all();
        $presenca = Presenca::all();

        $jogadorLinha = array();
        $jogadorGoleiro = array();

        foreach($jogadores as $key => $jogador) {
                $todosJogadores[$key] = $jogador;
            if ($jogador->posicao === 'goleiro') {
                $jogadorGoleiro[$key] = $jogador;
            } else {
                $jogadorLinha[$key] = $jogador;
            }
        }

        $jogadorNivelUm = array();
        $jogadorNivelDois = array();
        $jogadorNivelTres = array();
        $jogadorNivelQuatro = array();
        $jogadorNivelCinco = array();

        foreach($jogadorLinha as $key => $value) {
            if ($value->nivel === '1') {
                $jogadorNivelUm[$key] = $value;
            } elseif($value->nivel === '2') {
                $jogadorNivelDois[$key] = $value;
            } elseif($value->nivel === '3') {
                $jogadorNivelTres[$key] = $value;
            } elseif($value->nivel === '4') {
                $jogadorNivelQuatro[$key] = $value;
            } else {
                $jogadorNivelCinco[$key] = $value;
            }
        }

        $jogadorGoleiroNivelUm = array();
        $jogadorGoleiroNivelDois = array();
        $jogadorGoleiroNivelTres = array();
        $jogadorGoleiroNivelQuatro = array();
        $jogadorGoleiroNivelCinco = array();

        foreach($jogadorGoleiro as $key => $value) {
            if ($value->nivel === '1') {
                $jogadorGoleiroNivelUm[$key] = $value;
            } elseif($value->nivel === '2') {
                $jogadorGoleiroNivelDois[$key] = $value;
            } elseif($value->nivel === '3') {
                $jogadorGoleiroNivelTres[$key] = $value;
            } elseif($value->nivel === '4') {
                $jogadorGoleiroNivelQuatro[$key] = $value;
            } else {
                $jogadorGoleiroNivelCinco[$key] = $value;
            }
        }

        return view('admin/dashboard', ['presencas' => $presenca, 'jogadores' => $jogadores, 'jogadorNivelUm' => $jogadorNivelUm,
                    'jogadorNivelDois' => $jogadorNivelDois,'jogadorNivelTres' => $jogadorNivelTres,'jogadorNivelQuatro' => $jogadorNivelQuatro,
                    'jogadorNivelCinco' => $jogadorNivelCinco, 'jogadorLinha' => $jogadorLinha, 'jogadorGoleiroNivelUm' => $jogadorGoleiroNivelUm,
                    'jogadorGoleiroNivelDois' => $jogadorGoleiroNivelDois,'jogadorGoleiroNivelTres' => $jogadorGoleiroNivelTres,
                    'jogadorGoleiroNivelQuatro' => $jogadorGoleiroNivelQuatro,'jogadorGoleiroNivelCinco' => $jogadorGoleiroNivelCinco,
                    'jogadorGoleiro' => $jogadorGoleiro ]);
    }

    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin/dashboard', ['funcionarios' => $funcionarios]);
    }

    public function store(Request $request){
        Painel::create([
            'nome' => $request->nome,
            'perfil' => $request->perfil,
            'email' => $request->email,
            'senha' => $request->senha,
        ]);
        return redirect()->route('ver_painel');
    }

    public function show(Request $request){
        $usuarios = Painel::all();
        return view('painel.todos', ['painel' => $painel]);
    }

    public function destroy($id){
        $painel = Painel::findOrFail($id);
        $painel->delete();
        return redirect()->route('ver_painel');
    }

    public function edit($id){
        $painel = Painel::findOrFail($id);
        return view('painel.editar', ['painel' => $painel]);
    }

    public function update(Request $request){
        $painel = Painel::findOrFail($request->id);
        $painel->update([
            'nome' => $request->nome,
            'perfil' => $request->perfil,
            'email' => $request->email,
            'senha' => $request->senha,
        ]);
        return redirect()->route('ver_painel');
    }
}

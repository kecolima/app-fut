<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presenca;
use App\Models\Jogador;

class PresencaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jogadores = Jogador::all();
        return view('presenca.create',['jogadores' => $jogadores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Presenca::create([
            'jogadores' => $request->jogador,
            'tamanhoTime' => $request->tamanhoTime,
            'data' => $request->data,
        ]);
        return redirect()->route('ver_presenca');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $presenca = Presenca::all();
        return view('presenca.todos', ['presencas' => $presenca]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $presenca = Presenca::findOrFail($id);
        $presenca->data = date("d/m/Y", strtotime($presenca->data));
        $jogadores = Jogador::all();
        return view('presenca.editar', ['presenca' => $presenca, 'jogadores' => $jogadores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $presenca = Presenca::findOrFail($request->id);
        $presenca->update([
            'jogadores' => $request->jogador,
            'tamanhoTime' => $request->tamanhoTime,
            'data' => $request->data,
        ]);
        return redirect()->route('ver_presenca');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $presenca = Presenca::findOrFail($id);
        $presenca->delete();
        return redirect()->route('ver_presenca');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function partida($id)
    {
        $presenca = Presenca::findOrFail($id);
        $tamanhoTime = $presenca->tamanhoTime;
        $quantidadeJogadores = $presenca->jogadores;
        $dataPartida = date("d/m/Y", strtotime($presenca->data));
        $quantidadeTimes = (int) (count($quantidadeJogadores)/$tamanhoTime);
        $quantidadeJogadoresSobrando = (count($quantidadeJogadores)%$tamanhoTime);
        $jogadores = Jogador::all();
        $jogadorLinha = array();
        $jogadorGoleiro = array();
        $todosJogadores = array();
        foreach($quantidadeJogadores as $key => $value) {
            foreach($jogadores as $jogador) {
                if ($jogador->id === $key) {
                        $todosJogadores[$key] = $jogador;
                    if ($jogador->posicao === 'goleiro') {
                        $jogadorGoleiro[$key] = $jogador;
                    } else {
                        $jogadorLinha[$key] = $jogador;
                    }
                }
            }
        }

        /*
            Não permitir o sorteio, caso o número total de confirmados seja menor que Nj*2, sendo 'Nj' o número de
            jogadores por time (ex: para um sorteio com 5 jogadores por time, o mínimo de confirmados deve ser 10)
        */
        if ($quantidadeTimes < 2) {
            echo 'Deu Ruim, sem baba Hoje';
            //return view('presenca.erro', ['presenca' => $presenca, 'jogadores' => $quantidadeJogadores]);
        } else {

            $JogadoresTimes = array_chunk($jogadorLinha, $quantidadeTimes);

            if (count($jogadorGoleiro) < count($JogadoresTimes)) {
                dd('Número insuficiente de goleiros');
                //return view('presenca.erro', ['presenca' => $presenca, 'jogadores' => $quantidadeJogadores]);
            }

            $jogadorGoleiroTime = array();
            $aux = 0;
            foreach($jogadorGoleiro as $key => $value) {
                $jogadorGoleiroTime[$aux] = $jogadorGoleiro[$key];
                $aux++;
            }

            foreach($JogadoresTimes as $key => $value) {
                $JogadoresTimes[$key][$quantidadeTimes] = $jogadorGoleiroTime[$key];
            }
            /*
                Quando houver mais de dois times completos, é permitido ao último time ficar com o número de jogadores
                menor do que aquele definido pelo usuário
            */
            if ($quantidadeJogadoresSobrando > 0){
                $quantidadeTimes = $quantidadeTimes + 1;
            }

            return view('presenca.exibir', ['times' => $JogadoresTimes, 'dataPartida' => $dataPartida,]);
        }
    }
}

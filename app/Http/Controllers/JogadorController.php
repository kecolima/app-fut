<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogador;

class JogadorController extends Controller
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
        return view('jogadores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jogador::create([
            'nome' => $request->nome,
            'nivel' => $request->nivel,
            'posicao' => $request->posicao,
        ]);
        return redirect()->route('ver_jogador');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $jogadores = Jogador::all();
        return view('jogadores.todos', ['jogadores' => $jogadores]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jogador = Jogador::findOrFail($id);
        return view('jogadores.editar', ['jogador' => $jogador]);
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
        $jogador = Jogador::findOrFail($request->id);
        $jogador->update([
            'nome' => $request->nome,
            'nivel' => $request->nivel,
            'posicao' => $request->posicao,
        ]);
        return redirect()->route('ver_jogador');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jogador = Jogador::findOrFail($id);
        $jogador->delete();
        return redirect()->route('ver_jogador');
    }
}

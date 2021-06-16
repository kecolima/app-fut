<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    public function create(){
        return view('usuarios.create');
    }

    public function store(Request $request){
        Usuario::create([
            'nome' => $request->nome,
            'perfil' => $request->perfil,
            'email' => $request->email,
            'senha' => $request->senha,
        ]);
        return redirect()->route('ver_usuario');
    }

    public function show(Request $request){
        $usuarios = Usuario::all();
        return view('usuarios.todos', ['usuarios' => $usuarios]);
    }

    public function destroy($id){
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->route('ver_usuario');
    }

    public function edit($id){
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.editar', ['usuario' => $usuario]);
    }

    public function update(Request $request){
        $usuario = Usuario::findOrFail($request->id);
        $usuario->update([
            'nome' => $request->nome,
            'perfil' => $request->perfil,
            'email' => $request->email,
            'senha' => $request->senha,
        ]);
        return redirect()->route('ver_usuario');
    }
}

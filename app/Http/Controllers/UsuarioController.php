<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.usuarios', compact('usuarios'));
    }

    public function crear()
    {
        return view('usuarios.crear_usuario');
    }

    public function guardar(Request $request)
    {
        if ($request->id){
            try {
                User::find($request->id)->update([
                    'name' => $request->nombre,
                    'email' => $request->email,
                    'password' => bcrypt($request->pass)
                ]);
                return response()->json([
                    'type' => 'success',
                ],200);
            } catch (\Throwable $th) {
                return response()->json([
                    'type' => 'error',
                ],500);
            }
        }else{
            try {
                User::create([
                    'name' => $request->nombre,
                    'email' => $request->email,
                    'password' => bcrypt($request->pass)
                ]);
                return response()->json([
                    'type' => 'success',
                ],200);
            } catch (\Throwable $th) {
                return response()->json([
                    'type' => 'error',
                ],500);
            }
        }
    }

    public function editar($id)
    {
        $usuario = User::find($id);
        return view('usuarios.editar_usuario', compact('usuario'));
    }

    public function eliminar($id)
    {
        try {
            Log::debug('Eliminando usuario con id: '.$id);
            User::find($id)->delete();
            return response()->json([
                'type' => 'success',
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'type' => 'error',
            ],500);
        }
    }
}

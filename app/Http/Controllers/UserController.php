<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function actualizar(Request $request)
    {
        $campo = $request->input('campo');
        $valor = $request->input('valor');

        auth()->user()->update([$campo => $valor]);

        return response()->json(['mensaje' => 'Usuario actualizado correctamente']);
    }
}

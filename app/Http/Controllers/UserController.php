<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function actualizar(Request $request)
    {
        $campo = $request->input('campo');
        $valor = $request->input('valor');

        // Actualizar el usuario en la base de datos según el campo y valor proporcionados
        auth()->user()->update([$campo => $valor]);

        return response()->json(['mensaje' => 'Usuario actualizado correctamente']);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Resenia;
use App\Models\Reserva;
use Illuminate\Http\Request;


class ReseniaController extends Controller
{

    public function index()
    {
        $resenias = Resenia::with('usuario', 'reserva')->get();

        return view('resenias.index', compact('resenias'));
    }

    public function create(Reserva $reserva)
    {
        return view('resenias.create', compact('reserva'));
    }

    public function store(Request $request, Reserva $reserva)
    {
        $request->validate([
            'calificacion' => 'required|integer|min:1|max:5',
            'comentario' => 'nullable|string',
        ]);

        $reserva->resenia()->create([
            'usuario_id' => auth()->id(),
            'calificacion' => $request->calificacion,
            'comentario' => $request->comentario,
        ]);

        return redirect()->route('resenias.show', $reserva->id)->with('success', 'Reseña agregada con éxito.');
    }

    public function show($reservaId)
    {
        $reserva = Reserva::with('resenia.usuario')->findOrFail($reservaId);
        $resenias = Resenia::with('usuario', 'reserva')->get();

        //return view('resenias.show', compact('reserva'));
        return view('resenias.index', compact('resenias'));

    }

}

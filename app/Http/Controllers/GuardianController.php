<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
    /**
     * Busca un tutor por su CURP y devuelve sus datos.
     * Este método está pensado para ser usado por una llamada AJAX desde el frontend.
     */
    public function searchByCurp($curp)
    {
        $guardian = Guardian::where('curp', $curp)->first();

        if ($guardian) {
            return response()->json($guardian);
        }

        return response()->json(['message' => 'Tutor no encontrado'], 404);
    }
}

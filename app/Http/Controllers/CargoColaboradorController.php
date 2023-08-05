<?php

namespace App\Http\Controllers;

use App\Models\CargoColaborador;
use Illuminate\Http\Request;

class CargoColaboradorController extends Controller
{
    public function update(Request $request, $id){
        $validate = $request->validate([
            'nota_desempenho' => 'required|numeric|digits_between:1,10',
        ]);

        try {
            $update = CargoColaborador::find($id)->update($validate);
            return response()->json('Sucesso.');
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()]);
        }
    }
}

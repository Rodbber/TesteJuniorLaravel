<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    public function index(){
        $unidade = Unidade::orderByDesc('id')->get();

        return response()->json($unidade);
    }

    public function create(Request $request){
        $validate = $request->validate([
            'nome' => 'required|string',
            'razao_social' => 'required|string',
            'cnpj' => 'required|string',
        ], [
            'nome' => 'O nome é requerido',
            'nome' => 'A razao_social é requerido',
            'nome' => 'O cnpj é requerido',
        ]);

        try {
            $create = Unidade::create($validate);
            return response()->json($create);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }

    }

    public function relatorio_colaboradores(){
        $unidade_colaboradores = Unidade::withCount('colaboradores')->get();

        $pdf = Pdf::loadView('relatorios.colaboradores_por_unidade', ['data' => $unidade_colaboradores]);
        return $pdf->download('Unidade - quantidade de colaboradores.pdf');
    }
}

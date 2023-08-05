<?php

namespace App\Http\Controllers;

use App\Models\CargoColaborador;
use App\Models\Colaborador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class ColaboradorController extends Controller
{
    public function index(){
        $colaborador = Colaborador::with('unidade:id,nome', 'cargo')->orderByDesc('id')->get();
        return response()->json($colaborador);
    }

    public function create(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'unidade_id' => 'required|numeric',
                'nome' => 'required|string',
                'cpf' => 'required|numeric|digits_between:11,11',
                'email' => 'required|email',
            ], [
                'unidade_id' => 'Vinculo não encontrado',
                'nome' => 'nome não encontrado',
                'cpf.required' => 'cpf não encontrado',
                'cpf.digits_between' => 'cpf tem 11 digitos',
                'email' => 'email não encontrado',
            ]);

            $validate_cargo = Validator::make($request->all(), [
                'cargo_id' => 'required|numeric',
                'nota_desempenho' => 'required|numeric',
            ], [
                'cargo_id' => 'cargo_id não encontrado',
                'nota_desempenho' => 'nota_desempenho não encontrado',
            ]);

            if ($validate->fails()) {
                return response()->json(['errors' => $validate->errors()], 422);
            }

            $validate = $validate->validated();
            $validate_cargo = $validate_cargo->validated();

            $create = Colaborador::create($validate);

            $data_cargo_colaborador = [
                'colaborador_id' => $create->id,
                'cargo_id' => $validate_cargo['cargo_id'],
                'nota_desempenho' => $validate_cargo['nota_desempenho']
            ];

            CargoColaborador::create($data_cargo_colaborador);

            $colaborador = Colaborador::with(['unidade:id,nome', 'cargo' => function ($q) {
                $q->with('cargo:id,cargo')->select('colaborador_id', 'cargo_id', 'nota_desempenho');
            }])->find($create->id);

            return response()->json($colaborador);
        } catch (\Throwable $th) {
            return response()->json(["errors" => $th->getMessage()]);
        }
    }

    public function relatorio()
    {
        $colaborador = Colaborador::with(['unidade:id,nome', 'cargo'])->get();

        $pdf = Pdf::loadView('relatorios.colaboradores', ['data' => $colaborador]);
        return $pdf->download('Colaboradores.pdf');
    }

    public function ranking(){
        $ranking = CargoColaborador::with(['colaborador.unidade','cargo'])->orderByDesc('nota_desempenho')->get();

        $pdf = Pdf::loadView('relatorios.ranking_colaboradores', ['data' => $ranking]);
        return $pdf->download('Colaboradores - Ranking.pdf', ['Attachment' => false]);
    }


}

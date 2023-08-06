@extends('relatorios.relatorio_layout')

@section('head-table')
    <tr>
        <th>
            Nome Fantasia
        </th>
        <th>
            Razão social
        </th>
        <th>
            CNPJ
        </th>
        <th>
            Total de colaboradores
        </th>
    </tr>
@endsection

@section('body-table')
    @foreach ($data as $value)
        <tr style="font-size: 10pt;">
            <td>{{ $value->nome_fantasia }}</td>
            <td>{{ $value->razao_social }}</td>
            <td>{{ $value->cnpj }}</td>
            <td>{{ $value->colaboradores_count }}</td>
        </tr>
    @endforeach
@endsection

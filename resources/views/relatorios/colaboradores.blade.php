@extends('relatorios.relatorio_layout')

@section('head-table')
    <tr>
        <th>
            Nome
        </th>
        <th>
            CPF
        </th>
        <th>
            E-mail
        </th>
        <th>
            Unidade
        </th>
        <th>
            Cargo
        </th>
    </tr>
@endsection

@section('body-table')
    @foreach ($data as $value)
        <tr style="font-size: 10pt;">
            <td>{{ $value->nome }}</td>
            <td>{{ $value->cpf }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->unidade->nome_fantasia }}</td>
            <td>{{ $value->cargo->cargo }}</td>
        </tr>
    @endforeach
@endsection

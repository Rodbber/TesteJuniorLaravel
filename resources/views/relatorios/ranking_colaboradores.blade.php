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
        <th>
            Nota desempenho
        </th>
    </tr>
@endsection

@section('body-table')
    @foreach ($data as $value)
        <tr style="font-size: 10pt;">
            <td>{{ $value->colaborador->nome }}</td>
            <td>{{ $value->colaborador->cpf }}</td>
            <td>{{ $value->colaborador->email }}</td>
            <td>{{ $value->colaborador->unidade->nome }}</td>
            <td>{{ $value->cargo->cargo }}</td>
            <td>{{ $value->nota_desempenho }}</td>
        </tr>
    @endforeach
@endsection

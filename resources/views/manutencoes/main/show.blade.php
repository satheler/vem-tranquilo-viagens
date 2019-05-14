@extends('layouts.app', ['title' => __('Registro de Manutenções')])

@section('content')
<div class="card-body">
    <div class="table-responsive py-4">
        <table id="datatable-manutencao" class="table align-items-center table-flush dataTable">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">{{ __('Motivo') }}</th>
                    <th scope="col">{{ __('Oficina') }}</th>
                    <th scope="col">{{ __('Orçamento') }}</th>
                    <th scope="col">{{ __('Data de Entrada') }}</th>
                    <th scope="col">{{ __('Data de Saída') }}</th>
                    <th scope="col">{{ __('Valor Final') }}</th>
                    <th scope="col">{{ __('Observação') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lista as $item)
                    <tr data-table-row-id={{ $item->id }}>
                        <td>{{ $item->motivo }}</td>
                        <td>{{ $item->oficina }}</td>
                        <td>{{ $item->orcamento }}</td>
                        <td>{{ $item->data_entrada }}</td>
                        <td>{{ $item->data_saida }}</td>
                        <td>{{ $item->valor_final }}</td>
                        <td>{{ $item->observacao }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@extends('compra_passagens_intermunicipal.index', ['title' => __('Compra da Passagens')])

@section('infos')
<div class="card-header border-0">
    <div class="row align-cidades-center">
        <div class="col-8">
            <h3 class="mb-0">{{ __('Passagens Disponíveis') }}</h3>
        </div>
    </div>
</div>
<div class="col-12">
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>

<div class="card-body py-4">
    <form action="{{ route('venda_intermunicipal.search') }}" method="post">
        <div class="row justify-content-center">
            <table id="datatable-basic" class="table align-items-center table-flush dataTable">
                <thead class="thead-light">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">{{ __('Partida') }}</th>
                        <th scope="col">{{ __('Chegada') }}</th>
                        <th scope="col">{{ __('Origem') }}</th>
                        <th scope="col">{{ __('Destino') }}</th>
                        <th scope="col">{{ __('Valor') }}</th>

                    </tr>
                </thead>
                @foreach ($lista as $item)
                <tr data-table-row-id={{ $item->id }}>
                    
                    <td>{{ $item->horarioSaida }}</td>
                    <td>{{ $item->horarioChegada }}</td>
                    <td>{{ $item->origem }}</td>
                    <td>{{ $item->destino }}</td>
                    <td>{{ $item->valor }}</td>

                    <td align="center">
                        <div class="dropdown">
                            <button type="submit" class="btn btn-primary" style="margin-top: 1px">{{ __('Selecionar') }}</button>
                            <i class="fas fa-ellipsis-v"></i>
                            </a>

                        </div>
                    </td>
            </table>


        </div>
        <form>
</div>
@endsection
@extends('tarifa.index', ['title' => __('Tarifa Intermunicipal')])

@section('infos')
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">{{ __('Tarifa Intermunicipal') }}</h3>
            </div>
            <div class="col-4 text-right">
                <a href="{{ route('tarifa_intermunicipal.create') }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicionar Tarifa Intermunicipal"><i class="fas fa-plus"></i></a>
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
    <div class="card-body">
        <div class="table-responsive py-4">
            <table id="datatable-basic" class="table align-items-center table-flush dataTable" data-order='[[0, "desc"]]'>
                <thead class="thead-light">
                    <tr>
                        <th scope="col">{{ __('Data inicial de vigência') }}</th>
                        <th scope="col">{{ __('Valor') }}</th>
                        <th scope="col">{{ __('Categoria') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lista as $item)
                        <tr data-table-row-id={{ $item->id }}>
                            <td>{{ (new DateTime($item->description->data))->format('d/m/Y') }}</td>
                            <td>{{ sprintf("R$ %.2f", $item->description->valor) }}</td>
                            <td>{{$item->categoria->categoria}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@extends('alocacao.intermunicipal.index', ['title' => __('Alocação de funcionários em trajetos urbanos')])

@section('infos')
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">{{ __('Alocação de funcionários em trajetos urbanos') }}</h3>
            </div>
            <div class="col-4 text-right">
                <a href="{{ route('funcionario.create') }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicionar Funcionário"><i class="fas fa-plus"></i></a>
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
            <table id="datatable-basic" class="table align-items-center table-flush dataTable">
                <thead class="thead-light">
                    <tr>
                        <th width="45%" scope="col">{{ __('Placa do ônibus') }}</th>
                        <th width="45%" scope="col">{{ __('Trajeto') }}</th>
                        <th width="45%" scope="col">{{ __('Nome motorista') }}</th>
                        <th width="45%" scope="col">{{ __('Nome cobrador') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lista as $item)
                        <tr data-table-row-id={{ $item->id }}>
                            <td>{{ $item->onibus->description->placa }}</td>
                            <td>{{ $item->trajeto }}</td>
                            <td>{{ $item->motorista }}</td>
                            <td>{{ $item->cobrador }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

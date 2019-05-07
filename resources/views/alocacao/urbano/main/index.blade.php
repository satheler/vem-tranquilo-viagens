@extends('alocacao.urbano.index', ['title' => __('Alocação de funcionários em trajetos urbanos')])

@section('infos')
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">{{ __('Alocação de funcionários em trajetos urbanos') }}</h3>
            </div>
            <div class="col-4 text-right">
                <a href="{{ route('alocacao_urbano.create') }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Alocar funcionário"><i class="fas fa-plus"></i></a>
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
                        <th width="10%" scope="col">{{ __('Data') }}</th>
                        <th width="40%" scope="col">{{ __('Expediente') }}</th>
                        <th width="45%" scope="col">{{ __('Terminal') }}</th>
                        <th width="45%" scope="col">{{ __('Placa do ônibus') }}</th>
                        <th width="45%" scope="col">{{ __('Nome do motorista') }}</th>
                        <th width="45%" scope="col">{{ __('Nome do cobrador') }}</th>
                        <th width="45%" scope="col">{{ __('Nome do auxiliar') }}</th>
                        <th width="45%" scope="col">{{ __('Ações') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lista as $item)
                        <tr data-table-row-id={{ $item->id }}>
                            <td>{{ date('d/m/Y', strtotime($item->data)) }}</td>
                            <td>{{ $item->horarioInicio }} - {{ $item->horarioFim }}</td>
                            <td>{{ $item->trajeto->terminal }}</td>
                            <td>{{ $item->onibus->description->placa }}</td>
                            <td>{{ $item->motorista->nome }}</td>
                            <td>{{ $item->cobrador->nome }}</td>
                            <td>@if (@isset($item->auxiliar->nome)) {{ $item->auxiliar->nome }} @else Não possui @endif</td>
                            <td align="center">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{ \Request::url() }}/{{ $item->id }}/edit">{{ __('Editar') }}</a>
                                        <a class="dropdown-item" data-remove-id="{{ $item->id }}" href="#">{{ __('Deixar inativo') }}</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

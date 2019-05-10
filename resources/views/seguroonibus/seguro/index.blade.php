@extends('seguroonibus.index', ['title' => __('Lista de Seguros')])

@section('infos')
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">{{ __('Lista de Seguros') }}</h3>
            </div>
            <div class="col-4 text-right">
                <a href="{{ route('seguro.create') }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicionar Seguro"><i class="fas fa-plus"></i></a>
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
                        <th scope="col"></th>
                        <th scope="col">{{ __('Empresa') }}</th>
                        <th scope="col">{{ __('Valor') }}</th>
                        <th scope="col">{{ __('Assegura') }}</th>
                        <th scope="col">{{ __('Data Inicial') }}</th>
                        <th scope="col">{{ __('Data Vigência') }}</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lista as $item)
                        <tr data-table-row-id={{ $item->id }}>
                            <td>
                                <button data-show-id={{ $item->id }} class="btn btn-icon btn-sm btn-primary" type="button">
                                    <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                </button>
                            </td>
                            <td>{{ $item->empresa }}</td>
                            <td>{{ $item->valor }}</td>
                            <td>{{ $item->assegura }}</td>
                            <td>{{ $item->data_inicio }}</td>
                            <td>{{ $item->data_vigencia }}</td>

                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{ \Request::url() }}/{{ $item->id }}/edit">{{ __('Editar') }}</a>
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

@extends('registro_sinistro.index', ['title' => __('Registro de Sinistros')])

@section('infos')
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col-8"> 
                <h3 class="mb-0">{{ __('Registro de Sinistros') }}</h3>
            </div>
            <div class="col-4 text-right">
                <a href="{{ route('sinistro.create') }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicionar Sinistro"><i class="fas fa-plus"></i></a>
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
                        <th width="25%" scope="col">{{ __('TIPO SINISTRO') }}</th>
                        <th width="25%" scope="col">{{ __('DESCRIÇÃO SINISTRO') }}</th>
                        <th width="25%" scope="col">{{ __('ENVOLVIDOS') }}</th>
                        <th width="25%" scope="col">{{ __('CUSTOS') }}</th>
                        <th width="25%" scope="col">{{ __('DESCRIÇÃO DOS CUSTOS') }}</th>
                        <th width="25%" scope="col">{{ __('DATA') }}</th>
                        <th width="25%" scope="col">{{ __('ONIBUS') }}</th>
                        <th width="10%" scope="col">Ações</th>
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
                            <td>{{ $item->tipo_causa }}</td>
                            <td>{{ $item->descricao_causa }}</td>
                            <td>{{ $item->envolvidos }}</td>
                            <td>{{ $item->custo }}</td>
                            <td>{{ $item->descricao_custo }}</td>
                            <td>{{ $item->data }}</td>
                            <td>{{ $item->onibus->placa}}</td>
                           

                            <td align="center">
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

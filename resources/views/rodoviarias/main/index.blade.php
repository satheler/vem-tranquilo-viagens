@extends('rodoviarias.index', ['title' => __('Rodoviárias')])

@section('infos')
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">{{ __('Rodoviárias') }}</h3>
            </div>
            <div class="col-4 text-right">
                <a href="{{ route('rodoviarias_ativas.create') }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicionar rodoviária"><i class="fas fa-plus"></i></a>
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
                        <th scope="col">{{ __('Endereço') }}</th>
                        <th scope="col">{{ __('Cidade') }}</th>
                        <th scope="col">{{ __('CEP') }}</th>
                        <th scope="col">{{ __('Telefone') }}</th>
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
                            <td>{{ $item->logradouro }}, {{ $item->numero }} - {{ $item->bairro }}</td>
                            <td>{{ $item->cidade->nome }}</td>
                            <td>{{ sprintf("%d-%d", substr($item->cep, 0, 5), substr($item->cep, 5, 3)) }}</td>
                            <td>{{ sprintf("(%d) %d-%d", substr($item->telefone, 0, 2), substr($item->telefone, 2, 4), substr($item->telefone, 6, 4)) }}</td>

                            <td align="center">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{ \Request::url() }}/{{ $item->id }}/edit">{{ __('Editar') }}</a>
                                        <a class="dropdown-item" data-available-id="{{ $item->id }}" href="#">{{ __('Deixar inativo') }}</a>
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

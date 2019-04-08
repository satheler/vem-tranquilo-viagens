@extends('frotas.index', ['title' => __('Categoria de Passageiros')])

@section('infos')
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">{{ __('Categoria de Passageiros') }}</h3>
            </div>
            <div class="col-4 text-right">
                <a href="{{ route('categoria_passageiro.create') }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicionar Categoria de Passageiros"><i class="fas fa-plus"></i></a>
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
                        <th width="45%" scope="col">{{ __('Tipo') }}</th>
                        <th width="45%" scope="col">{{ __('Desconto') }}</th>
                        <th width="10%" scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lista as $item)
                        <tr data-table-row-id={{ $item->id }}>
                            <td>
                            <td>{{ $item->tipo }}</td>
                            <td>{{ $item->desconto }}</td>
                            <td>{{ $item->lotacao }}</td>

                            <td align="center">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" data-remove-id="{{ $item->id }}" href="#">{{ __('Remover') }}</a>
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

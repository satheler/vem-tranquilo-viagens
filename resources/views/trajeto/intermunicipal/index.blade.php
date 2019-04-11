@extends('trajeto.index', ['title' => __('Trajeto Intermunicipal')])

@section('infos')
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">{{ __('Trajeto Intermunicipal') }}</h3>
            </div>
            <div class="col-4 text-right">
                <a href="{{ route('trajeto_intermunicipal.create') }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicionar Trajeto Intermunicipal"><i class="fas fa-plus"></i></a>
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
                        <th scope="col">{{ __('Cidade de origem') }}</th>
                        <th scope="col">{{ __('Cidade destino') }}</th>
                        <th scope="col">{{ __('Tipo do trajeto') }}</th>
                        <th scope="col">{{ __('Quantidade de trechos') }}</th>
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

                            <td>{{ $item->trechos[0]->origem->nome }}</td>
                            <td>{{ $item->trechos[count($item->trechos) - 1]->destino->nome }}</td>
                            <td>
                            @if (@count($item->trechos) === 1)
                            Direto
                            @else
                            Semi-direto
                            @endif
                        </td>
                        <td align="center">
                            @if (@count($item->trechos) === 1)
                            <span class="badge badge-pill badge-warning">Não se aplica</span>
                            @else
                            <span class="badge badge-pill badge-info">{{ count($item->trechos) }}</span>
                            @endif
                        </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

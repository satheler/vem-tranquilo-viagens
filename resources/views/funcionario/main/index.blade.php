@extends('frotas.index', ['title' => __('Funcionários')])

@section('infos')
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">{{ __('Funcionários') }}</h3>
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
                        <th scope="col"></th>
                        <th scope="col">{{ __('Placa') }}</th>
                        <th scope="col">{{ __('Chassi') }}</th>
                        <th scope="col">{{ __('Lotação') }}</th>
                        <th scope="col">{{ __('Ar condicionado') }}</th>
                        <th scope="col">{{ __('Acessibilidade') }}</th>
                        <th scope="col">{{ __('Disponibilidade') }}</th>
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
                            <td>{{ $item->description->placa }}</td>
                            <td>{{ $item->description->chassi }}</td>
                            <td>{{ $item->lotacao }}</td>
                            <td  align="center">
                                @if ($item->arCondicionado)
                                    <span class="badge badge-success">Possui</span>
                                @else
                                    <span class="badge badge-warning">Não possui</span>
                                @endif
                            </td>

                            <td  align="center">
                                @if ($item->acessibilidade)
                                    <span class="badge badge-success">Possui</span>
                                @else
                                    <span class="badge badge-warning">Não possui</span>
                                @endif
                            </td>

                            <td align="center">
                                @if ($item->description->disponivel)
                                    <span data-badge-available-id="{{ $item->id }}" class="badge badge-success">Disponível</span>
                                @else
                                    <span data-badge-available-id="{{ $item->id }}" class="badge badge-warning">Em manutenção</span>
                                @endif
                            </td>

                            <td align="center">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" data-available-id="{{ $item->id }}" href="#">{{ __('Em manutenção') }}</a>
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

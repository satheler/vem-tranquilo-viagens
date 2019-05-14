@extends('layouts.app', ['title' => __('Registros de Manutenções')])

@section('content')
    @include('users.partials.header', ['title' => __('Registros de Manutenções')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="{{ route('onibus_urbano.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                            <div class="col-4 text-right">
                                <h3 class="mb-0">{{ __('Registros') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive py-4">
                            <table id="datatable-manutencao" class="table align-items-center table-flush dataTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{ __('Motivo') }}</th>
                                        <th scope="col">{{ __('Oficina') }}</th>
                                        <th scope="col">{{ __('Orçamento') }}</th>
                                        <th scope="col">{{ __('Data de Entrada') }}</th>
                                        <th scope="col">{{ __('Data de Saída') }}</th>
                                        <th scope="col">{{ __('Valor Final') }}</th>
                                        <th scope="col">{{ __('Observação') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lista as $item)
                                        <tr data-table-row-id={{ $item->id }}>
                                            <td>{{ $item->motivo }}</td>
                                            <td>{{ $item->oficina }}</td>
                                            <td>{{ $item->orcamento }}</td>
                                            <td>{{ $item->data_entrada }}</td>
                                            <td>{{ $item->data_saida }}</td>
                                            <td>{{ $item->valor_final }}</td>
                                            <td>{{ $item->observacao }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endpush




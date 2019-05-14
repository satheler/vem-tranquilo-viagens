@extends('layouts.app', ['title' => __('Passagem')])

@section('content')
    @include('users.partials.header', ['title' => __('Passagens')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                {{-- <a href="{{ route('onibus_urbano.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a> --}}
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
                                        <th scope="col"></th>
                                        <th scope="col">{{ __('Passagens') }}</th>
                                        <th scope="col">{{ __('Ônibus') }}</th>
                                        <th scope="col">{{ __('Trajeto') }}</th>
                                        <th scope="col">{{ __('Funcionário') }}</th>
                                        <th scope="col">{{ __('Mês') }}</th>
                                        <th scope="col">{{ __('Total') }}</th>
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
                                            <td>{{ $item->passagem }}</td>
                                            <td>{{ $item->Ônibus }}</td>
                                            <td>{{ $item->Trajeto }}</td>
                                            <td>{{ $item->funcionario }}</td>
                                            <td>{{ $item->mes }}</td>
                                            <td>{{ $item->total }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endpush

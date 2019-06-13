@extends('contador.index', ['title' => __('Lucros')])

@section('infos')
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">{{ __('Lucros') }}</h3>
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
        
        <div class="row clearflix">
            <div class="col-lg-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Vendas por Ônibus</h5>
                                <span class="h2 font-weight-bold mb-0">2.897,00</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                    <i class="far fa-money-bill-alt"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Acréscimo nos últimos meses</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Vendas por Trajeto</h5>
                                <span class="h2 font-weight-bold mb-0">10.897,00</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                                    <i class="far fa-money-bill-alt"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 6.89%</span>
                            <span class="text-nowrap">Acréscimo nos últimos meses</span>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row clearflix mt-4">
            <div class="col-lg-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Vendas por Ônibus</h5>
                                <span class="h2 font-weight-bold mb-0">2.897,00</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-blue text-white rounded-circle shadow">
                                    <i class="far fa-money-bill-alt"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Acréscimo nos últimos meses</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Vendas por Trajeto</h5>
                                <span class="h2 font-weight-bold mb-0">10.897,00</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                                    <i class="far fa-money-bill-alt"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 6.89%</span>
                            <span class="text-nowrap">Acréscimo nos últimos meses</span>
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <div class="table-responsive py-4">
            <table id="datatable-basic" class="table align-items-center table-flush dataTable">
                <thead class="thead-light">
                    <tr>
                        <th scope="col"></th>
                        <th width="25%" scope="col">{{ __('Mês') }}</th>
                        <th width="25%" scope="col">{{ __('Trajeto') }}</th>
                        <th width="25%" scope="col">{{ __('Valor Passagem') }}</th>
                        <th width="25%" scope="col">{{ __('Funcionário') }}</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $item)
                        <tr data-table-row-id={{ $item->id }}>
                            <td>
                                <button data-show-id={{ $item->onibus->id }} class="btn btn-icon btn-sm btn-primary" type="button">
                                    <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                </button>
                            </td>
                            <td>{{ $item->mes }}</td>
                            <td>{{ $item->trajeto }}</td>
                            <td>{{ $item->valor }}</td>
                            <td>{{ $item->user }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@extends('contador_lucro.index', ['title' => __('Lucros')])

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
                                <div class="icon icon-shape bg-red text-white rounded-circle shadow">
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
                                <div class="icon icon-shape bg-red text-white rounded-circle shadow">
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
                        <th width="25%" scope="col">{{ __('Trajeto') }}</th>
                        <th width="25%" scope="col">{{ __('Ônibus') }}</th>
                        <th width="25%" scope="col">{{ __('Qnt Integral') }}</th>
                        <th width="25%" scope="col">{{ __('Qnt Meia') }}</th>
                        <th width="25%" scope="col">{{ __('Qnt Isentas') }}</th>
                        <th width="25%" scope="col">{{ __('Lucro Total do Trajeto') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-table-row-id=0>
                        <td>
                            <button data-show-id=0 class="btn btn-icon btn-sm btn-primary" type="button">
                                <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                            </button>
                        </td>
                        <td>Alegrete -> Santa Maria</td>
                        <td>UOY5184</td>
                        <td>35</td>
                        <td>5</td>
                        <td>2</td>
                        <td>1.500</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

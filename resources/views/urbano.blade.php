@extends('layout.admin', ["current" => "urbano"])
@section('body')
<section class="content">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li>
                <a href="javascript:void(0);">
                    <i class="material-icons">home</i> Home
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="material-icons">directions_bus</i> Gerenciar Frota
                </a>
            </li>
            <li class="active">
                Ônibus urbanos
            </li>
        </ol>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Ônibus urbanos
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Cod</th>
                                    <th>Placa</th>
                                    <th>Marca</th>
                                    <th>Categoria</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Cod</th>
                                    <th>Placa</th>
                                    <th>Marca</th>
                                    <th>Categoria</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>0001</td>
                                    <td>AAA-1111</td>
                                    <td>Mercedez</td>
                                    <td>Mercedez F810M</td>
                                </tr>
                                <tr>
                                    <td>0002</td>
                                    <td>BBB-2222</td>
                                    <td>Mercedez</td>
                                    <td>Mercedez M25</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-primary waves-effect">
                        <i class="material-icons">add</i>
                        <span>Adicionar</span>
                    </button>
                    <button type="button" class="btn btn-warning waves-effect">
                        <i class="material-icons">create</i>
                        <span>Editar</span>
                    </button>
                    <button type="button" class="btn btn-danger waves-effect">
                        <i class="material-icons">remove_circle</i>
                        <span>Disponibilidade</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
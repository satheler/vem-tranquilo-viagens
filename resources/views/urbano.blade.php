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
                    <i sclass="material-icons">directions_bus</i> Gerenciar Frota
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
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table id="urbanoData" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Cod</th>
                                    <th>Chassi</th>
                                    <th>Placa</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <button type="button" class="btn btn-primary waves-effect justify-content-right">
                        <i class="material-icons">add</i>
                        <span>Adicionar</span>
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
@push('scripts')
<script type="text/javascript">
    $('#urbanoData').DataTable({
        processing: false,
        serverSide: true,
        ajax: '/admin/gerenciarfrota/urbano/api',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'chassi', name: 'chassi'},
            {data: 'placa', name: 'placa'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
</script>
@endpush
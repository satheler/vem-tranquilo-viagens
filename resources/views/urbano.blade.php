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
                    <br>
                    <div class="row">
                        <div class="modal-footer d-flex justify-content-center col-lg-9">
                            <button class="btn btn-primary waves-effect" data-toggle="modal" data-target="#modelId"><i class="material-icons">add</i>Adicionar</button>
                        </div>
                        <div class="modal-footer d-flex justify-content-center col-lg-3">
                            <button class="btn btn-danger waves-effect"><i class="material-icons">remove_circle</i>Disponibilidade</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-left">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title w-100 font-weight-bold">Adicionar Ônibus</h4>

      </div>
      <div class="modal-body mx-3">
        <div class="row">
            <div class="md-form mb-5 col-lg-8">
                <label data-error="wrong" data-success="right" for="chassi">Chassi</label>
                <input type="text" id="chassi" class="form-control validate">
            </div>
            <div class="md-form mb-5 col-lg-4">
                <label data-error="wrong" data-success="right" for="placa">Placa</label>
                <input type="text" id="placa" maxlength="7" placeholder="ABC1234" class="form-control validate">
            </div>
        </div>
        <br>
        <div class="row">
                <div class="col-lg-3">
                    <label data-error="wrong" data-success="right" for="anoFab">Ano de Fabricação</label>
                    <input type="number" id="anoFab" maxlenght="4" class="form-control validate">
                </div>
                <div class="col-lg-3">
                    <form action="">
                        <div>
                            <label for="anoAq">Data de Aquisição</label>
                            <input type="number" id="anoAq" placeholder="MM/YY" class="form-control validate" pattern="(1[0-2]|0[1-9])\/(1[5-9]|2\d)" data-valid-example="05/18">
                        </div>
                    </form>
                    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/masking-input.js" data-autoinit="true"></script>
                </div>
                <div class="col-lg-3">
                    <label data-error="wrong" data-success="right" for="cor">Cor Predominante</label>
                    <input type="text" id="cor" class="form-control validate">
                </div>
                <div class="col-lg-3">
                    <label data-error="wrong" data-success="right" for="qntPass">Lotação de Passageiros</label>
                    <input type="number" maxlength="2" id="qntPass" class="form-control validate">
                </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-3">
                <label data-error="wrong" data-success="right" for="marca">Marca</label>
                <input type="text" id="marca" class="form-control validate">
            </div>
            <div class="col-lg-3">
                <label for="modelo">Modelo</label>
                <input type="text" id="modelo" class="form-control validate">
            </div>
            <div class="col-lg-3">
                <label data-error="wrong" data-success="right" for="capa">Capacidade Do Tanque</label>
                <input type="number" id="capa" class="form-control validate">
            </div>
            <div class="col-lg-3">
                <label data-error="wrong" data-success="right" for="qntEixos">Quantidade de Eixos</label>
                <input type="number" id="qntEixos" class="form-control validate">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-3">
                        <p class="text-left">
                            <strong>Selecione a Categoria</strong>
                        </p>
                        <div class="form-check mb-4">
                            <input class="form-check1" name="group1" type="radio" id="radio-179" value="option1" checked>
                            <label class="form-check-label" for="radio-179">Comum</label>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check2" name="group1" type="radio" id="radio-279" value="option2">
                            <label class="form-check-label" for="radio-279">Acessível</label>
                        </div>
                </div>
                <div class="md-form mb-5 col-lg-3">
                    <p class="text-left">
                        <strong>Possui Ar Condicionado</strong>
                    </p>
                    <div class="form-check mb-4">
                        <input class="form-check1" name="group4" type="radio" id="radio-879" value="option1" checked>
                        <label class="form-check-label" for="radio-879">Sim</label>
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check2" name="group4" type="radio" id="radio-979" value="option2">
                        <label class="form-check-label" for="radio-979">Não</label>
                    </div>
                </div>
                <div class="md-form mb-5 col-lg-3">
                        <p class="text-left">
                            <strong>Selecione o Tipo</strong>
                        </p>
                        <div class="form-check mb-4">
                            <input class="form-check1" name="group2" type="radio" id="radio-479" value="option1" checked>
                            <label class="form-check-label" for="radio-479">Comum</label>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check2" name="group2" type="radio" id="radio-579" value="option2">
                            <label class="form-check-label" for="radio-579">Andar Extra</label>
                        </div>
                </div>
                <div class="md-form mb-5 col-lg-3">
                        <p class="text-left">
                            <strong>Selecione Estado</strong>
                        </p>
                        <div class="form-check mb-4">
                            <input class="form-check1" name="group3" type="radio" id="radio-679" value="option1" checked>
                            <label class="form-check-label" for="radio-679">Novo</label>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check2" name="group3" type="radio" id="radio-779" value="option2">
                            <label class="form-check-label" for="radio-779">Usado</label>
                        </div>
                </div>
            </div>
      </div>
      <div class="row">
            <div class="modal-footer d-flex justify-content-center col-lg-10">
                <button class="btn btn-primary waves-effect">Adicionar</button>
            </div>
            <div class="modal-footer d-flex justify-content-center col-lg-1">
                <button class="btn btn-danger waves-effect" data-dismiss="modal">Cancelar</button>
            </div>

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

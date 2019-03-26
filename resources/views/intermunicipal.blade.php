@extends('layout.admin', ["current" => "intermunicipal"])
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
                Ônibus intermunicipais
            </li>
        </ol>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Ônibus intermunicipais
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
                    <br>
                    <div class="row">
                        <div class="modal-footer d-flex justify-content-center col-lg-7">
                            <button class="btn btn-primary waves-effect" data-toggle="modal" data-target="#modelId"><i class="material-icons">add</i>Adicionar</button>
                        </div>
                        <div class="modal-footer d-flex justify-content-center col-lg-2">
                            <button class="btn btn-warning waves-effect"><i class="material-icons">create</i>Editar</button>
                        </div>
                        <div class="modal-footer d-flex justify-content-center col-lg-3">
                            <button class="btn btn-danger waves-effect"><i class="material-icons">remove_circle</i>Disponibilidade</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->

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
                    <label data-error="wrong" data-success="right" for="qntAss">Quantidade de Assentos</label>
                    <input type="number" maxlength="2" id="qntAss" class="form-control validate">
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
                            <label class="form-check-label" for="radio-179">Convencional</label>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check2" name="group1" type="radio" id="radio-279" value="option2">
                            <label class="form-check-label" for="radio-279">Executivo</label>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check3" name="group1" type="radio" id="radio-379" value="option3">
                            <label class="form-check-label" for="radio-379">Leito</label>
                        </div>
                </div>
                <div class="md-form mb-5 col-lg-3">
                    <p class="text-left">
                        <strong>Possui Banheiro</strong>
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

    <script>

        // $('#exampleModal').on('show.bs.modal', event => {
        //     var button = $(event.relatedTarget);
        //     var modal = $(this);
        //     // Use above variables to manipulate the DOM

        // });

    </script>
</section>
@endsection

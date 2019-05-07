@extends('layouts.app', ['title' => __('Adicionar Trajeto Intermunicipal')])

@push('css')
<link type="text/css" href="{{ asset('argon') }}/vendor/lou-multi-select/css/multi-select.min.css" rel="stylesheet">
@endpush

@section('content')
    @include('users.partials.header', ['title' => __('Adicionar Trajeto Intermunicipal')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="{{ route('trajeto_intermunicipal.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                            <div class="col-4 text-right">
                                <h3 class="mb-0">{{ __('Adicionar Trajeto Intermunicipal') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="heading-small text-muted mb-4">{{ __('Informações do trajeto') }}</h3>
                            <div class="row d-flex align-items-center justify-content-center">
                                <div class="col-md-4">
                                    <label class="form-control-label" for="qntTrechos">QUANTIDADE DE TRECHOS</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <input name="qntTrechos" id="qntTrechos" placeholder="Insira a quantidade de trechos" class="form-control" type="number" required="required">
                                        </div>
                                        <span class="invalid-feedback" role="alert" style="display: none">
                                            <strong>Insira a quantidade de trechos</strong>
                                        </span>
                                    </div>
                                </div>
                            </div>


                        {{-- END FORM --}}
                        <div class="text-center">
                            <button type="button" id="btnSubmit" class="btn btn-success mt-4">{{ __('Próximo') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script>
        $("#btnSubmit").on("click", function() {
            if(document.getElementById('qntTrechos').validity.valid) {
                window.location.href= `{{ route('trajeto_intermunicipal.create') }}/${$("#qntTrechos").val()}`;
            } else {
                $('.invalid-feedback').show();
            }
        })
    </script>
@endpush

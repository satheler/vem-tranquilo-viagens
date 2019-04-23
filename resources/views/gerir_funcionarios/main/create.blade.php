@extends('layouts.app', ['title' => __('Gerenciar Funcionários')])

@section('content')
    @include('users.partials.header', ['title' => __('Gerenciar Funcionários')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="#" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                            <div class="col-4 text-right">
                                <h3 class="mb-0">{{ __('Gerenciar Funcionários') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Informações do Funcionário') }}</h6>
                            <div class="pl-lg-12">
                                <div class="row clearfix">
                                    <div class="col-lg-6">  
                                        <label class="form-control-label" for="form-control-label"> {{__('FUNCIONÁRIO')}} </label>
                                        <select bootstrapSelect name="funcionario"  data-size="4" data-live-search="true" required>
                                            <option value="" disabled selected>Selecione o funcionário...</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-control-label" for="form-control-label"> {{__('LOCAL')}} </label>
                                        <select bootstrapSelect name="local"  data-size="4" data-live-search="true" required>
                                            <option value="" disabled selected>Selecione o local...</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-6">
                                        <label class="form-control-label" for="form-control-label"> {{__('CIDADE')}} </label>
                                        <select bootstrapSelect name="cidade"  data-size="4" data-live-search="true" required>
                                            <option value="" disabled selected>Selecione a cidade...</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <label class="form-control-label" for="form-control-label"> {{__('CATEGORIA DE TRABALHO')}} </label>
                                        <select bootstrapSelect name="categoria"  data-size="4" data-live-search="true" required>
                                            <option value="" disabled selected>Selecione a categoria de trabalho...</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- END FORM --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

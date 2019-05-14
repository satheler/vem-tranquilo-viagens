@extends('layouts.app', ['title' => __('Editar Funcionário')])

@section('content')
    @include('users.partials.header', ['title' => __('Editar Funcionário')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="{{route('funcionario.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                            <div class="col-4 text-right">
                                <h3 class="mb-0">{{ __('Editar Funcionário') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('funcionario.update', $lista["funcionario"]) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Informações do Funcionário') }}</h6>

                            <div class="pl-lg-12">
                                <div class="row clearfix">
                                    <div class="col-lg-6">
                                        <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-nome">{{ __('NOME') }}</label>
                                            <input type="text" name="nome" id="input-nome" class="form-control form-control-alternative{{ $errors->has('nome') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome do Funcionário') }}" value="{{ old('nome', $lista["funcionario"]->nome) }}" required autofocus>

                                            @if ($errors->has('nome'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('nome') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-control-label" for="form-control-label"> {{__('FUNÇÃO')}} </label>
                                        <select bootstrapSelect name="tipo" data-size="4" data-live-search="true" required>
                                            <option value="" disabled selected>Selecione uma função...</option>
                                            @foreach ($lista["tipos_funcionario"] as $item)
                                                <option @if($errors->has('tipo') && ($errors->first('tipo') == $item->id) || old('tipo', $lista["funcionario"]->tipo_id) == $item->id) selected @endif value="{{ $item->id }}">{{ $item->nome }}</option>
                                            @endforeach

                                            @if ($errors->has('tipo'))
                                                <label class="form-control-label invalid-feedback" for="form-control-label"> {{ $errors->first('tipo') }} </label>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">  
                                        
                                <div class="col-lg-6">
                                    <label class="form-control-label" for="form-control-label"> {{__('LOCAL DE TRABALHO')}} </label>
                                    <select bootstrapSelect name="local" data-size="4" data-live-search="true" required>
                                        <option value="" disabled selected>Selecione o Local de Trabalho...</option>
                                        @foreach ($lista["rodoviaria"] as $item)
                                            <option @if($errors->has('local') && ($errors->first('local') == $item->id) || old('local', $lista["funcionario"]->local_id) == $item->id) selected @endif value="{{ $item->id }}">{{ $item->logradouro }}</option>
                                        @endforeach

                                        @if ($errors->has('local'))
                                            <label class="form-control-label invalid-feedback" for="form-control-label"> {{ $errors->first('local') }} </label>
                                        @endif
                                    </select>
                                </div>

                                <div class="col-lg-3">
                                    <label class="form-control-label" for="input-observacao">{{ __('OBSERVAÇÃO') }}</label>
                                    <input type="text" name="observacao" id="input-observacao" class="form-control form-control-alternative{{ $errors->has('observacao') ? ' is-invalid' : '' }}" placeholder="{{ __('observacao') }}" value="{{ old('observacao', $lista["funcionario"]->observacao) }}" required autofocus>

                                    @if ($errors->has('observacao'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('observacao') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-lg-3">
                                    <label class="form-control-label" for="form-control-label"> {{__('STATUS ATUAL: ')}} @if ($lista['funcionario']->status) <span class="badge badge-success">Ativo</span> @else <span class="badge badge-warning">Inativo</span> @endif </label>
                                    <select bootstrapSelect name="status"  data-size="4" data-live-search="true" required>
                                        <option value="" disabled selected>Clique para alterar Status...</option> 
                                            <option @if ($lista['funcionario']->status) selected value="1" @endif value="1">Ativo</option>
                                            <option @if (!$lista['funcionario']->status) selected value="0" @endif value="0">Inativo</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- END FORM --}}
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @include('layouts.footers.auth')

        </div>

    </div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('argon') }}/vendor/jquery-mask/dist/jquery.mask.min.js"></script>

<script>

$(document).ready(function(){
    $('[cep]').mask('00000-000');
    $('[phone]').mask('(00) 0000-0000');
})
</script>
@endpush

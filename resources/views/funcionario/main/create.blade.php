@extends('layouts.app', ['title' => __('Adicionar Funcionário')])

@section('content')
    @include('users.partials.header', ['title' => __('Adicionar Funcionário')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="{{ route('funcionario.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                            <div class="col-4 text-right">
                                <h3 class="mb-0">{{ __('Adicionar Funcionário') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('funcionario.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Informações do Funcionário') }}</h6>
                            <div class="pl-lg-12">
                                <div class="row clearfix">
                                    <div class="col-lg-6">
                                        <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-nome">{{ __('NOME') }}</label>
                                            <input type="text" name="nome" id="input-nome" class="form-control form-control-alternative{{ $errors->has('nome') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome do Funcionário') }}" value="{{ old('nome') }}" required autofocus>

                                            @if ($errors->has('nome'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('nome') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="row">
                                            <label class="form-control-label" for="form-control-label"> {{__('FUNÇÃO')}} </label>
                                            <select name="tipo" required>
                                                <option value="" disabled selected>Selecione uma função...</option>
                                                @foreach ($lista as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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

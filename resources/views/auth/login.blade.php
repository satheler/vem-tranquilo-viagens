@extends('layouts.app', ['class' => 'bg-default'])


{{-- DAQUI PARA BAIXO É POG - INICIO --}}
<?php

$users = new App\User();
$lista = $users->all();
?>


{{-- DAQUI PARA BAIXO É POG - FIM --}}

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="navbar-bran" href="{{ route('page_painel.index') }}">
                                        <img src="{{ asset('argon') }}/img/brand/logo.png" class="navbar-brand-img" alt="..." width="90%" height="90%" style="">
                                    </a>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <small>
                                        {{ __('Entre com as suas credenciais') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') ? old('email') : 'admin@mail.com' }}" required autofocus>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" value="123456" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheckLogin">
                                    <span class="text-muted">{{ __('Lembrar-me') }}</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">{{ __('Entrar') }}</button>
                            </div>
                        </form>
                        <label class="text-center"> Usuários cadastrados </label>
                        <div class="row justify-content-center">
                            @foreach ($lista as $item)
                                <button data-user-login="{{ $item->email }}" class="btn btn-sm btn-primary py-1 px-3 m-1"> {{ $item->name }} </button>
                            @endforeach
                        </div>
                    </div>


                </div>
                <div class="row mt-3">
                    <div class="col-6 text-right"></div>
                    <div class="col-6 text-right">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-light">
                                <small>{{ __('Esqueceu sua senha?') }}</small>
                            </a>
                        @endif
                    </div>
                    {{-- <div class="col-6 text-right">
                        <a href="{{ route('register') }}" class="text-light">
                            <small>{{ __('Create new account') }}</small>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('[data-user-login]').on('click', function() {
            const user = $(this).data('user-login');
            $('input[name="email"]').val(user);
            $('form').submit();
        })
    </script>
@endpush

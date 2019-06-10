<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pb-0" href="{{ route('page_painel.index') }}">
            <img src="{{ asset('argon') }}/img/brand/logo.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    {{-- <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a> --}}
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    {{-- <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a> --}}
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('page_painel.index') }}">
                            <img src="{{ asset('argon') }}/img/brand/logo.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">

                <!-- Página Inicial :: FIM -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('page_painel.index') }}">
                        <i class="fas fa-home"></i> {{ __('Página Inicial') }}
                    </a>
                </li>
                <!-- Página Inicial :: FIM -->

                <!-- Passageiro :: INICIO -->
                @if (@auth()->user()->tipo_usuario_id === 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categoria_passageiro.index') }}">
                            <i class="fas fa-users"></i> {{ __('Categoria de Passageiros') }}
                        </a>
                    </li>
                @endif
                <!-- Passageiro :: FIM -->

                 <!-- Funcionário :: INICIO -->
                 @if (@auth()->user()->tipo_usuario_id === 4)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('funcionario.index') }}">
                            <i class="fas fa-user-cog"></i> {{ __('Funcionários') }}
                        </a>
                    </li>
                @endif
                <!-- Funcionário :: FIM -->
                
                 <!-- Registrar Sinistro :: INICIO -->
                 @if (@auth()->user()->tipo_usuario_id === 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sinistro.index') }}">
                            <i class="fas fa-user-cog"></i> {{ __('Registrar Sinistro') }}
                        </a>
                    </li>
                @endif
                <!-- Registrar Sinistro :: FIM -->

                 <!-- Pagamento :: INICIO -->
                 @if (@auth()->user()->tipo_usuario_id === 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pagamento.index') }}">
                            <i class="fas fa-money-bill"></i> {{ __('Formas de Pagamentos') }}
                        </a>
                    </li>
                @endif
                <!-- Pagamento :: FIM -->

                <!-- Gerenciar frotas :: INICIO -->
                @if (@auth()->user()->tipo_usuario_id === 3)

                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="fas fa-bus"></i>
                            <span class="nav-link-text">{{ __('Gerenciar frotas') }}</span>
                        </a>

                        <div class="collapse" id="navbar-examples">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('onibus_urbano.index') }}">
                                        {{ __('Ônibus Urbano') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('onibus_intermunicipal.index') }}">
                                            {{ __('Ônibus Intermunicipal') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{ route('onibus_inativo.index') }}">
                                            {{ __('Ônibus Inativos') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                <!-- Gerenciar frotas :: FIM -->


                <!-- Gerenciar tarifas :: INICIO -->
                @if (@auth()->user()->tipo_usuario_id === 1 || @auth()->user()->tipo_usuario_id === 2 )
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-examples1" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="ni ni-tag"></i>
                            <span class="nav-link-text">{{ __('Gerenciar tarifas') }}</span>
                        </a>

                        <div class="collapse" id="navbar-examples1">
                            <ul class="nav nav-sm flex-column">
                                @if (@auth()->user()->tipo_usuario_id === 2)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('tarifa_urbano.index') }}">
                                            {{ __('Tarifa Urbano') }}
                                        </a>
                                    </li>
                                @endif
                                @if (@auth()->user()->tipo_usuario_id === 1)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('tarifa_intermunicipal.index') }}">
                                            {{ __('Tarifa Intermunicipal') }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif
                <!-- Gerenciar tarifas :: FIM -->

                <!-- Gerenciar trajeto :: INICIO -->
                @if (@auth()->user()->tipo_usuario_id === 1 || @auth()->user()->tipo_usuario_id === 2 )
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-examples2" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="fas fa-road"></i>
                            <span class="nav-link-text">{{ __('Gerenciar trajeto') }}</span>
                        </a>

                        <div class="collapse" id="navbar-examples2">
                            <ul class="nav nav-sm flex-column">
                                @if (@auth()->user()->tipo_usuario_id === 2)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('trajeto_urbano.index') }}">
                                            {{ __('Trajeto Urbano') }}
                                        </a>
                                    </li>
                                @endif
                                @if (@auth()->user()->tipo_usuario_id === 1)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('trajeto_intermunicipal.index') }}">
                                            {{ __('Trajeto Intermunicipal') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('trajeto_trecho.index') }}">
                                            {{ __('Trechos') }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif
                <!-- Gerenciar trajeto :: FIM -->


                <!-- Gerenciar seguros :: INICIO -->
                @if (@auth()->user()->tipo_usuario_id === 1)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('seguro.index') }}">
                        <i class="fas fa-file-signature"></i> {{ __('Gerenciar Seguros') }}
                    </a>
                </li>
                @endif
                <!-- Gerenciar seguros :: FIM -->

                <!-- Gerenciar alocação :: INICIO -->
                @if (@auth()->user()->tipo_usuario_id === 1 || @auth()->user()->tipo_usuario_id === 2 )
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-alocacao" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="fas fa-link"></i>
                            <span class="nav-link-text">{{ __('Gerenciar alocação de funcionários') }}</span>
                        </a>

                        <div class="collapse" id="navbar-alocacao">
                            <ul class="nav nav-sm flex-column">
                                @if (@auth()->user()->tipo_usuario_id === 2)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('alocacao_urbano.index') }}">
                                            {{ __('Alocação Urbano') }}
                                        </a>
                                    </li>
                                @endif
                                @if (@auth()->user()->tipo_usuario_id === 1)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('alocacao_intermunicipal.index') }}">
                                            {{ __('Alocação Intermunicipal') }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif
                <!-- Gerenciar alocação :: FIM -->

                <!-- Gerenciar rodoviarias :: INICIO -->
                @if (@auth()->user()->tipo_usuario_id === 1)

                <li class="nav-item">
                    <a class="nav-link" href="#navbar-rodoviarias" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-rodoviarias">
                        <i class="fas fa-bus"></i>
                        <span class="nav-link-text">{{ __('Gerenciar rodoviárias') }}</span>
                    </a>

                    <div class="collapse" id="navbar-rodoviarias">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('rodoviarias_ativas.index') }}">
                                    {{ __('Lista de rodoviárias') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('rodoviarias_inativas.index') }}">
                                    {{ __('Rodoviárias inativas') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
            <!-- Gerenciar rodoviarias :: FIM -->

            <!-- Gerenciar venda de passagens :: INICIO -->
            @if (@auth()->user()->tipo_usuario_id === 5)

                <li class="nav-item">
                    <a class="nav-link" href="#navbar-venda-passagens" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-venda-passagens">
                        <i class="fas fa-bus"></i>
                        <span class="nav-link-text">{{ __('Venda passagem') }}</span>
                    </a>

                    <div class="collapse" id="navbar-venda-passagens">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('venda_intermunicipal.index') }}">
                                    {{ __('Intermunicipal') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                {{-- <a class="nav-link" href="{{ route('venda_urbana.index') }}"> --}}
                                <a class="nav-link" href="#">
                                {{ __('Urbano') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
            <!-- Gerenciar venda de passagens :: FIM -->
            </ul>
        </div>
    </div>
</nav>

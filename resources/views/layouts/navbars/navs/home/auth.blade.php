<nav class="navbar navbar-horizontal navbar-expand-lg navbar-dark bg-default">
        <div class="container">
            <a href="{{ route('page_home.index') }}">
                <img src="{{ asset('argon') }}/img/brand/logo_white.png" class="ml-5" style="height: 43px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-default">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="{{ route('page_home.index') }}">
                                <img src="{{ asset('argon') }}/img/brand/blue.png">
                            </a>
                        </div>
                    </div>
                </div>

                <ul class="navbar-nav ml-lg-auto align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <div class="media-body ml-2 d-none d-lg-block">
                                    Olá,
                                    <span class="mb-0 text-sm font-weight-bold">{{ auth()->user()->name }}</span>
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">{{ __('Bem vindo!') }}</h6>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-store-alt"></i>
                                <span>{{ __('Minhas compras') }}</span>
                            </a>
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="ni ni-user-run"></i>
                                <span>{{ __('Logout') }}</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

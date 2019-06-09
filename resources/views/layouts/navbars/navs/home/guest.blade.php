<nav class="navbar navbar-horizontal navbar-expand-lg navbar-dark bg-default">
    <div class="container">
        <a class="navbar-brand" href="#">Vem Tranquilo Viagens</a>
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

            <ul class="navbar-nav ml-lg-auto">
                <a href="{{ route('page_entrar.index') }}" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Entrar</a>
            </ul>

        </div>
    </div>
</nav>

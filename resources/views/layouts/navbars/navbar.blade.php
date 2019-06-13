@auth()
    @include('layouts.navbars.navs.painel.auth')
@endauth

@guest()
    @include('layouts.navbars.navs.painel.guest')
@endguest

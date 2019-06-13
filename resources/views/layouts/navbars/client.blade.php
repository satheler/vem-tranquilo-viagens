@auth()
    @include('layouts.navbars.navs.home.auth')
@endauth

@guest()
    @include('layouts.navbars.navs.home.guest')
@endguest

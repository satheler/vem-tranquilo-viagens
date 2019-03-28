<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" style="text-transform: uppercase" href="{{route('home')}}">@include('values.bussinessName')</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                @headerIconButton(['name' => 'Pesquisar', 'icon' => 'search', 'url' => '#', 'class' => 'js-search']) @endheaderIconButton
                @headerIconButton(['name' => 'Sair', 'icon' => 'exit_to_app', 'url' => '#']) @endheaderIconButton
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->

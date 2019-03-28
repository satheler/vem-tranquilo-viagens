@extends('index')

@section('titlePage', "Página Inicial")

@section('main')
    @include('components.pageloader.pageloader')

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    @include('components.search.searchBar')
    @include('components.header.header')
    @include('components.navigation.sidebar')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>BREADCRUMBS</h2>
            </div>

            @yield('content')

        </div>
    </section>

@endsection

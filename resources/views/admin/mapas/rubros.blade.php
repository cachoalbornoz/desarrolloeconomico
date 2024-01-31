@extends('base.base-mapa')

@section('title', 'Mapa')



@section('content')

    <div class="d-flex h-100">

        <div class="row m-0 w-100">

            <div id="sidebar" class="d-flex flex-column justify-content-between col-2 h-100">
                <div id="alert" class="w-100 alert alert-warning fw-bold hidden" role="alert"></div>
            </div>

            <div id="map" class="col"> </div>
        </div>

    </div>

    <script src="{{ asset('/public/mapas/departamentos.js') }}"></script>
    <script src="{{ asset('/public/mapas/empresas.js') }}"></script>
    <script src="{{ asset('/public/mapas/map-rubros.js') }}"></script>

@endsection

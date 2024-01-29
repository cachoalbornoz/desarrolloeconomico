@extends('base.base-mapa')

@section('title', 'Mapa')



@section('content')

    <h5>Mapa de Empresas x Rubros </h5>

    <div id="map">

    </div>

    <script src="{{ asset('/public/mapas/map-rubros.js') }}"></script>

@endsection

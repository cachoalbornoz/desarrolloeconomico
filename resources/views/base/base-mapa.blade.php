<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/png" href="{{ asset('/public/images/frontend/favicon.png') }}">

    <meta name="Keywords"
        content="Gobierno Entre Ríos Desarrollo Económico Emprendedor Financiamiento Jóvenes Emprendedores MiPyMEs PyMEs" />
    <meta name="description" content="Gobierno Entre Ríos Desarrollo Económico Emprendedor Financiamiento" />
    <meta name="robots" content="index,follow">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ asset('/public/mapas/map.css') }}">



    <link href="{{ asset('/public/mapas/libreria/leaflet/leaflet.css') }}" rel="stylesheet">
    <link href="{{ asset('/public/mapas/libreria/Leaflet.MousePosition-master/src/L.Control.MousePosition.css') }}"
        rel="stylesheet">
    <link href="{{ asset('/public/mapas/libreria/leaflet-graphicscale-master/dist/Leaflet.GraphicScale.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('/public/mapas/libreria/leaflet-mapkey-icon-master/dist/L.Icon.Mapkey.css') }}"
        rel="stylesheet">
    <link
        href="{{ asset('/public/mapas/libreria/leaflet-groupedlayercontrol-gh-pages/src/leaflet.groupedlayercontrol.css') }}"
        rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('/public/font-awesome-5.9.0/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/bootstrap-4.3.1/dist/css/bootstrap.min.css') }}">

<body>


    <!-- Bootstrap 4.3.1 -->
    <script src="{{ asset('/public/bootstrap-4.3.1/js/dist/popper.min.js') }}"></script>
    <script src="{{ asset('/public/bootstrap-4.3.1/js/dist/util.js') }}"></script>
    <script src="{{ asset('/public/bootstrap-4.3.1/dist/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('/public/mapas/libreria/leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('/public/mapas/libreria/Leaflet.MousePosition-master/src/L.Control.MousePosition.js') }}"></script>
    <script src="{{ asset('/public/mapas/libreria/leaflet-easyPrint-gh-pages/dist/leaflet.easyPrint.js') }}"></script>
    <script src="{{ asset('/public/mapas/libreria/leaflet-graphicscale-master/dist/Leaflet.GraphicScale.min.js') }}"></script>
    <script src="{{ asset('/public/mapas/libreria/leaflet-mapkey-icon-master/dist/L.Icon.Mapkey.js') }}"></script>
    
    <script src="{{ asset('/public/mapas/libreria/leaflet-groupedlayercontrol-gh-pages/src/leaflet.groupedlayercontrol.js') }}"></script>

    <script>
        var APP_URL = {!! json_encode(url('/')) !!};
    </script>

    @yield('content')

</body>

</html>

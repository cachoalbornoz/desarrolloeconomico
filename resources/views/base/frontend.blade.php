@extends('base.basesec')

@section('title', 'Inicio')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                &nbsp;
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                &nbsp;
            </div>
        </div>

        <div class="row mb-5">
            <div class="col">
                <img src="{{ asset('public/images/frontend/portada.jpeg') }}" class="img-fluid" />
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-6 w-100 mb-3">
                <div class="mb-3 text-center h-100">
                    <a href="{{ route('programasp') }}">
                        <img src="{{ asset('public/images/frontend/portadapymes.png') }}" class=" img-fluid img-medium" />
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-6 w-100 mb-3">
                <div class="mb-3 text-center h-100">
                    <a href="https://www.entrerios.gov.ar/desarrolloemprendedor" target="_blank">
                        <img src="{{ asset('public/images/frontend/portadad.jpeg') }}" class=" img-fluid img-medium" />
                    </a>
                </div>
            </div>
        </div>

        <div class="row mt-3 mb-4">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <h4>Créditos productivos</h4>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="list-group">
                    <a href="{{ route('pafinanciera') }}"
                        class="mb-2 list-group-item list-group-item-action list-group-item-primary">* Empresas
                    </a>
                    <a href="{{ route('pcooperativas') }}"
                        class="mb-2 list-group-item list-group-item-action list-group-item-primary">* Cooperativas
                    </a>

                    <hr/>

                    <h6 class="mt-2">Emprendedores</h6>

                    <a class="list-group-item mt-2 list-group-item-action list-group-item-info"
                        href="https://www.entrerios.gov.ar/desarrolloemprendedor/frontend/programa_jovenes.php">
                        - Créditos a tasa cero
                    </a>

                    <a class="list-group-item mt-1 list-group-item-action list-group-item-info"
                        href="https://www.entrerios.gov.ar/desarrolloemprendedor/frontend/programa_proaccer.php">
                        - ANR para comercialización
                    </a>

                    <a class="list-group-item mt-1 list-group-item-action list-group-item-info"
                        href="https://www.entrerios.gov.ar/desarrolloemprendedor/frontend/programa_proceder.php">
                        - ANR para innovación
                    </a>

                    <hr/>

                    <a href="{{ route('pcapitalTrabajo') }}"
                        class="mt-2 mb-2 list-group-item list-group-item-action list-group-item-dark">
                        * Banco de Entre Ríos
                    </a>
                    <a href="{{ route('pestrategicos') }}"
                        class="mt-2 mb-2 list-group-item list-group-item-action list-group-item-info">
                        * Créditos Nacionales
                    </a>
                    <a href="{{ route('programarp') }}"
                        class="mt-2 mb-2 list-group-item list-group-item-action list-group-item-info">
                        * Reactivación Productiva
                    </a>
                </div>
            </div>
        </div>

        <div class="row mt-5 mb-4">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <h4>Capacitaciones y Asistencia Técnica</h4>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="list-group">
                    <h6>Empresas y Cooperativas</h6>
                    <a href="{{ route('patecnica') }}"
                        class="mb-2 list-group-item list-group-item-action list-group-item-primary">
                        * Asistencia Técnica
                    </a>

                    <hr/>

                    <h6>Emprendedores</h6>
                    <a href="https://www.entrerios.gov.ar/desarrolloemprendedor/frontend/programa_formacion.php"
                        class="mb-2 list-group-item list-group-item-action list-group-item-primary">* Capacitaciones
                    </a>
                    <a href="https://www.entrerios.gov.ar/desarrolloemprendedor/frontend/programa_tutorias.php"
                        class="mb-2 list-group-item list-group-item-action list-group-item-primary">* Tutorías
                    </a>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                @include('base.noticias')
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                &nbsp;
            </div>
        </div>

    </div>


@endsection

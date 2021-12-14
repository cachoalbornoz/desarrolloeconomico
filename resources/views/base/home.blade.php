@extends('base.base')

@section('title', 'Inicio')

@section('breadcrumb')
    {!! Breadcrumbs::render('inicio') !!}
@stop

@section('content')


    @if (Auth::user()->hasRole(['user']))

        <div class="row">
            <div class="col-xs-12 col-md-8 col-lg-8">

                <div class="card-group">
                    <div class="card mr-3 mb-3">
                        <div class="card-header badge-info text-center">
                            PROGRAMA FEDERAL DE FORTALECIMIENTO DE LA REACTIVACIÓN PRODUCTIVA
                        </div>
                        <div class="card-body">
                            <h5 class="card-text">
                                <a class="nav-link text-black-50" href="{{ route('empresa.vincular') }}">
                                    Ingresa al programa
                                </a>
                            </h5>
                        </div>
                        <div class=" card-footer">
                            Contrata trabajadores o trabajadoras que vayan a desempeñar sus tareas en la Provincia de ENTRE
                            RÍOS, por tiempo indeterminado y jornada completa, y recibí un Aporte No Reembolsable (ANR)
                            mensual y por el plazo máximo de TREINTA Y SEIS (36) cuotas.
                        </div>
                    </div>

                    <div class="card mr-3 mb-3">
                        <div class="card-header bg-success text-center">
                            PROGRAMA DE ASISTENCIA FINANCIERA PARA LA CONSOLIDACION PRODUCTIVA
                        </div>
                        <div class="card-body">
                            <h5 class="card-text">
                                <a class="nav-link text-black-50" href="{{ route('proyecto.index') }}">
                                    Cargá tu proyecto
                                </a>
                            </h5>
                        </div>
                        <div class=" card-footer">
                            Crédito de hasta $2.000.000 y a tasa subsidiada para MiPyMEs entrerrianas en marcha, destinados
                            a capital de trabajo o proyectos de inversión y capital de trabajo asociado.
                            </br>
                            &nbsp;
                        </div>
                    </div>
                </div>
            </div>


        </div>
    @endif

@endsection

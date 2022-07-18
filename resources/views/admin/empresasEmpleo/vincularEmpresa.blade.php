@extends('base.base')

@section('title', 'vincula empresa')

@section('breadcrumb')
    {!! Breadcrumbs::render('empresa') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-4">
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            Empresa relacionada al usuario <b>{{ Auth::user()->apellido }},
                                {{ Auth::user()->nombre }}</b>
                        </div>

                        <div class="col-xs-12 col-md-6 col-lg-6">

                            @if (count($empresas) == 0)
                                <a class='btn btn-info' href="{{ route('empresaEmpleo.createAsociar', Auth::user()->id) }}">
                                    Nueva empresa
                                </a>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-xs-12 col-sm-12 col-lg-12">

                            <div id="divEmpresa">
                                @include('admin.empresasEmpleo.detalleEmpresa')
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    @endsection

    @section('js')

        <script>
            const usuario = {{ Auth::user()->id }};

            function enviar(id) {

                ymz.jq_confirm({
                            title: `<div class="text-center m-3">Confirma el envío de los datos para su evaluación  ?</div>`,
                            text: `<p class="text-center m-3">Luego del envío, los datos no podrán modificarse hasta su revisión</p>`,
                            no_btn: "No",
                            yes_btn: "Si",
                            no_fn: function() {

                                return false;
                            },
                            yes_fn: function() {

                                var route = '{{ route('empresaEmpleo.enviar') }}';
                                var token = $('input[name=_token]').val();
                                $.ajax({

                                    url: route,
                                    headers: {
                                        'X-CSRF-TOKEN': token
                                    },
                                    type: 'POST',
                                    dataType: 'json',
                                    data: {
                                        usuario,
                                        id
                                    },

                                    success: function(data) {

                                        $('#divEmpresa').html(data.view);

                                        toastr.options = {
                                            "positionClass": "toast-top-center",
                                            "progressBar": true,
                                            "showDuration": "5000",
                                            "timeOut": "5000"
                                        };
                                        toastr.success("&nbsp;", data.message);

                                    }
                                });
                            }
                        })
                    }


                    function desvincula(id) {

                        var texto = '&nbsp; Elimina ésta empresa ? &nbsp;';

                        ymz.jq_confirm({
                            title: texto,
                            text: "",
                            no_btn: "Cancelar",
                            yes_btn: "Confirma",
                            no_fn: function() {
                                return false;
                            },
                            yes_fn: function() {

                                var route = '{{ route('empresaEmpleo.desvinculaEmpresa') }}';
                                var token = $('input[name=_token]').val();
                                $.ajax({

                                    url: route,
                                    headers: {
                                        'X-CSRF-TOKEN': token
                                    },
                                    type: 'POST',
                                    dataType: 'json',
                                    data: {
                                        usuario,
                                        id
                                    },

                                    success: function(data) {
                                        $('#divEmpresa').html(data);
                                    }
                                });
                                setTimeout(function() {
                                    window.location.reload(1);
                                }, 1000);
                            }
                        });

                    };
        </script>

    @endsection

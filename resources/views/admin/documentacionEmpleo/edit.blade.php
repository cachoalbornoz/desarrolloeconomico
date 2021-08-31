@extends('base.base')

@section('title', 'Editar documentacion')

@section('stylesheet')

    <style>
        input[type="file"] {
            color: transparent !important;
        }

    </style>
@endsection

@section('content')

    @include('errors.error')


    <div class="card">

        <div class="card-header">
            <div class="row">
                <div class="col-xs-12 col-sm-9 col-lg-9">
                    <h5> Documentación solicitada </h5>
                    <p class=" font-weight-bold">{{ $documentacion->Empresa->razon_social }}</p>
                </div>
                <div class="col-xs-12 col-sm-2 col-lg-2 text-center">
                    Tipo persona:
                    <br>
                    <strong>
                        @if ($documentacion->Empresa->tiposociedad->id == '0')
                            Física
                        @else
                            Jurídica
                        @endif
                    </strong>
                </div>
                <div class="col-xs-12 col-sm-1 col-lg-1 text-center">
                    Estado:
                    <br>
                    <div id="estado">
                        <strong> @include('admin.documentacionEmpleo.estado') </strong>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <form method="POST">
        <input type="hidden" name="documentacion" id="documentacion" value="{{ $documentacion->id }}">
    </form>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>

    <div id="pj">
        @include('admin.documentacionEmpleo.documentos')
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12 text-center">
            <hr>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <small>
                <span class="text-danger">(*)</span>
                La documentación debe enviarse en archivos <b>Tipo PDF </b><i class="far fa-file-pdf"></i>
            </small>
        </div>
    </div>
    <div class="row mr-5">
        <div class="col-xs-12 col-sm-12 col-lg-12 text-right">
            <a class=" btn btn-info" href="{{ route('empresa.vincular') }}"> Regresar </a>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            &nbsp;
        </div>
    </div>


@endsection

@section('js')

    <script>
        let fondep = "{{ route('documentacione.fondep') }}";
        let memoria = "{{ route('documentacione.memoria') }}";
        let estatuto = "{{ route('documentacione.estatuto') }}";
        let autoridades = "{{ route('documentacione.autoridades') }}";
        let dni = "{{ route('documentacione.dni') }}";
        let cuit = "{{ route('documentacione.cuit') }}";
        let afip = "{{ route('documentacione.afip') }}";
        let f931 = "{{ route('documentacione.f931') }}";
        let cbu = "{{ route('documentacione.cbu') }}";
        let repsal = "{{ route('documentacione.repsal') }}";
        let mipyme = "{{ route('documentacione.mipyme') }}";
        let attrabajador = "{{ route('documentacione.attrabajador') }}";
        let djattrabajador = "{{ route('documentacione.djattrabajador') }}";

        $("#mipyme").on("change", function() {
            let data = new FormData($('#formmipyme')[0]);
            data.append('documentacion', $('#documentacion').val());

            $.ajax({
                url: mipyme,
                method: 'POST',
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    mensaje(data);
                }
            })
        });

        $("#repsal").on("change", function() {
            let data = new FormData($('#formrepsal')[0]);
            data.append('documentacion', $('#documentacion').val());

            $.ajax({
                url: repsal,
                method: 'POST',
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    mensaje(data);
                }
            })
        });

        $("#cbu").on("change", function() {
            let data = new FormData($('#formcbu')[0]);
            data.append('documentacion', $('#documentacion').val());

            $.ajax({
                url: cbu,
                method: 'POST',
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    mensaje(data);
                }
            })
        });

        $("#f931").on("change", function() {
            let data = new FormData($('#formf931')[0]);
            data.append('documentacion', $('#documentacion').val());

            $.ajax({
                url: f931,
                method: 'POST',
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    mensaje(data);
                }
            })
        });

        $("#afip").on("change", function() {
            let data = new FormData($('#formafip')[0]);
            data.append('documentacion', $('#documentacion').val());

            $.ajax({
                url: afip,
                method: 'POST',
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    mensaje(data);
                }
            })
        });

        $("#cuit").on("change", function() {
            let data = new FormData($('#formcuit')[0]);
            data.append('documentacion', $('#documentacion').val());

            $.ajax({
                url: cuit,
                method: 'POST',
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    mensaje(data);
                }
            })
        });

        $("#dni").on("change", function() {
            let data = new FormData($('#formdni')[0]);
            data.append('documentacion', $('#documentacion').val());

            $.ajax({
                url: dni,
                method: 'POST',
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    mensaje(data);
                }
            })
        });

        $("#autoridades").on("change", function() {
            let data = new FormData($('#formautoridades')[0]);
            data.append('documentacion', $('#documentacion').val());

            $.ajax({
                url: autoridades,
                method: 'POST',
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    mensaje(data);
                }
            })
        });

        $("#estatuto").on("change", function() {
            let data = new FormData($('#formestatuto')[0]);
            data.append('documentacion', $('#documentacion').val());

            $.ajax({
                url: estatuto,
                method: 'POST',
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    mensaje(data);
                }
            })
        });

        $("#memoria").on("change", function() {
            let data = new FormData($('#formmemoria')[0]);
            data.append('documentacion', $('#documentacion').val());

            $.ajax({
                url: memoria,
                method: 'POST',
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    mensaje(data);
                }
            })
        });

        $("#fondep").on("change", function() {

            let data = new FormData($('#formfondep')[0]);
            data.append('documentacion', $('#documentacion').val());

            $.ajax({
                url: fondep,
                method: 'POST',
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    mensaje(data);
                }
            })
        });

        $("#attrabajador").on("change", function() {
            let data = new FormData($('#formattrabajador')[0]);
            data.append('documentacion', $('#documentacion').val());
            $.ajax({
                url: attrabajador,
                method: 'POST',
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    mensaje(data);
                }
            })
        });

        $("#djattrabajador").on("change", function() {
            let data = new FormData($('#formdjattrabajador')[0]);
            data.append('documentacion', $('#documentacion').val());
            $.ajax({
                url: djattrabajador,
                method: 'POST',
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    mensaje(data);
                }
            })
        });

        function estado() {

            $.ajax({

                url: '{{ route('documentacione.estado') }}',
                type: 'POST',
                data: {
                    id: $("#documentacion").val()
                },

                success: function(data) {
                    $("#estado").html(data);
                }
            });
        }

        function mensaje(data) {
            if (data.success) {

                estado();
                toastr.options = {
                    "positionClass": "toast-top-center",
                    "progressBar": true,
                    "showDuration": "1000",
                    "timeOut": "1000"
                };
                toastr.success("&nbsp;", 'Documentación subida');
                setTimeout(function() {
                    window.location.reload(1);
                }, 300);

            } else {

                toastr.options = {
                    "positionClass": "toast-top-center",
                    "progressBar": true,
                    "showDuration": "5000",
                    "timeOut": "5000"
                };
                toastr.error("&nbsp;", data.message);
            }
        }
    </script>

@endsection

<div class=" ml-5 mr-5">
    <table class="table table-striped table-sm table-hover">
        <tr class="mt-4">
            <td>
                - Solicitud de Acceso al FONDEP
            </td>

            <td>
                <form id="formfondep" action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" name="fondep" id="fondep" accept="application/pdf" required>
                </form>
            </td>
            <td>
                @if (Str::length($documentacion->fondep))
                    <a
                        href="{{ asset('/public/images/upload/documentacionEmpresas/' . $documentacion->fondep) }}?codeimg={{ time() }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @else
                    <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @endif
            </td>
            <td>
                @if (Str::length($documentacion->fondep))
                    <i class="far fa-check-circle text-success"></i>
                @else
                    <i class="far fa-circle text-danger"></i>
                @endif
            </td>
        </tr>




        {{-- <tr class="mt-4">
            <td>
                - Memoria descriptiva de la empresa y proyecto
            </td>
            <td>
                <form id="formmemoria" action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" name="memoria" id="memoria" accept="application/pdf" required>
                </form>
            </td>
            <td>
                @if (Str::length($documentacion->memoria))
                    <a
                        href="{{ asset('/public/images/upload/documentacionEmpresas/' . $documentacion->memoria) }}?codeimg={{ time() }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @else
                    <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @endif
            </td>
            <td>
                @if (Str::length($documentacion->memoria))
                    <i class="far fa-check-circle text-success"></i>
                @else
                    <i class="far fa-circle text-danger"></i>
                @endif
            </td>
        </tr> --}}


        {{-- <tr class="mt-4">
            <td>
                - Copia del Contrato Constitutivo y/o Estatuto vigente
            </td>
            <td>
                <form id="formestatuto" action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" name="estatuto" id="estatuto" accept="application/pdf" required>
                </form>
            </td>
            <td>
                @if (Str::length($documentacion->estatuto))
                    <a
                        href="{{ asset('/public/images/upload/documentacionEmpresas/' . $documentacion->estatuto) }}?codeimg={{ time() }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @else
                    <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @endif
            </td>
            <td>
                @if (Str::length($documentacion->estatuto))
                    <i class="far fa-check-circle text-success"></i>
                @else
                    <i class="far fa-circle text-danger"></i>
                @endif
            </td>
        </tr> --}}


        {{-- <tr class="mt-4">
            <td>
                - Copia del acta de designación de autoridades vigentes y cargos
            </td>
            <td>
                <form id="formautoridades" action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" name="autoridades" id="autoridades" accept="application/pdf" required>
                </form>
            </td>
            <td>
                @if (Str::length($documentacion->autoridades))
                    <a
                        href="{{ asset('/public/images/upload/documentacionEmpresas/' . $documentacion->autoridades) }}?codeimg={{ time() }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @else
                    <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @endif
            </td>
            <td>
                @if (Str::length($documentacion->autoridades))
                    <i class="far fa-check-circle text-success"></i>
                @else
                    <i class="far fa-circle text-danger"></i>
                @endif
            </td>
        </tr> --}}

        {{-- <tr class="mt-4">
            <td>
                - Copia DNI representante legal o apoderado
            </td>
            <td>
                <form id="formdni" action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" name="dni" id="dni" accept="application/pdf" required>
                </form>
            </td>
            <td>
                @if (Str::length($documentacion->dni))
                    <a
                        href="{{ asset('/public/images/upload/documentacionEmpresas/' . $documentacion->dni) }}?codeimg={{ time() }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @else
                    <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @endif
            </td>
            <td>
                @if (Str::length($documentacion->dni))
                    <i class="far fa-check-circle text-success"></i>
                @else
                    <i class="far fa-circle text-danger"></i>
                @endif
            </td>
        </tr>

        <tr class="mt-4">
            <td>
                - Constancia CUIT representante legal / apoderado
            </td>
            <td>
                <form id="formcuit" action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" name="cuit" id="cuit" accept="application/pdf" required>
                </form>
            </td>
            <td>
                @if (Str::length($documentacion->cuit))
                    <a
                        href="{{ asset('/public/images/upload/documentacionEmpresas/' . $documentacion->cuit) }}?codeimg={{ time() }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @else
                    <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @endif
            </td>
            <td>
                @if (Str::length($documentacion->cuit))
                    <i class="far fa-check-circle text-success"></i>
                @else
                    <i class="far fa-circle text-danger"></i>
                @endif
            </td>
        </tr> --}}


        {{-- <tr class="mt-4">
            <td>
                - Constancia Inscripción AFIP empleador/a
            </td>
            <td>
                <form id="formafip" action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" name="afip" id="afip" accept="application/pdf" required>
                </form>
            </td>
            <td>
                @if (Str::length($documentacion->afip))
                    <a
                        href="{{ asset('/public/images/upload/documentacionEmpresas/' . $documentacion->afip) }}?codeimg={{ time() }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @else
                    <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @endif
            </td>
            <td>
                @if (Str::length($documentacion->afip))
                    <i class="far fa-check-circle text-success"></i>
                @else
                    <i class="far fa-circle text-danger"></i>
                @endif
            </td>
        </tr>

        <tr class="mt-4">
            <td>
                - DDJJ Formulario 931 presentando ante AFIP del mes de Marzo 2021
            </td>
            <td>
                <form id="formf931" action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" name="f931" id="f931" accept="application/pdf" required>
                </form>
            </td>
            <td>
                @if (Str::length($documentacion->f931))
                    <a
                        href="{{ asset('/public/images/upload/documentacionEmpresas/' . $documentacion->f931) }}?codeimg={{ time() }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @else
                    <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @endif
            </td>
            <td>
                @if (Str::length($documentacion->f931))
                    <i class="far fa-check-circle text-success"></i>
                @else
                    <i class="far fa-circle text-danger"></i>
                @endif
            </td>
        </tr> --}}

        <tr class="mt-4">
            <td>
                - Constancia de la Clave Bancaria Uniforme (CBU) de titularidad del Solicitante, acreditando el tipo y
                número de cuenta y sucursal.
            </td>
            <td>
                <form id="formcbu" action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" name="cbu" id="cbu" accept="application/pdf" required>
                </form>
            </td>
            <td>
                @if (Str::length($documentacion->cbu))
                    <a
                        href="{{ asset('/public/images/upload/documentacionEmpresas/' . $documentacion->cbu) }}?codeimg={{ time() }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @else
                    <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @endif
            </td>
            <td>
                @if (Str::length($documentacion->cbu))
                    <i class="far fa-check-circle text-success"></i>
                @else
                    <i class="far fa-circle text-danger"></i>
                @endif
            </td>
        </tr>

        {{-- <tr class="mt-4">
            <td>
                - Constancia REPSAL acreditando que empresa no posee sanciones
            </td>
            <td>
                <form id="formrepsal" action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" name="repsal" id="repsal" accept="application/pdf" required>
                </form>
            </td>
            <td>
                @if (Str::length($documentacion->repsal))
                    <a
                        href="{{ asset('/public/images/upload/documentacionEmpresas/' . $documentacion->repsal) }}?codeimg={{ time() }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @else
                    <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @endif
            </td>
            <td>
                @if (Str::length($documentacion->repsal))
                    <i class="far fa-check-circle text-success"></i>
                @else
                    <i class="far fa-circle text-danger"></i>
                @endif
            </td>
        </tr>

        <tr class="mt-4">
            <td>
                - Certificado MiPyME vigente o rechazo
            </td>
            <td>
                <form id="formmipyme" action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" name="mipyme" id="mipyme" accept="application/pdf" required>
                </form>
            </td>
            <td>
                @if (Str::length($documentacion->mipyme))
                    <a
                        href="{{ asset('/public/images/upload/documentacionEmpresas/' . $documentacion->mipyme) }}?codeimg={{ time() }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @else
                    <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @endif
            </td>
            <td>
                @if (Str::length($documentacion->mipyme))
                    <i class="far fa-check-circle text-success"></i>
                @else
                    <i class="far fa-circle text-danger"></i>
                @endif
            </td>
        </tr> --}}


        {{-- Alta temprana --}}

        <tr class="mt-4">
            <td>
                - Alta temprana de la/s persona/s contratada/s ante la ADMINISTRACIÓN FEDERAL DE INGRESOS PÚBLICOS (AFIP). 
            </td>
            <td>
                <form id="formattrabajador" action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" name="attrabajador" id="attrabajador" accept="application/pdf" required>
                </form>
            </td>
            <td>
                @if (Str::length($documentacion->attrabajador))
                    <a
                        href="{{ asset('/public/images/upload/documentacionEmpresas/' . $documentacion->attrabajador) }}?codeimg={{ time() }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @else
                    <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @endif
            </td>
            <td>
                @if (Str::length($documentacion->attrabajador))
                    <i class="far fa-check-circle text-success"></i>
                @else
                    <i class="far fa-circle text-danger"></i>
                @endif
            </td>
        </tr>

        {{-- DJ Alta temprana --}}

        {{-- <tr class="mt-4">
            <td>
                - Declaración Jurada de Alta del Trabajador o Trabajadora, con detalle de nuevas/s CUIL/S contratadas,
                especificando la categoría de cupo a la que suscriben, conforme al "Apéndice D" de las Bases y
                Condiciones Generales. (<b>Si corresponde</b>)
            </td>
            <td>
                <form id="formdjattrabajador" action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" name="djattrabajador" id="djattrabajador" accept="application/pdf" required>
                </form>
            </td>
            <td>
                @if (Str::length($documentacion->djattrabajador))
                    <a
                        href="{{ asset('/public/images/upload/documentacionEmpresas/' . $documentacion->djattrabajador) }}?codeimg={{ time() }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @else
                    <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @endif
            </td>
            <td>
                @if (Str::length($documentacion->djattrabajador))
                    <i class="far fa-check-circle text-success"></i>
                @else
                    <i class="far fa-circle text-danger"></i>
                @endif
            </td>
        </tr> --}}

        <tr class="mt-4">
            <td>
                - Certificado de discapacidad de los/las trabajadores/as contratados/as. (<b>Si corresponde</b>)
            </td>
            <td>
                <form id="formcertdiscapacidad" action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" name="certdiscapacidad" id="certdiscapacidad" accept="application/pdf"
                        required>
                </form>
            </td>
            <td>
                @if (Str::length($documentacion->certdiscapacidad))
                    <a
                        href="{{ asset('/public/images/upload/documentacionEmpresas/' . $documentacion->certdiscapacidad) }}?codeimg={{ time() }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @else
                    <a href="{{ asset('/public/images/frontend/imagen-no-disponible.png') }}">
                        <i class="far fa-file-pdf"></i>
                    </a>
                @endif
            </td>
            <td>
                @if (Str::length($documentacion->certdiscapacidad))
                    <i class="far fa-check-circle text-success"></i>
                @else
                    <i class="far fa-circle text-danger"></i>
                @endif
            </td>
        </tr>



    </table>
</div>

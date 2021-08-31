@extends('base.base')

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
                <img src="{{ asset('public/images/frontend/prog_cap_reactivacion_grande.png') }}" class=" img-fluid" />
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                &nbsp;
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <h5 class="favenir mb-3">
                    LÍNEAS DE CRÉDITO A TASA SUBSIDIADA JUNTO AL BANCO DE ENTRE RÍOS
                </h5>
            </div>
        </div>

        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Línea crédito #1 - Financiación de la <b>adquisición y ampliación de capital de trabajo.</b>
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">

                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <p>
                                    Convenio del Gobierno de Entre Ríos con el Banco de Entre Ríos para la puesta en
                                    vigencia de una nueva línea de financiamiento destinada a las micro, pequeñas y medianas
                                    empresas de la provincia. La línea surge de un trabajo articulado con el Gobierno
                                    Nacional y cuenta con las siguientes características:
                                </p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Destino</b>: financiación de la adquisición y ampliación de capital de trabajo.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Monto de la línea</b>: $200.000.000 (PESOS Doscientos millones).
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Destinatarios</b>: micro, pequeñas y medianas empresas de acuerdo a la Resolución
                                Nacional N° 220/19
                                SEPYME,
                                radicadas en Entre Ríos y con certificado MiPyME vigente.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Tasa de interés</b>: tasa fija subsidiada de 9,9 puntos porcentuales anuales, subsidiada
                                por el Gobierno
                                de
                                Entre Ríos y FONDEP (Ministerio de Desarrollo Productivo de la Nación).
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Monto máximo por beneficiario</b>: hasta la suma de $2.000.000.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Garantías</b>: 50% de los créditos serán garantizados por el FOGAER (Fondo de Garantías
                                de Entre Ríos) y
                                el 50%
                                restante por el FOGAR (Fondo Argentino de Garantías) del Ministerio de Desarrollo Productivo
                                de la Nación.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Sistema</b>: francés.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Plazo y frecuencia de Amortización</b>: plazo de gracia de hasta 6 meses para la
                                amortización del
                                capital. Para
                                la amortización de capital e intereses el plazo máximo es de 18 (dieciocho) meses, y los
                                vencimientos
                                operarán mensualmente hasta su total amortización.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Cupo para empresas lideradas o propiedad de mujeres</b>: 20% del cupo total de la línea.
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Vigencia de la línea</b>: hasta agotar el cupo máximo disponible o hasta el 30 de
                                septiembre de 2021.
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header text-left" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed  text-left" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Línea crédito #2 - Adquisición de capital de trabajo por parte de micro, pequeñas y
                            medianas empresas entrerrianas de la <b>producción tambera provincial.</b>
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">

                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <h5 class="favenir mb-3">
                                    LÍNEA DE CRÉDITO PARA EL SECTOR TAMBERO ENTRERRIANO
                                </h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <p>
                                    Financiación para la Adquisición de capital de trabajo por parte de micro, pequeñas y
                                    medianas empresas entrerrianas de la producción tambera provincial.
                                </p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Destino</b>: financiamiento de capital de trabajo.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Monto total de la línea</b>: PESOS DOSCIENTOS MILLONES ($200.000.000).
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Monto Máximo a financiar</b>: hasta tres (3) meses de Producción Láctea del promedio
                                simple de los
                                últimos doce (12) meses
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Sistema y Frecuencia de Amortización</b>: Sistema Alemán. Los vencimientos de capital e
                                intereses
                                operarán mensualmente hasta su total amortización.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Plazo Máximo de Amortización</b>: la línea incluirá un plazo de amortización de hasta 24
                                (VEINTICUATRO)
                                meses.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Tasa de Interés y bonificación provincial</b>: la línea tendrá una tasa fija del
                                Veintinueve por ciento
                                nominal anual (29% TNA), que surge de una tasa fija anual de treinta y cinco (35) puntos
                                porcentuales
                                subsidiada en seis
                                (6) puntos porcentuales por parte del GOBIERNO DE LA PROVINCIA DE ENTRE RÍOS.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Destinatarios</b>: Micro, pequeñas y medianas empresas, según los términos de la
                                Resolución Nacional N°
                                220/19 S.E.
                                PyME y sus modificatorias, del sector tambero que estén radicadas en la Provincia de Entre
                                Ríos y entreguen
                                su producción en una usina láctea, y que reúnan los requisitos para ser calificadas por EL
                                BANCO como
                                sujetos
                                de crédito.
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Vigencia de la línea</b>: hasta agotar el cupo máximo total de PESOS DOSCIENTOS MILLONES
                                ($200.000.000) a
                                aplicar por el BANCO como capital a los préstamos establecidos mediante el presente convenio
                                o hasta el 30
                                de septiembre
                                de 2021, lo que ocurra primero.
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed  text-left" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Línea crédito #3 - Adquisición de bienes de capital por parte de micro, pequeñas y
                            medianas empresas entrerrianas del <b>sector del transporte de cargas de alimentos,
                                combustibles, cereales, oleaginosas y cargas generales. </b>
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">

                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                &nbsp;
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <h5 class="favenir mb-3">
                                    LÍNEA DE CRÉDITO PARA EL SECTOR TRANSPORTISTA ENTRERRIANO
                                </h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <p>
                                    Financiación para la Adquisición de bienes de capital por parte de micro, pequeñas y
                                    medianas empresas entrerrianas del sector del transporte de cargas de alimentos,
                                    combustibles, cereales, oleaginosas y cargas generales.
                                </p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Destino</b>: financiar la adquisición de Bienes de Capital.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Monto Total de la Línea</b>: PESOS DOSCIENTOS MILLONES ($200.000.000).
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Monto Máximo a financiar</b>: hasta la suma de PESOS QUINCE MILLONES ($15.000.000) por
                                beneficiario.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Sistema y Frecuencia de Amortización</b>: Sistema Francés. Los vencimientos de capital e
                                intereses
                                operarán mensualmente hasta su total amortización.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Plazo Máximo de Amortización</b>: la línea incluirá un plazo de amortización de hasta 48
                                (CUARENTA Y
                                OCHO) meses.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Tasa de Interés y bonificación del Gobierno Provincial</b>: la línea tendrá una tasa fija
                                del
                                Veinticuatro por ciento nominal anual (24% TNA), que surge de una tasa fija anual de treinta
                                (30) puntos
                                porcentuales subsidiada en seis (6) puntos porcentuales por parte del GOBIERNO DE LA
                                PROVINCIA DE ENTRE
                                RIOS.
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Destinatarios</b>: Micro, pequeñas y medianas empresas, según los términos de la
                                Resolución Nacional N°
                                220/19 S.E. PyME y sus modificatorias, del sector del transporte de cargas de alimentos,
                                combustibles,
                                cereales, oleaginosas y cargas generales, que estén radicadas en la Provincia de Entre Ríos,
                                y que reúnan
                                los requisitos para ser calificadas por EL BANCO como sujetos de crédito.
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <b>Vigencia de la línea</b>:hasta agotar el cupo máximo total de PESOS DOSCIENTOS MILLONES
                                ($200.000.000) o
                                hasta el 30 de septiembre de 2021, lo que ocurra primero.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection

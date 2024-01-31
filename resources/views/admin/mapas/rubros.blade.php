@extends('base.base-mapa')

@section('title', 'Mapa')



@section('content')

    <div>

        Mapa de empresas x rubros 

        <select name="departamentos" id="departamentos">
            <option value="">Seleccione un departamento</option>
            <option value="-32.2245289,-58.1675946">Colon</option>
            <option value="-31.3785815,-58.082821">Concordia</option>
            <option value="-32.06526,-60.60565">Diamante</option>
            <option value="-30.9927822,-57.9447917">Federacion</option>
            <option value="-30.9499301,-58.7950395">Federal</option>
            <option value="-30.4039124,-58.7921657">Feliciano</option>
            <option value="-33.1446543,-59.3354523">Gualeguay</option>
            <option value="-33.00802,-58.51765">Gualeguaychu</option>
            <option value="-33.5963439,-59.3304068">Islas del Ibicuy</option>
            <option value="-30.7458081,-59.6389937">La Paz</option>
            <option value="-32.3974349,-59.8228071">Nogoya</option>
            <option value="-31.74087,-60.52308">Parana</option>
            <option value="-31.6237211,-58.5463309">San Salvador</option>
            <option value="-32.3066109,-59.1579668">Tala</option>
            <option value="-32.4737569,-58.3112324">Uruguay</option>
            <option value="-32.61596,-60.15092">Victoria</option>
            <option value="-31.86168,-59.02911">Villaguay</option>
        </select>
    </div>

    <div id="map">

    </div>

    <script src="{{ asset('/public/mapas/empresas.js') }}"></script>
    <script src="{{ asset('/public/mapas/map-rubros.js') }}"></script>

@endsection

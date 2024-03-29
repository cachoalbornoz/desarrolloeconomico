// Definir el mapas
let map = L.map('map', {
    fullscreenControl: true,
    fullscreenControlOptions:
        { position: 'topright' }
}).setView([-31.95528, -57.97186], 8);

// Referencias
const sidebar = document.querySelector('#sidebar');
const alert = document.querySelector('#alert');

// Agregados al mapa
new L.control.mousePosition({ position: 'topright' }).addTo(map);
new L.control.scale({ imperial: true }).addTo(map);

// Cuadro de Informacion
var info = new L.control({ position: 'bottomleft' });

// Crear un div con una clase info
info.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'info');
    this.update();
    return this._div;
};

// Agregar el metodo que actualiza el control segun el puntero vaya pasando
info.update = function (props) {
    this._div.innerHTML = '<h6>Créditos MyPYME - Categorias productivas</h6>';
    //let path = APP_URL + "/public/mapas/libreria/isologoER_Gob.png"
    //this._div.innerHTML += '<img class=" img-thumbnail" src=' + path + ' alt="Ministerio">';
    this._div.innerHTML += '<h4>Ministerio de Desarrollo Económico - Entre Ríos</h4>';
};
info.addTo(map);


//Crear listado de lugares
const volar = (lugar) => {
    const zoom = (lugar.nombre == 'Todos') ? 8 : 12;
    map.flyTo(lugar.coordenadas, zoom)
}

const definirAlert = ([latitud, longitud]) => {
    alert.classList.remove('hidden');
    alert.innerText = `Lat: ${latitud}, Long: ${longitud}`
}

// Primero limpiar el Active de cada item
const limpiarItems = () => {
    const listadoLi = document.querySelectorAll('li');
    listadoLi.forEach(li => {
        li.classList.remove('active');
    })
}

// Crear el listado
const crearListado = () => {
    const ul = document.createElement('ul');
    ul.classList.add('list-group');
    sidebar.prepend(ul);

    departamentos.forEach(lugar => {
        const li = document.createElement('li');
        li.innerText = lugar.nombre;
        li.classList.add('list-group-item');
        ul.append(li);

        li.addEventListener('click', () => {
            limpiarItems();
            li.classList.add('active');
            volar(lugar);
            definirAlert(lugar.coordenadas);
        })
    })

}

crearListado();


// Crear el mapa

let politico = L.tileLayer('https://wms.ign.gob.ar/geoserver/gwc/service/tms/1.0.0/capabaseargenmap@EPSG%3A3857@png/{z}/{x}/{-y}.png',
    {
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">IGN Argentina - Secretaria Desarrollo Productivo E.R.</a>'
    });
let streetView = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png',
    {
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap - Secretaria Desarrollo Productivo E.R. </a>'
    });

var baseLayers = {
    "Politico": politico,
    "StreetView": streetView,
};

var overlays = {};

var options = {
    collapsed: false,
    position: 'topright'
};

politico.addTo(map);

const layerControl = L.control.layers(baseLayers, overlays, options).addTo(map);


// Funcion de Mayuscula primer letra 
const capitalize = (t) => { return t[0].toUpperCase() + t.substr(1).toLowerCase() };


// Definir colores
const colores = ["#000000", "#6E1906", "#FF0000", "#FE642E", "#04B404", "#948E0A", "#0A1D94", "#BDBDBD", "#E6E6E6", "#B40404", "#80FF00", "#00FFFF", "#FA58F4",
    "#FE2E9A", "#F6D8CE", "#38610B", "#86B404", "#8904B1", "#F5A9E1", "#F5A9A9", "#F3F781", "#E3CEF6"];

// Definir marcadores por cada categoria - Tipo_Categoria
let index = 0

categorias.forEach(item => {

    index++
    capaCategoria = L.layerGroup();

    let color = colores[index]

    empresas.forEach(empresa => {


        if (empresa.categoria_id == item.id) {

            let opciones = {
                radius: 6,
                fillColor: color,
                color: color,
                weight: 1,
                opacity: 0.8,
                fillOpacity: 0.8,
            }

            L.circleMarker(L.latLng(empresa.latitud, empresa.longitud), opciones).addTo(capaCategoria).bindTooltip(empresa.razon_social, { sticky: true })
        }
    })

    // Agregar la nueva capa al grupo overlays
    let NombreCategoria = "<i class='fa fa-circle fa' aria-hidden='true' style='color:" + color + "'></i> " + capitalize(item.categoria)

    layerControl.addOverlay(capaCategoria, NombreCategoria);
})





















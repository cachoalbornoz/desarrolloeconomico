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
new L.control.scale({ imperial: false }).addTo(map);

// Cuadro de Informacion
// Agregar control para ver los datos al pasar el puntero

var info = L.control();

// Crear un div con una clase info
info.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'info');
    this.update();
    return this._div;
};

// Agregar el metodo que actualiza el control segun el puntero vaya pasando
info.update = function (props) {
    this._div.innerHTML = '<h6>Mapa - Categorias productivas</h6>';
};
info.addTo(map);

// Dibujar marcadores de las empresas
const colores = ["#000000", "#F2C357", "#FF0000", "#04B404", "#FE642E", "#FFFF00", "#FF00BF", "#BDBDBD", "#E6E6E6", "#B40404", "#80FF00", "#00FFFF", "#FA58F4",
    "#FE2E9A", "#F6D8CE", "#38610B", "#86B404", "#8904B1", "#F5A9E1", "#F5A9A9", "#F3F781", "#E3CEF6"];


//Crear listado de lugares
const volar = (lugar) => {
    const zoom = (lugar.nombre == 'Todos') ? 8 : 14;
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

let politico = L.tileLayer('https://wms.ign.gob.ar/geoserver/gwc/service/tms/1.0.0/capabaseargenmap@EPSG%3A3857@png/{z}/{x}/{-y}.png');
let streetView = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});

var baseLayers = {
    "Politico": politico,
    "StreetView": streetView,
};

var overlays = {};

var options = {
    collapsed: false,
    position: 'bottomright'
};

politico.addTo(map);

const layerControl = L.control.layers(baseLayers, overlays, options).addTo(map);

// Definir marcadores por cada categoria - Tipo_Categoria

categorias.forEach(item => {

    capaCategoria = L.layerGroup();
    let index = 0

    empresas.forEach(empresa => {

        if (empresa.categoria_id == item.id) {

            let opciones = {
                radius: 6,
                fillColor: colores[index],
                color: colores[index],
                weight: 1,
                opacity: 0.8,
                fillOpacity: 0.8,
            }

            let tooltip = [empresa.razon_social, { sticky: true }]

            L.circleMarker(L.latLng(empresa.latitud, empresa.longitud), opciones).bindTooltip(tooltip).addTo(capaCategoria)
        }
    })

    // Agregar la nueva capa al grupo overlays
    layerControl.addOverlay(capaCategoria, item.categoria);

    index++

})





















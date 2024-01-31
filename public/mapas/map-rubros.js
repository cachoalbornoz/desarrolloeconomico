// Definir colores
const colores = ["#000000", "#F2C357", "#FF0000", "#04B404", "#FE642E", "#FFFF00", "#FF00BF", "#BDBDBD", "#E6E6E6", "#B40404", "#80FF00", "#00FFFF", "#FA58F4",
    "#FE2E9A", "#F6D8CE", "#38610B", "#86B404", "#8904B1", "#F5A9E1", "#F5A9A9", "#F3F781", "#E3CEF6"];

// Definir el mapas
let map = L.map('map', {
    fullscreenControl: true,
    fullscreenControlOptions:
        { position: 'topright' }
}).setView([-31.95528, -57.97186], 8);

// Referencias
const sidebar = document.querySelector('#sidebar');
const alert = document.querySelector('#alert');

let politico = L.tileLayer('https://wms.ign.gob.ar/geoserver/gwc/service/tms/1.0.0/capabaseargenmap@EPSG%3A3857@png/{z}/{x}/{-y}.png');
let streetView = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});

var baseLayers = {
    "Politico": politico,
    "StreetView": streetView,
};


var cities = new L.LayerGroup();

L.marker([39.61, -105.02]).bindPopup('This is Littleton, CO.').addTo(cities),
    L.marker([39.74, -104.99]).bindPopup('This is Denver, CO.').addTo(cities),
    L.marker([39.73, -104.8]).bindPopup('This is Aurora, CO.').addTo(cities),
    L.marker([39.77, -105.23]).bindPopup('This is Golden, CO.').addTo(cities);

var restaurants = new L.LayerGroup();

L.marker([39.69, -104.85]).bindPopup('A fake restaurant').addTo(restaurants);
L.marker([39.69, -105.12]).bindPopup('A fake restaurant').addTo(restaurants);



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
    this._div.innerHTML = '<h6>Mapa - Rubros productivos</h6>';
};
info.addTo(map);

// Dibujar marcadores de las empresas

var categoria_id = -1
var arrCategorias = []

empresas.forEach(empresa => {

    if (categoria_id !== empresa.categoria_id) {
        var categoria = empresa.categoria
        categoria = new L.LayerGroup();
        arrCategorias.push(categoria)
    }

    // L.circleMarker(L.latLng(empresa.latitud, empresa.longitud), {
    //     radius: 6,
    //     fillColor: "#ff0000",
    //     color: "red",
    //     weight: 1,
    //     opacity: 1,
    //     fillOpacity: 0.6,
    // }).addTo(categoria).bindTooltip(empresa.razon_social, { sticky: true });

    console.log(empresa.categoria)

    L.marker([empresa.latitud, empresa.longitud]).addTo(categoria);

    categoria_id = empresa.categoria_id
})

//Crear listado de lugares

const volar = (lugar) => {
    const zoom = (lugar.nombre == 'Todos') ? 8 : 14;
    map.flyTo(lugar.coordenadas, zoom)
}

const definirAlert = ([latitud, longitud]) => {
    alert.classList.remove('hidden');
    alert.innerText = `Lat: ${latitud}, Long: ${longitud}`
}


// Funcion para listar los sites

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

console.log(arrCategorias)

var overlays = {
    "Cities": cities,
    "Restaurants": restaurants,
};

var options = {
    collapsed: false,
    position: 'bottomright'
};


politico.addTo(map);

L.control.layers(baseLayers, overlays, options).addTo(map);





















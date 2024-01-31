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


// Hacer zoom sobre los departamentos
// document.getElementById('departamentos').addEventListener('change', function (e) {
//     let coords = e.target.value.split(",");
//     map.flyTo(coords, 14);
// })

let bingkey = 'Av1z4G0ITtfkMdxUW0qsvJHvYZbjDXOVibWwMhCmEJxAXf-YHYL1uoRjU9YBE-s6';
let imagerySet = "AerialWithLabels"; // AerialWithLabels | Birdseye | BirdseyeWithLabels | Road

let politico = L.tileLayer('https://wms.ign.gob.ar/geoserver/gwc/service/tms/1.0.0/capabaseargenmap@EPSG%3A3857@png/{z}/{x}/{-y}.png');
let streetView = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});
let roadmap = L.tileLayer.bing(bingkey, { type: imagerySet });

var baseLayers = {
    "Politico": politico,
    "StreetView": streetView,
    "RoadMap": roadmap
};

politico.addTo(map);

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
empresas.forEach(empresa => {
    L.circleMarker(L.latLng(empresa.longitud, empresa.latitud), {
        radius: 6,
        fillColor: "#ff0000",
        color: "red",
        weight: 1,
        opacity: 1,
        fillOpacity: 0.6,
    }).addTo(map);
})

//Crear listado de lugares

const volar = (coord) => {
    const zoom = map.getMaxZoom();
    map.flyTo(coord,14)
}

const definirAlert = ([latitud,longitud]) => {
    alert.classList.remove('hidden');
    alert.innerText = `Coordenadas:
        Latitud: ${latitud},
        Longitud: ${longitud}
        `
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
            volar(lugar.coordenadas);
            definirAlert(lugar.coordenadas);
        })
    })

}

crearListado();























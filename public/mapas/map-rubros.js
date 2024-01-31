// Definir colores
const colores = ["#000000", "#F2C357", "#FF0000", "#04B404", "#FE642E", "#FFFF00", "#FF00BF", "#BDBDBD", "#E6E6E6", "#B40404", "#80FF00", "#00FFFF", "#FA58F4",
    "#FE2E9A", "#F6D8CE", "#38610B", "#86B404", "#8904B1", "#F5A9E1", "#F5A9A9", "#F3F781", "#E3CEF6"];

// Definir el mapas
let map = L.map('map', {
    fullscreenControl: true,
    fullscreenControlOptions:
        { position: 'topright' }
}).setView([-31.95528, -57.97186], 8);


let politico = L.tileLayer('https://wms.ign.gob.ar/geoserver/gwc/service/tms/1.0.0/capabaseargenmap@EPSG%3A3857@png/{z}/{x}/{-y}.png');
let streetView = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});


var baseLayers = {
    "Politico": politico,
    "StreetView": streetView
};

politico.addTo(map);

L.control.mousePosition({ position: 'topright' }).addTo(map);
////////////////////////////////////////////////////////////////
var graphicScale = L.control.graphicScale({ labelPlacement: 'bottomright', doubleLine: true, fill: 'fill', labelPlacement: 'top' }).addTo(map);

let direccion = APP_URL + "/public/mapas/libreria/isologoER_Gob.png";

var info = new L.control({ position: 'bottomleft' });
info.onAdd = function (map) {
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<img src=' + direccion + ' style="width:10%;" alt="Ministerio">';
    return div;
};
info.addTo(map);

// Overlay layers are grouped
var groupedOverlays = {}
var otrostitulos = []

var options = {
    collapsed: false,
    position: 'bottomright'
};

L.control.layers(baseLayers, groupedOverlays, options).addTo(map);

// Obtener datos de las empresas

var arrEmpresas = []
let url = APP_URL + '/mapas/empresas/rubros/get';

$.ajax({
    url: url,
    type: "GET",
    dataType: "json",
    success: function(data) {
        console.log(data);
    },
    error: function(data) {
        console.log("Revisar");
    }
});































let map = L.map('map', {
    fullscreenControl: true,
    fullscreenControlOptions:
        { position: 'topright' }
}).setView([-31.95528, -57.97186], 8);


let politico = L.tileLayer('https://wms.ign.gob.ar/geoserver/gwc/service/tms/1.0.0/capabaseargenmap@EPSG%3A3857@png/{z}/{x}/{-y}.png');
let streetView = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});

let marker = L.marker([-31.7718, -60.540148]).addTo(map)


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
    div.innerHTML += '<img src='+ direccion +' style="width:10%;" alt="Ministerio">';
    return div;
};
info.addTo(map);
////////////////////////////////////////////////////////////////     

// Overlay layers are grouped
var groupedOverlays = {}

var options = {
    collapsed: false,
    position: 'bottomright'
};

L.control.layers(baseLayers, groupedOverlays, options).addTo(map);  
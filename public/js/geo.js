var currentPosition;
var escuelaLocation = [-0.08913942655649028, -78.42506720679475];


var map = L.map('mapa').setView(escuelaLocation, 13);
        var osmUrl='https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        var osmAttrib='Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
        L.tileLayer(osmUrl, {
            maxZoom: 18,
            attribution: osmAttrib
        }).addTo(map);

function getCurrentLocation(params) {
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(drawPosition);
    }
    else {
        console.log("La geolocalización no está soportada")
    }
}

function drawPosition(position) {
    var latlng = new L.Latlng(location.coords.latitude, location.coords.longitude);
    currentPosition = L.marker(latlng).addTo(map)
}

function getLatLngOnMapClick() {
    map.on('click', function (e){
        var coord = e.latlng;
        var lat = coord.lat;
        var lng = coord.lng;
        console.log("estamos en lat: " + lat + " y long: " + lng);
    });
}

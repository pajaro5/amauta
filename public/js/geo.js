var currentPosition;

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
    currentPosition = L.marker(latlng).addTo()
}
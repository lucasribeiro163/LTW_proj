// This script requires that the user consents to location sharing when
// prompted by your browser. If the user doesn't consents, an error "The Geolocation service
// failed." will appear, that means the user probably did not give permission for the browser to
// locate you.

'use strict'

var mapLocation, infoWindow;
function initMap() {
    mapLocation = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 6
    });
    infoWindow = new google.maps.InfoWindow;


    
    mapLocation.addListener('click', function(e) {
      placeMarkerAndPanTo(e.latLng, mapLocation);
    });


    //zooms if mouse is in the map zone
    mapLocation.addListener('zoom_changed', function() {
      infowindow.setContent('Zoom: ' + mapLocation.getZoom());
    });


    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('You are here.');
            infoWindow.open(mapLocation);
            mapLocation.setCenter(pos);
        }, function () {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(mapLocation);
}


function placeMarkerAndPanTo(latLng, map) {
  var marker = new google.maps.Marker({
    position: latLng,
    map: map
  });
  map.panTo(latLng);
}



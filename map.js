let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -36.853226, lng: 174.766387 },
    zoom: 18,
  });
  google.maps.Map.prototype.clearOverlays = function() {
    for (var i = 0; i < markersArray.length; i++ ) {
      markersArray[i].setMap(null);
    }
    markersArray.length = 0;
  }
  markersArray.push(marker);
google.maps.event.addListener(marker,"click",function(){});

map.clearOverlays();
  google.maps.event.addListener(map, 'click', function (event) {
    new google.maps.Marker({
        position: event.latLng,
        map: map,
    });
});
}
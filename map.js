let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -36.853226, lng: 174.766387 },
    zoom: 18,
  });
}
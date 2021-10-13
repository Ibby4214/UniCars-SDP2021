let map;

function initMap() { 
  const myLatLng = { lat: -36.8528, lng: 174.7645 };
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -36.853226, lng: 174.766387 },
    zoom: 18,
    center: myLatLng,
  });

  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "UniCars",
  });
}

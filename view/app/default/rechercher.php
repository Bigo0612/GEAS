<style> body { margin: 0; padding: 0; } #map { position: absolute; top: 0; bottom: 0; width: 100%; }</style>

<div id="map"></div>

<script>
	mapboxgl.accessToken = 'pk.eyJ1Ijoibmlmb28iLCJhIjoiY2s4anhkN3hvMDA3bzNrczRxdzNmZmM2cCJ9.6GaMDEKksRW04i6rIhot9g';
var map = new mapboxgl.Map({
container: 'map', // container id
style: 'mapbox://styles/mapbox/streets-v11',
center: [-96, 37.8], // starting position
zoom: 3 // starting zoom
});
 
// Add geolocate control to the map.
map.addControl(
new mapboxgl.GeolocateControl({
positionOptions: {
enableHighAccuracy: true
},
trackUserLocation: true
})
);
</script>
 
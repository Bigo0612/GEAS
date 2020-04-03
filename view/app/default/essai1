<style> body { margin: 0; padding: 0; } #map { position: absolute; top: 0; bottom: 0; width: 100%; }</style>

<div id="map"></div>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
<script src="https://unpkg.com/es6-promise@4.2.4/dist/es6-promise.auto.min.js"></script>
<script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
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
// ADD barre geocoder
    map.addControl(
        new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
        })
    );


//Add point sur la map
    var mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
    mapboxClient.geocoding
        .forwardGeocode({
            query: '28 rue Malouet, France' ,
            autocomplete: false,
            limit: 1
        })
        .send()
        .then(function(response) {
            if (
                response &&
                response.body &&
                response.body.features &&
                response.body.features.length
            ) {
                var feature = response.body.features[0];

                var map = new mapboxgl.Map({
                    container: 'map', // container id
                    style: 'mapbox://styles/mapbox/streets-v11',
                    center: feature.center, // starting position
                    zoom: 3 // starting zoom
                });
                new mapboxgl.Marker().setLngLat(feature.center).addTo(map);
                map.addControl(
                    new mapboxgl.GeolocateControl({
                        positionOptions: {
                            enableHighAccuracy: true
                        },
                        trackUserLocation: true
                    })
                );
                map.addControl(
                    new MapboxGeocoder({
                        accessToken: mapboxgl.accessToken,
                        mapboxgl: mapboxgl
                    })
                );
            }

        });

</script>
 

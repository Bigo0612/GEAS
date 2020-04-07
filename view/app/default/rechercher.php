<button id = "find-me">Me geolocaliser</button><br/>
<p id = "status"></p>
<a id = "map-link" target="_blank"></a>

<script>
function geoFindMe() {

const status = document.querySelector('#status');
const mapLink = document.querySelector('#map-link');

mapLink.href = '';
mapLink.textContent = '';

function success(position) {
  const latitude  = position.coords.latitude;
  const longitude = position.coords.longitude;

  status.textContent = '';
  mapLink.href = `https://www.openstreetmap.org/#map=18/${latitude}/${longitude}`;
  mapLink.textContent = `Latitude: ${latitude} °, Longitude: ${longitude} °`;
}

function error() {
  status.textContent = 'Impossible de recevoir votre géolocalisation';
}

if (!navigator.geolocation) {
  status.textContent = 'La geolocalisation n\'est pas supporter sur votre naviguateur';
} else {
  status.textContent = 'Locating…';
  navigator.geolocation.getCurrentPosition(success, error);
}

}

document.querySelector('#find-me').addEventListener('click', geoFindMe);
</script>
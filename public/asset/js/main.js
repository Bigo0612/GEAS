function geoFindMe() {

  const status = document.querySelector('#status');
  const mapLink = document.querySelector('#map-link');

  mapLink.href = '';

  function success(position) {
      const latitude = position.coords.latitude;
      const longitude = position.coords.longitude;

      var url = new URL('http://localhost/GEAS/public/rechercher');
      var search_params = url.searchParams;

      // add "longitude" parameter
      search_params.set(`longitude`, `${longitude}`);
      search_params.set(`latitude`, `${latitude}`);

      url.search = search_params.toString();

      var new_url = url.toString();

      status.textContent = '';
      mapLink.href = new_url;

  }

  function error() {
      status.textContent = 'Unable to retrieve your location';
  }

  if (!navigator.geolocation) {
      status.textContent = 'Geolocation is not supported by your browser';
  } else {
      status.textContent = 'Locating…';
      navigator.geolocation.getCurrentPosition(success, error);
  }

}

document.querySelector('#map-link').addEventListener('mouseover', geoFindMe);
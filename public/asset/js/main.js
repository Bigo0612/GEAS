function geoFindMe() {
  const status = document.querySelector("#status");
  const latitude = position.coords.latitude;
  const longitude = position.coords.longitude;

  function geo() {
    document.getElementById(findme).style.backgroundColor = 'red';
    document.getElementById(findme).setAttribute("href", "http://localhost/GEAS/public/rechercher&latitude=" + {latitude} + "&longitude=" + {longitude});
  }

  function error() {
    status.textContent = "Impossible de recevoir votre géolocalisation";
  }

  if (!navigator.geolocation) {
    status.textContent =
      "La geolocalisation n'est pas supporter sur votre naviguateur";
  } else {
    status.textContent = "Locating…";
    navigator.geolocation.getCurrentPosition(success, error);
  }
}

//document.querySelector('#find').addEventListener('click', geoFindMe);

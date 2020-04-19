<button id="find-me">Montrer ma localisation</button><br />
<p id="status"></p>
<div><a id="map-link"></a></div>

<script>
    function geoFindMe() {

        const status = document.querySelector('#status');
        const mapLink = document.querySelector('#map-link');

        mapLink.href = '';
        mapLink.textContent = '';

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
            mapLink.textContent = 'Trouver les crèches';

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

    document.querySelector('#find-me').addEventListener('click', geoFindMe);
</script>
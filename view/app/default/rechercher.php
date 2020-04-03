<button id="loc">Récuperer mes données de géolocalisation</button>

<script>
    $('#loc').click(function() {

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                console.log(position);
                $.get("http://maps.googleapis.com/maps/api/geocode/json?latlng=AIzaSyA6zNfTcLpFozJzR9bHxSFnF0oCgRN-P88" + position.coords.latitude + "," + position.coords.longitude + "& sensor = false", function(data) {
                    console.log(data);
                })
            });
        } else {
            console.log("Votre naviguateur ne supporte pas la géolocalisation");
        }

    });
</script>
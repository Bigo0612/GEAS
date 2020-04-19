<?php
use App\Service\Geolocalisation;

$geoloc = new Geolocalisation;
echo $geoloc->location();
?>

<div class="espace"></div>
<div><a id="map-link" class="find">Me géolocaliser</a></div>
<p id="status"></p>


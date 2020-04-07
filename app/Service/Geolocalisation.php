<?php

namespace App\Service;

class Geolocalisation
{

    private $latitude;
    private $longitude;

    public function location()
    {
        if ($_GET['latitude'] = true && $_GET['longitude'] = true) {
            echo $_GET['latitude'];
        } else {
            echo 'Impossible';
        }
    }
}

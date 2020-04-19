<?php

namespace App\Service;

class Geolocalisation
{

    private $latitude;
    private $longitude;

    public function location()
    {
        if (!empty ($_GET['longitude'])){
            echo $_GET['longitude'] . ' et ';
        } if( !empty( $_GET['latitude'])){
            echo $_GET['latitude'];
        }
    }
}

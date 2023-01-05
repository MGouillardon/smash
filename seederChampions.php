<?php

require_once './vendor/autoload.php';

use App\Api\StoreChampion;

$storeChampion = new StoreChampion();
$storeChampion->store();

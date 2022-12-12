<?php

declare(strict_types=1);

use App\API\ChampionAPI as Champions;

require_once '../vendor/autoload.php';

require_once '../resources/views/index.html';

$champions = new Champions();
$test = $champions->championToArray();
dd($test);

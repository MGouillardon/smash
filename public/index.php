<?php

declare(strict_types=1);

use App\Controllers\ChampionController as Duel;

require_once '../vendor/autoload.php';

switch (getUri()) {
    case '/':
        require_once '../resources/views/index.html';
        break;
    case '/results':
        require_once '../resources/views/index.html';
        break;
    case '/api/duel':
        $duel = new Duel();
        echo $duel->duel();
        break;
}

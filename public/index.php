<?php

declare(strict_types=1);

use App\Controllers\ChampionController as Champion;

require_once '../vendor/autoload.php';

switch (getUri()) {
    case '/':
        require_once '../resources/views/index.html';
        break;
    case '/add':
        $champion = new Champion();
        $champion->addScore();
        break;
    case '/api/duel':
        $duel = new Champion();
        echo $duel->duel();
        break;
}

<?php

declare(strict_types=1);

use App\Controllers\ChampionController as Champion;
use App\Controllers\ResultsController as Results;

require_once '../vendor/autoload.php';

switch (getUri()) {
    case '/':
        require_once '../resources/views/index.html';
        break;
    case '/api/add':
        $champion = new Champion();
        $champion->addScore();
        break;
    case '/api/duel':
        $duel = new Champion();
        echo $duel->duel();
        break;
    case '/api/results/topChampions':
        $results = new Results();
        echo $results->sendTopChampions();
        break;
    case '/api/results/topRoles':
        $results = new Results();
        echo $results->sendTopRoles();
        break;
}

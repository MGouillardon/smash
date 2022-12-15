<?php

declare(strict_types=1);

use App\Champion\RandomChampion;

require_once '../vendor/autoload.php';

$randomChampionId = 1354;
switch (getUri()) {
    case '/':
        require_once '../resources/views/index.html';
        break;
    case '/champions':
        $champion = new RandomChampion();
        $champion->getRandomChampion($randomChampionId);
        break;
}

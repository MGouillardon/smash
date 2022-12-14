<?php

declare(strict_types=1);

use App\Champion\RandomChampion;

require_once '../vendor/autoload.php';

switch (getUri()) {
    case '/':
        require_once '../resources/views/index.html';
        break;
    case '/champions':
        $champions = new RandomChampion();
        $champions->countChampionsId();
        break;
}

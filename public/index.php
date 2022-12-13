<?php

declare(strict_types=1);

use App\Api\Champion;

require_once '../vendor/autoload.php';

switch (getUri()) {
    case '/':
        require_once '../resources/views/index.html';
        break;
    case '/storeChampions':
        $champions = new Champion();
        $champions->store();
        break;
}

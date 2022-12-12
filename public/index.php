<?php

declare(strict_types=1);

use App\Api\Champion;

require_once '../vendor/autoload.php';

require_once '../resources/views/index.html';

$champions = new Champion();
$champions->store();

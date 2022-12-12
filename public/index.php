<?php

declare(strict_types=1);

use App\API\Client;

require_once '../vendor/autoload.php';

require_once '../resources/views/index.html';

$client = new Client();
$response = $client->getResponse();
dd($response);
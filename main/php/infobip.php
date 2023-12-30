<?php

require '../../../vendor/autoload.php';

use Infobip\Configuration;

$BASE_URL = "https://w1lnr1.api.infobip.com";
$API_KEY = "1b8e701ea4b1cf35d937750603ccb386-dc3053c4-17a3-4775-b20b-1ad156c78d45";

$configuration = new Configuration(host: $BASE_URL, apiKey: $API_KEY);

<?php

require_once __DIR__ . "/vendor/autoload.php";

use SmartCat\Client\SmartCat;

$accountId = "bbddc148-f886-4fd6-a614-c859b4c71a7a";
$api_token = "2_U9R524qceeWocL7HM4IOdoXdR";

$client = new SmartCat($accountId, $api_token);

$projectsArray = [];

$batchCount = 1;
$offset = 0;
while (true) {
    $projects = $client->getProjectManager()->projectsGetWithOffset($offset);
    echo "Fetching $batchCount batch count\n";
    if (!count($projects) > 0) {
        echo "Fetching projects is completed";
        break;
    }
    $projectsArray = array_merge($projectsArray, $projects);
    $offset += 100;
    $batchCount++;
}

echo "Find " . count($projectsArray) . " projects";


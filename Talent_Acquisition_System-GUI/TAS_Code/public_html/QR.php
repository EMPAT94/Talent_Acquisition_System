<?php

require_once 'vendor/autoload.php';

use Neoxygen\NeoClient\ClientBuilder;

$usr = "neo4j";
$pwd = "root";

$client = ClientBuilder::create()
        ->addConnection('default', 'http', 'localhost', 7474, true, $usr, $pwd)
        ->setAutoFormatResponse(true)
        ->build();

$number = htmlspecialchars($_POST['value']);

$query = 'MATCH (ss:Scene),(cc:Choice) WHERE (ss.qno = cc.qno = {questionNumber}) RETURN ss,cc';
$parameters = ['questionNumber' => $number];
$result = $client->sendCypherQuery($query, $parameters)->getRows();

$op = json_encode($result);

if ($op == null) {
    echo "Some Error";
}

print_r($op);

?>
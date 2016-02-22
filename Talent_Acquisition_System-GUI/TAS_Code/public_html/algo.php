<?php

session_start();

require_once 'vendor/autoload.php';

use Neoxygen\NeoClient\ClientBuilder;

$usr = "neo4j";
$pwd = "root";
$client = ClientBuilder::create()
        ->addConnection('default', 'http', 'localhost', 7474, true, $usr, $pwd)
        ->setAutoFormatResponse(true)
        ->build();

if (!isset($_SESSION['PSVal'])) {
    $_SESSION['PSVal'] = 0;
    $wt = 0;
}


post_question();

function post_question() {

    global $client;

    $number = $_POST['value'];
    $choice = $_POST['choice'];
    if ($choice == 1 || $choice == 3 || $choice == 5) {
        $wt = 1;
    } else if ($choice == 2 || $choice == 4) {
        $wt = 5;
    } else {
        $wt = 0;
    }

    $PS = $_SESSION['PSVal'];
    settype($PS, "integer");
    $PS += $wt;
    $_SESSION['PSVal'] = $PS;

    if ($number < 6) {
        $query = 'MATCH (ss:Scene),(cc:Choice) WHERE (ss.qno = cc.qno = {questionNumber}) RETURN ss,cc';
        $parameters = ['questionNumber' => $number];
        $result = $client->sendCypherQuery($query, $parameters)->getRows();

        $op = json_encode($result);

        if ($op == null) {
            echo "Some Error";
        } else {
            print_r($op);
        }
    } else {
        echo "end";
    }
}

?>
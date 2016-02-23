
<?php

require_once '../vendor/autoload.php';

use Neoxygen\NeoClient\ClientBuilder;

$usr = "neo4j";
$pwd = "root";

$client = ClientBuilder::create()
        ->addConnection('default', 'http', 'localhost', 7474, true, $usr, $pwd)
        ->setAutoFormatResponse(true)
        ->build();


$choice_no = htmlspecialchars($_POST['cno']);

$choice = htmlspecialchars($_POST['ch']);

$question_no = htmlspecialchars($_POST['qno']);

$trait = htmlspecialchars($_POST['trt']);

$querya = 'Match (cc:Choice) where cc.cno = {choice_no} and cc.qno = {question_no} return cc';
$parametersa = ['choice_no' => $choice_no, 'question_no' => $question_no];
$responsea = $client->sendCypherQuery($querya, $parametersa)->getRows();

$op = json_encode($responsea);
$data = json_decode($op);

if ($data == null) {

    $query = 'CREATE (cc:Choice {cno : {choice_no}, qno: {question_no}, c: {choice}, t: {trait}})';
    $parameters = ['choice_no' => $choice_no, 'question_no' => $question_no, 'choice' => $choice, 'trait' => $trait];
    $response = $client->sendCypherQuery($query, $parameters);

    echo "Choice $choice_no for $question_no Added!";
} else {
    echo "Choice $choice_no for Question $question_no already exists.";
}
?>

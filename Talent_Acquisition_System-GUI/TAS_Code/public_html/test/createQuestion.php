
<?php

require_once '../vendor/autoload.php';

use Neoxygen\NeoClient\ClientBuilder;

$usr = "neo4j";
$pwd = "root";

$client = ClientBuilder::create()
        ->addConnection('default', 'http', 'localhost', 7474, true, $usr, $pwd)
        ->setAutoFormatResponse(true)
        ->build();

$question_no = htmlspecialchars($_POST['qno']);
$question = htmlspecialchars($_POST['que']);
$dichotomy = htmlspecialchars($_POST['dich']);

$querya = 'Match (ss:Scene) Where ss.qno = {question_no} and ss.d = {dichotomy} return ss';
$parametersa = ['question_no' => $question_no, 'dichotomy' => $dichotomy];
$responsea = $client->sendCypherQuery($querya, $parametersa)->getRows();

$op = json_encode($responsea);
$data = json_decode($op);

if ($data == null) {

    $query = 'CREATE (ss:Scene {qno: {question_no}, q: {question}, d: {dichotomy}})';
    $parameters = ['question_no' => $question_no, 'question' => $question, 'dichotomy' => $dichotomy];
    $response = $client->sendCypherQuery($query, $parameters);

    echo "Question $question_no Added!";
} else {
    echo "Question $question_no already exists for $dichotomy";
}
?>

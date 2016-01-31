
<?php

require_once 'vendor/autoload.php';

use Neoxygen\NeoClient\ClientBuilder;

$usr = "neo4j";
$pwd = "root";

$client = ClientBuilder::create()
        ->addConnection('default', 'http', 'localhost', 7474, true, $usr, $pwd)
        ->setAutoFormatResponse(true)
        ->build();

$question_no = htmlspecialchars($_POST['qno']);

$question = htmlspecialchars($_POST['que']);

$trait = htmlspecialchars($_POST['trt']);

$weight = htmlspecialchars($_POST['wt']);



$query = 'CREATE (ss:Scene {qno: {question_no}, q: {question}, t: {trait}, w: {weight} })';
$parameters = ['question_no' => $question_no, 'question' => $question, 'trait' => $trait, 'weight' => $weight];
$response = $client->sendCypherQuery($query, $parameters);

echo "Question $question_no Added! Going Back"
?>

<script>
    window.history.go(-1);
</script>
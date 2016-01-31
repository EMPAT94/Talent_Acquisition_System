
<?php

require_once 'vendor/autoload.php';

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

$weight = htmlspecialchars($_POST['wt']);



$query = 'CREATE (cc:Choice {cno : {choice_no}, qno: {question_no}, c: {choice}, t: {trait}, w: {weight} })';
$parameters = ['choice_no' => $choice_no, 'question_no' => $question_no, 'choice' => $choice, 'trait' => $trait, 'weight' => $weight];
$response = $client->sendCypherQuery($query, $parameters);

echo "Choice $choice_no for $question_no Added! Going Back"
?>

<script>
    window.history.go(-1);
</script>
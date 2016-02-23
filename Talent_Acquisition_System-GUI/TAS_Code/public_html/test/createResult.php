
<?php

require_once '../vendor/autoload.php';

use Neoxygen\NeoClient\ClientBuilder;

$usr = "neo4j";
$pwd = "root";

$client = ClientBuilder::create()
        ->addConnection('default', 'http', 'localhost', 7474, true, $usr, $pwd)
        ->setAutoFormatResponse(true)
        ->build();


$type = htmlspecialchars($_POST['type']);
$summary = htmlspecialchars($_POST['sum']);
$portraits = htmlspecialchars($_POST['por']);
$traits = htmlspecialchars($_POST['tra']);
$strengths = htmlspecialchars($_POST['stre']);
$weaknesses = htmlspecialchars($_POST['wea']);
$ppa = htmlspecialchars($_POST['ppa']);
$solutions = htmlspecialchars($_POST['sol']);
$rtlb = htmlspecialchars($_POST['rtlb']);


$querya = 'Match (tt:Type) where tt.ty = {type} return tt';
$parametersa = ['type' => $type];
$responsea = $client->sendCypherQuery($querya, $parametersa)->getRows();

$op = json_encode($responsea);
$data = json_decode($op);

if ($data == null) {

    $query = 'CREATE (tt:Type {ty : {type}, su: {sum}, po : {portraits}, tr : {traits}, st : {strengths},we : {weaknesses}, ppa : {ppa}, so : {solutions}, rtlb : {rtlb}})';
    $parameters = ['type' => $type, 'sum' => $summary, 'portraits' => $portraits, 'traits' => $traits, 'strengths' => $strengths, 'weaknesses' => $weaknesses, 'ppa' => $ppa, 'solutions' => $solutions,  'rtlb' => $rtlb];
    $response = $client->sendCypherQuery($query, $parameters);

    echo "Result $type Added!";
    
} else {
    echo "Result $type already exists.";
}
?>

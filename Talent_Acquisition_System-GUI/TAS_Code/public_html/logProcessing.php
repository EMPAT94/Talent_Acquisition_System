<?php

session_start();
/*
  This file tests how the data is retieved from the database and how it is displayed.
 */

require_once 'vendor/autoload.php';

use Neoxygen\NeoClient\ClientBuilder;

$usr = "neo4j";
$pwd = "root";

$client = ClientBuilder::create()
        ->addConnection('default', 'http', 'localhost', 7474, true, $usr, $pwd)
        ->setAutoFormatResponse(true)
        ->build();

$email = htmlspecialchars($_POST['l_email']);
$password = htmlspecialchars($_POST['l_pwd']);

$query = 'MATCH (n:User) WHERE n.email = {email} RETURN *';
$parameters = ['email' => $email];
$result = $client->sendCypherQuery($query, $parameters)->getRows();

$op = json_encode($result);
$data = json_decode($op);

if ($data == null) {
    echo "1";
} else {
    if ($data->n[0]->password === $password) {
        $_SESSION['id'] = $data->n[0]->email;
        echo $_SESSION['id'];
    } else {
        echo '2';
    }
}
?>
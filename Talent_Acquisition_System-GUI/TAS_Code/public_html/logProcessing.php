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

$email = htmlspecialchars($_POST['l_email']);
$password = htmlspecialchars($_POST['l_pwd']);

$query = 'MATCH (n:User {email:{email}} ) RETURN n';
$parameters = ['email' => $email];
$result = $client->sendCypherQuery($query, $parameters)->getRows();

$op = json_encode($result);
$data = json_decode($op);

if ($data != null) {
    if ($data->n[0]->password == $password) {
        $_SESSION['username'] = $data->n[0]->fname;
        $_SESSION['userid'] = $email;
        print_r('0');
    } else {
        session_destroy();
        print_r("Incorrect Password");
    }
} else {
    session_destroy();
    print_r("Email Address not Registered");
}
?>
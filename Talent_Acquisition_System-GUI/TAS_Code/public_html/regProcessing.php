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


$firstName = htmlspecialchars($_POST['first_name']);
$lastName = htmlspecialchars($_POST['last_name']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$confirm = htmlspecialchars($_POST['confirm']);

$querya = 'MATCH (n:User {email: {email}}) RETURN n';
$parametersa = ['email' => $email];
$result = $client->sendCypherQuery($querya, $parametersa)->getRows();

$op = json_encode($result);
$data = json_decode($op);

function passcheck($pass, $conf) {
    $passwordErr = NULL;
    if (strlen($pass) <= '5') {
        $passwordErr = "Your Password Must Contain At Least : <b>6 Characters</b>, 1 Number, 1 Uppercase and 1 Lowercase Charachter!";
    } elseif (!preg_match("#[0-9]+#", $pass)) {
        $passwordErr = "Your Password Must Contain At Least : 6 Characters,<b> 1 Number</b>, 1 Uppercase and 1 Lowercase Charachter!";
    } elseif (!preg_match("#[A-Z]+#", $pass)) {
        $passwordErr = "Your Password Must Contain At Least : 6 Characters, 1 Number, <b>1 Uppercase </b> and 1 Lowercase Charachter!";
    } elseif (!preg_match("#[a-z]+#", $pass)) {
        $passwordErr = "Your Password Must Contain At Least : 6 Characters, 1 Number, 1 Uppercase  and <b> 1 Lowercase </b> Charachter!";
    } elseif ($pass <> $conf) {
        $passwordErr = "Password Mismatch";
    } 
    return ($passwordErr);
}

if ($data == null) {
    $check = passcheck($password, $confirm);
    if ($check == NULL) {
        $query = 'CREATE (ee:User {fname: {fname}, lname: {lname}, email: {email}, password: {password} })';
        $parameters = ['fname' => $firstName, 'lname' => $lastName, 'email' => $email, 'password' => $password];
        $response = $client->sendCypherQuery($query, $parameters);    
        print_r('Registration Successful, Try Logging in Now!');
    } else {
        session_destroy();
        print_r($check);
    }
} else {
    session_destroy();
    print_r("Email Already Exists"); //user already exists
}
?>
   
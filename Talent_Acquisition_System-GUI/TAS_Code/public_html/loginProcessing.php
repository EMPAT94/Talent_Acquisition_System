
<?php
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


$query = 'CREATE (ee:User {fname: {fname}, lname: {lname}, email: {email}, password: {password} })';
$parameters = ['fname' => $firstName, 'lname' => $lastName, 'email' => $email, 'password' => $password];
$response = $client->sendCypherQuery($query, $parameters);


?>
<script>
    alert ("Sucessful!");
    window.history.go(-1);
</script>

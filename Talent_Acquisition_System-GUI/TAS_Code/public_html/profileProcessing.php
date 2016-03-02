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

if (isset($_POST['gender'])) {

    $gender = htmlspecialchars($_POST['gender']);
    $age = htmlspecialchars($_POST['age']);
    $country = htmlspecialchars($_POST['cou']);

    $query = 'MATCH (n:User) WHERE n.fname = {fname} SET n.age = {age}, n.gender = {gender}, n.country = {country}';
    $parameters = ['fname' => $_SESSION['username'], 'age' => $age, 'gender' => $gender, 'country' => $country];
    $result = $client->sendCypherQuery($query, $parameters);

    echo "Data Successfully Added, Reload Page.";
}
if (isset($_FILES["file"])) {
    $name = $_SESSION['userid'] . ".jpg";
    $file = $_FILES['file']['tmp_name'];
    move_uploaded_file($file, "images/profile_pics/" . $name);

    echo "Image Successfully Uploaded, Refresh Page to Load!";
}
?>


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

$PS;

post_question();

function post_question() {

    global $client;
    global $PS;

    $number = htmlspecialchars($_POST['value']);

    if ($number == 1) {
        $_SESSION['PSVal'] = 0;
        $_SESSION['Type'] = null;
        $_SESSION['TypeStr'] = null;
    }

    $PS = $_SESSION['PSVal'];

    $choice = htmlspecialchars($_POST['choice']);

    $wt = 0;

    if ($choice == 1 || $choice == 3 || $choice == 5) {
        $wt = 0;
    } else if ($choice == 2 || $choice == 4) {
        $wt = 1;
    }


    $PS += $wt;

    $_SESSION['PSVal'] = $PS;

    if ($number % 5 == 0) {
        $_SESSION['PSVal'] = 0;
        addType($number);
    }

    if ($number < 11) {
        $query = 'MATCH (ss:Scene),(cc:Choice) WHERE (ss.qno = cc.qno = {questionNumber}) RETURN ss,cc';
        $parameters = ['questionNumber' => $number];
        $result = $client->sendCypherQuery($query, $parameters)->getRows();

        $op = json_encode($result);

        if ($op == null) {
            echo "Some Error";
        } else {
            echo $op;
        }
    } else {
        echo "end";
    }
}

function addType($number) {
    global $PS;
    if ($number == 5) {
        switch ($PS) {
            case 0 :
                $_SESSION['Type'] = "I";
                $_SESSION['TypeStr'] = "Fully Introvert";
                break;
            case 1 :
                $_SESSION['Type'] = "I";
                $_SESSION['TypeStr'] = "Moderately Introvert";
                break;
            case 2 :
                $_SESSION['Type'] = "I";
                $_SESSION['TypeStr'] = "Slightly Introvert";
                break;
            case 3 :
                $_SESSION['Type'] = "E";
                $_SESSION['TypeStr'] = "Slightly Extrovert";
                break;
            case 4 :
                $_SESSION['Type'] = "E";
                $_SESSION['TypeStr'] = "Moderately Extrovert";
                break;
            case 5 :
                $_SESSION['Type'] = "E";
                $_SESSION['TypeStr'] = "Fully Extrovert";
                break;
            default :
                echo "Error in Switch";
                break;
        }
    } else if ($number == 10) {
        switch ($PS) {
            case 0 :
                $_SESSION['Type'] .= "S";
                $_SESSION['TypeStr'] .= ", Fully Sensing";
                break;
            case 1 :
                $_SESSION['Type'] .= "S";
                $_SESSION['TypeStr'] .= ", Moderately Sensing";
                break;
            case 2 :
                $_SESSION['Type'] .= "S";
                $_SESSION['TypeStr'] .= ", Slightly Sensing";
                break;
            case 3 :
                $_SESSION['Type'] .= "N";
                $_SESSION['TypeStr'] .= ", Slightly Intuitive";
                break;
            case 4 :
                $_SESSION['Type'] .= "N";
                $_SESSION['TypeStr'] .= ", Moderately Intuitive";
                break;
            case 5 :
                $_SESSION['Type'] .= "N";
                $_SESSION['TypeStr'] .= ", Fully Intuitive";
                break;
            default :
                echo "Error in Switch";
                break;
        }
    } else if ($number == 15) {
        switch ($PS) {
            case 0 :
                $_SESSION['Type'] .= "F";
                $_SESSION['TypeStr'] .= ", Fully Feeling";
                break;
            case 1 :
                $_SESSION['Type'] .= "F";
                $_SESSION['TypeStr'] .= ", Moderately Feeling";
                break;
            case 2 :
                $_SESSION['Type'] .= "F";
                $_SESSION['TypeStr'] .= ", Slightly Feeling";
                break;
            case 3 :
                $_SESSION['Type'] .= "T";
                $_SESSION['TypeStr'] .= ", Slightly Thinking";
                break;
            case 4 :
                $_SESSION['Type'] .= "T";
                $_SESSION['TypeStr'] .= ", Moderately Thinking";
                break;
            case 5 :
                $_SESSION['Type'] .= "T";
                $_SESSION['TypeStr'] .= ", Fully Thinking";
                break;
            default :
                echo "Error in Switch";
                break;
        }
    } else {
        switch ($PS) {
            case 0 :
                $_SESSION['Type'] .= "J";
                $_SESSION['TypeStr'] .= ", Fully Judging.";
                break;
            case 1 :
                $_SESSION['Type'] .= "J";
                $_SESSION['TypeStr'] .= ", Moderately Judging.";
                break;
            case 2 :
                $_SESSION['Type'] .= "J";
                $_SESSION['TypeStr'] .= ", Slightly Judging.";
                break;
            case 3 :
                $_SESSION['Type'] .= "P";
                $_SESSION['TypeStr'] .= ", Slightly Perceiving.";
                break;
            case 4 :
                $_SESSION['Type'] .= "P";
                $_SESSION['TypeStr'] .= ", Moderately Perceiving.";
                break;
            case 5 :
                $_SESSION['Type'] .= "P";
                $_SESSION['TypeStr'] .= ", Fully Perceiving.";
                break;
            default :
                echo "Error in Switch";
                break;
        }
    }
}

?>
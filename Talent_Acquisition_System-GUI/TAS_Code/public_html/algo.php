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

main();

function main() {

    if (!isset($_SESSION['PSVal'])) {
        $_SESSION['PSVal'] = 0;
    }

    post_question();

    $PS = $_SESSION['PSVal'];

    $wt = htmlspecialchars($_POST['weight']);

    //$a = 1;
    //$b = 5;

    $w = (int) $wt;
    $PS += $w;
    $_SESSION['PSVal'] = $PS;


    /* I've commented out all the sections either coz they are unnecessary or they
     * give a problem while executing. I was debugging for a long time and after several changes
     * found that the code stops at the below for loop. Dont make any changes to the
     * uncommented areas unless you know what you are doing. Esp check the
     * set_weight() function. seems problematic.
     */

    /* for ($i = 0; $i < 6; $i++) {
      set_weight($w, $a, $b);
      $wt = $_POST['weight'];
      $w = (int) $wt;
      $PS += $w;
      }
      /*
      echo "PS= $PS";

      if ($PS < 5) {
      echo "Introvert";
      } else if ($PS >= 5 && $PS < 12) {
      echo "slight Introvert";
      } else if ($PS > 7 && $PS < 17) {
      echo "Ambivert";
      } else if ($PS > 12 && $PS < 19) {
      echo "slight extrovert";
      } else {
      echo "Extrovert";
      } */
}

function post_question() {

    global $client;

    $number = $_POST['value'];

    if ($number < 6) {
        $query = 'MATCH (ss:Scene),(cc:Choice) WHERE (ss.qno = cc.qno = {questionNumber}) RETURN ss,cc';
        $parameters = ['questionNumber' => $number];
        $result = $client->sendCypherQuery($query, $parameters)->getRows();

        $op = json_encode($result);

        if ($op == null) {
            echo "end";
        }
        print_r($op);
    } else {
        echo "end";
    }
}

/*
  function set_weight(int $w, int $a, int $b) {

  switch ($w) {
  case 1: post_question();
  $a = 1;
  $b = ceil(($a + $b) / 2);
  break;
  case 2:
  post_question();
  $a = 2;
  $b = 3;
  break;

  case 3:
  post_question();
  $a = 2;
  $b = 4;
  break;

  case 4:
  post_question();
  $a = 3;
  $b = 4;
  break;

  case 5:
  post_question();
  $a = floor(($a + $b) / 2);
  $b = 5;
  break;

  default:
  //echo("ERROR: problem in set_weight function");
  }
  } */
?>
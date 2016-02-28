<?php
session_start();



if (!isset($_SESSION['username'])) {
    header("Location: logreg.php");
    exit;
}
require_once 'vendor/autoload.php';

use Neoxygen\NeoClient\ClientBuilder;

$usr = "neo4j";
$pwd = "root";

$client = ClientBuilder::create()
        ->addConnection('default', 'http', 'localhost', 7474, true, $usr, $pwd)
        ->setAutoFormatResponse(true)
        ->build();

$type = "infp";

$query = 'MATCH (tt:Type) WHERE (tt.ty = {type}) RETURN tt';
$parameters = ['type' => $type];
$result = $client->sendCypherQuery($query, $parameters)->getRows();

$op = json_encode($result);
$data = json_decode($op);

if ($op == null) {
    exit;
} else {

    $summary = explode("\n", $data->tt[0]->su);
    $portraits = explode("\n", $data->tt[0]->po);
    $traits = explode("\n", $data->tt[0]->tr);
    $strengths = explode("\n", $data->tt[0]->st);
    $weaknesses = explode("\n", $data->tt[0]->we);
    $ppa = explode("\n", $data->tt[0]->ppa);
    $solutions = explode("\n", $data->tt[0]->so);
    $rtlb = explode("\n", $data->tt[0]->rtlb);



    unset($_SESSION['Type']);
    unset($_SESSION['TypeStr']);
}
?>
<html>
    <head>
        <title>Test Page</title>
        <script src="scripts/jquery.js"></script>
        <script src="scripts/materialize.js"></script>
        <link type="text/css" rel="stylesheet" href="styles/materialize.css" />

        <script src="scripts/animation.js"></script>
        <link type="text/css" rel="stylesheet" href="styles/display.css" />
        <link rel="shortcut icon" href="favicon.ico">

    </head>
    <body>

        <!-- Menu bar on top left Start-->
        <a data-activates="slide-out" class="button-collapse">
            <i class="menu_black"></i>
        </a>
        <ul id="slide-out" class="side-nav fixed hidden">
            <li><a name="home" href="home.php">Home</a></li>
            <li><a name="about" href="abouttest.php">About the Test</a></li>
            <li><a name="instructions" href="instructions.php">Instructions</a></li>
            <li><a name="personality" href="personality.php">Personality Types</a></li>
            <li><a name="mbti" href="mbti.php">Take Test</a></li>
            <li><a name="profile" href="profile.php">Your Profile</a></li>
            <li><a name="help" href="help.php">Site Help</a></li>
            <li><a name="developers" href="developers.php">Developers</a></li>
            <li><a name="logout" href="logOut.php">Log Out</a></li>
     
        </ul>
        <!-- Menu bar on top left End-->

        <!-- Logout Trigger -->
        <a style="position:fixed; top:20px; right:20px;" id="members_btn" class="waves-effect waves-light btn red" href="index.php">Log Out</a>

        <div class="instructions container">
            <div class="row">
                <div class="col s12 m12">
                    <div class="card teal darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">General Info :</span>
                            <?php
                            echo "Your Personality Type : <b> " . strtoupper($type) . "</b>";
                            echo '<br><br>';
                            foreach ($summary as $value) {
                                echo "<br> $value";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m6">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Portraits :</span>
                            <?php
                            foreach ($portraits as $value) {
                                echo "<br> $value";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Traits :</span>

                            <?php
                            foreach ($traits as $value) {
                                echo "<br> $value";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="collapsible" data-collapsible="expandable">
                <li>
                    <div class="collapsible-header ">Strengths :</div>
                    <div class="collapsible-body">
                        <p>
                            <?php
                            foreach ($strengths as $value) {
                                echo "<br> $value";
                            }
                            ?>
                        </p>
                    </div>
                </li>

                <li>
                    <div class="collapsible-header ">Weaknesses :</div>
                    <div class="collapsible-body">
                        <p>
                            <?php
                            foreach ($weaknesses as $value) {
                                echo "<br> $value";
                            }
                            ?>
                        </p>
                    </div>
                </li>
            </ul>

            <ul class="collapsible" data-collapsible="expandable">
                <li>
                    <div class="collapsible-header ">Potential Problem Areas :</div>
                    <div class="collapsible-body">
                        <p>
                            <?php
                            foreach ($ppa as $value) {
                                echo "<br> $value";
                            }
                            ?>
                        </p>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header">Solutions :</div>
                    <div class="collapsible-body">
                        <p>
                            <?php
                            foreach ($solutions as $value) {
                                echo "<br> $value";
                            }
                            ?>
                        </p>
                    </div>
                </li>
            </ul>

            <div class="row">
                <div class="col s12 m12">
                    <div class="card red darken-3">
                        <div class="card-content white-text">
                            <span class="card-title">Rules to Live by:</span>
                            <p>
                                <?php
                                foreach ($rtlb as $value) {
                                    echo "<br> $value";
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button at the bottom right for Personality--> 
        <div class="go-btn" style="position: fixed; bottom: 20px; right: 20px;">
            <a class="waves-effect waves-light btn-large" href="personality.php">More Info</a>
        </div>
        <!--Button End -->

        <!-- Button at the bottom left for Home--> 
        <div class="go-btn" style="position: fixed; bottom: 20px; left: 20px;">
            <a class="waves-effect waves-light btn-large " href="home.php">Home</a>
        </div>
        <!--Button End -->



    </body>
</html>
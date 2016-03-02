<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: logreg.php");
    exit;
}
if (!isset($_SESSION['Type'])) {
    header("Location: profile.php");
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



$userid = $_SESSION['userid'];
$type = $_SESSION['Type'];
$typestr = $_SESSION['TypeStr'];

$query = 'MATCH (tt:Type),(u:User) where tt.ty = {type} and u.email = {userid} RETURN tt,u';
$parameters = ['type' => $type, 'userid' => $userid];
$result = $client->sendCypherQuery($query, $parameters)->getRows();

$op = json_encode($result);
$data = json_decode($op);


$fname = $data->u[0]->fname;
$lname = $data->u[0]->lname;


if ($_SESSION['flag'] == "1") {
    $query = 'MATCH (tt:Type),(u:User) WHERE u.email = {userid} and tt.ty = {type} CREATE (u)-[r:HAS_RESULT {str : {typestr}}]->(tt) RETURN tt';
    $parameters = ['type' => $type, 'typestr' => $typestr, 'userid' => $userid];
    $result = $client->sendCypherQuery($query, $parameters)->getRows();
}

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
        <title>Result</title>
        <script src="scripts/jquery.js"></script>
        <script src="scripts/materialize.js"></script>
        <link type="text/css" rel="stylesheet" href="styles/materialize.css" />

        <script src="scripts/animation.js"></script>
        <link type="text/css" rel="stylesheet" href="styles/display.css" />
        <link rel="shortcut icon" href="favicon.ico">

    <scrip>

    </scrip>

</head>
<body>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        img:hover  { 
            border: solid 0px #CCC; 
            box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.5); 
        }
        .collapsible-body {
            padding : 5px;
        }
        .collapsible-header {
            font-size: 1.2em;
            text-align: center;

        }
        .collapsible-header:hover {
            box-shadow: 0px 0px 3px 3px rgba(0,0,0,0.3); 
            font-weight: bold;
        }


        @media print {
            * { 
                background: transparent !important; 
                color: black !important; 
                text-shadow: none !important; 
                filter:none !important;
                -ms-filter: none !important; } 
            p a, p a:visited { 
                color: #444 !important; 
                text-decoration: underline; 
            }
            p a[href]:after { content: " (" attr(href) ")"; }
            abbr[title]:after { content: " (" attr(title) ")"; }
            .ir a:after, a[href^="javascript:"]:after, a[href^="#"]:after { content: ""; }
            pre, blockquote { 
                border: 1px solid #999; 
                page-break-inside: avoid; 
            }
            thead { display: table-header-group; } 
            tr, img { page-break-inside: avoid; }
            @page { margin: 0.5cm; }
            p, h2, h3 { orphans: 3; widows: 3; }
            h2, h3{ page-break-after: avoid; }
            .hide-on-print { display: none !important; }
            .print-only { display: block !important; }

            .collapsible-body {
                display:anything;
            }

        }
    </style>


    <!-- Print Content Start -->

    <div class="row hidden print-only" >
        <div class="col s12 m12 print-only hidden">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <?php
                    echo '<span class="card-title" style="text-align:center;"> Certificate </span>
                        <p> This is to certify that ' . $fname . ' ' . $lname . ' has 
                     successfully completed the standard test 
                        prescribed by TAS  on ' . date("d/m/Y") . ' and has acquired following results.
                        </p> ';
                    ?>
                </div>
            </div>
        </div>
        <div class="col s12 m12">
            <div class="card blue-grey darken-1">
                <div class="card-content">
                    <?php echo "<h3>Personality Type : <b> " . strtoupper($type) . "</b></h3>"; ?>
                    <?php
                    echo $typestr;
                    echo "<br><h5><b>General Info : </b></h5>";
                    foreach ($summary as $value) {
                        echo "<br> $value <br>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col s12 m12">
            <div class="card blue-grey darken-1">
                <div class="card-content">
                    <span class="card-title">Traits :</span>
                    <?php
                    foreach ($traits as $value) {
                        echo "<br> $value <br>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col s12 m12">
            <div class="card blue-grey darken-1">
                <div class="card-content">
                    <span class="card-title">Strengths :</span>

                    <?php
                    foreach ($strengths as $value) {
                        echo "<br> $value <br>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col s12 m12">
            <div class="card blue-grey darken-1">
                <div class="card-content">
                    <span class="card-title">Weaknesses :</span>

                    <?php
                    foreach ($weaknesses as $value) {
                        echo "<br> $value <br>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col s12 m12">
            <div class="card blue-grey darken-1">
                <div class="card-content">
                    <span class="card-title">Potential Problem Areas :</span>

                    <?php
                    foreach ($ppa as $value) {
                        echo "<br> $value <br>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col s12 m12">
            <div class="card blue-grey darken-1">
                <div class="card-content ">
                    <span class="card-title">Solutions :</span>

                    <?php
                    foreach ($solutions as $value) {
                        echo "<br> $value <br>";
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="col s12 m12">
            <div class="card blue-grey darken-1">
                <div class="card-content ">
                    <span class="card-title">10 Rules to Live By :</span>

                    <?php
                    foreach ($rtlb as $value) {
                        echo "<br> $value <br>";
                    }
                    ?>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col s12 m12">
                <div class="card red darken-3">
                    <div class="card-content ">

                        @Certified By TAS Agent Signature : 

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Print Content End -->


    <!-- Content to be show on display -->
    <div class='hide-on-print'>
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
        <a style="position:fixed; top:20px; right:20px;" class="waves-effect waves-light btn red" href="logOut.php">Log Out</a>


        <div class="instructions container">
            <div class="row">
                <div class="col s12 m12">
                    <div class="card teal darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">
                                <?php echo "<h3>Your Personality Type : <b> " . strtoupper($type) . "</b></h3>"; ?>
                            </span>
                            <?php
                            echo $typestr;
                            echo "<br><h5><b>General Info : </b></h5>";
                            foreach ($summary as $value) {
                                echo "<br> $value <br>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" >
                <div class="col s12 m8">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Traits :</span>

                            <?php
                            foreach ($traits as $value) {
                                echo "<br> $value <br>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Profession Portraits :</span>
                            <br><br>
                            <?php
                            foreach ($portraits as $value) {
                                echo "$value";
                                echo '<img class = "materialboxed" data-caption = "' . $value . '" style = "width : 100%; border: 3px solid white;" src = "images/portraits/' . $value . '.jpg" /><br><br>';
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>

            <ul class="collapsible" data-collapsible="expandable">
                <li>
                    <div class="collapsible-header indigo darken-4 white-text">Strengths (Click to Expand)</div>
                    <div class="collapsible-body">
                        <p>
                            <?php
                            foreach ($strengths as $value) {
                                echo "<br> $value <br>";
                            }
                            ?>
                        </p>
                    </div>
                </li>

                <li>
                    <div class="collapsible-header deep-purple lighten-2">Weaknesses</div>
                    <div class="collapsible-body">
                        <p>
                            <?php
                            foreach ($weaknesses as $value) {
                                echo "<br> $value <br>";
                            }
                            ?>
                        </p>
                    </div>
                </li>
            </ul>

            <ul class="collapsible" data-collapsible="expandable">
                <li>
                    <div class="collapsible-header  teal darken-4 white-text">Potential Problem Areas</div>
                    <div class="collapsible-body">
                        <p>
                            <?php
                            foreach ($ppa as $value) {
                                echo "<br> $value <br>";
                            }
                            ?>
                        </p>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header  lime lighten-1">Solutions</div>
                    <div class="collapsible-body">
                        <p>
                            <?php
                            foreach ($solutions as $value) {
                                echo "<br> $value <br>";
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
                            <span class="card-title">10 Rules to Live by :</span>
                            <p>
                                <?php
                                foreach ($rtlb as $value) {
                                    echo "<br> $value <br>";
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Structure -->
        <div id="moreInfo" class="modal">
            <div class="modal-content">

            </div>
            <div class="modal-footer">
                <a class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
            </div>
        </div>

        <!-- Button at the bottom right for Personality--> 
        <div class="go-btn" style="position: fixed; bottom: 20px; right: 20px;">
            <a class="waves-effect waves-light btn-large indigo" href="personality.php">More Info</a>
        </div>
        <!--Button End -->

        <!-- Button at the bottom left for Home--> 
        <div class="go-btn" style="position: fixed; bottom: 20px; left: 20px;">
            <a class="waves-effect waves-light btn-large" onclick="window.print()">Certificate</a>
        </div>
        <!--Button End -->

    </div>


</body>
</html>
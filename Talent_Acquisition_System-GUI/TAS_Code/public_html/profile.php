<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: logreg.php");
    exit;
}
$_SESSION['flag'] = "0";
$_SESSION['picpath'] = "images/profile_pics/$_SESSION[username].jpg";
if (!file_exists($_SESSION['picpath'])) {
    $_SESSION['picpath'] = "images/profile_pics/default_profile.jpg";
}
require_once 'vendor/autoload.php';

use Neoxygen\NeoClient\ClientBuilder;

$usr = "neo4j";
$pwd = "root";
$client = ClientBuilder::create()
        ->addConnection('default', 'http', 'localhost', 7474, true, $usr, $pwd)
        ->setAutoFormatResponse(true)
        ->build();


$query = "Match (u:User)-[r]->(t:Type) Where u.email = {userid} Return *";
$parameters = ['userid' => $_SESSION['userid']];
$result = $client->sendCypherQuery($query, $parameters)->getRows();

$op = json_encode($result);
$data = json_decode($op);

if ($data == null) {
    $query = "Match (u:User) Where u.email = {userid} Return *";
    $parameters = ['userid' => $_SESSION['userid']];
    $result = $client->sendCypherQuery($query, $parameters)->getRows();

    $op = json_encode($result);
    $data = json_decode($op);
}

$fname = $data->u[0]->fname;
$lname = $data->u[0]->lname;
$userid = $data->u[0]->email;

$age = "Not Added";
$gender = "Not Added";
$country = "Not Added";
if (isset($data->u[0]->age)) {
    $age = ($data->u[0]->age);
}
if (isset($data->u[0]->gender)) {
    $gender = ($data->u[0]->gender);
}
if (isset($data->u[0]->country)) {
    $country = ($data->u[0]->country);
}
?>
<html>
    <head>
        <title>Your Profile</title>
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
            <li><a name="about" href="abouttest.html">About the Test</a></li>
            <li><a name="instructions" href="instructions.php">Instructions</a></li>
            <li><a name="personality" href="personality.php">Personality Types</a></li>
            <li><a name="mbti"  href="mbti.php">Take Test</a></li>
            <!--<li><a name="profile" class = "disabled">Your Profile</a></li>-->
            <li><a name="help" href="help.php">Site Help</a></li>
            <li><a name="developers" href="developers.php">Developers</a></li>
            <li><a name="logout" href="logOut.php">Log Out</a></li>

        </ul>
        <!-- Menu bar on top left End-->

        <a style="position:fixed; top:20px; right:20px;" class="waves-effect waves-light btn red" href="logOut.php">Log Out</a>

        <!--Image Card -->

        <div class = "container">
            <div class='row'>
                <div class = "col s12 m6">
                    <div class="card large">

                        <div class="card-image waves-effect waves-block waves-light">
                            <?php
                            echo '<img class="activator"  style="" src="' . $_SESSION['picpath'] . '"> </img>';
                            ?>
                        </div>
                        <div class="card-content">
                            <span class="card-title grey-text text-darken-4">
                                <?php
                                echo " Welcome <a class='activator' style='cursor:pointer;'>$fname $lname</a>";
                                ?>
                            </span>
                            <br><br>
                            <p>
                                Click on your name or profile pic to view/add more information about yourself.
                            </p>
                        </div>

                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"> 
                                Details - 
                                <i class="card_bth close_black" style="position:fixed; top:10px;right:10px;">Close</i>
                                <?php
                                echo "<span style='font-size:0.75em;'>
                                <br><hr>First Name : $fname
                                <br><hr>Last Name : $lname
                                <br><hr>Username : $userid
                                <br><hr>Age :   $age
                                <br><hr>Gender :    $gender
                                <br><hr>Country :    $country
                                <br><hr>                                
                                </span> ";
                                ?>   
                            </span>
                            <br><br>
                            <a href="#addInfo" style="position:fixed; bottom:10px;right:10px;" class="modal-trigger">
                                Add Info
                            </a>

                            <a href="#addPic" style="position:fixed; bottom:10px; left:10px;"  class="modal-trigger">
                                Change Pic
                            </a>
                        </div>

                    </div>
                </div>
                <div class = "col s12 m6">
                    <div class = "card">
                        <div class = "card-content">
                            <div class ="card-title">
                                Previous Results :
                                <br>
                            </div>
                            <?php
                            if (isset($data->t[0])) {
                                $_SESSION['Type'] = $data->t[0]->ty;
                                $_SESSION['TypeStr'] = $data->r[0]->str;
                                echo '<a href = "result.php"> Check Last Result</a>';
                            } else {
                                
                            }
                            ?>
                            <hr>
                            <?php
                            for ($i = 0; $i <= 16; $i++) {

                                if (isset($data->t[$i])) {
                                    echo ' ' . $i + 1 . '. <b>';
                                    $t = strtoupper($data->t[$i]->ty);

                                    echo "$t</b><br><p>";
                                    print_r($data->r[$i]->str);
                                    echo "</p><hr>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Image Card End -->


        <div id="addInfo" class="modal ">
            <div class="modal-content">
                <form action="profileProcessing.php" method="post">
                    <div class = "row">
                        <div class = "input-field col s12 m3">
                            <input type="number" name="age" min="13" max='90' required autofocus/> 
                            <label for = "age">Age</label>
                        </div>
                        <div class = "input-field col s12 m3">
                            <select name="gender" class='browser-default'>
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class = "input-field col s12 m3">
                            <input type="text" name="cou" required />
                            <label for="cou">Country</label>
                        </div>
                        <div class = "col s12 m3">
                            <button type="submit" class="btn-floating btn-large red" style="float:right;">
                                <i class="send_white"></i>
                            </button>
                        </div>
                    </div>
                    <div class="progress">
                        <div id="progressBar"></div>
                    </div>
                </form>
            </div>
        </div>

        <div id="addPic" class="modal ">
            <div class="modal-content">
                <form action="profileProcessing.php" method="post" enctype="multipart/form-data">
                    <label>Select Your Profile Image : </label>
                    <input type="file" name="file" required />
                    <input type="submit" />
                </form>
                <div class="progress">
                    <div id="progressBar"></div>
                </div>
                <ul>
                    <li>Only jpg Images allowed</li>
                    <li>Max size 2 MB</li>
                    <li>Only One image can be uploaded at a time</li>
                </ul>
            </div>
        </div>


        <!-- Button at the bottom left--> 
        <div class="go-btn" style="position: fixed; bottom: 20px; left: 20px;">
            <a class="waves-effect waves-light btn-large green" style="cursor:help;">Help</a>
        </div>
        <!--Button End -->


        <!-- Button at the bottom middle--> 
        <div class="go-btn" style="position: fixed; bottom: 20px; left: 46%;">
            <a class="waves-effect waves-light btn-large " href="home.php">Home</a>
        </div>
        <!--Button End -->


        <!-- Button at the bottom right--> 
        <div class="go-btn" style="position: fixed; bottom: 20px; right: 20px;">
            <a class="waves-effect waves-light btn-large indigo" href="mbti.php">Take Test</a>
        </div>
        <!--Button End -->

    </body>
</html>





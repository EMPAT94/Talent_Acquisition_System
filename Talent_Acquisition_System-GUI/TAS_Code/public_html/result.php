<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: logreg.php");
    exit;
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
        <!-- Login Registration Form Trigger -->
        <a style="position:fixed; top:20px; right:20px;" id="members_btn" class="waves-effect waves-light btn" href="profile.php">Profile</a>

        <?php /*
          require_once 'vendor/autoload.php';

          use Neoxygen\NeoClient\ClientBuilder;

          $usr = "neo4j";
          $pwd = "root";

          $client = ClientBuilder::create()
          ->addConnection('default', 'http', 'localhost', 7474, true, $usr, $pwd)
          ->setAutoFormatResponse(true)
          ->build();

          echo "Your current number is : ";
          echo $PS;
         */ ?>

        <div class="instructions container">
            <div class="row">
                <div class="col s12 m6">
                    <div class="card teal darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Statistics : </span>
                            <?php
                            $PS = $_SESSION['PSVal'];
                            echo "<br><br>";
                            echo "Sum of Weights :  ";
                            echo $PS;
                            echo "<br><br>";

                            echo "Your Trait (Sample) :  ";
                            if ($PS < 6) {
                                echo "Introvert";
                            } else if ($PS > 5 && $PS < 8) {
                                echo "Ambivert";
                            } else {
                                echo "Extrovert";
                            }
                            echo "<br><br>";
                            echo "Result not yet caliberated!";
                            
                            unset($_SESSION['PSVal']);
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6">
                    <div class="card teal darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">General Info :</span>
                            About the Personality
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m6">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Portraits :</span>
                            Some Images here
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Traits :</span>
                            Pointers here
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m6">
                    <div class="card indigo darken-3">
                        <div class="card-content white-text">
                            <span class="card-title">Career Options :</span>
                            <br>1 <br>2 <br>3
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="card indigo darken-3">
                        <div class="card-content white-text">
                            <span class="card-title">Personal :</span>
                            <br>1 <br>2 <br>3
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m12">
                    <div class="card red darken-3">
                        <div class="card-content white-text">
                            <span class="card-title">Rules to Live by:</span>
                            <br>1 <br>2 <br>3
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button at the bottom right for Personality--> 
        <div class="go-btn" style="position: fixed; bottom: 20px; right: 20px;">
            <a class="waves-effect waves-light btn-large" href="personality.html">More Info</a>
        </div>
        <!--Button End -->

        <!-- Button at the bottom right for Home--> 
        <div class="go-btn" style="position: fixed; bottom: 20px; left: 20px;">
            <a class="waves-effect waves-light btn-large " href="home.php">Home</a>
        </div>
        <!--Button End -->
        
        

    </body>
</html>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    $flag = true;
} else {
    $flag = false;
}
?>
<html>
    <head>
        <title>Site Help</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="scripts/jquery.js"></script>
        <script src="scripts/materialize.js"></script>
        <link type="text/css" rel="stylesheet" href="styles/materialize.css" />

        <script src="scripts/animation.js"></script>
        <link type="text/css" rel="stylesheet" href="styles/display.css" />
        <link rel="shortcut icon" href="favicon.ico">
    </head>

    <body> 
        <style>

            img {                
                width: 100%;
            }
        </style>
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
            <li><a name="help" href="help.php">Site Help</a></li>
            <!--<li><a name="developers" href="developers.php">Developers</a></li>-->
            <?php
            if (!$flag) {
                echo '<li><a name="profile" href="profile.php">Your Profile</a></li><li><a name="logout" href="logOut.php">Log Out</a></li>';
            } else {
                echo '<li><a name="logout" href="logreg.php">Log In</a></li>';
            }
            ?>
        </ul>
        <!-- Menu bar on top left End-->

        <!-- Login Registration Form Trigger OR Profile Display -->
        <?php
        if ($flag) {    //if flag == true (user is not logged in)
            echo '<a style = "position:fixed; top:20px; right:20px;" id = "members_btn" class =  "modal-trigger waves-effect waves-light btn" href = "#LRForm">Members</a>';
        } else {
            echo '  <div class="chip" style = "position:fixed; top:20px; right:20px;"> <img src="' . $_SESSION['picpath'] . '" alt="Contact Person">' . $_SESSION['username'] . ' </div>';
        }
        ?>

        <!-- Login Registration Form Start -->
        <div id="LRForm" class="modal">
            <div class="modal-content">

                <!-- Login Form -->
                <form action="logProcessing.php" method="post"  class = "login col s12" >
                    <div class = "row">
                        <div class = "input-field col s5">
                            <input name = "l_email" type = "email" class = "validate" required autofocus>
                            <label for = "l_email">Email</label>
                        </div>
                        <div class = "input-field col s5">
                            <input name = "l_pwd" type = "password" class = "validate" required >
                            <label for = "l_pwd">Password</label>
                        </div>
                        <div class = "input-field col s2">
                            <button type="submit" class="btn-floating btn-large red" style="float:right;"><i class="send_white"></i></button>
                        </div>
                    </div>
                </form>

                <!-- Registration Form -->
                <form name="log"  action="regProcessing.php" method="post"  class = "col s12 register hidden" >
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input name="first_name" type="text" class="validate" required autofocus>
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input name="last_name" type="text" class="validate" required >
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input name="password" type="password" class="validate" required >
                            <label for="password">Password</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input name="confirm" type="password" class="validate" required >
                            <label for="confirm">Confirm Password</label>
                        </div>                                             
                        <div class="col s12 m12">
                            <label class="red-text">Password Must Contain min 6 characters with 1 Uppercase, 1 Lowercase and 1 Number.</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10 m10">
                            <input name="email" type="email" class="validate" required  >
                            <label for="email">Email</label>
                        </div>
                        <div class = "input-field col s2 m2">
                            <button type="submit" class="btn-floating btn-large red" style="float:right;">
                                <i class="send_white"></i>
                            </button>
                        </div>
                    </div>  
                </form>
            </div>

            <div class="progress">
                <div id="progressBar" class=""></div>
            </div>

            <div class="modal-footer" >
                <a class="modal-action waves-effect waves-green btn-flat " style="float:left" id="logreg">Register</a>
                <a class="modal-action modal-close waves-effect waves-green btn-flat" style="text-align:left;">Close</a>
            </div>
        </div>
        <!-- Login Registration Form End -->


        <div class='container'>
            <div class='row'>
                <div class='col s12 m12'>
                    <div class='card teal darken-4'>
                        <div class='card-content orange-text text-lighten-2'>
                            <blockquote>
                                This site has been developed as a Final Year Project by
                                team of 4 students with interest in analytical psychology

                                We hail from <a href="http://www.fcrit.ac.in/"> Fr. Conceicao Rodrigues Institue of Technology, Vashi </a>
                                (Information Technology Dept.)                                
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='container'>
            <div class='row'>
                <div class='col s2 m2'>
                    <div class='card'>
                        <div class='card-image'>
                            <img class="materialboxed" src="images/profile_pics/Pritesh.jpg">
                        </div>
                    </div>
                </div>
                <div class='col s4 m4'>
                    <div class='card'>
                        <div class='card-content'>
                            <div class="card-title">
                                Lead Developer
                            </div>
                            Pritesh Tupe
                            <a>priteshtupe@gmail.com</a>
                        </div>
                    </div>
                </div>

                <div class='col s2 m2'>
                    <div class='card'>
                        <div class='card-image'>
                            <img class="materialboxed" src="images/profile_pics/Swati.jpg">
                        </div>
                    </div>
                </div>
                <div class='col s4 m4'>
                    <div class='card'>
                        <div class='card-content'>
                            <div class="card-title">
                                Content Incharge
                            </div>
                            Swati Suvarna
                            <a>swatisuvarna18@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col s2 m2'>
                    <div class='card'>
                        <div class='card-image'>
                            <img class="materialboxed" src="images/profile_pics/Swapnali.jpg">
                        </div>
                    </div>
                </div>
                <div class='col s4 m4'>
                    <div class='card'>
                        <div class='card'>
                            <div class='card-content'>
                                <div class="card-title">
                                Head Designer
                                </div>
                                Swapnali Tambe
                                <a>swapnalitambe13@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='col s2 m2'>
                    <div class='card'>
                        <div class='card-image'>
                            <img class="materialboxed" src="images/profile_pics/Deepak.jpg">
                        </div>
                    </div>
                </div>
                <div class='col s4 m4'>
                    <div class='card'>
                        <div class='card'>
                            <div class='card-content'>
                                <div class="card-title">
                                Resource Manager
                                </div>
                                Deepak Mali
                                <a>deepakmmali8898@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!--Button at the bottom left for Back-->
        <div class = "go-btn" style = "position: fixed; bottom: 20px; left: 20px;">
            <a class = "waves-effect waves-light btn-large " id = "back">Back</a>
        </div>
        <!--Button End -->

    </body>
</html>





<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: profile.php");
    exit;
}
?>
<html>
    <head>
        <title>Login / Register</title>
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
            <li><a name="developers" href="developers.php">Developers</a></li>         
        </ul>
        <!-- Menu bar on top left End-->

        <br><br>

        <div class="container quote red-text" >
            <p> Some sections of this site require you to be registered. If you were redirected here, login with your 
                registered account else if you don't have one, make an account
                and sign in to utilize that section.
                Apologies for inconvenience, if any. Hope you find our service worthwhile. </p> 
        </div>
        <br><br>
        <!-- Login Registration Form Start -->
        <div class="container">
            <div class="card" style="padding:2%;">
                <!-- Login Form -->
                <form action="logProcessing.php" method="post"  class = "login col s12 " >
                    <div class = "row">
                        <div class = "input-field col s12 m5">
                            <input name = "l_email" type = "email" class = "validate" required autofocus>
                            <label for = "l_email">Email</label>
                        </div>
                        <div class = "input-field col s10 m5">
                            <input name = "l_pwd" type = "password" class = "validate" required >
                            <label for = "l_pwd">Password</label>
                        </div>
                        <div class = "input-field col s2 m2">
                            <button type="submit" class="btn-floating btn-large red" style="float:right;"><i class="send_white"></i></button>
                        </div>
                    </div>
                </form>

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


                <div class="progress">
                    <div id="progressBar" class=""></div>
                </div>

                <div class="modal-footer" >
                    <a class="modal-action waves-effect waves-green btn-flat " style="text-align:left;" id="logreg">Register</a>
                </div>
            </div>
        </div>
        <!-- Login Registration Form End -->


        <!-- Button at the bottom left for Back--> 
        <div class="go-btn" style="position: fixed; bottom: 20px; left: 20px;">
            <a class="waves-effect waves-light btn-large " id="back">Back</a>
        </div>
        <!--Button End -->
    </body>
</html>

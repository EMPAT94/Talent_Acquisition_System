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

            .collapsible-body {
                padding : 5px;
            }
            .collapsible-header {
                text-align: center;
                font-family: "Courier New", Courier, monospace;
                font-size: 2em;

            }
            .collapsible-header:hover {
                font-weight: bold;
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
            <!--<li><a name="personality" class = "disabled" >Personality Types</a></li>-->
            <li><a name="mbti" href="mbti.php">Take Test</a></li>
            <li><a name="profile" href="profile.php">Your Profile</a></li>
            <li><a name="help" href="help.php">Site Help</a></li>
            <li><a name="developers" href="developers.php">Developers</a></li>
            <?php
            if (!$flag) {
                echo '<li><a name="logout" href="logOut.php">Log Out</a></li>';
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
                                This page has been designed keeping  in mind the unfamiliarity of a new user to
                                specifically the TAS site; universally understood or clearly 
                                described elements have been skipped. Each of the pane below corresponds
                                to a special module that is native to TAS site.
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>

            <div class='row'>
                <div class="card cols s12 m12">
                    <div class="card-content">
                        <div class="card-title">Login Register Magic</div>
                        <br>
                        Our magical login register module can detect when you are logged in and when you are not. 
                        <br>If you are logged in, it shows your profile picture along with your name <img src="images/help/login1.png" /> 
                        Else is shows a <img src="images/help/login2.png" /> button from where you can login or register to TAS.
                        <br><br>Once you click on the above Member's button, you'll see a popup box for Login. If you wish to register,
                        simply click on the "Register" text at the bottom left of the pop up box. In case you wish to Login again,
                        click on the "Login" text that appears at the same position. 
                        <br><br>All login/register functions are handled
                        by this module, and any message regarding your login or registration comes as a Toast message on the top right,
                        so keep your eyes peeled. 
                    </div>
                </div>
            </div>

            <div class='row'>
                <div class="card cols s12 m12">
                    <div class="card-content">
                        <div class="card-title">Ever Present Menu</div>
                        <p>
                            A Hamburger symbol <img src="icons/menu_black.svg" /> is present on all the pages
                            of this site to facilitate easy navigation to any section of the site from your current
                            page.
                            <br><br>
                            You can see the symbol on the top left corner of the page. Want to try it out? Go on, click it.
                            To hide the menu, just click on any other section of the page. 
                            <br><br>
                            Note that this is a smart menu, so the list changes depending on your current state and page.
                            e.g. if you are logged in, then you'll see an option to log out at the bottom. If you aren't
                            logged in, then you won't see it.                                   
                        </p>
                    </div>
                </div>
            </div>

            <div class='row'>
                <div class="card cols s12 m12">
                    <div class="card-content">
                        <div class="card-title">All Purpose Send</div>
                        <p>
                            The Send button <img src="images/help/send.png" /> facilitates the server request initiation.
                            <br><br>
                            Whenever you see this button, know that whatever data is present in front of you will be
                            sent to the backend for further processing.
                            <br><br>
                            Certain scenarios where this button is seen are on the login/register module and while giving
                            the test to submit your prefered choice.
                        </p>
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





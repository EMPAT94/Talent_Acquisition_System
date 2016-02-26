<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: logreg.php");
    exit;
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
            <li><a name="instructions" href="instructions.html">Instructions</a></li>
            <li><a name="personality" href="personality.html">Personality Types</a></li>
            <li><a name="mbti" class = "disabled" href="mbti.php">Take Test</a></li>
            <li><a name="profile" href="profile.php">Your Profile</a></li>
            <li><a name="help" href="help.html">Site Help</a></li>
            <li><a name="developers" href="developers.html">Developers</a></li>
        </ul>
        <!-- Menu bar on top left End-->

        <a style="position:fixed; top:20px; right:20px;" class="waves-effect waves-light btn" href="index.php">LogOut</a>

        <!--Image Card -->
        <div class = "container row">
            <div class = "col s12 m6">
                <div class = "card">
                    <div class = "card-image">
                        <?php
                        echo '<img src="images/profile_pics/default_profile.jpg"> </img>';
                        ?>
                    </div>
                    <div class ="card-title">
                        <?php
                        echo " Welcome $_SESSION[username]";
                        ?>
                    </div>
                    <div class = "card-content">
                        Profile Data Will Come Here
                    </div>
                </div>
            </div>

            <div class = "col s12 m6">
                <div class = "card">
                    <div class = "card-image">
                        <?php
                        echo '<img src="images/profile_pics/default_profile.jpg"> </img>';
                        ?>
                    </div>
                    <div class ="card-title">
                        <?php
                        echo " Welcome $_SESSION[username]";
                        ?>
                    </div>
                    <div class = "card-content">
                        Profile Data Will Come Here
                    </div>
                </div>
            </div>
        </div>
        <!--Image Card End -->

        <!-- Button at the bottom right for Login/Registration--> 
        <div class="go-btn" style="position: fixed; bottom: 20px; right: 20px;">
            <a class="waves-effect waves-light btn-large" href="mbti.php">Take Test</a>
        </div>
        <!--Button End -->

        <!-- Button at the bottom right for Help--> 
        <div class="go-btn" style="position: fixed; bottom: 20px; left: 20px;">
            <a class="waves-effect waves-light btn-large ">Help</a>
        </div>
        <!--Button End -->

        <!-- Button at the bottom middle for Home--> 
        <div class="go-btn" style="position: fixed; bottom: 20px; left: 46%;">
            <a class="waves-effect waves-light btn-large " href="home.php">Home</a>
        </div>
        <!--Button End -->
    </body>
</html>





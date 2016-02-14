<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
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

        <a style="position:fixed; top:20px; right:20px;" class="waves-effect waves-light btn" href="index.php">LogOut</a>

        <!--Image Card -->
        <div class = "container row">
            <div class = "col s10 m12">
                <div class = "card purple accent-3">
                    <div class = "card-image">
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
        <div class="go-btn" style="position: fixed; bottom: 20px; left: 50%;">
            <a class="waves-effect waves-light btn-large " href="home.php">Home</a>
        </div>
        <!--Button End -->
    </body>
</html>





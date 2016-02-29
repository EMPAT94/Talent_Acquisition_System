<!DOCTYPE html>
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
        <title>TAS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="scripts/jquery.js"></script>
        <script src="scripts/materialize.js"></script>
        <link type="text/css" rel="stylesheet" href="styles/materialize.css" />

        <script src="scripts/animation.js"></script>
        <link type="text/css" rel="stylesheet" href="styles/display.css" />
        <link rel="shortcut icon" href="favicon.ico">
        <script>
            $(document).ready(function () {

                document.getElementsByName('home').disabled = true;

                $('.parallax-container').css('height', $(window).height());

                var root = $('html, body');
                $('#down-button').click(function () {
                    if (ht < $(document).height()) {
                        $(root).animate({
                            scrollTop: ht
                        }, 3000);
                    }
                    ht = ht + ht;
                    return false;
                });



            });
        </script>
    </head>


    <body>
        <style>
            .content{
                margin-left: 2%;
                padding: 2%;
                position:absolute; 
                bottom:0px;
                background-color: rgba(0,0,0,0.7);
            }
        </style>


        <!-- Menu bar on top left Start-->
        <a data-activates="slide-out" class="button-collapse">
            <i class="menu_black"></i>
        </a>
        <ul id="slide-out" class="side-nav fixed hidden">
            <!--<li><a name="home" class = "disabled">Home</a></li>-->
            <li><a name="about" href="abouttest.php">About the Test</a></li>
            <li><a name="instructions" href="instructions.php">Instructions</a></li>
            <li><a name="personality" href="personality.php">Personality Types</a></li>
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


        <!-- Login Registration Form Trigger -->
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
                        <div class="input-field col s6">
                            <input name="first_name" type="text" class="validate" required autofocus>
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="last_name" type="text" class="validate" required >
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="password" type="password" class="validate" required >
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10">
                            <input name="email" type="email" class="validate" required  >
                            <label for="email">Email</label>
                        </div>
                        <div class = "input-field col s2">
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
                <a class="modal-action waves-effect waves-green btn-flat " style="text-align:left;" id="logreg">Register</a>
                <a class="modal-action modal-close waves-effect waves-green btn-flat" style="text-align:left;">Close</a>
            </div>
        </div>
        <!-- Login Registration Form End -->

        <!-- Parallax Images and Content Start-->
        <div>
            <div class="parallax-container" id="About">
                <div class="parallax"><img src="images/Testing.jpg" alt=""/></div>

                <div class="row container content ">
                    <h2 class="header "><a href="abouttest.html" class="yellow-text text-lighten-2">About MBTI and the Test</a></h2>
                    <p class="white-text">
                        Swiss psychiatrist Carl Jung developed a theory early in the 20th century to describe basic 
                        individual preferences and explain similarities and differences between people.
                        <br><br>
                        In 1921, Jung published Psychological Types, 
                        introducing the idea that each person has a psychological type. 
                        The academic language of the book made it hard to read and so few people 
                        could understand and use the ideas for practical purposes.
                        <br><br>
                        During World War II, two American women, Isabel Briggs Myers and her mother 
                        Katharine Cook Briggs, set out to find an easier way for people to use Jung's 
                        ideas in everyday life. They wanted people to be able to identify their 
                        psychological types without having to sift through Jung's academic theory.</p>
                </div>
            </div>

            <div class="parallax-container" id="Instructions">
                <div class="parallax"><img src="images/instructions.jpg"></div>

                <div class="row container content">
                    <h2 class="header"><a href="instructions.html"  class="deep-orange-text text-accent-1">Instructions for the Test</a></h2>
                    <p class="white-text ">
                        Instructions are an important aspect to the any setting. 
                        If one is having trouble following directions, they should try to examine 
                        why this is happening. The reason could be an underlying problem, like a disinterest 
                        in the subject matter, or it may very well be the
                        instructions that are confusing and hard to understand.
                        <br><br>
                        Following instructions is very necessary in case of our MBTI test, as the results are
                        hinged on user being able to correctly understand, answer and examine all aspects of our system.
                    </p>
                </div>
            </div>

            <div class="parallax-container" id="Personality">
                <div class="parallax"><img src="images/Personalities.jpg" alt=""/></div>
                <div class="row container content">
                    <h2 class="header"><a href="personality.html" class="indigo-text text-darken-1">Personality Profiles List</a></h2>
                    <p class="white-text">
                        "It is up to each person to recognize his or her true preferences."
                        <br><br>
                        -Isabel Briggs Myers
                        <br><br><br><br>
                        The 16 personality types of the Myers-Briggs Type Indicator
                        are listed on this page (click 'personalities' button below), follow on page guide to get extensive information on
                        any personality type.</p>
                </div>
            </div>
            <div class="parallax-container" id="Test">
                <div class="parallax"><img src="images/ready.jpg" alt=""/></div>
                <div class="row container content">
                    <h2 class="header"><a href="mbti.php" class="blue-grey-text">Take the MBTI test NOW!</a></h2>
                    <p class="white-text">What are you waiting for? Note that you need to be registered to take the test.</p>
                </div>
            </div>
        </div>
        <!-- Parallax Images and Content End-->

    </body>
</html>

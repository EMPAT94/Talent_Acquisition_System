<?php
session_start();
if (!isset($_SESSION['username'])) {
    $flag = true;
} else {
    $flag = false;
}
?>
<!--
The start page of our web site. It includes a "welcome" animation along with the
brain and brain parts with instructions for new user. This page must be visited just
once for every time a user logs in, rest of the linking will be handled by home.html
-->
<html>
    <head>
        <title>TAS</title>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">

        <script src = "scripts/jquery.js"></script>
        <script src="scripts/materialize.js"></script>
        <link type="text/css" rel="stylesheet" href="styles/materialize.css" />

        <script src="scripts/animation.js"></script>
        <link type="text/css" rel="stylesheet" href="styles/display.css" />
        <link rel="shortcut icon" href="favicon.ico">

        <script>
            $(document).ready(function () {
                var welcome = $('.welcome');
                var brainParts = $('.brainParts');

                $(welcome).delay('fast').fadeIn('slow'); //fadeIn the logo
                $(welcome).delay('slow').fadeOut('slow'); //fadeOut the welcome text
                $('.rest').delay(2000).slideDown(1000); //slide down the brain section

                /* this code creates the brain explode animation */
                $('#brain').click(function () {
                    $(this).closest('div').delay('fast').fadeOut();
                    $(this).closest('.mainBrain').find('.brainParts').delay('slow').fadeIn('slow');
                    $('#clickBrain2').delay(4000).fadeOut('slow');
                });

                $(brainParts).on('mouseenter', 'img', function () {
                    $(this).animate({zoom: '102%'}, 'fast');
                    $(this).find('.data').fadeIn();
                });

                $(brainParts).on('mouseleave', 'img', function () {
                    $(this).animate({zoom: '100%'}, 'fast');
                    $(this).find('.data').fadeOut();
                });

            });
        </script>
    </head>


    <body>
        <style>
            .welcome {
                margin-top:15%;
                text-align: center;
                font-weight:bold;
                font-size:3em;
                font-family:"Comic Sans MS", cursive, sans-serif;
            }

            .lrform {
                z-index: 10;
                position: fixed;
                bottom: 50px;
                right:0px;
                width:50%;
            }

            .msg {
                font-size:0.6em;
                text-transform: uppercase;
                text-align: center;
                font-style: italic;
                font-weight:  bold;
                letter-spacing: 2px;
                font-family: Tahoma, Geneva, sans-serif;
            }
        </style>

        <div class="welcome hidden">
            <span >Welcome <br> To Talent Acquisition System</span>                
        </div>

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


        <!-- This markup contains images of Brain and Brain Parts -->
        <div class="rest  hidden">
            <div class="mainBrain">

                <!-- Whole Brain Section -->
                <div class="container">
                    <img id="brain" src="images/Brain.png" style="cursor:zoom-in;">
                    <img id="clickBrain" src="images/clickBrain.png" style="float:right;">
                </div>

                <!-- Brain Parts Section -->
                <div class="hidden brainParts">
                    <a href="#aboutTest_modal" style="float:right; right:200px;" class="modal-trigger">
                        <img src="images/yellowBrain.png" style="position:absolute;top:20px;left:200px;" class="tooltipped" data-delay="50" data-tooltip="About MBTI Test, how and why it matters" alt="About MBTI Test">
                    </a>        
                    <a href="#instructions_modal" style="float:right; right:200px;" class="modal-trigger ">
                        <img src="images/redBrain.png" style="position:absolute;top:25px;left:500px;" class="tooltipped" data-delay="50" data-tooltip="Instructions on how to take the test" alt="Instructions">
                    </a>
                    <a href="#developers_modal" style="float:right; right:200px;" class="modal-trigger" >
                        <img src="images/greenBrain.png" style="position:absolute;top:300px;left:300px;" class="tooltipped" data-position="left" data-delay="50" data-tooltip="A sneak peak of the development team members." alt="Upcoming">
                    </a>        
                    <a href="#personality_modal"  style="float:right; right:200px;" class="modal-trigger" >
                        <img src="images/blueBrain.png" style="position:absolute;top:200px;left:700px;" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Check out various profiles here." alt="Personality Profiles">
                    </a>

                    <a href="#test_modal"  style="float:right; right:200px;" class="modal-trigger" >
                        <img src="images/medullaBrain.png" style="position:absolute;top:450px;left:450px;" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Start the Test here and now!" alt="Test">
                    </a>
                    <img id="clickBrain2" src="images/clickBrain2.png" style="float:right;">
                </div>
            </div>



            <!-- Button at the bottom right for Help--> 
            <div class="go-btn" style="position: fixed; bottom: 20px; left: 20px;">
                <a class="waves-effect waves-light btn-large green" href="help.php">Help</a>
            </div>
            <!--Button End -->

            <!-- Button at the bottom middle for Home--> 
            <div class="go-btn" style="position: fixed; bottom: 20px; left: 50%;">
                <a class="waves-effect waves-light btn-large " href="home.php">Home</a>
            </div>
            <!--Button End -->

            <?php
            if ($flag) {    //if flag == true (user is not logged in)
                echo '<div class="go-btn" style="position: fixed; bottom: 20px; right: 20px;">
                <a class="modal-trigger waves-effect waves-light btn-large indigo" href="#LRForm">Login / SignUp</a>
            </div>';
            } else {
                echo '<div class="chip" style = "position:fixed; top:20px; left:20px;"> <img src="' . $_SESSION['picpath'] . '" alt="Contact Person">' . $_SESSION['username'] . ' </div>';
                echo '<a style="position:fixed; bottom:20px; right:20px;" class="waves-effect waves-light btn-large red" href="logOut.php">Log Out</a>';
            }
            ?>
            <!-- Button at the bottom right for Login/Registration--> 

            <!--Button End -->


        </div>
        <!-- End of Brain Section -->    

        <!-- Modals corresponding to brain parts -->
        <div>
            <div id="aboutTest_modal" class="modal yellow lighten-2">
                <div class="modal-content">
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
                    psychological types without having to sift through Jung's academic theory.
                    <div class="modal-footer yellow lighten-2">
                        <a href="abouttest.php" class="modal-action waves-effect waves-green btn-flat teal-text">About Test</a>
                    </div>
                </div>
            </div>

            <div id="instructions_modal" class="modal deep-orange accent-1">
                <div class="modal-content">

                    Instructions are an important aspect to the any setting. 
                    If one is having trouble following directions, they should try to examine 
                    why this is happening. The reason could be an underlying problem, like a disinterest 
                    in the subject matter, or it may very well be the
                    instructions that are confusing and hard to understand.
                    <br><br>
                    Following instructions is very necessary in case of our MBTI test, as the results are
                    hinged on user being able to correctly understand, answer and examine all aspects of our system.
                    <div class="modal-footer deep-orange accent-1">
                        <a href="instructions.php" class="modal-action waves-effect waves-green btn-flat blue-text">Instructions</a>
                    </div>
                </div>
            </div>

            <div id="developers_modal" class="modal light-green">
                <div class="modal-content white-text">
                    Check out a quick overview of the site developers;
                    who they are, where they are from, who did what, and the reason behind the site's development.
                    <div class="modal-footer light-green">
                        <a href="developers.php" class="modal-action waves-effect waves-green btn-flat yellow-text text-lighten-2">Developers</a>
                    </div>
                </div>
            </div>

            <div id="personality_modal" class="modal indigo darken-1">
                <div class="modal-content white-text">
                    "It is up to each person to recognize his or her true preferences."
                    <br><br>
                    -Isabel Briggs Myers
                    <br><br><br><br>
                    The 16 personality types of the Myers-Briggs Type Indicator
                    are listed on this page (click 'personalities' button below), follow on page guide to get extensive information on
                    any personality type.
                    <div class="modal-footer indigo darken-1">
                        <a href="instructions.php" class="modal-action waves-effect waves-green btn-flat deep-orange-text text-accent-1">Personalities</a>
                    </div>
                </div>
            </div>

            <div id="test_modal" class="modal blue-grey">
                <div class="modal-content white-text">
                    <?php
                    if ($flag) {
                        echo 'You need to be registered to take the test. Please login or Register using the button on bottom right.
                    <br><br>
                    We bind the results of your test with your profile. As time passes, people change
                    and so do the results of this test. The minimum time after which changes have been noted
                    is 4 weeks. To have this historical data at your fingertips showing your evolutions as a person
                    is very significant indeed. Thus, our insistence on registration.';
                    } else {
                        echo "Ready to start testing? <a href='mbti.php' class='btn-flat red-text'><b>Click Here</b></a>";
                    }
                    ?>
                </div>
            </div>

        </div>



    </body>
</html>

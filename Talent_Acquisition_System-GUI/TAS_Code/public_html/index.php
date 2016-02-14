<?php
session_start();
session_destroy();
?>
<!--
The start page of our website. It includes a "welcome" animation along with the
brain and brain parts with instructions for new user. This page must be visited just
once for everytime a user logs in, rest of the linking will be handled by home.html
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
                <form action="regProcessing.php" method="post"  class = "col s12 register hidden" >
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
                    <a style="float:right; right:200px;" class=" " >
                        <img src="images/greenBrain.png" style="position:absolute;top:300px;left:300px;" class="tooltipped" data-position="left" data-delay="50" data-tooltip="Under Development" alt="Upcoming">
                    </a>        
                    <a href="#personality_modal"  style="float:right; right:200px;" class="modal-trigger" >
                        <img src="images/blueBrain.png" style="position:absolute;top:200px;left:700px;" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Check out various profiles here." alt="Personality Profiles">
                    </a>
                    <a href="#test_modal"  style="float:right; right:200px;" class="modal-trigger" >
                        <img src="images/medullaBrain.png" style="position:absolute;top:450px;left:450px;" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Start the Test here and now!" alt="Test">
                    </a>
                    <img id="clickBrain2" src="images/clickBrain2.png" style="float:right;">


                </div>

                <!-- Button at the bottom right for Login/Registration--> 
                <div class="go-btn" style="position: fixed; bottom: 20px; right: 20px;">
                    <a class="modal-trigger waves-effect waves-light btn-large" href="#LRForm">Login / SignUp</a>
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
            </div>        
        </div>
        <!-- End of Brain Section -->    

        <!-- Modals corresponding to brain parts -->
        <div>
            <div id="aboutTest_modal" class="modal yellow lighten-2">
                <div class="modal-content">
                    Swiss psychiatrist Carl Jung developed a theory early in the 20th century to describe basic 
                    individual preferences and explain similarities and differences between people.
                    <br><br>
                    The TAS test will tell you about which type of personality you belong to. It will not tell you that you should do this and that. 
                    It involves client feedback and agreement. It inherits the strength and weakness of each pattern. It does not 
                    judge you on how you look or whether you are going through any psychological problem it will only judge you on 
                    what response you are giving to the situation. The output given by this test is accurate.
                    <br><br>
                    <span class="msg">Login to Read More About the Test and it's origin</span>
                </div>
            </div>

            <div id="instructions_modal" class="modal deep-orange accent-1">
                <div class="modal-content">

                    For taking this test, you need to understand the following:-<br>
                    <ol>
                        <li>There are no right answers to any of these questions.</li>
                        <li>Answer the questions quickly, do not over-analyze them.</li>
                        <li>Some seem worded poorly. Go with what feels best.</li>
                        <li>Answer the questions as "the way you are", not "the way you'd like to be seen by others"</li>
                        <li>Do not look at the scoring sheet until you have completed all the questions.</li>
                    </ol>
                    <br><br>
                    <span class="msg">Login to Read More Instructions and Guidelines</span>
                </div>
            </div>

            <div id="personality_modal" class="modal indigo darken-1">
                <div class="modal-content white-text">
                    "It is up to each person to recognize his or her true preferences."
                    <br><br>
                    -Isabel Briggs Myers

                    <br><br>
                    <span class="msg">Login to Read More</span>
                </div>
            </div>

            <div id="test_modal" class="modal blue-grey">
                <div class="modal-content white-text">

                    You need to be registered to take the test. Please login or Register.
                    <br><br>
                    We bind the results of your test with your profile. As time passes, people change
                    and so do the results of this test. The minimum time after which changes have been noted
                    is 4 weeks. To have this historical data at your fingertips showing your evolutions as a person
                    is very significant indeed. Thus, our insistence on registration.
                </div>
            </div>
        </div>
        <!-- Modals corresponding to brain parts End -->


    </body>
</html>

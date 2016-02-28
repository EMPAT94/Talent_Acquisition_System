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

    </head>


    <body>

        <!-- Menu bar on top left Start-->
        <a data-activates="slide-out" class="button-collapse">
            <i class="menu_black"></i>
        </a>
        <ul id="slide-out" class="side-nav fixed hidden">
            <li><a name="home"  href="home.php">Home</a></li>
            <li><a name="about" href="abouttest.php">About the Test</a></li>
            <!--<li><a name="instructions" class = "disabled">Instructions</a></li>-->
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

        <div class="container">
            <h1 style="text-align: center;">Instructions</h1>
            <br><br>
            <h5>  Before taking The Test</h5>
            <ul class="collapsible " data-collapsible=" expandable">
                <li>
                    <div class="collapsible-header ">1. You MUST be logged in.</div>
                    <div class="collapsible-body ">
                        <p>We bind the results of your test with your profile. As time passes, people change
                            and so do the results of this test. The minimum time after which changes have been noted
                            is 4 weeks. To have this historical data at your fingertips showing your evolutions as a person
                            is very significant indeed. Thus, our insistence on registration.
                        </p>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header ">2. Have enough Spare time.</div>
                    <div class="collapsible-body ">
                        <p>
                            Sure, we have drastically reduced the number of questions required to predict your personality, but it
                            is better if the test is not given in a hurry or when mind is set on other things. It may affect your
                            results.
                        </p>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header ">3. Check your Internet Connection.</div>
                    <div class="collapsible-body ">
                        <p>
                            Our test extracts data from  and processes the results on server side, thus is it extremely necessary to 
                            have a consistent Internet connection or it may jeopardize your test process.   
                        </p>
                    </div>
                </li>
            </ul>
            <br><br>
            <h5>  While taking The Test</h5>
            <ul class="collapsible " data-collapsible="expandable">
                <li>
                    <div class="collapsible-header ">1. Do not look for "right" answers, there are none.</div>
                    <div class="collapsible-body ">
                        <p>
                            The choices of situation provided here are in the form of what you will do given the situation.
                            There is no YES/NO type of answer that you have to give.
                        </p>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header ">2. Do not over-analyze the any question. 
                        Some seem confusing, go with what feels best.</div>
                    <div class="collapsible-body ">
                        <p>
                            If you over-analyze the situation and then try to answer then there 
                            are less chances that you will select the one that you feel right.
                        </p>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header ">3. Answer the questions as the way you are not the way
                        you would like to be seen by others </div>
                    <div class="collapsible-body ">
                        <p>
                            When you have to make any choice to a situation, you should not think of it from others' point of view. 
                            You should answer the way you would in real life, instead of thinking how others would do or how you would be
                            seen in better light.
                        </p>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header ">5. You cannot refresh the page or go back to previous questions.</div>
                    <div class="collapsible-body ">
                        <p>
                            We have used the latest web technologies that allow us to dynamically change the content on page 
                            (like questions and choices) without refreshing the page. This is a continuous process that is broken
                            if you go refresh the page or cancel or go back to other address.
                        </p>
                    </div>
                </li>
            </ul>
            <br><br>
            <h5>  After taking The Test</h5>
            <ul class="collapsible " data-collapsible=" expandable">
                <li>
                    <div class="collapsible-header ">1. Do not compare your results with others</div>
                    <div class="collapsible-body ">
                        <p>
                            Whatever results you get are your own, there is no scale here. No type is better or worse than
                            other type.
                        </p>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header ">2. Do not rely solely on these results</div>
                    <div class="collapsible-body ">
                        <p>
                            The purpose of this test is to analyze how you think, perceive and react to simulations
                            from the real world. Although generically accurate, it is highly advised not to lock yourself to
                            a certain aspect of any result. This is solely an indication of how the personality type you seem to have 
                            behave in general. Not how "YOU" behave. So take it with a pinch of salt, if you will.
                        </p>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header ">3. Check extensive data on Personalities page</div>
                    <div class="collapsible-body ">
                        <p>
                            The results provided on the results page are a gist of a gold mine of data that is present
                            on the Personalities page. Do check the corresponding type page for deeper insights.
                        </p>
                    </div>
                </li>
            </ul>
        </div>


        <!-- Button at the bottom right for Login/Registration--> 
        <div class="go-btn" style="position: fixed; bottom: 20px; right: 20px;">
            <a class="waves-effect waves-light btn-large indigo" href="mbti.php">Take Test</a>
        </div>
        <!--Button End -->

    </body>
</html>        
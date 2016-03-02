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
        <title>Personalities</title>
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
            img:hover  { 
                border: solid 0px #CCC; 
                box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.5); 
            }
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
                    <div class='card'>
                        <div class='card-content'>
                            <blockquote>
                                The 16 personality types of the Myers-Briggs Type Indicator
                                are listed below, please click on any type for extensive information on same.
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Personality Profiles Start-->
        <div class ="container">
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header teal darken-4 white-text">INxx</div>
                    <div class="collapsible-body">
                        <div class="collapsible popout" data-collapsible="accordion">
                            <div class="row">
                                <div class="col s6 m3">
                                    <div class="card">
                                        <div class="card-image">
                                            <a href="images/mbti tools/infp-profile-healer-idealist-pdf2.pdf">
                                                <img  src="images/personalities/INFP.jpg" >
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col s6 m3">
                                    <div class="card">
                                        <div class="card-image">
                                            <a href="images/mbti tools/intp-profile-architect-thinker-pdf2.pdf">
                                                <img  src="images/personalities/INTP.jpg" >
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col s6 m3">
                                    <div class="card">
                                        <div class="card-image"> 
                                            <a href="images/mbti tools/infj-profile-counselor-protector-pdf2.pdf">
                                                <img  src="images/personalities/INFJ.jpg" >
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col s6 m3">
                                    <div class="card">
                                        <div class="card-image">
                                            <a href="images/mbti tools/intj-profile-mastermind-scientist-pdf2.pdf">
                                                <img   src="images/personalities/INTJ.jpg" >
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header orange lighten-2 black-text">ENxx</div>
                    <div class="collapsible-body">
                        <div class="row">
                            <div class="col s6 m3">
                                <div class="card">
                                    <div class="card-image">
                                        <a href="images/mbti tools/enfp-profile-champion-inspirer-pdf2.pdf">
                                            <img   src="images/personalities/ENFP.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col s6 m3">
                                <div class="card">
                                    <div class="card-image">
                                        <a href="images/mbti tools/entp-profile-inventor-visionary-pdf2.pdf">
                                            <img   src="images/personalities/ENTP.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col s6 m3">
                                <div class="card">
                                    <div class="card-image">
                                        <a href="images/mbti tools/enfj-profile-teacher-giver-pdf2.pdf">
                                            <img  src="images/personalities/ENFJ.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col s6 m3">
                                <div class="card">
                                    <div class="card-image">
                                        <a href="images/mbti tools/entj-profile-field-marshal-executive-pdf2.pdf">
                                            <img  src="images/personalities/ENTJ.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header  purple darken-4 white-text">ISxx</div>
                    <div class="collapsible-body">
                        <div class="row">

                            <div class="col s6 m3">                                
                                <div class="card">
                                    <div class="card-image">
                                        <a href="images/mbti tools/istj-profile-inspector-duty-fulfiller-pdf2.pdf">
                                            <img src="images/personalities/istj.jpg" >                           
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col s6 m3">
                                <div class="card">
                                    <div class="card-image">
                                        <a href="images/mbti tools/isfj-profile-nurturer-protector-pdf2.pdf">
                                            <img  src="images/personalities/ISFJ.jpg" >
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col s6 m3">
                                <div class="card">
                                    <div class="card-image">
                                        <a href="images/mbti tools/istp-profile-crafter-mechanic-pdf2.pdf">
                                            <img  src="images/personalities/ISTP.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col s6 m3">
                                <div class="card">
                                    <div class="card-image">
                                        <a href="images/mbti tools/isfp-profile-composer-artist-pdf2.pdf">
                                            <img  src="images/personalities/ISFP.jpg">
                                        </a>
                                    </div>

                                </div>
                            </div>

                        </div>                        
                    </div>
                </li>
                <li>
                    <div class="collapsible-header  red accent-3 black-text">ESxx</div>
                    <div class="collapsible-body">
                        <div class="row">


                            <div class="col s6 m3">
                                <div class="card">
                                    <div class="card-image">
                                        <a href="images/mbti tools/estj-profile-supervisor-guardian-pdf2.pdf">
                                            <img  src="images/personalities/ESTJ.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col s6 m3">
                                <div class="card">
                                    <div class="card-image">
                                        <a href="images/mbti tools/esfj-profile-provider-caregiver-pdf2.pdf">
                                            <img   src="images/personalities/ESFJ.jpg" >
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col s6 m3">
                                <div class="card">
                                    <div class="card-image">
                                        <a href="images/mbti tools/estp-profile-promoter-doer-pdf2.pdf">
                                            <img  src="images/personalities/ESTP.jpg" >
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col s6 m3">
                                <div class="card">
                                    <div class="card-image">
                                        <a href="images/mbti tools/esfp-profile-performer-pdf2.pdf">
                                            <img  src="images/personalities/ESFP.jpg" >
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Personality Profiles End-->

        <!-- Modal Trigger -->
        <a class="btn-large waves-effect waves-light btn modal-trigger indigo" style="position:fixed; bottom:20px; right:20px;" href="#moreInfo">More Info</a>

        <!-- Modal Structure -->
        <div id="moreInfo" class="modal  modal-fixed-footer">
            <div class="modal-content">
                <div class='card-content'>
                    <b>Favorite world: </b><br>
                    Do you prefer to focus on the outer world or on your own inner world? 
                    This is called Extraversion (E) or Introversion (I).
                    <br><br>
                    <b>Information: </b><br>
                    Do you prefer to focus on the basic information you take in or do you 
                    prefer to interpret and add meaning? This is called Sensing (S) or Intuition (N).
                    <br><br>
                    <b>Decisions: </b><br>
                    When making decisions, do you prefer to first look at logic and consistency or 
                    first look at the people and special circumstances? This is called Thinking (T) or Feeling (F).
                    <br><br>
                    <b>Structure: </b><br>
                    In dealing with the outside world, do you prefer to get things decided or do 
                    you prefer to stay open to new information and options? 
                    This is called Judging (J) or Perceiving (P).
                    <br><br>
                    <b>Your Personality Type: </b><br>
                    When you decide on your preference in each category, you have your own personality type,
                    which can be expressed as a code with four letters.
                    <br><br>
                    Type is more than just the sum of the four preferences.
                    The four-letter MBTI type formula is a shorthand way of telling you about the interaction of 
                    your four mental functions and which ones you prefer to use first. This is called type dynamics, 
                    and it is an important part of understanding your results. <br> <br> 
                    Below are some basic facts about type dynamics.
                    <ul>
                        <li>1. One preference has the most influence on you. This is called the dominant function.</li>
                        <li>2. The next strongest preference is called the auxiliary function. 
                            It is important because it serves to support and balance the dominant.</li>
                        <li>3. The third strongest is the tertiary function.</li>
                        <li>4. One preference is the least strong. This is the fourth function, often called the inferior function.</li>
                        <li>5. There is one preference each person tends to show first to the outside world.</li>
                        <li>6. The eight function-attitudes are expressed very differently in the inner world and the outer world.</li>
                        <li>7. The middle two preferences are called the function pair.</li>
                        <li>8. Over the course of your life, different preferences may emerge and be used more often, as well as more easily. 
                            This is referred to as type development.</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <a class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
            </div>
        </div>


        <!-- Button at the bottom left for Back--> 
        <div class="go-btn" style="position: fixed; bottom: 20px; left: 20px;">
            <a class="waves-effect waves-light btn-large " id="back">Back</a>
        </div>
        <!--Button End -->

    </body>
</html>





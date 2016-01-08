<html>
    <head>
        <title>TAS Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="scripts/jquery.js"></script>
        <script src="scripts/materialize.js"></script>
        <script src="scripts/animation.js"></script>
        <link type="text/css" rel="stylesheet" href="styles/materialize.css" />
        <link type="text/css" rel="stylesheet" href="styles/display.css" />
        <link rel="shortcut icon" href="favicon.ico">
        <style>
        </style>
        <script>
            $(document).ready(function () {
                $('body').fadeIn('slow');
                });
            });
        </script>
    </head>

    <body>
        <script>
            $(document).ready(function () {
                $('#logreg').click(function () {
                    $(this).closest('.card').find('.login').slideToggle();
                    $(this).closest('.card').find('.register').slideToggle();
                    var l = $(this).text();
                    if (l == "Register") {
                        $(this).text("Login");
                    } else {
                        $(this).text("Register");
                    }
                });
            });
        </script>

        <!--navigation bar markup -->
        <nav>
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo">TALENT ACQUISITION SYSTEM</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse">
                    <i class="menu_white"></i>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="sass.html"></a></li>
                    <li><a href="badges.html"></a></li>
                    <li><a href="collapsible.html"><a href="loginTest.php"><font face= "Comic Sans MS", cursive, sans-serif size="3px">Login/Register</font></a></a></li>
                    <li><a href="mobile.html"></a></li>
                </ul>
                <ul class="side-nav">
                    <li><a href="sass.html"></a></li>
                    <li><a href="badges.html"></a></li>
                    <li><a href="collapsible.html"></a></li>
                    <li><a href="mobile.html"></a></li>
                </ul>
            </div>
        </nav>
        <!--end of navigation bar markup -->

        <div class = "container " >
            <div class = 'row'>
                <div class = "card">
                    <!--Login Form -->
                    <form class = "login col s12" >
                        <div class = "row">
                            <div class = "input-field col s4">
                                <input id = "first_name" type = "email" class = "validate">
                                <label for = "first_name">Email</label>
                            </div>
                            <div class = "input-field col s4">
                                <input id = "last_name" type = "password" class = "validate">
                                <label for = "last_name">Password</label>
                            </div>
                            <div class = "input-field col s4">
                                <input type="submit" class="btn-large red"name="submit" style="float:right;" >
                            </div>
                        </div>
                    </form>

                    <form action="loginProcessing.php" method="post"  class = "col s12 register hidden" >
                        <div class="row">
                            <div class="input-field col s6">
                                <input name="first_name" type="text" class="validate">
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col s6">
                                <input name="last_name" type="text" class="validate">
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="password" type="password" class="validate">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <input name="email" type="email" class="validate" >
                                <label for="email">Email</label>
                            </div>
                            <div class = "input-field col s4">
                                <input type="submit" class="btn-large red"name="submit" style="float:right;" >
                            </div>
                        </div>  
                    </form>
                    <div class="card-action">
                        <a href="#" id="logreg">Register</a>
                    </div>         
                </div>
            </div>
        </div>
        <!-- End of form code -->
<div class="mainBrain">
                <div class="container">
                    <img id="brain" src="images/Brain.png" style="cursor:zoom-in;">
                    <img id="clickBrain" src="images/clickBrain.png" style="float:right;">
                </div>
                <div class="hidden brainParts">
                    <a href="aboutTest.html">
                        <img src="images/yellowBrain.png" style="position:absolute;top:20px;left:200px;cursor:zoom-in;" title="About MBTI Test">
                    </a>        
                    <a href="instructions.html">
                        <img src="images/redBrain.png" style="position:absolute;top:25px;left:500px;" title="Instructions">
                    </a>
                    <a href="">
                        <img src="images/greenBrain.png" style="position:absolute;top:300px;left:300px;" title="Upcoming">
                    </a>        
                    <a href="personality.html">
                        <img src="images/blueBrain.png" style="position:absolute;top:200px;left:700px;" title="Personality Profiles">
                    </a>
                    <a href="">
                        <img src="images/medullaBrain.png" style="position:absolute;top:450px;left:450px;" title="Upcoming">
                    </a>
                    <img id="clickBrain" src="images/clickBrain2.png" style="float:right;">
                </div>
            </div>
    </body>
</html>


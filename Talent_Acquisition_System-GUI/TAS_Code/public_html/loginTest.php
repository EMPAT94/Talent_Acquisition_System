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
                <a href="#!" class="brand-logo">TAS</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse">
                    <i class="menu_white"></i>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="sass.html"></a></li>
                    <li><a href="badges.html"></a></li>
                    <li><a href="collapsible.html"></a></li>
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
    </body>
</html>


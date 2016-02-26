<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: logreg.php");
    exit;
}
?>
<html>
    <head>
        <title>Test in Progress</title>
        <script src="scripts/jquery.js"></script>
        <script src="scripts/materialize.js"></script>
        <link type="text/css" rel="stylesheet" href="styles/materialize.css" />

        <script src="scripts/animation.js"></script>
        <link type="text/css" rel="stylesheet" href="styles/display.css" />
        <link rel="shortcut icon" href="favicon.ico">

    </head>
    <body>
        <script>
            $(document).ready(function () {
                var clicks = 1;
                var prog = 5;
                var progress = $('.progress');
                var questionArea = $('#questionArea');
                var choiceArea1 = $('#choiceArea1');
                var choiceArea2 = $('#choiceArea2');

                var choiceArea3 = $('#choiceArea3');
                var choiceArea4 = $('#choiceArea4');
                var choiceArea5 = $('#choiceArea5');

                var questioncard = $('.questioncard');
                var btnquestion = $('.btn-question');
                var progressBar = $('#testProgressBar');

                function rmv() {
                    $(progressBar).removeClass('determinate');
                    $(progressBar).addClass('indeterminate');
                }
                function add() {
                    $(progressBar).removeClass('indeterminate');
                    $(progressBar).addClass('determinate');
                }

                $('.startTest').on('click', function () {
                    $('.instructions').slideUp();
                    $('.show-inst').removeClass('hidden');
                    $('.go-btn').addClass('hidden');
                    $(progress).removeClass('hidden');
                    rmv();
                    $.post(
                            "algo.php",
                            {value: clicks, choice: 0},
                            function (data) {
                                $(progress).css({'width': 0 + "%"});
                                var data = JSON.parse(data);
                                $(questionArea).html(data.ss[0].q);
                                $(choiceArea1).html(data.cc[0].c);
                                $(choiceArea2).html(data.cc[1].c);
                                $(questioncard).slideDown();
                            });
                    clicks += 1;
                });

                $(btnquestion).on('click', function () {
                    $(questioncard).slideUp();
                    rmv();
                    choice = $("input[name=choice]:checked").val();
                    $.post(
                            "algo.php",
                            {value: clicks, choice: choice},
                            function (data) {
                                if (data === "end") {
                                    location.href = 'result.php';
                                } else {
                                    $(progress).css({'width': prog + "%"});
                                    var data = JSON.parse(data);
                                    $(questionArea).html(data.ss[0].q);
                                    $(choiceArea1).html(data.cc[0].c);
                                    $(choiceArea2).html(data.cc[1].c);

                                    if (data.cc[2] != null) {
                                        $(choiceArea3).removeClass('hidden');
                                        $(choiceArea3).find('span').html(data.cc[2].c);
                                    } else {
                                        $(choiceArea3).slideUp();
                                    }
                                    if (data.cc[3] != null) {
                                        $(choiceArea4).removeClass('hidden');
                                        $(choiceArea4).find('span').html(data.cc[3].c);
                                    } else {
                                        $(choiceArea4).slideUp();
                                    }
                                    if (data.cc[4] != null) {
                                        $(choiceArea5).removeClass('hidden');
                                        $(choiceArea5).find('span').html(data.cc[4].c);
                                    } else {
                                        $(choiceArea5).slideUp();
                                    }
                                    $(questioncard).slideDown();
                                    add();
                                }
                            });
                    clicks += 1;
                    prog += 5;
                });

                $('.show-inst').on('click', function () {
                    $('.instructions').slideToggle();
                });
            });
        </script>

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

        <div class="container">
            <div class="progress hidden red">
                <div id="testProgressBar" class="determinate"></div>
            </div>
        </div>


        <div class="instructions container">
            <div class="row">
                <div class="col s12 m8">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Important Instructions : </span><br><br>
                            <p>1. Do not Refresh or Cancel. </p><br>
                            <p>2. Think and answer; once answered, cannot go back. </p><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container row hidden questioncard">
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-image">
                    </div>
                    <div class="card-content">
                        <div id="questionArea"> </div>
                    </div>
                    <div class="card-action">
                        <input  name="choice" type="radio" id="test1" value="1" checked="checked" />
                        <label for="test1"><span id="choiceArea1" ></span></label> <br><br>

                        <input  name="choice" type="radio" id="test2" value="2"/>
                        <label for="test2"><span id="choiceArea2"> </span></label><br><br>

                        <div  id="choiceArea3" class="hidden">
                            <input  name="choice" type="radio" id="test3" value="3" />
                            <label for="test3"><span ></span></label> <br><br>
                        </div>

                        <div id="choiceArea4" class="hidden">
                            <input  name="choice" type="radio" id="test4" value="4"/>
                            <label for="test4"><span > </span></label><br><br>
                        </div>

                        <div id="choiceArea5" class="hidden">
                            <input  name="choice" type="radio" id="test5" value="5"/>
                            <label for="test5"><span > </span></label>
                        </div>

                        <a class="btn-floating btn-large red btn-question" style="position: absolute; bottom: -20px; right: -20px;">
                            <i class="send_white"></i>
                        </a>
                    </div>

                </div>

            </div>
        </div>

        <div style="position: fixed; bottom: 20px; left: 20px;">
            <a  class="waves-effect waves-light btn-large show-inst hidden">Instructions</a>
        </div>

        <div class="go-btn" style="position: fixed; bottom: 20px; right: 20px;">
            <a  class="waves-effect waves-light btn-large startTest">Start</a>
        </div>
    </body>
</html>

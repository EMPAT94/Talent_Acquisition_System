<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
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
                var questioncard = $('.questioncard');
                var test1 = $('#test1');
                var test2 = $('#test2');
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
                            {value: clicks, weight: 0},
                            function (data) {
                                var data = JSON.parse(data);
                                $(questionArea).html(data.ss[0].q);
                                $(choiceArea1).html(data.cc[0].c);
                                $(choiceArea2).html(data.cc[1].c);
                                $(questioncard).slideDown();
                                $(test1).val(data.cc[0].w);
                                $(test2).val(data.cc[1].w);
                            });
                    clicks += 1;
                });

                $(btnquestion).on('click', function () {
                    rmv();
                    var wt = $("input[name=choice]:checked").val();
                    $.post(
                            "algo.php",
                            {value: clicks, weight: wt},
                            function (data) {
                                if (data === "end") {
                                    location.href = 'result.php';
                                } else {
                                    $(progress).css({'width': prog + "%"});
                                    var data = JSON.parse(data);
                                    $(questionArea).html(data.ss[0].q);
                                    $(choiceArea1).html(data.cc[0].c);
                                    $(choiceArea2).html(data.cc[1].c);
                                    $(questioncard).slideDown();
                                    $(test1).val(data.cc[0].w);
                                    $(test2).val(data.cc[1].w);
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


        <div class="container">
            <div class="progress hidden red">
                <div id="testProgressBar" class="determinate"></div>
            </div>
        </div>
        <div class="instructions container">
            <div class="row">
                <div class="col s12 m6">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Important Instructions : </span>
                            <p>1. Do not Refresh or Cancel </p>
                            <p>2. Think and Answer, Cannot go back. </p>
                            <p>3. This That</p>
                            <p>4. Blah Blah</p>
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
                        <input name="choice" type="radio" id="test1" value="1" checked="checked" />
                        <label for="test1"><span id="choiceArea1" ></span></label> <br><br>

                        <input name="choice" type="radio" id="test2" value="1"/>
                        <label for="test2"><span id="choiceArea2"> </span></label>

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

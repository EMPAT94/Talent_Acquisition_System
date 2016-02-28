
$(document).ready(function () {

    $('.parallax').parallax();
    $('.scrollspy').scrollSpy();
    $('.modal-trigger').leanModal();
    $('.materialboxed').materialbox();


    $('.menu_black').click(function () {
        $('#slide-out').removeClass('hidden');
    });
    $('.button-collapse').pushpin();

    /* this code enables the side navigation menu function */
    $(".button-collapse").sideNav();
    $('.menu_white').on('click', function () {
        $(this).closest('div').find('.button-collapse').sideNav();
    });

    $('#back').click(function () {
        window.history.go(-1);
    });

    $('#back').click(function () {
        location.href('logOut.php');
    });

    /* Login Form Animations */
    var login = $('.login');
    var register = $('.register');
    var logreg = $('#logreg');
    var progressBar = $('#progressBar');

    $(logreg).click(function () {
        $(login).slideToggle();
        $(register).slideToggle();
        var l = $(this).text();
        if (l == "Register") {
            $(this).text("Login");
        } else {
            $(this).text("Register");
        }
    });
    /* Ajax Connection to server scripts*/
    $('form').on('submit', function (e) {
        e.preventDefault();
        $(progressBar).addClass('indeterminate');
        $.ajax({
            type: "POST",
            cache: false,
            url: $(this).attr('action'),
            //data: $(this).serialize(),
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function (data) {
                if (data == '0') {
                    location.href = "profile.php";
                } else {
                    Materialize.toast(data, '3000');
                }
                $(progressBar).removeClass('indeterminate');
            }
        });
    });
});

$(document).ready(function () {

    $('.parallax').parallax();
    $('.scrollspy').scrollSpy();
    $('.modal-trigger').leanModal();
    /* this code enables the side navigation menu function */
    $(".button-collapse").sideNav();
    $('.menu_white').on('click', function () {
        $(this).closest('div').find('.button-collapse').sideNav();
    });
    $('#back').click(function () {
        window.history.go(-1);
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
            data: $(this).serialize(),
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
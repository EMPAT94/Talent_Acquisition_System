
$(document).ready(function () {
    $('.welcome').delay('slow').fadeIn('slow');
    $('.welcome').delay('slow').fadeOut('slow');
    $('.rest').delay(2500).slideDown(1000);
    $('#brain').click(function () {
        $(this).closest('div').delay('fast').fadeOut();
        $(this).closest('.mainBrain').find('.brainParts').delay('slow').fadeIn('slow');
    });

    $('.login-btn').on('click', function () {
        $('.login-form').slideToggle('slow');
    });

    $('.card-action').on('click', 'a', function () {
        $('.login').slideToggle();
        $('.register').slideToggle();
        var l = $('#logreg').text();
        if (l == "Login") {
            $('#logreg').text("Register");
        } else {
            $('#logreg').text("Login");
        }
    });

    $('.menu_white').on('click', function () {
        $(this).closest('div').find('.button-collapse').sideNav();
    });
});
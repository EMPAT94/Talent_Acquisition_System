
$(document).ready(function () {
    
    
    $('.login-btn').on('click',function () {
        $('.login-form').slideToggle('slow');
    });
    
    $('.card-action').on('click', 'a', function () {
        $('.login').slideToggle();
        $('.register').slideToggle();
        var l = $('#logreg').text();
        if(l == "Login") {
            $('#logreg').text("Register");
        } 
        else {
            $('#logreg').text("Login");
        }
    });
    
    $('.menu_white').on('click',function () {
        $(this).closest('div').find('.button-collapse').sideNav();
    });
});
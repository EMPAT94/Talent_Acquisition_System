
$(document).ready(function () {
    $('.menu_white').on('click', function () {
        $(this).closest('div').find('.button-collapse').sideNav();
    });
    
    $('.mainBrain').on('mouseenter','img', function(){
        $(this).animate({zoom: '103%'},'fast');
        $(this).find('.data').fadeIn();
    });
     $('.mainBrain').on('mouseleave', 'img', function(){
        $(this).animate({zoom: '100%'},'fast');
        $(this).find('.data').fadeOut();
    });
});
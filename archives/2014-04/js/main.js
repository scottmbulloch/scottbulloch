$(function() {

/* MOBILE SLIDING DRAWER MENU */
$('body').mobile_menu({
    menu: '#foot-menu ul',
    menu_width: 200,
    prepend_button_to: '#mobile-menu',
    button_content: '&#9776;'
});

/* MOBILE HEADING TOGGLE BUTTON */
$('.toggle-switch').click(function(){
    $(this).next('.toggle-content').slideToggle(500);
});

});

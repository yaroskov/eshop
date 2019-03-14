$(document).ready(function() {

    menuUrl('#menu-url');
});

function menuUrl (selector) {

    var url = window.location.pathname;

    $(selector).find('a').each(function () {

        if (url == $(this).attr('href')) {
            $(this).addClass('active');
        } else {
            $(this).removeClass('active');
        }
    });
}
$(document).ready(function() {

    menuUrl('#menu-url');
    menuUrl('#navbarMenu');
});

function menuUrl (selector) {

    var url = window.location.pathname;

    $(selector).find('a').each(function () {

        var href = $(this).attr('href');

        if ((href == '/' && url == href) ||
            (href != '/' && url.indexOf(href) >= 0)) {

            $(this).addClass('active');

        } else {

            $(this).removeClass('active');
        }
    });
}
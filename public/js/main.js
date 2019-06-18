$(document).ready(function () {

    $('.js-datepicker').pickadate({
        format: 'yyyy-mm-dd'
    });

    $('.menu-icon').on('click', function() {
        $('.content > .wrapper').toggleClass('collapsed');
        $('.menu').toggleClass('expanded');
    });

    var myElement = $('html')[0];

    let hammertime = new Hammer(myElement);
    // hammertime.get('swipe').set({ direction: Hammer.DIRECTION_HORIZONTAL });
    hammertime.on('swiperight swipeleft pan', function(event) {

        if (event.type == 'swiperight') {
            $('.content > .wrapper').addClass('collapsed');
            $('.menu').addClass('expanded');
        }

        if (event.type == 'swipeleft') {
            $('.content > .wrapper').removeClass('collapsed');
            $('.menu').removeClass('expanded');
        }

        if (event.type == 'panup') {

            if (event.changedPointers.length != 2) {
                return;
            }

            elem = document.querySelector('#body');

            if(elem.requestFullScreen) {
                elem.requestFullScreen();
            } else if(elem.mozRequestFullScreen) {
                elem.mozRequestFullScreen();
            } else if(elem.webkitRequestFullScreen) {
                elem.webkitRequestFullScreen();
            }
        }
    });

});
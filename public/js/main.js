$(document).ready(function () {

    $('.js-datepicker').pickadate({
        format: 'yyyy-mm-dd'
    });

    $('.menu-icon').on('click', function() {
        $('.content > .wrapper').toggleClass('collapsed');
        $('.menu').toggleClass('expanded');
    });

    var myElement = $('html')[0];

    let hammertime = new Hammer.Manager(myElement);

    hammertime.add( new Hammer.Swipe({ direction: Hammer.DIRECTION_ALL }) );
    hammertime.add( new Hammer.Tap({ event: 'doubletap', taps: 2 }) );
    hammertime.add( new Hammer.Tap({ event: 'singletap' }) );
    hammertime.get('doubletap').recognizeWith('singletap');
    hammertime.get('singletap').requireFailure('doubletap');

    // hammertime.get('swipe').set({ direction: Hammer.DIRECTION_HORIZONTAL });
    hammertime.on('swiperight swipeleft singletap doubletap', function(event) {

        if (event.type == 'swiperight') {
            $('.content > .wrapper').addClass('collapsed');
            $('.menu').addClass('expanded');
        }

        if (event.type == 'swipeleft') {
            $('.content > .wrapper').removeClass('collapsed');
            $('.menu').removeClass('expanded');
        }
        
    });

    hammertime.on('doubletap', function(event) {

        if(myElement.requestFullScreen) {
            myElement.requestFullScreen();
        } else if(myElement.mozRequestFullScreen) {
            myElement.mozRequestFullScreen();
        } else if(myElement.webkitRequestFullScreen) {
            myElement.webkitRequestFullScreen();
        }

    });

});
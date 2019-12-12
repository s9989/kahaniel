console.info('⚪ Main javascript loaded');

$(document).ready(function() {

    // $('.js-datepicker').pickadate({
    //     format: 'd.m.yyyy'
    // });

    $('[data-confirm="true"]').on('click', function() {
        return confirm("Czy na pewno usunąć?");
    });

    $('.menu-icon').on('click', function() {
        $('.content > .wrapper').toggleClass('collapsed');
        $('.menu').toggleClass('expanded');
    });

    var myElement = $('html')[0];

    let hammertime = new Hammer.Manager(myElement);

    hammertime.add( new Hammer.Swipe({ direction: Hammer.DIRECTION_HORIZONTAL }) );
    // hammertime.add( new Hammer.Tap({ event: 'doubletap', taps: 2 }) );
    // hammertime.add( new Hammer.Tap({ event: 'singletap' }) );
    // hammertime.get('doubletap').recognizeWith('singletap');
    // hammertime.get('singletap').requireFailure('doubletap');

    // hammertime.get('swipe').set({ direction: Hammer.DIRECTION_HORIZONTAL });
    hammertime.on('swiperight swipeleft', function(event) {

        if (event.type == 'swiperight') {
            $('.content > .wrapper').addClass('collapsed');
            $('.menu').addClass('expanded');
        }

        if (event.type == 'swipeleft') {
            $('.content > .wrapper').removeClass('collapsed');
            $('.menu').removeClass('expanded');
        }

    });

});
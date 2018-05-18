$(document).ready(function () {
    $('.menu-icon').on('click', function() {
        $('.content > .wrapper').toggleClass('collapsed');
        $('.menu').toggleClass('expanded');
    });

    var myElement = $('html')[0];

    console.log(myElement);

    let hammertime = new Hammer(myElement);
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
const $ = require('jquery');
console.info('Login javascript loaded');

$(document).ready(function() {

    $('.login_bg').on('click', function() {
        $('form.login').toggleClass('enter');
        $(this).toggleClass('enter');
    });
});
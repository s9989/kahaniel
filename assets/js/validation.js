console.info('⚪ Validation javascript loaded');

$(document).ready(function() {

    let validations = [
        'data-required',
        'data-regex',
        'data-maxlength',
        'data-minlength',
    ];

    $('form').each(function(k, form) {
        $.each(validations, function(key, validation) {
            let $input = $(form).find('[' + validation + ']');
            if ($input.length > 0) {
                $input.on('blur', function() {
                    $(this).parent().find('.error').removeClass('visible');
                    $(this).data('error', false);
                    $(this).trigger('check');
                });

                $(form).addClass('validate');
            }
        })
    });

    $('form.validate').on('submit', function(e) {
        if (!validateForm($(this))) {
            e.preventDefault();
        }
    });

    function validateForm(form) {

        let ok = true;

        $.each(validations, function(key, validation) {
            let inputs = $(form).find('[' + validation + ']');
            if (inputs.length > 0) {
                inputs.each(function(k, input) {
                    $(input).parent().find('.error').removeClass('visible');
                    $(input).data('error', false);
                    $(input).trigger('check');
                });
            }
        });

        $.each(validations, function(key, validation) {
            let inputs = $(form).find('[' + validation + ']');
            if (inputs.length > 0) {
                inputs.each(function(k, input) {
                    if (true === $(input).data('error')) {
                        ok = false;
                    }
                });
            }
        });

        return ok;
    }

    $('[data-required]').on('check', function() {

        if (0 === $(this).val().length) {
            $(this).data('error', true);

            let $error = $(this).parent().find('.error');
            $error.text('To pole jest wymagane');
            $error.addClass('visible');
        }

    });

    $('[data-maxlength]').on('check', function() {

        if ($(this).data('maxlength') < $(this).val().length) {
            $(this).data('error', true);

            let $error = $(this).parent().find('.error');
            $error.text('Maksymalna liczba znaków to: ' + $(this).data('maxlength'));
            $error.addClass('visible');
        }

    });

    $('[data-minlength]').on('check', function() {

        if ($(this).data('minlength') > $(this).val().length) {
            $(this).data('error', true);

            let $error = $(this).parent().find('.error');
            $error.text('Minimalna liczba znaków to: ' + $(this).data('minlength'));
            $error.addClass('visible');
        }

    });

    $('[data-regex]').on('check', function() {

        let type = $(this).data('regex');
        let regex = '';
        let message = '';

        switch (type) {
            case 'pesel':
                regex = '^\\d{11}$';
                message = 'PESEL powinien zawierać dokładnie 11 cyfr';
                break;
            case 'nip':
                regex = '^\\d{10}$';
                message = 'NIP powinien zawierać dokładnie 10 cyfr';
                break;
            case 'post_code':
                regex = '^\\d\\d-\\d\\d\\d$';
                message = 'Podaj poprawny kod pocztowy';
                break;
            case 'email':
                regex = '[^@]+@[^\\.]+\\..+';
                message = 'Podaj poprawny adres email';
                break;
            case 'phone':
                regex = '^\\d{9}$';
                message = 'Numer telefonu musi mieć 9 cyfr';
                break;
            case 'account_number':
                regex = '^\\d{26}$';
                message = 'Numer konta bankowego musi mieć 26 cyfr';
                break;
            case 'number':
                regex = '^\\d*$';
                message = 'Tylko cyfry';
                break;
            case 'price':
                regex = '^\\d+\\.\\d+$';
                message = 'Cena musi być w formie zmiennoprzecinkowej.';
                break;
            default:
                return;
        }

        let r = new RegExp(regex);

        if (!r.test($(this).val())) {
            $(this).data('error', true);

            let $error = $(this).parent().find('.error');
            $error.text(message);
            $error.addClass('visible');
        }

    });

});
$(document).on("focus", "input:not([type=submit]), textarea", function () {
    $(this).parents('.form-group').addClass('focused');
});
$(document).on("click", "label:not(.form-check-label)", function () {
    $(this).parents('.form-group').addClass('focused');
    $(this).siblings("input, textarea").focus();
});

$(document).on("blur", "input:not([type=submit]), textarea", function () {
    var inputValue = $(this).val();
    //If Invalid input
    if ($(this).is(":invalid") && inputValue !== "") {
        $(this).addClass('invalid');
    } else if (inputValue === "") { //If Empty
        $(this).removeClass('filled invalid');
        $(this).parents('.form-group').removeClass('focused');
    } else {
        $(this).addClass('filled');
        $(this).removeClass('invalid');
    }
});
//Google reCaptcha
grecaptcha.ready(function () {
    grecaptcha.execute('6Lc447UUAAAAAKUbWbf6jTvZRmxvSOxnKW-VhneB', {
        action: 'contact_form'
    }).then(function (token) {
        // add token to form
        $('form').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
        $('form').prepend('<input type="hidden" name="action" value="contact_form">');
    });
});
function checkRegistrazione() {
    let email = $('#email');
    let password = $('#password');
    let confermaPassword = $('#confermaPassword');
    let email_msg = $('#email-invalida');
    let password_msg = $('#password-invalida');
    let confermaPassword_msg = $('#confermaPassword-invalida');
    let error = false;

    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


    if (email.val().trim() === '' || !emailPattern.test(email.val().trim())) {
        email_msg.html('Inserisci un indirizzo mail valido').addClass('error-span');
        email.focus();
        error = true;
    } else {
        email_msg.html('').removeClass('error-span');
    }

    if (password.val().trim().length < 8) {
        password_msg.html('La password deve contenere almeno 8 caratteri').addClass('error-span');
        password.focus();
        error = true;
    } else {
        password_msg.html('').removeClass('error-span');
    }

    if (confermaPassword.val().trim() !== password.val().trim()) {
        confermaPassword_msg.html('Le password non corrispondono').addClass('error-span');
        confermaPassword.focus();
        error = true;
    } else {
        confermaPassword_msg.html('').removeClass('error-span');
    }

    // Se non ci sono errori, controlla l'email tramite AJAX
    if (!error) {
        $.ajax({
            type: 'GET',
            url: '/user/checkEmailAjax',
            data: { email: email.val().trim() },
            success: function (data) {
                if (data.found) {
                    email_msg.html('Email già in uso').addClass('error-span');
                    email.focus();
                } else {
                    email_msg.html('').removeClass('error-span');
                    $('#registrazione-form').unbind('submit').submit();
                }
            }
        });
    }
}

$(document).ready(function() {
    $('#email').on('input', function () {
        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailPattern.test($(this).val().trim())) {
            $('#email-invalida').html('').removeClass('error-span');
        } else {
            $('#email-invalida').html('Inserisci un email con formato valido').addClass('error-span');
        }
    });

    $('#password').on('input', function () {
        if ($(this).val().trim().length < 8) {
            $('#password-invalida').html('La password deve contenere almeno 8 caratteri').addClass('error-span');
        } else {
            $('#password-invalida').html('').removeClass('error-span');
        }
    });

    $('#confermaPassword').on('input', function () {
        if ($(this).val().trim() !== $('#password').val().trim()) {
            $('#confermaPassword-invalida').html('Le password non corrispondono').addClass('error-span');
        } else {
            $('#confermaPassword-invalida').html('').removeClass('error-span');
        }
    });

    $('#registrazione-form').on('submit', function(event) {
        event.preventDefault();
        checkRegistrazione();
    });
});

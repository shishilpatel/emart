'use Strict';

$('.sendotp').on('click', function () {

    /** On click disable the otp field  */

    $("input[name=otp]").attr('disabled', 'disabled');

    if ($("input[name=mobile]").val() == '') {
        alert('Mobile no. is required !');
        return false;
    }

    if (isNaN($("input[name=mobile]").val())) {
        alert('Invalid Mobile no. !');
        return false;
    }

    /** Setting up csrf_token */

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /** Sending ajax request to send otp */

    $.ajax({
        method: 'POST',
        dataType: 'json',
        url: send_forget_pw_url,
        data: {
            mobile: $("input[name=mobile]").val()
        },
        beforeSend: function () {
            $('.sendotp').text('Sending...');
        },
        success: function (response) {
            console.log(response.result);
            if (response.status == 'success') {
                $('.sendotp').text('Resend');
                $('.resultmsg1').addClass('text-success').text(response.msg);
                $("input[name=otp]").removeAttr('disabled');
            } else {
                $('.sendotp').text('Send OTP');
                $('.resultmsg1').addClass('text-danger').text(response.msg);
            }
        },
        error: function (jqXHR, err, xml) {
            /** Show error text in browser console if any */
            console.log(err);
        }
    });

});

$('.verifyotp').on('click', function () {

    if ($("input[name=otp]").val() == '') {
        alert('OTP is required !');
        return false;
    }

    if (isNaN($("input[name=otp]").val())) {
        alert('Invalid OTP !');
        return false;
    }

    /** Setting up csrf_token */

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /** Sending ajax request to verify otp */

    $.ajax({
        method: 'POST',
        dataType: 'json',
        url: verify_forget_pw_url,
        data: {
            otp: $("input[name=otp]").val()
        },
        beforeSend: function () {
            $('.verifyotp').text('Verifying...');
        },
        success: function (response) {

            if (response.status == 'success') {
                $('.verifyotp').text('Verified');
                $('.resultmsg2').removeClass('text-danger').addClass('text-success').text(response.msg);
                $("input[name=otp]").attr('disabled', 'disabled');

                $('.pbox').removeClass('d-none').addClass('d-block');

            } else {
                $('.verifyotp').text('Verify');
                $('.resultmsg2').removeClass('text-success').addClass('text-danger').text(response.msg);
            }
        },
        error: function (jqXHR, err, xml) {
            /** Show error text in browser console if any */
            console.log(err);
        }
    });

});
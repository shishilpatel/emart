'use Strict';

$('.sendotp').on('click', function () {

    /** On click disable the mobile no. field  */

    if ($("input[name=mobile]").val() == '') {
        alert('Mobile no. is required !');
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
        url: loginotpurl,
        data: {
            phonecode: $("select[name=phonecode]").val(),
            mobile: $("input[name=mobile]").val()
        },
        beforeSend: function () {
            $('.sendotp').text('Sending...');
        },
        success: function (response) {
            console.log(response.result);
            if (response.status == 'success') {
                $('.sendotp').text('Resend');
                $('.resultmsg').addClass('text-success').text(response.msg);
            } else {
                $('.sendotp').text('Send OTP');
                $('.resultmsg').addClass('text-danger').text(response.msg);
            }
        },
        error: function (jqXHR, err, xml) {
            /** Show error text in browser console if any */
            console.log(err);
        }
    });

});
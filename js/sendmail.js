$(document).ready(function ($) {

    function resetCaptcha() {
        $('#imgCaptcha').attr('src', 'Captcha.ashx?' + (new Date()).getTime());
        $('#imgCaptchaRFP').attr('src', $('#imgCaptcha').attr('src'));
        $('#imgCCaptcha').attr('src', $('#imgCaptcha').attr('src'));
    }

    resetCaptcha();
    function ResetData() {
        $('#txtName').val('').removeClass('red-border').focus();
        $('#txtEmail').val('').removeClass('red-border');
        $('#txtPhone').val('').removeClass('red-border');
        $('#txtMessage').val('').removeClass('red-border');
        $('#txtCaptcha').val('').removeClass('red-border');
        resetCaptcha();
    }
    

    function checkEmail() {
        var myemail = $.trim($('#txtEmail').val());
        if (myemail.length != 0) {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/;
            if (!emailPattern.test(myemail)) {
                $('#txtEmail').addClass('red-border');
                return false;
            } else {
                $('#txtEmail').removeClass('red-border');
                return true;
            }
        } else {
            $('#txtEmail').addClass('red-border');
            return false;
        }
    }
    function checkCEmail() {
        var myemail = $.trim($('#txtCEmail').val());
        if (myemail.length != 0) {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/;
            if (!emailPattern.test(myemail)) {
                $('#txtCEmail').addClass('red-border');
                return false;
            } else {
                $('#txtCEmail').removeClass('red-border');
                return true;
            }
        } else {
            $('#txtCEmail').addClass('red-border');
            return false;
        }
    }

    function ResetContactData() {
        $('#txtFName').val('').removeClass('red-border').focus();
        $('#txtLName').val('').removeClass('red-border').focus();
        $('#txtCEmail').val('').removeClass('red-border');
        $('#txtCPhone').val('').removeClass('red-border');
        $('#txtCCompany').val('').removeClass('red-border');
        $('#txtCMessage').val('').removeClass('red-border');
        $('#txtCCaptcha').val('').removeClass('red-border');
        resetCaptcha();
    }

    $('#txtName,#txtFName,#txtLName, #txtCompany, #txtMessage, #txtCaptcha,#txtCCaptcha,#txtCMessage,#txtCCompany,#txtCPhone').focusout(function () { $.as_VerifyEmpty($(this)); });
    $('#txtEmail').blur(function () { checkEmail(); });
    $('#txtCEmail').blur(function () { checkCEmail(); });
    $.as_SendQuote = function (pname, pemail, pphone, pmessage, pcaptchaText, onSuccess, onError) {
        debugger;
        var jsonData = JSON.stringify({
            name: pname,
            email: pemail,
            phone: pphone,
            message: pmessage,
            captchaText: pcaptchaText
        });
        $.as_CallService('SendQuote', jsonData, onSuccess, onError);
    };
    $.as_CSendQuote = function (pfname, plname, pemail, pphone, pcompany, pmessage, pcaptchaText, onSuccess, onError) {

        var jsonData = JSON.stringify({
            fname: pfname,
            lname: plname,
            email: pemail,
            phone: pphone,
            company: pcompany,
            message: pmessage,
            captchaText: pcaptchaText
        });
        $.as_CallService('SendCQuote', jsonData, onSuccess, onError);
    };
    $.as_CallService = function (method, params, onSuccess, onError) {
        $.ajax({
            type: 'POST',
            url: '/service.aspx/' + method,
            contentType: 'application/json; charset=utf-8',
            data: params,
            beforeSend: function (xhr) { xhr.setRequestHeader("Content-type", "application/json; charset=utf-8"); },
            dataType: 'json',
            success: onSuccess,
            error: onError
        });
    };
    $.as_VerifyEmpty = function (elem) {
        var r = false;
        if (elem) {
            r = $.trim(elem.val()).length > 0;
            if (!r) elem.addClass('red-border').val('');
            else
                elem.removeClass('red-border');
        }
        return r;
    }
    $('#btnSubmit').click(function () {
        $('#lblInfo').empty();
        if ($.as_VerifyEmpty($('#txtName')) &
            checkEmail() &
            $.as_VerifyEmpty($('#txtPhone')) &
            $.as_VerifyEmpty($('#txtMessage')) &
            $.as_VerifyEmpty($('#txtCaptcha'))) {
            debugger;
            $.as_SendQuote($('#txtName').val(),
                $('#txtEmail').val(),
                $('#txtPhone').val(),
                $('#txtMessage').val(),
                $('#txtCaptcha').val(),
                function (r, s) {
                    debugger;
                    if (r.d == "1") {
                        ResetData();
                        $('#lblInfo').html('You will soon hear from us.');
                    } else if (r.d == "2") {
                        resetCaptcha();
                        $('#txtCaptcha').addClass('red-border');
                        $('#txtCaptcha').focus();
                    } else {
                        $('#lblInfo').html('Unexpected Error... Please try again later!');
                    }
                },
                function (xhr, e, s) { $('#lblInfo').html('Unexpected Error... Please try again later!'); });
        }
        return false;
    });
    $('#btnCSubmit').click(function () {	
        $('#lblCInfo').empty();
        if ($.as_VerifyEmpty($('#txtFName')) &
            $.as_VerifyEmpty($('#txtLName')) &
            checkCEmail() &
			$.as_VerifyEmpty($('#txtCPhone')) &
            $.as_VerifyEmpty($('#txtCCompany')) &
            $.as_VerifyEmpty($('#txtCCaptcha'))) {
            debugger;
            $.as_CSendQuote($('#txtFName').val(), $('#txtLName').val(),
                $('#txtCEmail').val(),
                $('#txtCPhone').val(),
                $('#txtCCompany').val(),
                $('#txtCMessage').val(),
                $('#txtCCaptcha').val(),
                function (r, s) {
                    debugger;
                    if (r.d == "1") {
                        ResetContactData();
                        $('#lblCInfo').html('You will soon hear from us.');
                    } else if (r.d == "2") {
                        resetCaptcha();
                        $('#txtCCaptcha').addClass('red-border');
                        $('#txtCaptcha').focus();
                    } else {
                        $('#lblCInfo').html('Unexpected Error... Please try again later!');
                    }
                },
                function (xhr, e, s) { $('#lblCInfo').html('Unexpected Error... Please try again later!'); });
        }
        return false;
    });
});
/* global $, alert, console */

$(function () {
    "use strict";
    var userError       = true,
        emailError      = true,
        messageError    = true;// Setting Error Status

    $(".username").blur(function () {
        if ($(this).val().length <= 3) { // Show Error
            $(this).css("border", "1px solid #F00")
                .css("color", "#F00")
                .parent().find(".custom-alert").fadeIn(200)
                .end().find(".asterisk").fadeIn(100)
                .end().find("i").css("color", "#F00");
            userError = true;
        } else { // No Errors
            $(this).css("border", "1px solid #080")
                .css("color", "#080")
                .parent().find(".custom-alert").fadeOut(200)
                .end().find(".asterisk").fadeOut(100)
                .end().find("i").css("color", "#080");
            userError = false;
        }
    });
    $(".email").blur(function () {
        if ($(this).val() === "") {
            $(this).css("border", "1px solid #F00")
                .css("color", "#F00")
                .parent().find(".custom-alert").fadeIn(200)
                .end().find(".asterisk").fadeIn(100)
                .end().find("i").css("color", "#F00");
            emailError = true;
        } else {
            $(this).css("border", "1px solid #080")
                .css("color", "#080")
                .parent().find(".custom-alert").fadeOut(200)
                .end().find(".asterisk").fadeOut(100)
                .end().find("i").css("color", "#080");
            emailError = false;
        }
    });
    $(".message").blur(function () {
        if ($(this).val().length <= 10) {
            $(this).css("border", "1px solid #F00")
                .css("color", "#F00")
                .parent().find(".custom-alert").fadeIn(200)
                .end().find(".asterisk").fadeIn(100)
                .end().find("i").css("color", "#F00");
            messageError = true;
        } else {
            $(this).css("border", "1px solid #080")
                .css("color", "#080")
                .parent().find(".custom-alert").fadeOut(200)
                .end().find(".asterisk").fadeOut(100)
                .end().find("i").css("color", "#080");
            messageError = false;
        }
    });

    // Submit Form Validation
    $(".contact-form").submit(function (e) {
        if (userError === true || emailError === true || messageError === true) {
            e.preventDefault();
            $(".username, .email, .message").blur();
        } else {

        }
    });
});
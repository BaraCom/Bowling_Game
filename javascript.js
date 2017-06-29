$(document).ready(function() {

    $(".enter_link").bind("click", function(){

        $(".enter_form").toggle("normal");
    });

    $(".reg_link").bind("click", function(){

        $(".reg_form").toggle("normal");
    });
});

/*
Check Active\NotActive Button
*/

function checkInputsForEnter() {
    var login = $('.enter_login').val();
    var pass = $('.password').val();

    if (login.length == 0) {
        $('.enter_button').attr('disabled', 'disabled');
    }
    else if (pass.length == 0) {
        $('.enter_button').attr('disabled', 'disabled');
    }
    else if (login.length != 0 && pass.length != 0) {
        $('.enter_button').removeAttr('disabled');
    }
}

function checkInputsForReg() {
    var login = $('.reg_login').val();
    var pass_1 = $('.pass_1').val();
    var pass_2 = $('.pass_2').val();

    if (login.length == 0) {
        $('.reg_button').attr('disabled', 'disabled');
    }
    else if (pass_1.length == 0) {
        $('.reg_button').attr('disabled', 'disabled');
    }
    else if (pass_2.length == 0) {
        $('.reg_button').attr('disabled', 'disabled');
    }
    else if (login.length != 0 && pass_1.length != 0 && pass_2 != 0) {
            $('.reg_button').removeAttr('disabled');
    }
}

/*
Profile Page
*/
function propButton(attr_for_prop) {
    $(attr_for_prop).prop('disabled', true);
}

function setName(i) {
    var a = prompt('Enter name for ' + i + ' users');

    if(a.length > 0) {
        $('.user_name_' + i).text('Name: ' + a);
    }
}
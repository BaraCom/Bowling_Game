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
function propButtonDisabled(attr_for_prop) {
    $(attr_for_prop).prop('disabled', true);
}

function setName(i) {
    var a = prompt('Enter name for player №' + i);

    if(a.length > 0) {
        $('.user_name_' + i).text('Name: ' + a);
    }
}

function random_num(min, max) {
    var random_num = (Math.random() * (max - min) + min);
    var round = Math.round(random_num);

    return round;
}

function getPoints(points_array, id) {
    return points_array[id];
}

function sumPointsValue(points_array, id, rand_num) {
    var get_points = getPoints(points_array, id);
    var sum_points = get_points + rand_num;

    return sum_points;
}

function congr(points_array) {
    var points = 0;
    var name = '';

    for (var i = 0; i < points_array.length; i++) {
        if (points_array[i] > points) {
            points = points_array[i];
            var id = i + 1;
            name = $('.user_name_' + id).html().substr(5);

        }
    }
    return 'Congratulations, ' + name + '\n You win! \n' + 'points: ' + points;
}

var points_array = [];
var player_id = 1;
var count_pitch = 1;
var total_pitches = 0;

function clickButtonPitch(quality_players) {
    var rand_num = random_num(0, 11);
    var last_player = quality_players + 1;

    if (points_array.length != quality_players && total_pitches != (quality_players * 10)) {
        if (count_pitch != 2) {
            if (rand_num == 10) {
                points_array[player_id - 1] = rand_num + 10;
                $('.user_point_' + player_id).text('Points: ' + points_array[player_id - 1]);
                player_id++;
                total_pitches += 2;

                alert('Strike!');

                if (player_id == last_player) {
                    player_id = 1;
                }
            }
            else if (rand_num == 0) {
                count_pitch++;
                total_pitches++;

                alert('You missed!');
            }
            else {
                points_array[player_id - 1] = rand_num;
                count_pitch++;
                $('.user_point_' + player_id).text('Points: ' + points_array[player_id - 1]);
                total_pitches++;
            }
        }
        else if (count_pitch == 2) {
            var sum_point = sumPointsValue(points_array, player_id - 1, rand_num);

            if (rand_num == 0) {
                count_pitch = 1;
                player_id++;
                total_pitches++;

                alert('You missed!');

                if (player_id == last_player) {
                    player_id = 1;
                }
            }
            else if (isNaN(points_array[player_id - 1])) {
                alert(sum_point);
                points_array[player_id - 1] = rand_num;
                count_pitch = 1;
                $('.user_point_' + player_id).text('Points: ' + points_array[player_id - 1]);
                player_id++;
                total_pitches++;

                if (player_id == last_player) {
                    player_id = 1;
                }
            }
            else {
                points_array[player_id - 1] = sum_point;
                count_pitch = 1;
                $('.user_point_' + player_id).text('Points: ' + points_array[player_id - 1]);
                player_id++;
                total_pitches++;

                if (player_id == last_player) {
                    player_id = 1;
                }
            }
        }
    }
    else if (points_array.length == quality_players && total_pitches != (quality_players * 10)) {
        if (count_pitch != 2) {
            var sum_point = sumPointsValue(points_array, player_id - 1, rand_num);

            if (rand_num == 10) {
                points_array[player_id - 1] = sum_point + 10;
                $('.user_point_' + player_id).text('Points: ' + points_array[player_id - 1]);
                player_id++;
                total_pitches += 2;

                alert('Strike!');

                if (player_id == last_player) {
                    player_id = 1;
                }
            }
            else if (rand_num == 0) {
                count_pitch++;
                total_pitches++;

                alert('You missed!');
            }
            else {
                points_array[player_id - 1] = sum_point;
                count_pitch++;
                $('.user_point_' + player_id).text('Points: ' + points_array[player_id - 1]);
                total_pitches++;
            }
        }
        else if (count_pitch == 2) {
            var sum_point = sumPointsValue(points_array, player_id - 1, rand_num);

            if (rand_num == 0) {
                count_pitch = 1;
                player_id++;
                total_pitches++;

                alert('You missed!');

                if (player_id == last_player) {
                    player_id = 1;
                }
            }
            else {
                points_array[player_id - 1] = sum_point;
                count_pitch = 1;
                $('.user_point_' + player_id).text('Points: ' + points_array[player_id - 1]);
                player_id++;
                total_pitches++;

                if (player_id == last_player) {
                    player_id = 1;
                }
            }
        }
    }
    else if (total_pitches == (quality_players * 10)) {
        alert(congr(points_array));
    }
}
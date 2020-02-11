/* -------    SETTING PAGE ---> UPDATE DP / UPDATE FORM SCRIPT [START] -------- */

/***** ON CLICK PLUS ICON OPENS INPUT FILE *******/
$(document).ready(function () {
    $('.plus-icon').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('#input-image').click();
    })
});
/***** /ON CLICK PLUS ICON OPEN INPUT FILE *******/


/*****  UPDATE PROFILE INFORMATION  *****/

$(document).ready(function () {
    $(".update-profile-form").submit(function (e) {
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
        button_content.html('Updating..');
        $.ajax({
            url: BASE_URL + "ControlUnit/updateProfile",
            type: "POST",
            data: form_data,
            success: function (response) {
                if (response) {
                    swal({
                        title: "Updated Successfully",
                        icon: "success",
                        button: "ok",
                    });
                    button_content.html('Update');
                }
                else {
                    swal({
                        title: "Something went wrong!",
                        icon: "error",
                        button: "ok",
                    });
                    button_content.html('Update');
                }
            }
        });
        e.preventDefault();
    });

});

/*****  /UPDATE PROFILE INFORMATION  *****/



/*****  UPDATE PASSWORD   *****/

$(document).ready(function () {
    $(".update-password-form").submit(function (e) {
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
        button_content.html('Updating..');
        $.ajax({
            url: BASE_URL + "ControlUnit/updatePassword",
            type: "POST",
            data: form_data,
            success: function (response) {
                if (response) {
                    swal({
                        title: "Updated Successfully",
                        icon: "success",
                        button: "ok",
                    });
                    button_content.html('Update');
                }
                else {
                    swal({
                        title: "Something went wrong!",
                        icon: "error",
                        button: "ok",
                    });
                    button_content.html('Update');
                }
            }
        });
        e.preventDefault();
    });

});

/*****  /UPDATE PASSWORD   *****/


/* -------    SETTING PAGE ---> UPDATE DP / UPDATE FORM SCRIPT [END] -------- */



/* -------    ADD-TOURNAMENT PAGE ---> UPDATE BANNER / OPEN PAGE / REGISTER FORM FORM SCRIPT [START] -------- */


/* -------    ADD-TOURNAMENT PAGE ---> OPEN SWAL MESSAGE SCRIPT [START] -------- */

$(document).ready(function () {
    $('#add-tournament').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var userName = $(this).data('name');
        swal({
            title: "Hello " + userName + "!",
            text: "Are you organising a tournament?",
            icon: "success",
            buttons: ["CANCEL", "REGISTER"],
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = BASE_URL + "add-tournament";
                } else {

                }
            });
    })
});

/* -------    ADD-TOURNAMENT PAGE ---> OPEN SWAL MESSAGE SCRIPT [END] -------- */

/*****   UPLOAD BANNER   *****/

$(document).ready(function () {
    $('.add-tournament-banner').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('#scrollmodal').modal('hide');
        $('#input-image').click();
    })
});

/*****   /UPLOAD BANNER   *****/

/*****   SELECT BANNER FROM LIBRARY   *****/

$(document).ready(function () {
    $('.banner').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('.banner').attr('data-id', '0');
        $('.banner').css("border", "0");
        $(this).css("border", "2px solid lightskyblue");
        $(this).attr('data-id', '1');
    })
});

/*****   /SELECT BANNER FROM LIBRARY   *****/


/*****   SAVE BANNER INTO DIRECTORY AND READY TO ENTER IN DATABASE   *****/

$(document).ready(function () {
    $('#save-img-btn').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('#scrollmodal').modal('hide');
        $('.add-banner-text').hide();
        var imgPath = $('.banner[data-id="1"]').attr("data-value");
        $('#add-banner-img').addClass('bnr');
        $('.add-tournament-bg').css('background-color', 'white');
        $('#add-banner-img').attr('src', BASE_URL + imgPath);
        $('.register-tournament-btn').attr('data-img', BASE_URL + imgPath);
        $(".add-banner-img").load(location.href + " .upload-dp>*", "");
    })
});

/*****   /SAVE BANNER INTO DIRECTORY AND READY TO ENTER IN DATABASE   *****/


/*****   REGISTER TOURNAMENT FORM   *****/

$(document).ready(function () {

    // add item to cart
    $(".tournament-register-form").submit(function (e) {
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
        button_content.html('please wait..');
        var data = {
            banner_path: button_content.attr('data-img')
        };
        $.ajax({
            url: BASE_URL + "ControlUnit/registerTournament",
            type: "POST",
            data: form_data + '&' + $.param(data),
            success: function (response) {
                if (response == 'incomplete') {
                    swal("Incomplete Fields", "Please fill all required fields", "warning");
                }else if(response){
                    swal("Good Job!", "You successfully register a tournament", "success");
                }
                 else {
                    swal("Please try again!", "error");
                }

            }
        });
        e.preventDefault();
    });

});

/*****   /REGISTER TOURNAMENT FORM   *****/

/* -------    ADD-TOURNAMENT PAGE ---> UPDATE BANNER / REGISTER FORM FORM SCRIPT [END] -------- */


/* -------    MY TEAM PAGE ---> UPDATE TEAM DP / REGITER TEAM FORM SCRIPT [START] -------- */

/*****   SELECT DP FROM LIBRARY   *****/

$(document).ready(function () {
    $('.team-pic').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('.team-pic').attr('data-id', '0');
        $('.team-pic').css("border", "0");
        $(this).css("border", "2px solid lightskyblue");
        $(this).attr('data-id', '1');
    })
});

/*****   /SELECT DP FROM LIBRARY   *****/


/*****   SAVE TEAM DP INTO DIRECTORY AND READY TO ENTER IN DATABASE   *****/

$(document).ready(function () {
    $('#save-team-img-btn').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('#scrollmodal').modal('hide');
        var imgPath = $('.team-pic[data-id="1"]').attr("data-value");
        $('.upload-team-dp').attr('src', BASE_URL + imgPath);
        $('.register-team-btn').attr('data-img',imgPath);
        $(".upload-team-dp").load(location.href + " .upload-team-dp>*", "");
    })
});

/*****   /SAVE TEAM DP INTO DIRECTORY AND READY TO ENTER IN DATABASE   *****/


/*****  REGISTER TEAM  *****/

$(document).ready(function () {
    $(".create-team-form").submit(function (e) {
        e.preventDefault();
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
        var data = {
            team_dp: button_content.attr('data-img')
        };
        button_content.html('adding..');
        $.ajax({
            url: BASE_URL + "ControlUnit/registerTeam",
            type: "POST",
            data: form_data + '&' + $.param(data),
            success: function (response) {
                console.log(response);
                if(response == 'incomplete'){
                    swal({
                        title: "Incomplete Fields",
                        text: "Please fill all required fields",
                        icon: "warning",
                        button: "ok",
                    });
                }
                else if (response) {
                    button_content.html('ADD TEAM');
                    window.location = BASE_URL + "team-players/" + response;
                }
                else {
                    swal({
                        title: "Something went wrong!",
                        icon: "error",
                        button: "ok",
                    });
                    button_content.html('ADD TEAM');
                }
            }
        });
    });

});

/*****  /REGISTER TEAM   *****/


/*****  CLICK ON TEAM CARDS   *****/

$(document).ready(function () {
    $('.teams').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var teamId = $(this).attr('data-id');
        window.location = BASE_URL + "team-players/" + teamId;
    })
});

/*****  /CLICK ON TEAM CARDS   *****/

$(document).ready(function () {
    $('.delete-team-btn').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var teamId = $(this).attr('data-id');
        swal({
            title: "Are you sure?",
            text: "Once removed, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: BASE_URL + "ControlUnit/deleteTeam",
                        type: "POST",
                        data: { team_id: teamId },
                        success: function (response) {
                            console.log(response);
                            if (response) {
                                window.location = BASE_URL + "team";
                            }
                            else {
                                swal("please try again!!");
                            }
                        }
                    });
                }
            });
    });

});


/*****  CLICK ON TEAM CARDS   *****/

$(document).ready(function () {
    $('.search-player-btn').click(function (e) {
        e.preventDefault();

        var button_content = $(this).find('button[type=submit]');
        button_content.html('searching..');

        var id = $('.search-player').val();
        console.log(id);

        if (id != '') {
            var data = {
                'user_id': id,
                'team_id': TEAM_ID
            };
            $.ajax({
                url: BASE_URL + "ControlUnit/searchPlayerOfThisId",
                type: "POST",
                data: $.param(data),
                success: function (response) {
                    if (response) {
                        $('#card-body').html(response);
                    }
                    else {
                        swal({
                            title: "Player Not Found!",
                            icon: "error",
                            button: "ok",
                        });
                        button_content.html('SEARCH');
                    }
                }
            });
        }

    });
});

$(document).ready(function () {
    $('.add-to-team-btn').click(function () {
        e.preventDefault();

        var button_content = $(this);
        button_content.html('Adding..');

        var teamId = button_content.attr('data-team');
        var playerId = button_content.attr('data-player');
        console.log(teamId + " and " + playerId);

        var data = {
            'player_id': playerId,
            'team_id': teamId
        };

        $.ajax({
            url: BASE_URL + "ControlUnit/addPlayerToTeam",
            type: "POST",
            data: $.param(data),
            success: function (response) {
                if (response) {
                    swal({
                        title: "Successfully Added",
                        text: "Player Added to your team",
                        icon: "success",
                        button: "ok",
                    });
                    button_content.html('SEARCH');
                }
                else {
                    swal({
                        title: "Player Not Found!",
                        icon: "error",
                        button: "ok",
                    });
                    button_content.html('SEARCH');
                }
            }
        });



    });
});

function addToTeam(btn) {

    var button_content = $(btn);
    button_content.html('Adding..');

    var teamId = button_content.attr('data-team');
    var userId = button_content.attr('data-player');

    var data = {
        'user_id': userId,
        'team_id': teamId
    };

    $.ajax({
        url: BASE_URL + "ControlUnit/addPlayerToTeam",
        type: "POST",
        data: $.param(data),
        success: function (response) {
            if (response) {
                swal({
                    title: "Successfully Added",
                    text: "Player Added to your team",
                    icon: "success",
                    button: "ok",
                }).then(function () {
                    window.location = BASE_URL + "team-players/" + teamId;
                });
                button_content.html('SEARCH');
            }
            else {
                swal({
                    title: "Player Not Found!",
                    icon: "error",
                    button: "ok",
                });
                button_content.html('SEARCH');
            }
        }
    });

}

/*****  /CLICK ON TEAM CARDS   *****/


/* -------    MY TEAM PAGE ---> UPDATE TEAM DP / REGITER TEAM FORM SCRIPT [END] -------- */


/* -------    VIEW TOURNAMENT PAGE ---> UPDATE TEAM DP / REGITER TEAM FORM SCRIPT [START] -------- */

/*****   OPEN VIEW TOURNAMENT  *****/

$(document).ready(function () {
    $('.tournament-card').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        //Tournament ID
        var tId = $(this).attr('data-id');
        console.log("open tournament ",tId);
        window.location = BASE_URL + "view-tournament/" + tId;

    })
});


/* -------    VIEW TOURNAMENT PAGE ---> UPDATE TEAM DP / REGITER TEAM FORM SCRIPT [END] -------- */

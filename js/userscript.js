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
        $('.register-tournament-btn').attr('data-img',imgPath);
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

/*****  CLICK ON TEAM PLAYERS CARDS   *****/

$(document).ready(function () {
    $('.players').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var playerId = $(this).attr('data-id');
        window.location = BASE_URL + "visit-player-profile/" + playerId;
    })
});

/*****  /CLICK ON TEAM PLAYERS CARDS   *****/

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
                if(response == "exist"){
                    swal({
                        title: "Already Exist",
                        icon: "warning",
                        button: "ok",
                    });
                }
                else if (response) {
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
            if(response == "exist"){
                swal({
                    title: "Already Exist",
                    icon: "warning",
                    button: "ok",
                });
                button_content.html('SEARCH');
            }
            else if (response) {
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

/*****   /OPEN VIEW TOURNAMENT  *****/


/*****  CLICK ON TEAM CARDS   *****/

$(document).ready(function () {
    $('.select-team').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('.select-team').css('border','none');
        $('.select-team').attr('data-active','0');
        $(this).css('border','2px solid #03a9f3');
        $(this).attr('data-active','1');
        //window.location = BASE_URL + "team-players/" + teamId;
    })
});

/*****  /CLICK ON TEAM CARDS   *****/

$(document).ready(function() {
    $('#tournament-request-btn').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        var teamId = $(".select-team[data-active='1']").attr('data-id');
        var tournamentId = $(this).attr('data-id');
        $.ajax({
            url: BASE_URL + "ControlUnit/requestToTournament",
            type: "POST",
            data: {"team_id":teamId, "tournament_id":tournamentId},
            success: function (response) {
                if (response == "add-players") {

                    swal({
                        title: "Sorry! Add More Players",
                        text: "Team has less than 4 players",
                        icon: "warning",
                        buttons: ["CANCEL", "ADD PLAYERS"],
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = BASE_URL + "add-players/" + teamId;
                        } else {
                            //else code
                        }
                    });

                }else if (response) {

                    swal({
                        title: "Request Sent Successfully",
                        text: "We will contact you as soon as possible",
                        icon: "success",
                        button: "ok",
                    }).then(function () {
                        window.location = BASE_URL + "home";
                    });

                }
                else {

                    swal({
                        title: "Something Went Worng!",
                        icon: "error",
                        button: "ok",
                    });

                }
            }
        });
    });
})


/* -------    VIEW TOURNAMENT PAGE ---> UPDATE TEAM DP / REGITER TEAM FORM SCRIPT [END] -------- */


/*****   OPEN VIEW MY TOURNAMENT  *****/

$(document).ready(function () {
    $('.my-tournament-card').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        //Tournament ID
        var tId = $(this).attr('data-id');
        console.log("open tournament ",tId);
        window.location = BASE_URL + "view-my-tournament/" + tId;

    })
});

/*****   /OPEN VIEW MY TOURNAMENT  *****/

$(document).ready(function() {
    $('.accept-team-request').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        var teamId = $(this).attr('data-team-id');
        var playerId = $(this).attr('data-admin-id');
        var tournamentId = $(this).attr('data-tournament-id');
        $.ajax({
            url: BASE_URL + "ControlUnit/acceptRequestToTournament",
            type: "POST",
            data: {"team_id":teamId, "admin_id": playerId ,"tournament_id":tournamentId},
            success: function (response) {
                console.log(response);
                 if (response) {

                    swal({
                        title: "Request Accept Successfully",
                        icon: "success",
                        button: "ok",
                    }).then(function () {
                        window.location = BASE_URL + "view-my-tournament/" + tournamentId;
                    });

                }
                else {

                    swal({
                        title: "Something Went Worng!",
                        icon: "error",
                        button: "ok",
                    });

                }
            }
        });
    })
});


$(document).ready(function() {
    $('.reject-team-request').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        swal({
            title: "Are You Sure?",
            text: "You want to reject the request",
            icon: "warning",
            buttons: ["CANCEL", "DELETE"],
        })
        .then((willDelete) => {
            if (willDelete) {
                var teamId = $(this).attr('data-team-id');
                var playerId = $(this).attr('data-admin-id');
                var tournamentId = $(this).attr('data-tournament-id');
                $.ajax({
                    url: BASE_URL + "ControlUnit/rejectRequestToTournament",
                    type: "POST",
                    data: {"team_id":teamId, "admin_id": playerId ,"tournament_id":tournamentId},
                    success: function (response) {
                        console.log(response);
                         if (response) {
        
                            swal({
                                title: "Request Has Been Rejeted!",
                                icon: "success",
                                button: "ok",
                            }).then(function () {
                                window.location = BASE_URL + "view-my-tournament/" + tournamentId;
                            });
        
                        }
                        else {
        
                            swal({
                                title: "Something Went Worng!",
                                icon: "error",
                                button: "ok",
                            });
        
                        }
                    }
                });
            } else {
                //else code
            }
        });   
    })
});

$(document).ready(function(){
    $('.teams-for-match').click(function(){
        var total = $('.teams-for-match.match-active-team').length;
        if(total < 2){
            if($(this).hasClass('match-active-team')){
                $(this).removeClass('match-active-team');
                $(this).attr('data-active','0');
            }else{
                $(this).addClass('match-active-team');
                $(this).attr('data-active','1');
            }
        }else{
            if($(this).hasClass('match-active-team')){
                $(this).removeClass('match-active-team');
                $(this).attr('data-active','0'); 
            }
        }
    });
});

$(document).ready(function(){
    $('.continue-with-teams').click(function(){
        var total = $('.teams-for-match.match-active-team').length;
        if(total == 2){
            var tournamentId = $('.teams-for-match').attr('data-tournament-id');
            var teams = jQuery.map(jQuery(".teams-for-match[data-active='1']"),function(n,i){
                return jQuery(n).attr('data-id');
            });
            console.log(teams);
            $.ajax({
                url: BASE_URL + "ControlUnit/startAMatch",
                type: "POST",
                data: {"team_a":teams[0],"team_b":teams[1],"tournament_id":tournamentId},
                success: function (response) {
                    if(response == "exist"){
                        swal({
                            title: "Match is already exist!",
                            icon: "warning",
                            button: "ok",
                        });
                    }
                    else if (response) {
                           window.location = BASE_URL + "start-match/" + tournamentId;
                    }
                    else {
    
                        swal({
                            title: "Something Went Worng!",
                            icon: "error",
                            button: "ok",
                        });
    
                    }
                }
            });

        }else{
            swal('teams are not selected correctly');
        }
    });
});

$(document).ready(function(){
    $('.team_a_players').click(function(){
        let playerName = $(this).attr('data-name');
        let playerId = $(this).attr('data-id');
        $("#addBattingScoreModal").modal();
        $("#batting-player-name").text(playerName);
        $('.batting-score-update-btn').attr('data-id',playerId);
    });

    $('.team_b_players').click(function(){
        let playerName = $(this).attr('data-name');
        let playerId = $(this).attr('data-id');
        $("#addBallingScoreModal").modal();
        $("#balling-player-name").text(playerName);
        $('.balling-score-update-btn').attr('data-id',playerId);
    });

    $(".batting-score-update-form").submit(function (e) {
        e.preventDefault();
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
        var data = {
            playerId : button_content.attr('data-id')
        };
        button_content.html('please wait..');
        $.ajax({
            url: BASE_URL + "ControlUnit/updateBattingScores",
            type: "POST",
            data: form_data + '&' + $.param(data),
            success: function (response) {
                if(response){
                    swal({
                        title: "Scores Updated Successfully",
                        icon: "success",
                        button: "ok",
                    });
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
    });

    $(".balling-score-update-form").submit(function (e) {
        e.preventDefault();
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
        var data = {
            playerId : button_content.attr('data-id')
        };
        button_content.html('please wait..');
        $.ajax({
            url: BASE_URL + "ControlUnit/updateBallingScores",
            type: "POST",
            data: form_data + '&' + $.param(data),
            success: function (response) {
                if(response == "empty-fields"){
                    swal({
                        title: "Scores Updated Successfully",
                        icon: "success",
                        button: "ok",
                    });
                }
                else if(response){
                    swal({
                        title: "Scores Updated Successfully",
                        icon: "success",
                        button: "ok",
                    });
                }
                else {
                    swal({
                        title: "Something went wrong!",
                        icon: "error",
                        button: "ok",
                    });
                }
                button_content.html('Update');
            }
        });
    });
})

$(document).ready(function(){
    $('.inning-complete-btn').click(function(){

        var matchId = $(this).attr('data-id');

        swal({
            title: "Are you sure ??",
            icon: "warning",
            buttons: ["NO", "YES"],
        })
        .then((value) => {
            if (value) {

                $.ajax({
                    url: BASE_URL + "ControlUnit/firstInningComplete",
                    type: "POST",
                    data: { match_id : matchId },
                    success: function (response) {

                        if(response){
                            window.location.reload();
                        }
                        else {
                            swal({
                                title: "Something went wrong!",
                                icon: "error",
                                button: "ok",
                            });
                        }
                        button_content.html('Update');
                    }
                });
                
            } else {
                //else code
            }
        });
    })
})

// alert($('.teams-for-match').length); 


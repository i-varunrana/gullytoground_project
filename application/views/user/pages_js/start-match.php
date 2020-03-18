<script>

$(document).ready(function(){
    $('#chooseTeamForBatting').modal('show'); 
});

$(document).ready(function(){
    $('.save-frst-batting-team').click(function(e){
        e.preventDefault();
        var tournamentId = $(this).attr('data-tournament-id');
        var matchId = $(this).attr('data-match-id');
        var teamId = $(this).attr('data-team-id');
        var opponentId = $(this).attr('data-opponent-id');
        var teamName = $(this).text();

        var data = {
        'match_id': matchId,
        'team_id': teamId,
        'opponent_id': opponentId
        };
        swal({
            title: 'Reconfirmation',
            text: 'Batting team is '+teamName,
            icon: 'info',
            buttons: ["CANCEL", "SAVE"],
        }).then((input)=>{
            if(input){
            
                $.ajax({
                url: BASE_URL + "ControlUnit/saveFirstBattingTeam",
                type: "POST",
                data: $.param(data),
                success: function (response) {
                    if(response){
                    window.location = BASE_URL + "start-match/" + tournamentId;
                    }else {
                    console.log(response);
                    }
                }
                }); 
            }
        });   
    });
});
</script>
<?php

Class UserDatabase extends CI_Model {

    // User login authentication
    public function login($data) {
        $condition = "user_id =" . "'" . $data['user_id'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('login_table');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
    
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }    

    // Insert registration data in database
    public function register($data) {
        $data['login_data'] = array(
            'user_id' => $data['user_id'],
            'password' => $data['password']

        );
        $data['account_data'] = array(
            'user_id' => $data['user_id'],
            'full_name' => $data['full_name']

        );
        $data['other_data'] = array(
            'user_id' => $data['user_id']

        );
        // Query to check whether username already exist or not
        $condition = "user_id =" . "'" . $data['user_id'] . "'";
        $this->db->select('*');
        $this->db->from('login_table');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0)
        {
            // Query to insert data in database
            $this->db->trans_start();
            $this->db->insert('login_table', $data['login_data']);
            $this->db->insert('user_account_table', $data['account_data']);
            $this->db->insert('user_stats_table', $data['other_data']);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE)
            {
                return "failure";
            }
            else 
            {
                return "success";
            }
        }
        else
        {
            echo "user_exist";
        }
    }

    //Fetch User Information
    public function fetchUserInfo($userId) {
        $condition = "user_id =" . "'" . $userId . "'";
        $this->db->select('*');
        $this->db->from('user_account_table');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
        return $query->result();
        } else {
       return false;
        }

    }

    //Fetch Stats Of User
    public function fetchUserStats($userId) {
        $condition = "user_id =" . "'" . $userId . "'";
        $this->db->select('*');
        $this->db->from('user_stats_table');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
        return $query->result();
        } else {
       return false;
        }
    }

    //Update user Profile
    public function updateUserProfile($userId,$data) {
        $this->db->where('user_id',$userId);
        if ($this->db->update('user_account_table',$data)) {
        return true;
        } else {
        return false;
        }
    }

    //Update user Password
    public function updateUserPassword($userId,$data) {
        $this->db->where('user_id',$userId);
        if ($this->db->update('login_table',$data)) {
        return true;
        } else {
        return false;
        }
    }

    //Get user DP
    public function getUserDp($userId) {
        $this->db->select('image_address');
        $this->db->from('user_account_table');
        $this->db->where('user_id',$userId);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    //Get Important Stats
    public function getImpStats($userId) {
        $this->db->select('matches,runs,wickets,fifties,hundreds,won,loss');
        $this->db->from('user_stats_table');
        $this->db->where('user_id',$userId);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    //Register tournament 
    public function registerTournament($data) {
        if ($this->db->insert('tournament_table',$data)) {
            return true;
        } else {
            return false;
        }
    }

    //Fetch Tournament in my city
    public function fetchTournamentInMyCity($city) {
        $this->db->select('*');
        $this->db->from('tournament_table');
        $this->db->where('t_city',$city);
        $query = $this->db->get();
        return $query->result();
    }

    //Register Team 
    public function registerUserTeam($data){
        if ($this->db->insert('team_table',$data)) {
            return true;
        } else {
            return false;
        }
    }

    //REQUEST TO TOURNAMENT 
    public function requestToTournament($data){
        $condition = "tournament_id =" . "'" . $data['tournament_id'] . "' AND " . "team_id =" . "'" . $data['team_id'] . "'";
        $this->db->select('*');
        $this->db->from('tournaments_team_table');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            $this->db->trans_start();
            $this->db->insert('tournaments_team_table',$data);
            $this->db->trans_complete();
		    return $this->db->trans_status() ? TRUE : FALSE;
        } else {
            return 'registered';
        }
    } 

    //Fetch My Teams
    public function fetchUserTeam($userId) {
        // $this->db->select('*');
        // $this->db->from('team_table');
        // $this->db->where('admin_id',$userId);
        // $query = $this->db->get();
        // return $query->result();
		$query = "SELECT * FROM team_table LEFT JOIN (SELECT COUNT(*) as total_players ,team_id as relation_id FROM team_relation_table GROUP by team_id) as t1 on t1.relation_id = team_table.team_id WHERE admin_id = '" . $userId . "'";
		$query = $this->db->query($query)->result_array();
		return $this->db->affected_rows() ? $query : false;
    } 

    //Fetch Users
    public function fetchUsersById($userId) {
        $this->db->select('*');
        $this->db->from('user_account_table');
        $this->db->where('user_id',$userId);
        $query = $this->db->get();
        return $query->result();
    } 

    //Fetch Basic User Info
    public function fetchBasicUserInfo(){
        $this->db->select('t1','t2.matches','t2.runs','t2.wicktes');

    }

    //CHECK WEATHER PROFILE IS COMPLETE OR NOT
    public function isProfileCompleted($userId){
        $query = "SELECT * FROM user_account_table WHERE user_id= '".$userId."' AND gender IS NULL OR gender = '' AND playing_role IS NULL OR playing_role = '' AND batting_style IS NULL OR batting_style = '' AND balling_style IS NULL OR balling_style = '' AND ball_type IS NULL OR ball_type = '' AND city IS NULL OR city = ''";
		$result = $this->db->query($query)->result_array();
        return $this->db->affected_rows() ? FALSE : TRUE;
    }

    //DELETE TEAM AND ITS PLAYERS
    public function deleteTeam($data){
        $this->db->trans_start();
        $this->db->delete('team_table',$data); 
        $this->db->delete('team_relation_table',$data); 
        $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE)
            {
                return false;
            }
            else 
            {
                return true;
            }
    }
     
    //------------------  all fetch ----------------------//
    public function selectAllFromTableJoinWhere($tableName=null,$join=null,$condition=null,$getColumn=null){
        $result = $this->db->join($join[0],$join[1])->select($getColumn)->get_where($tableName,$condition)->result_array();
        return $this->db->affected_rows() ? $result : FALSE;
    }

    public function selectAllFromTableWhere($tableName=null,$condition=null,$getColumn=null){
        $result = $this->db->select($getColumn)->get_where($tableName,$condition)->result_array();
        return $this->db->affected_rows() ? $result : FALSE;
    }

    public function isRowExist($tableName=null,$condition=null,$getColumn=null){
        $result = $this->db->select($getColumn)->get_where($tableName,$condition)->result_array();
        return ($this->db->affected_rows() >= 1) ? TRUE : FALSE;
    }

    //------------------  /all fetch ----------------------//

    //------------------  insert all ----------------------//
    public function saveIntoDatabase($tableName=null,$data=null) {
        $this->db->trans_start();
        $this->db->insert($tableName,$data);
        $this->db->trans_complete();
		return $this->db->trans_status() ? TRUE : FALSE;
    }
    //------------------  insert all ----------------------//

    public function multipleDataFetch($tableName=null,$in=null,$getColumn=null) {
        $this->db->select($getColumn);
        $this->db->from($tableName);
        $this->db->where_in('user_id', $in);
        $query = $this->db->get()->result_array();
        return $this->db->affected_rows() ? $query : FALSE;
    }

    //FETCH CSS AND JS
    public function fetchUpdateDateTime(){
        $this->db->select('*');
        $this->db->from('login_table');
        $this->db->where("id","1");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
        
    }

    //UPDATE CSS AND JS
    public function updateCssandJs($tableName=null,$data=null){
        $this->db->update($tableName,$data);
		return $this->db->affected_rows() ? TRUE  : FALSE;
    }

    //FETCH TOTAL TEAM PLAYERS
    public function getTotalTeamPlayers($teamId){
        $this->db->select('user_id');
        $this->db->from('team_relation_table');
        $this->db->where("team_id",$teamId);
        $query = $this->db->get();
        $result = $query->result();
        return count($result);
    }

    //ADD PLAYER TO TEAM
    public function addPlayerToTeam($userId, $teamId) {
        $condition = "team_id =" . "'" . $teamId . "' AND " . "user_id =" . "'" . $userId . "'";
        $this->db->select('*');
        $this->db->from('team_relation_table');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            $data = array("team_id" => $teamId, "user_id" => $userId);
            $this->db->trans_start();
            $this->db->insert("team_relation_table",$data);
            $this->db->trans_complete();
            return $this->db->trans_status() ? TRUE : FALSE;
        } else {
            return "exist";
        }
    }

    //FETCH TEAM DETAILS
    public function fetchTeamDetail($teamId){
        $query = "SELECT team.team_id,admin_id,admin_name,team_name,team_city,team_dp,COUNT(relation.team_id) AS total_players FROM team_relation_table AS relation, team_table AS team WHERE team.team_id = relation.team_id AND team.team_id= '".$teamId."' GROUP BY relation.team_id";
		$result = $this->db->query($query)->result_array();
        return $this->db->affected_rows() ? $result : FALSE; 
    }

    //ACCEPT TEAM REQUEST TO TOURNAMENT
    public function acceptRequestToTournament($where) {
        $data = array('accepted'=>'1','rejected' => '0');
        $this->db->trans_start();
        $this->db->where($where);
        $this->db->update("tournaments_team_table",$data);
        $this->db->trans_complete();
        return $this->db->trans_status() ? TRUE : FALSE;
    }

     //REJECT TEAM REQUEST TO TOURNAMENT
     public function rejectRequestToTournament($where) {
        $data = array('rejected'=>'1','accepted'=>'0');
        $this->db->trans_start();
        $this->db->where($where);
        $this->db->update("tournaments_team_table",$data);
        $this->db->trans_complete();
        return $this->db->trans_status() ? TRUE : FALSE;
    }

    //SEND NOTIFICATION TO PLAYER
    public function sendNotificaitonToPlayer($tableName,$data){
        $this->db->trans_start();
        $this->db->insert($tableName,$data);
        $this->db->trans_complete();
		return $this->db->trans_status() ? TRUE : FALSE;
    }

    public function isLiveMatchExist($tournamentId,$userId){
        $condition = "t_id =" . "'" . $tournamentId . "' AND " . "t_user_id =" . "'" . $userId . "'";
        $this->db->select('*');
        $this->db->from('tournament_table');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $condition = "tournament_id =" . "'" . $tournamentId . "' AND " . "active = 1";
            $this->db->select('*');
            $this->db->from('match_table');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() == 1)
                return true;
            else
                return false;
        } else {
            return false;
        }
    }

    public function saveData($tableName,$data,$where){
        $this->db->trans_start();
        $this->db->where($where);
        $this->db->update($tableName,$data);
        $this->db->trans_complete();
        return $this->db->trans_status() ? TRUE : FALSE;
    }

    public function updateMatchBattingScores($data){
        $this->db->trans_start();
        $SQL = "UPDATE user_match_stats SET matches = 1, batting_innings = 1, 
        not_out = " . $data['not_out'] . ", runs = ".$data['total_runs'].", highest_runs = IF(highest_runs < ".$data['total_runs']." , ".$data['total_runs'].", highest_runs), 
        batting_avg = IF(".$data['not_out']." = 1, 'N.A.', ROUND((".$data['total_runs']." / (1 - ".$data['not_out'].")),2)),
        batting_sr = ROUND((".$data['total_runs']." / (".$data['ball_played']." * 100)),2), 
        ball_played = ".$data['ball_played'].", 
        fifties = IF(".$data['total_runs']." >= 50 && ".$data['total_runs']." < 100, 1, fifties), hundreds = IF(".$data['total_runs']." >= 100, 1, hundreds), 
        sixes = ".$data['sixes'].", ducks = IF(".$data['total_runs']." <= 0, 1, ducks), fours = ".$data['fours'].", is_batting_score_updated = true  WHERE user_id = ". $data['user_id'];

        $this->db->query($SQL);
        $this->db->trans_complete();
        return $this->db->trans_status() ? TRUE : FALSE;
    }
    public function updateMatchBallingScores($data){
        $this->db->trans_start();
        $SQL = "UPDATE user_match_stats SET balling_innings = 1, overs = " . $data['overs'] . ", 
        maidens = ".$data['maidens'].", wickets = ".$data['wickets'].", 
        balling_avg = ROUND((".$data['runs']." / ".$data['wickets']."),2), 
        balling_sr = ROUND(((".$data['runs']." * 6) / (".$data['overs']." * 6)),2), 
        give_runs = ".$data['runs'].", five_wickets = IF(".$data['wickets']." >=5, 1, five_wickets), 
        dot_balls = ".$data['total_dot_balls'].", give_sixes = ".$data['sixes'].", 
        give_fours = ".$data['fours'].", is_balling_score_updated = true  WHERE user_id = ". $data['user_id'];

        $this->db->query($SQL);
        $this->db->trans_complete();
        return $this->db->trans_status() ? TRUE : FALSE;
    }

    public function updateBattingScores($data){
        $this->db->trans_start();
        $SQL = "UPDATE user_match_stats SET matches = (matches+1), batting_innings = (batting_innings+1), 
        not_out = " . $data['not_out'] . ", runs = runs + ".$data['total_runs'].", highest_runs = IF(highest_runs < ".$data['total_runs']." , ".$data['total_runs'].", highest_runs), 
        batting_avg = ((".$data['total_runs']." + runs) / ((batting_innings+1) - (not_out + ".$data['not_out']."))) , 
        batting_sr = ((".$data['total_runs']." + runs) / (".$data['ball_played']." + ball_played) * 100), 
        ball_played = (ball_played + ".$data['ball_played']."), 
        fifties = IF(".$data['total_runs']." >= 50 && ".$data['total_runs']." < 100, fifties+1, fifties), hundreds = IF(".$data['total_runs']." >= 100, hundreds+1, hundreds), 
        sixes = sixes + ".$data['sixes'].", ducks = IF(".$data['total_runs']." <= 0, ducks+1, ducks), fours = fours + ".$data['fours']."  WHERE user_id = ". $data['user_id'];

        $this->db->query($SQL);
        $this->db->trans_complete();
        return $this->db->trans_status() ? TRUE : FALSE;
    }

    public function updateBallingScores($data){
        $this->db->trans_start();
        $SQL = "UPDATE user_match_stats SET balling_innings = (balling_innings+1), overs = overs + " . $data['overs'] . ", 
        maidens = maidens + ".$data['maidens'].", wickets = wickets + ".$data['wickets'].", balling_avg = ((".$data['runs']." + give_runs) / (".$data['wickets']." + wickets)), 
        give_runs = give_runs + ".$data['runs'].", five_wickets = IF(".$data['wickets']." >=5, (five_wickets+1), five_wickets), 
        dot_balls = dot_balls + ".$data['total_dot_balls'].", give_sixes = give_sixes + ".$data['sixes'].", balling_sr = (((".$data['runs']." + give_runs) * 6) / ((".$data['overs']." + overs) * 6)), 
        give_fours = give_fours + ".$data['fours']."  WHERE user_id = ". $data['user_id'];
        $this->db->query($SQL);
        $this->db->trans_complete();
        return $this->db->trans_status() ? TRUE : FALSE;
    }

    public function frstInningComplete($matchId){
        $this->db->trans_start();
        $this->db->where('match_id',$matchId);
        $this->db->update("match_table",array('is_first_inning_complete' => 1));
        $this->db->trans_complete();
        return $this->db->trans_status() ? TRUE : FALSE;
    }


    public function fetchPlayesIds($tableName=null,$condition=null,$getColumn=null){
        $this->db->select($getColumn);
        $this->db->from($tableName);
        $this->db->where_in("team_id",$condition);
        $query = $this->db->get();
        return $query->result();
    }

    public function SaveMultipleData($table,$data){
         $query = $this->db->insert($table, $data);
         return $this->db->insert_id();
    }

    public function insertMultipleData($table,$data){
        $this->db->trans_start();
        $this->db->insert_batch($table, $data);
        $this->db->trans_complete();
        return $this->db->trans_status() ? TRUE : FALSE;
    }

    public function matchComplete($matchId, $winningTeam, $lossingTeam, $draw){

        $firstWhere = array('match_id'=> $matchId, 'is_balling_score_updated'=> 0);
        $secondWhere = array('match_id'=> $matchId, 'is_batting_score_updated'=> 0);
        $thirdWhere = array('match_id'=> $matchId);
        $this->db->trans_start();
        $this->db->where($firstWhere);
        $this->db->update("user_match_stats",array('matches' => 1,'is_balling_score_updated'=> 1));
        $this->db->where($secondWhere);
        $this->db->update("user_match_stats",array('matches' => 1,'is_batting_score_updated'=> 1));
        $this->db->where($thirdWhere);
        $this->db->update("match_table",array('winning_team' => $winningTeam,'lossing_team'=> $lossingTeam,'draw'=>$draw, 'active'=> 0));
        $this->db->trans_complete();
        return $this->db->trans_status() ? TRUE : FALSE;
    }


    


// ----------------------------------------------------------------------------------------  //

// Read data from database to show data in admin page
public function read_user_information($username) {

$condition = "user_name =" . "'" . $username . "'";
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}



public function getUserInfo($userId) {
    $condition = "user_id =" . "'" . $userId . "'";
    $this->db->select('*');
    $this->db->from('user_info_table');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
    return $query->result();
    } else {
    return false;
    }

}

public function updateUserInfo($userId,$data){
    $this->db->where('user_id',$userId);
    if ($this->db->update('user_info_table',$data)) {
    return true;
    } else {
    return false;
    }
}

public function saveUserAddress($data){
    if($this->db->insert('user_addresses_table',$data)){
        return true;
    }else {
        return false;
    }
}

public function fetchUserAddresses($userId){
    $this->db->select('*');
    $this->db->from('user_addresses_table');
    $this->db->where('user_id',$userId);
    $query = $this->db->get();
    return $query;
}

public function deleteUserAddress($addressId) {
    $this->db->where('address_id', $addressId);
    if($this->db->delete('user_addresses_table')){
        return true;
    }else{
        return false;
    }
}




}

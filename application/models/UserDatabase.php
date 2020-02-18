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
        $query = $this->db->get();
        return $query->result();
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
?>
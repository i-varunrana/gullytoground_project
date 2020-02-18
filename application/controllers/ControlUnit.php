<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControlUnit extends CI_Controller
{

    /**
     * main controller.
     */

    public function __construct()
    {
        parent::__construct();

        // Load form helper library
        $this->load->helper('form', 'security');

        // Load form validation library
        $this->load->library('form_validation');

        // Load session library
        $this->load->library('session');

        // Load database
        $this->load->model('userDatabase');
    }

    public function index()
    {
        $this->load->view('authenticate/login');
    }

    /* pages calling functions  starts*/

    //Login Page
    public function loginPage()
    {
        $this->load->view('authenticate/login');
    }

    //Resigter Page
    public function registerPage()
    {
        $this->load->view('authenticate/register');
    }

    //Home Page
    public function homePage()
    {
        if ($this->session->has_userdata('logged_in')) {
            $result = $this->session->userdata('logged_in');
            $data['user_id'] = $result['user_id'];
            $where = array('id'=>'1');
            $data['update_css_js'] = $this->userDatabase->selectAllFromTableWhere('update_app_table',$where,'datetime');
            $data['profile_complete'] = $this->isProfileCompleted($result['user_id']);
            $data['user_info'] = $this->userDatabase->fetchUserInfo($result['user_id']);
            $data['tournaments'] = $this->userDatabase->fetchTournamentInMyCity($data['user_info'][0]->city);
            $data['user_stats'] = $this->userDatabase->getImpStats($result['user_id']);
            $data['featured_players'] = $this->getFeaturedPlayers();
            $this->load->view('user/home', $data);
        } else {
            $this->load->view('authenticate/login');
        }
    }

    //Profile Page
    public function profilePage()
    {
        if ($this->session->has_userdata('logged_in')) {
            $result = $this->session->userdata('logged_in');
            $data['user_id'] = $result['user_id'];
            $where = array('id'=>'1');
            $data['update_css_js'] = $this->userDatabase->selectAllFromTableWhere('update_app_table',$where,'datetime');
            $data['user_info'] = $this->userDatabase->fetchUserInfo($result['user_id']);
            $data['user_stats'] = $this->userDatabase->getImpStats($result['user_id']);
            $this->load->view('user/profile', $data);
        } else {
            $this->load->view('authenticate/login');
        }
    }

    //Tournament Page
    public function tournamentsPage()
    {
        if ($this->session->has_userdata('logged_in')) {
            $result = $this->session->userdata('logged_in');
            $where = array('id'=>'1');
            $data['update_css_js'] = $this->userDatabase->selectAllFromTableWhere('update_app_table',$where,'datetime');
            $data['where'] = array('user_id' => $result['user_id']);
            $data['user_info'] = $this->userDatabase->selectAllFromTableWhere('user_account_table', $data['where'], 'user_id,full_name,city,image_address');
            $data['where'] = array(
                't_city' => $data['user_info'][0]['city'],
                'upcoming' => '1'
            );
            $data['upcoming_tournaments'] = $this->userDatabase->selectAllFromTableWhere('tournament_table',$data['where'],'*');
            $data['where'] = array(
                't_city' => $data['user_info'][0]['city'],
                'ongoing' => '1'
            );
            $data['ongoing_tournaments'] = $this->userDatabase->selectAllFromTableWhere('tournament_table',$data['where'],'*');
            $this->load->view('user/tournaments', $data);
        } else {
            $this->load->view('authenticate/login');
        }
    }

    //My Tournament Page
    public function myTournamentsPage()
    {
        if ($this->session->has_userdata('logged_in')) {
            $result = $this->session->userdata('logged_in');
            $where = array('id'=>'1');
            $data['update_css_js'] = $this->userDatabase->selectAllFromTableWhere('update_app_table',$where,'datetime');
            $data['where'] = array('user_id' => $result['user_id'],'');
            $data['user_info'] = $this->userDatabase->selectAllFromTableWhere('user_account_table', $data['where'], 'user_id,full_name,image_address,city');
            $data['where'] = array(
                't_user_id' => $result['user_id'],
                't_city' => $data['user_info'][0]['city'],
                'upcoming' => '1'
            );
            $data['upcoming_my_tournaments'] = $this->userDatabase->selectAllFromTableWhere('tournament_table',$data['where'],'*');
            $data['where'] = array(
                't_user_id' => $result['user_id'],
                't_city' => $data['user_info'][0]['city'],
                'ongoing' => '0',
                'upcoming' => '0'
            );
            $data['ongoing_my_tournaments'] = $this->userDatabase->selectAllFromTableWhere('tournament_table',$data['where'],'*');

            $this->load->view('user/my-tournaments', $data);
        } else {
            $this->load->view('authenticate/login');
        }
    }

    //View My Tournament Page
    public function viewMyTournamentPage($tournamentId){
        if ($this->session->has_userdata('logged_in')) {
            $result = $this->session->userdata('logged_in');
            $data['tournament_id'] = $tournamentId;
            $where = array('id'=>'1');
            $data['update_css_js'] = $this->userDatabase->selectAllFromTableWhere('update_app_table',$where,'datetime');
            $data['where'] = array('user_id' => $result['user_id']);
            $data['user_info'] = $this->userDatabase->selectAllFromTableWhere('user_account_table', $data['where'], 'user_id,full_name,image_address');
            $data['where'] = array('tournament_id' => $tournamentId, 'accepted' => '0', 'rejected' => '0');
            $data['requested_teams'] = $this->userDatabase->selectAllFromTableWhere('tournaments_team_table',$data['where'],'team_id');
            $data['where'] = array('tournament_id' => $tournamentId, 'accepted' => '1', 'rejected' => '0');
            $data['participated_teams'] = $this->userDatabase->selectAllFromTableWhere('tournaments_team_table',$data['where'],'team_id');
            $this->load->view('user/view-my-tournament', $data);
        } else {
            $this->load->view('authenticate/login');
        }
    }

    //Add Tournament Page
    public function addTournamentPage()
    {
        if ($this->session->has_userdata('logged_in')) {
            $result = $this->session->userdata('logged_in');
            $where = array('id'=>'1');
            $data['update_css_js'] = $this->userDatabase->selectAllFromTableWhere('update_app_table',$where,'datetime');
            $data['where'] = array('user_id' => $result['user_id']);
            $data['user_info'] = $this->userDatabase->selectAllFromTableWhere('user_account_table', $data['where'], 'user_id,full_name,image_address');
            $this->load->view('user/add-tournament', $data);
        } else {
            $this->load->view('authenticate/login');
        }
    }

    //View Tournament
    public function viewTournamentPage($tournamentId){
        if ($this->session->has_userdata('logged_in')) {
            $result = $this->session->userdata('logged_in');
            $where = array('id'=>'1');
            $data['update_css_js'] = $this->userDatabase->selectAllFromTableWhere('update_app_table',$where,'datetime');
            $where = array('t_id'=>$tournamentId);
            $join = array('user_stats_table', 'user_stats_table.user_id = user_account_table.user_id');
            $data['tournament'] = $this->userDatabase->selectAllFromTableWhere('tournament_table',$where,'*');
            $data['where'] = array('user_id' => $result['user_id']);
            $data['user_info'] = $this->userDatabase->selectAllFromTableWhere('user_account_table', $data['where'], 'user_id,full_name,image_address');
            $data['user_teams'] = $this->userDatabase->fetchUserTeam($result['user_id']);
            $this->load->view('user/view-tournament', $data);
        } else {
            $this->load->view('authenticate/login');
        }
    }

    //My Team Page
    public function myTeamPage()
    {
        if ($this->session->has_userdata('logged_in')) {
            $result = $this->session->userdata('logged_in');
            $where = array('id'=>'1');
            $data['update_css_js'] = $this->userDatabase->selectAllFromTableWhere('update_app_table',$where,'datetime');
            $data['user_info'] = $this->userDatabase->fetchUserInfo($result['user_id']);
            $data['user_dp'] = $this->userDatabase->getUserDp($result['user_id']);
            $data['user_teams'] = $this->userDatabase->fetchUserTeam($result['user_id']);
            $this->load->view('user/team', $data);
        } else {
            $this->load->view('authenticate/login');
        }
    }

    //Create Team Page
    public function createTeamPage()
    {
        if ($this->session->has_userdata('logged_in')) {
            $result = $this->session->userdata('logged_in');
            $where = array('id'=>'1');
            $data['update_css_js'] = $this->userDatabase->selectAllFromTableWhere('update_app_table',$where,'datetime');
            $data['user_info'] = $this->userDatabase->fetchUserInfo($result['user_id']);
            $data['user_dp'] = $this->userDatabase->getUserDp($result['user_id']);
            $this->load->view('user/create-team', $data);
        } else {
            $this->load->view('authenticate/login');
        }
    }

    //Team Players Page
    public function teamPlayersPage($teamId)
    {
        if ($this->session->has_userdata('logged_in')) {
            $result = $this->session->userdata('logged_in');
            $where = array('id'=>'1');
            $data['update_css_js'] = $this->userDatabase->selectAllFromTableWhere('update_app_table',$where,'datetime');
            //Fetch Team Player Ids
            $data['team_id'] = $teamId;
            $data['where'] = array('team_id' => $teamId);
            $data['team_player_ids'] = empty($this->userDatabase->selectAllFromTableWhere('team_relation_table', $data['where'], 'user_id')) ? 0 : $this->userDatabase->selectAllFromTableWhere('team_relation_table', $data['where'], 'user_id');
            //Fetch Team Payers
            if ($data['team_player_ids'] != 0) {
                $data['team_players'] = $this->userDatabase->multipleDataFetch('user_account_table', array_column($data['team_player_ids'], 'user_id'), 'user_id,full_name,playing_role,batting_style,city,image_address');
                $data['total_players'] = count($data['team_players']);
            } else {
                $data['total_players'] = 0;
            }
            //Fetch Team Name
            $data['user_info'] = $this->userDatabase->fetchUserInfo($result['user_id']);
            $data['where'] = array('team_id' => $teamId);
            $data['team_info'] = $this->userDatabase->selectAllFromTableWhere('team_table', $data['where'], 'team_name');
            //Fetch total players
            $data['totalPlayers'] = $this->userDatabase->getTotalTeamPlayers($teamId);
            $this->load->view('user/team-players', $data);
        } else {
            $this->load->view('authenticate/login');
        }
    }

    //Visit Team Player Profile Page
    public function visitTeamPlayerPage($playerId){
        if ($this->session->has_userdata('logged_in')) {
            $result = $this->session->userdata('logged_in');
            $data['user_id'] = $playerId;
            $where = array('id'=>'1');
            $data['update_css_js'] = $this->userDatabase->selectAllFromTableWhere('update_app_table',$where,'datetime');
            $data['user_info'] = $this->userDatabase->fetchUserInfo($result['user_id']);
            $data['player_info'] = $this->userDatabase->fetchUserInfo($playerId);
            $data['player_stats'] = $this->userDatabase->fetchUserStats($playerId);
            $this->load->view('user/visit-player-profile', $data);
        } else {
            $this->load->view('authenticate/login');
        }
    }


    //Add player Page
    public function addPlayersPage($teamId)
    {
        if ($this->session->has_userdata('logged_in')) {
            $data['team_id'] = $teamId;
            $result = $this->session->userdata('logged_in');
            $where = array('id'=>'1');
            $data['update_css_js'] = $this->userDatabase->selectAllFromTableWhere('update_app_table',$where,'datetime');
            $data['user_info'] = $this->userDatabase->fetchUserInfo($result['user_id']);
            $data['user_dp'] = $this->userDatabase->getUserDp($result['user_id']);
            $where = array('team_id'=>$teamId);
            $data['team'] = $this->userDatabase->selectAllFromTableWhere('team_table',$where,'team_name');
            $data['totalPlayers'] = $this->userDatabase->getTotalTeamPlayers($teamId);
            $this->load->view('user/add-players', $data);
        } else {
            $this->load->view('authenticate/login');
        }
    }


    //Settings Page
    public function settingsPage()
    {
        if ($this->session->has_userdata('logged_in')) {
            $result = $this->session->userdata('logged_in');
            $data['user_id'] = $result['user_id'];
            $where = array('id'=>'1');
            $data['update_css_js'] = $this->userDatabase->selectAllFromTableWhere('update_app_table',$where,'datetime');
            $data['user_info'] = $this->userDatabase->fetchUserInfo($result['user_id']);
            $this->load->view('user/settings', $data);
        } else {
            $this->load->view('authenticate/login');
        }
    }

    //Stats Page
    public function statsPage()
    {
        if ($this->session->has_userdata('logged_in')) {
            $result = $this->session->userdata('logged_in');
            $where = array('id'=>'1');
            $data['update_css_js'] = $this->userDatabase->selectAllFromTableWhere('update_app_table',$where,'datetime');
            $data['where'] = array('user_id' => $result['user_id']);
            $data['user_info'] = $this->userDatabase->selectAllFromTableWhere('user_account_table', $data['where'], 'user_id,full_name,image_address');
            $data['user_stats'] = $this->userDatabase->fetchUserStats($result['user_id']);
            $this->load->view('user/stats', $data);
        } else {
            $this->load->view('authenticate/login');
        }
    }

    /* pages calling functions  stop */

    /* Images Upload Functions starts */
    public function uploadDp()
    {
        if ($this->session->has_userdata('logged_in')) {
            //Accessing USER ID 
            $result = $this->session->userdata('logged_in');
            $userId = $result['user_id'];

            $imageDest = "dp/";

            $data = $this->input->post('image');

            $image_array_1 = explode(";", $data);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $imageName = $imageDest . $userId . '.jpg';

            if (file_exists($imageName)) {
                unlink($imageName);
                file_put_contents($imageName, $data);
            }
            file_put_contents($imageName, $data);
            date_default_timezone_set("Asia/Kolkata");
            $imageAddress = 'dp/' . $userId . '.jpg';
            $data = array('image_address' => $imageAddress . '?t=' . date('Y-m-d H:i:s', time()));
            $time = date('Y-m-d H:i:s', time());
            if ($this->userDatabase->updateUserProfile($userId, $data)) {
                echo $imageAddress . '?t=' . date('Y-m-d H:i:s', time());
            } else {
                echo false;
            }
        } else {
            $this->load->view('authenticate/login');
        }
    }
    /* Images Upload Functions stop */


    /* Images Upload Functions starts */
    public function uploadBanner()
    {
        if ($this->session->has_userdata('logged_in')) {
            //Accessing USER ID 
            $result = $this->session->userdata('logged_in');
            $userId = $result['user_id'];

            $imageDest = "banners/";

            $data = $this->input->post('image');

            $image_array_1 = explode(";", $data);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $imageName = $imageDest . $userId . '.jpg';

            if (file_exists($imageName)) {
                unlink($imageName);
                file_put_contents($imageName, $data);
            }
            file_put_contents($imageName, $data);
            date_default_timezone_set("Asia/Kolkata");
            $imageAddress = 'dp/' . $userId . '.jpg';
            $data = array('image_address' => $imageAddress . '?t=' . date('Y-m-d H:i:s', time()));
            $time = date('Y-m-d H:i:s', time());
            if ($this->userDatabase->updateUserProfile($userId, $data)) {
                echo $imageAddress . '?t=' . date('Y-m-d H:i:s', time());
            } else {
                echo false;
            }
        } else {
            $this->load->view('authenticate/login');
        }
    }
    /* Images Upload Functions stop */


    /* Images Upload Functions starts */
    public function uploadTeamDp()
    {
        if ($this->session->has_userdata('logged_in')) {
            //Accessing USER ID 
            $result = $this->session->userdata('logged_in');
            $userId = $result['user_id'];

            $picId = $this->random_strings(6);

            $imageDest = "team_dp/";

            $data = $this->input->post('image');

            $image_array_1 = explode(";", $data);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $imageName = $imageDest . $picId . $userId . '.jpg';

            if (file_exists($imageName)) {
                unlink($imageName);
                //file_put_contents($imageName, $data);
            }
            file_put_contents($imageName, $data);
            date_default_timezone_set("Asia/Kolkata");
            $imageAddress = 'dp/' . $userId . '.jpg' . '?t=' . date('Y-m-d H:i:s', time());
            //$data = array( 'image_address' => $imageAddress.'?t='.date('Y-m-d H:i:s', time()));
            //$time = date('Y-m-d H:i:s', time());
            echo $imageAddress;
            //if ($this->userDatabase->updateUserProfile($userId,$data)){ echo $imageAddress; }else{ echo false; }

        } else {
            $this->load->view('authenticate/login');
        }
    }
    /* Images Upload Functions stop */



    /* Update Function Starts */

    public function updateProfile()
    {
        if ($this->session->has_userdata('logged_in')) {
            $result = $this->session->userdata('logged_in');
            $data['user_info'] = $this->userDatabase->fetchUserInfo($result['user_id']);


            $userId = $result['user_id'];
            $data['update'] = array(
                'full_name' => empty($this->input->post('full_name')) ? $data['user_info'][0]->full_name : $this->input->post('full_name'),
                'email' => empty($this->input->post('email')) ? $data['user_info'][0]->email : $this->input->post('email'),
                'dob' => empty($this->input->post('dob')) ? $data['user_info'][0]->dob : $this->input->post('dob'),
                'gender' => empty($this->input->post('gender')) ? $data['user_info'][0]->gender : $this->input->post('gender'),
                'playing_role' => empty($this->input->post('playing_role')) ? $data['user_info'][0]->playing_role : $this->input->post('playing_role'),
                'batting_style' => empty($this->input->post('batting_style')) ? $data['user_info'][0]->batting_style : $this->input->post('batting_style'),
                'balling_style' => empty($this->input->post('balling_style')) ? $data['user_info'][0]->balling_style : $this->input->post('balling_style'),
                'ball_type' => empty($this->input->post('ball_type')) ? $data['user_info'][0]->ball_type : $this->input->post('ball_type'),
                'city' => empty($this->input->post('city')) ? $data['user_info'][0]->city : $this->input->post('city')
            );
            if ($this->userDatabase->updateUserProfile($userId, $data['update'])) {
                echo true;
            } else {
                echo false;
            }
        } else {
            $this->load->view('authenticate/login');
        }
    }

    public function updatePassword()
    {
        if ($this->session->has_userdata('logged_in')) {
            $result = $this->session->userdata('logged_in');


            $userId = $result['user_id'];
            $data = array(
                'password' => $this->input->post('password')
            );
            if ($this->userDatabase->updateUserPassword($userId, $data)) {
                echo true;
            } else {
                echo false;
            }
        } else {
            $this->load->view('authenticate/login');
        }
    }

    /* Update Function Stop */

    /* Authentication functions starts */

    public function loginAuth()
    {
        $data = array(
            'user_id' => $this->input->post('phone'),
            'password' => $this->input->post('password')
        );
        if ($this->userDatabase->login($data)) {
            $session_data = array('user_id' => $this->input->post('phone'));
            $this->session->set_userdata('logged_in', $session_data);

            // Add user data in session
            if ($this->session->has_userdata('logged_in')) {
                echo true;
            } else {
                echo false;
            }
        } else {
            echo "invalid_user";
        }
    }
    /* Authentication functions starts */

    /* User register function starts */

    public function userRegister()
    {
        $data = array(
            'user_id' => $this->input->post('phone'),
            'full_name' => $this->input->post('full-name'),
            'password' => $this->input->post('password')
        );
        $result = $this->userDatabase->register($data);
        echo $result;
    }

    /* User register function end */

    /* User logout start */

    public function userLogout()
    {
        $this->session->unset_userdata('logged_in');
        $this->load->view('authenticate/login');
    }

    /* User logout end */

    /* Resigter Tournament function starts */

    public function registerTournament()
    {
        if ($this->session->has_userdata('logged_in')) {
            if (
                !empty($this->input->post('t_name')) && !empty($this->input->post('t_city')) && !empty($this->input->post('t_ground')) &&
                !empty($this->input->post('t_organizer_name')) && !empty($this->input->post('t_organizer_number')) &&
                !empty($this->input->post('t_type')) && !empty($this->input->post('t_ball_type')) && !empty($this->input->post('t_overs')) &&
                !empty($this->input->post('t_start_date')) && !empty($this->input->post('t_end_date')) && !empty($this->input->post('t_info'))
            ) {

                $tId = rand(100000000000, 999999999999);
                $result = $this->session->userdata('logged_in');
                $data['user_info'] = $this->userDatabase->fetchUserInfo($result['user_id']);

                $data['update'] = array(
                    't_id' => $tId,
                    't_user_id' => $result['user_id'],
                    't_name' => $this->input->post('t_name'),
                    't_city' => $this->input->post('t_city'),
                    't_ground' => $this->input->post('t_ground'),
                    't_organizer_name' => $this->input->post('t_organizer_name'),
                    't_organizer_number' => $this->input->post('t_organizer_number'),
                    't_type' => $this->input->post('t_type'),
                    't_ball_type' => $this->input->post('t_ball_type'),
                    't_overs' => $this->input->post('t_overs'),
                    't_start_date' => $this->input->post('t_start_date'),
                    't_end_date' => $this->input->post('t_end_date'),
                    't_info' => $this->input->post('t_info'),
                    't_banner_path' => empty($this->input->post('banner_path')) ? '' : $this->input->post('banner_path')
                );

                if ($this->userDatabase->registerTournament($data['update'])) {
                    echo true;
                } else {
                    echo false;
                }
            } else {
                echo 'incomplete';
            }
        } else {
            $this->load->view('authenticate/login');
        }
    }

    /* Resigter Tournament function end */


    /* Resigter Team function starts */

    public function registerTeam()
    {
        if ($this->session->has_userdata('logged_in')) {
            if (!empty($this->input->post('team_name')) && !empty($this->input->post('team_city'))) {

                $result = $this->session->userdata('logged_in');
                $data['user_info'] = $this->userDatabase->fetchUserInfo($result['user_id']);

                $teamId = $this->random_strings(14);

                $data['create'] = array(
                    'team_id' => $teamId,
                    'admin_id' => $result['user_id'],
                    'admin_name' => $data['user_info'][0]->full_name,
                    'team_name' => $this->input->post('team_name'),
                    'team_city' => $this->input->post('team_city'),
                    'team_dp' => empty($this->input->post('team_dp')) ? '' : $this->input->post('team_dp'),
                );

                if ($this->userDatabase->registerUserTeam($data['create'])) {
                    echo $teamId;
                } else {
                    echo false;
                }
            } else {
                echo 'incomplete';
            }
        } else {
            $this->load->view('authenticate/login');
        }
    }

    /* Resigter Team function end */

    /* Search Player function starts */

    public function searchPlayerOfThisId()
    {
        //echo $this->search_player_card();
        if ($this->session->has_userdata('logged_in')) {
            $teamId = $this->input->post('team_id');
            $tableName = 'user_account_table';
            $where = array('user_account_table.user_id' => $this->input->post('user_id'));
            $columns = array('user_account_table.user_id', 'full_name', 'playing_role', 'batting_style', 'city', 'image_address', 'matches', 'runs', 'wickets');
            $join = array('user_stats_table', 'user_stats_table.user_id = user_account_table.user_id');
            $result = $this->userDatabase->selectAllFromTableJoinWhere($tableName, $join, $where, $columns);

            if ($result) {
                echo $this->search_player_card($result, $teamId);
            } else {
                echo false;
            }
        } else {
            $this->load->view('authenticate/login');
        }
    }

    /* Search Player function end */


    /* Random string generator */

    function random_strings($length_of_string)
    {
        return substr(md5(time()), 0, $length_of_string);
    }

    public function userBasicInfo($userId)
    {
        $tableName = 'user_account_table';
        $where = array('user_account_table.user_id' => $userId);
        $columns = array('user_account_table.user_id', 'full_name', 'playing_role', 'batting_style', 'city', 'image_address', 'matches', 'runs', 'wickets');
        $join = array('user_stats_table', 'user_stats_table.user_id = user_account_table.user_id');
        return $this->userDatabase->selectAllFromTableJoinWhere($tableName, $join, $where, $columns);
    }

    public function fetchAllUsers()
    {
        $tableName = 'user_account_table';
        $where = NULL;
        $columns = array('user_account_table.user_id', 'full_name', 'playing_role', 'batting_style', 'city', 'image_address', 'matches', 'runs', 'wickets');
        $join = array('user_stats_table', 'user_stats_table.user_id = user_account_table.user_id');
        return $this->userDatabase->selectAllFromTableJoinWhere($tableName, $join, $where, $columns);
    }

    public function check()
    {
        $data['where'] = array('team_id' => 'bce13b80a1bf');
        $data['team_info'] = $this->userDatabase->selectAllFromTableWhere('team_table', $data['where'], 'team_id,team_name');
        $result = $this->userDatabase->fetchUsersById('9758585895');

        echo json_encode($result);
    }

    public function search_player_card($result, $teamId)
    {
        $imageAddress = empty($result[0]['image_address']) ? base_url()."images/profile_pic/default.png" : base_url().$result[0]['image_address'];

        return '<div class="players-card col-md-6 bg-white">
            <div class="head">
                <div class="player-dp">
                    <div class="player-img">
                    <img src="' . $imageAddress . '" alt="" width="110">
                    </div>
                    <div class="name">
                        <p>' . $result[0]['full_name'] . '</p>
                    </div>
            </div>
            </div>
            <div class="body">
                <div class="user-info">
                    <div class="basic-info">
                        <div class="playing-style"> <i class="fa fa-info-circle"></i>&nbsp;' . $result[0]['playing_role'] . '&nbsp;' . $result[0]['batting_style'] . ' </div>
                        <div class="city"> <i class="fa fa-map-marker"></i>&nbsp;' . $result[0]['city'] . '</div>
                    </div>
                    <div class="add-btn"> <button class="add-to-team-btn" data-team="' . $teamId . '" data-player="' . $result[0]['user_id'] . '" onclick="addToTeam(this)"><i class="fa fa-plus"></i> ADD</button> </div>
                </div>
                <div class="user-stats">
                    <div class="matches field"> <span class="name"> Total Matches </span> <span class="value"> ' . $result[0]['matches'] . ' </span> </div>
                    <div class="runs field"> <span class="name"> Total Runs </span> <span class="value"> ' . $result[0]['runs'] . ' </span> </div>
                    <div class="wickets field"> <span class="name"> Total Wickets </span> <span class="value"> ' . $result[0]['wickets'] . ' </span> </div>
                </div>
            </div>
        </div>';
    }

    public function addPlayerToTeam()
    {
        if ($this->session->has_userdata('logged_in')) {

            $result = $this->userDatabase->addPlayerToTeam($this->input->post('user_id'), $this->input->post('team_id'));

            if ($result) {
                echo $result;
            } else {
                echo false;
            }
        } else {
            $this->load->view('authenticate/login');
        }


    }

    public function isProfileCompleted($userId)
    {
        $result = $this->session->userdata('logged_in');
        $data['user_id'] = $result['user_id'];
        $results = $this->userDatabase->isProfileCompleted($userId);
        if ($results) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteTeam()
    {
        if ($this->session->has_userdata('logged_in')) {
            $result = $this->session->userdata('logged_in');
            $data['user_id'] = $result['user_id'];
            $data['delete'] = array('team_id' => $this->input->post('team_id'));
            $result = $this->userDatabase->deleteTeam($data['delete']);
            if ($result) {
                echo true;
            } else {
                echo false;
            }
        } else {
            $this->load->view('authenticate/login');
        }
    }

    public function view()
    {

        if ($this->session->has_userdata('logged_in')) {
            $result = $this->session->userdata('logged_in');
            $data['user_id'] = $result['user_id'];
            $data['user_info'] = $this->userDatabase->fetchUserInfo($result['user_id']);
            $data['user_stats'] = $this->userDatabase->getImpStats($result['user_id']);
            $this->load->view('user/profile', $data);
        } else {
            $this->load->view('authenticate/login');
        }

    }

    public function updateCssAndJs(){
        $dateTime = date("Y-m-d,h:i:s");
        $tableName = "update_app_table";
        $data = array('datetime'=>$dateTime);
        $result = $this->userDatabase->updateCssandJs($tableName,$data);
        if($result){
            echo $result;
        }
        else{
            echo "failed";
        }
    }

    /* ------ CUSTOM MODAL FUNCITONS STARTS -------- */

    public function getFeaturedPlayers(){
        $tableName = 'user_account_table';
        $where = null;
        $columns = array('user_account_table.user_id', 'full_name', 'playing_role', 'batting_style', 'city', 'image_address', 'matches', 'runs', 'wickets');
        $join = array('user_stats_table', 'user_stats_table.user_id = user_account_table.user_id');
        return $this->userDatabase->selectAllFromTableJoinWhere($tableName, $join, $where, $columns);
    }

    /* ------ CUSTOM MODAL FUNCITONS END -------- */

    public function requestToTournament(){
        //$teamId = 'ba34504f2e33';
        $teamId = $this->input->post('team_id');
        $totalPlayers = $this->userDatabase->getTotalTeamPlayers($teamId);
        if($totalPlayers >= 4){
            $tournamentId = $this->input->post('tournament_id');
            $data = array (
                "tournament_id" => $tournamentId,
                "team_id" => $teamId
            );
            $result = $this->userDatabase->requestToTournament($data);
            if($result){ echo $result; }else{ echo false; }
            
        }else {
            echo "add-players";
        }
    }

    public function getTeamDetails($teamId){
        $data['team_info'] = $this->userDatabase->fetchTeamDetail($teamId);
        return $data['team_info'];
    }

    public function acceptRequestToTournament() {
        $data = array (
            "tournament_id" => $this->input->post('tournament_id'),
            "team_id" => $this->input->post('team_id')
        );  
        if($this->userDatabase->acceptRequestToTournament($data)){ echo true; }else{ echo false; }
    }

    public function rejectRequestToTournament() {
        $data = array (
            "tournament_id" => $this->input->post('tournament_id'),
            "team_id" => $this->input->post('team_id')
        );  
        if($this->userDatabase->rejectRequestToTournament($data)){ echo true; }else{ echo false; }
    }
}

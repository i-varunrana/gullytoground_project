<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>G2G</title>
    <meta name="description" content="Gullytoground">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?php echo base_url(); ?>images/icons/favicon.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/userstyle.css?v=<?php echo $update_css_js[0]['datetime']; ?>">
    <script>
        const BASE_URL = "<?php echo base_url(); ?>";
    </script>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo base_url('home'); ?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('profile'); ?>"> <i class="menu-icon fa fa-user"></i>My Profile</a>
                    </li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-soccer-ball-o"></i>Tournaments</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-soccer-ball-o"></i><a href="<?php echo base_url('tournaments'); ?>">Tournaments</a></li>
                            <li><i class="fa fa-soccer-ball-o"></i><a href="<?php echo base_url('my-tournaments'); ?>">My Tournaments</a></li>
                            <li><i class="fa fa-soccer-ball-o"></i><a id="add-tournament" data-name="<?php echo $user_info[0]['full_name']; ?>">Add A Tournaments</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url('team'); ?>"> <i class="menu-icon fa fa-users"></i>My Team</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('stats'); ?>"> <i class="menu-icon fa fa-bar-chart"></i>My Stats</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url(); ?>images/icon/logo-icon.png" alt="Logo" width="32"></a>
                    <a class="navbar-brand hidden" href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url(); ?>images/icon/logo-icon.png" alt="Logo" width="32"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">3</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo empty($user_info[0]['image_address']) ?
                                                                                base_url() . "images/profile_pic/default.png" :
                                                                                base_url() . $user_info[0]['image_address']; ?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?php echo base_url('profile'); ?>"><i class="fa fa- user"></i>My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="<?php echo base_url('settings'); ?>"><i class="fa fa -cog"></i>Settings</a>

                            <a class="nav-link" href="<?php echo base_url('ControlUnit/userLogout'); ?>"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-2 br-left-green br-right-blue">
                            <div class="wrapper start-match-team-a-name">
                                <?php echo $team_a[0]['team_name']; ?>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">

                                <div class="wrapper">
                                    Vs
                                </div>
                            </div>
                            <div class="wrapper start-match-team-b-name">
                                <?php echo $team_b[0]['team_name']; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <div class="row">
                            <?php
                            $team_player_ids = empty($this->userDatabase->selectAllFromTableWhere('team_relation_table', array('team_id' => $team_a[0]['team_id']), 'user_id')) ? 0 : $this->userDatabase->selectAllFromTableWhere('team_relation_table', array('team_id' => $team_a[0]['team_id']), 'user_id');
                            //Fetch Team Payers
                            if ($team_player_ids != 0) {
                                $team_a_players = $this->userDatabase->multipleDataFetch('user_account_table', array_column($team_player_ids, 'user_id'), 'user_id,full_name,playing_role,batting_style,city,image_address');
                            } else {
                                $team_a_players = "";
                            }
                            if (!empty($team_a_players)) {

                                $count = 0;
                                foreach ($team_a_players as $team_a_player) {
                                    $count++;
                            ?>
                                    <div class="col-md-12">
                                        <div class="card team_a_players " data-id="<?php echo $team_a_player['user_id']; ?>" data-toggle="modal" data-target="#addScoreModal">
                                            <div class="team-nums">
                                                <b><?php echo $count; ?></b>
                                            </div>
                                            <div class="card-body p-1">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="w-25 mr-1">
                                                        <img class="rounded-circle bg-light" src="<?php echo empty($team_a_player['image_address']) ? base_url() . 'images/team/avatar3.png' : base_url() . $team_a_player['image_address'] ?>" alt="team img" width="35">
                                                    </div>
                                                    <div class="w-75">
                                                        <strong class="card-title mb-0 d-block caps small-text wrap"><?php echo $team_a_player['full_name']; ?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer p-0">
                                                <div class="d-flex justify-content-between pr-3 pl-3">
                                                    <div class="team-city">
                                                        <i class="fa fa-map-marker" style="font-size: 0.85rem"></i>&nbsp;<small class="caps wrap"><?php echo $team_a_player['city']; ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col col-md-6">
                        <div class="row">
                            <?php
                            $team_player_ids = empty($this->userDatabase->selectAllFromTableWhere('team_relation_table', array('team_id' => $team_b[0]['team_id']), 'user_id')) ? 0 : $this->userDatabase->selectAllFromTableWhere('team_relation_table', array('team_id' => $team_b[0]['team_id']), 'user_id');
                            //Fetch Team Payers
                            if ($team_player_ids != 0) {
                                $team_b_players = $this->userDatabase->multipleDataFetch('user_account_table', array_column($team_player_ids, 'user_id'), 'user_id,full_name,playing_role,batting_style,city,image_address');
                            } else {
                                $team_b_players = "";
                            }
                            if (!empty($team_b_players)) {

                                $count = 0;
                                foreach ($team_b_players as $team_b_player) {
                                    $count++;
                            ?>
                                    <div class="col-md-12">
                                        <div class="card team_b_players" data-id="<?php echo $team_b_player['user_id']; ?>" data-toggle="modal" data-target="#addScoreModal">
                                            <div class="team-nums">
                                                <b><?php echo $count; ?></b>
                                            </div>
                                            <div class="card-body p-1">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="w-25 mr-1">
                                                        <img class="rounded-circle bg-light" src="<?php echo empty($team_b_player['image_address']) ? base_url() . 'images/team/avatar3.png' : base_url() . $team_b_player['image_address'] ?>" alt="team img" width="35">
                                                    </div>
                                                    <div class="w-75">
                                                        <strong class="card-title mb-0 d-block caps small-text wrap"><?php echo $team_b_player['full_name']; ?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer p-0">
                                                <div class="d-flex justify-content-between pr-3 pl-3">
                                                    <div class="team-city">
                                                        <i class="fa fa-map-marker" style="font-size: 0.85rem"></i>&nbsp;<small class="caps wrap"><?php echo $team_b_player['city']; ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!-- .animated -->
            </div>
            <!-- /.content -->
            <div class="clearfix"></div>
            <!-- Footer -->
            <footer class="site-footer">
                <div class="footer-inner bg-white">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            Copyright &copy; 2019 gullytoground Pvt. Ltd.
                        </div>
                        <div class="col-md-12 text-center">
                            Designed by <a class="violet" href="#">20kiwi</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- /.site-footer -->
        </div>
        <!-- /#right-panel -->


        <div class="modal fade" id="addScoreModal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="scrollmodalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="card p-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="form-control-static">
                                        Varun Rana
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input type="text" class="input-sm form-control-sm form-control" placeholder="Total runs">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="input-sm form-control-sm form-control" placeholder="No. of 6s">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="input-sm form-control-sm form-control" placeholder="No. of 4s">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                <input type="checkbox" class="d-inline">&nbsp;&nbsp;<span class="d-inline text-dark small-text">Not Out</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <button class="btn btn-primary btn-sm btn-block">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="<?php echo base_url(); ?>js/main.js"></script>
        <script src="<?php echo base_url(); ?>js/userscript.js?v=<?php echo $update_css_js[0]['datetime']; ?>"></script>
        <script src="<?php echo base_url(); ?>js/card-swipe.js"></script>
</body>

</html>
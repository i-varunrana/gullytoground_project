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
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-2 br-green">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="wh-35 rounded-circle d-flex justify-content-center align-items-center bg-flat-color-3">
                                        <img src="<?php echo base_url(); ?>images/icon/trophy.png" alt="trophy icon">
                                    </div>
                                    <div class="ml-2">
                                        Tournament Details
                                    </div>
                                </div>
                                <div class="small-text text-up text-dark fw-b">
                                    <?php echo ($tournament[0]['upcoming'] == true) ? 'upcoming' : 'ongoing'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo base_url() . $tournament[0]['t_banner_path'] ?>" alt="Card image cap">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <h4 class="card-title"><?php echo $tournament[0]['t_name']; ?></h4>
                                <div class="request-btn">
                                    <button class="btn bg-flat-color-3 text-white small-text" data-toggle="modal" data-target="#scrollmodal">REQUEST</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card p-3">
                            <div class="d-flex justify-content-start align-items-center">
                                <img class="mr-3" src="<?php echo base_url(); ?>images/icon/prize.png" alt="" width="32">
                                <div>
                                    <span class="color-gray small-text d-block">Prize Money</span>
                                    <span class="fw-b text-dark medium-text d-block">Rs. 7000 /-</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3">
                            <div class="d-flex justify-content-start align-items-center">
                                <img class="mr-3" src="<?php echo base_url(); ?>images/icon/money.png" alt="" width="32">
                                <div>
                                    <span class="color-gray small-text d-block">Entry Fees</span>
                                    <span class="fw-b text-dark medium-text d-block">Rs. 1200 /-</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3">
                            <div class="d-flex justify-content-start align-items-center">
                                <img class="mr-3" src="<?php echo base_url(); ?>images/icon/calendar.png" alt="" width="32">
                                <div>
                                    <span class="color-gray small-text d-block">Tournament Start</span>
                                    <span class="fw-b text-dark medium-text d-block"><?php echo $tournament[0]['t_start_date'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-white">
                                <strong class="text-dark">Details</strong>
                            </div>
                            <div class="card-body">
                                <div class="myprofile-category twt-category">
                                    <ul>
                                        <li>
                                            <h5 class="caps"><?php echo $tournament[0]['t_type'] ?></h5>
                                            TPYE
                                        </li>
                                        <li>
                                            <h5 class="caps"><?php echo $tournament[0]['t_ball_type'] ?></h5>
                                            BALL TYPE
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <h5 class="caps"><?php echo $tournament[0]['t_city'] ?></h5>
                                            CITY
                                        </li>
                                        <li>
                                            <h5 class="caps"><?php echo $tournament[0]['t_ground'] ?></h5>
                                            GROUND
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <h5><?php echo $tournament[0]['t_overs'] ?></h5>
                                            OVERS
                                        </li>
                                        <li>
                                            <h5><?php ?></h5>
                                            PARTICIPANTS
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-white">
                                <strong class="text-dark">Organizer Details</strong>
                            </div>
                            <div class="card-body">
                                <div class="myprofile-category twt-category">
                                    <ul>
                                        <li>
                                            <h5 class="caps"><?php echo $tournament[0]['t_organizer_name']; ?></h5>
                                            ORGANIZER NAME
                                        </li>
                                        <li>
                                            <h5><?php echo $tournament[0]['t_organizer_number']; ?></h5>
                                            ORGANIZER PHONE
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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

    <div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollmodalLabel">Choose Team</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="library">
                        <div class="row">
                            <?php
                            foreach ($user_teams as $team) {
                            ?>
                                <div class="col-md-6">
                                    <div class="card select-team" data-id="<?php echo $team['team_id']; ?>" data-active="0">
                                        <i class="fa fa-trash delete-team-btn" data-id="<?php echo $team['team_id']; ?>"></i>
                                        <div class="card-body p-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="w-25">
                                                    <img class="rounded-circle bg-light" src="<?php echo empty($team['team_dp']) ? base_url() . 'images/team/avatar3.png' : base_url() . $team['team_dp'] ?>" alt="team img" width="75">
                                                </div>
                                                <div class="w-75">
                                                    <strong class="card-title mb-0 d-block caps"><?php echo $team['team_name']; ?></strong>
                                                    <p class="card-title mb-0 d-block small-text text-dark"><?php echo empty($team['total_players']) ? "0" : $team['total_players']; ?> Players</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-between pr-3 pl-3">
                                                <div class="team-admin pr-3">
                                                    <img src="<?php echo base_url(); ?>images/icon/admin.png" alt="" width="12">&nbsp;<small><?php echo $team['admin_name']; ?></small>
                                                </div>
                                                <div class="team-city">
                                                    <i class="fa fa-map-marker" style="font-size: 0.85rem"></i>&nbsp;<small class="caps"><?php echo $team['team_city']; ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button id="tournament-request-btn" type="button" class="btn btn-primary" data-id="<?echo $tournament[0]['t_id']; ?>">Request</button>
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
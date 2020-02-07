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
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/userstyle.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/croppie.css">
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
                            <li><i class="fa fa-soccer-ball-o"></i><a id="add-tournament" data-name="<?php echo $user_info[0]->full_name; ?>">Add A Tournaments</a></li>
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
                            <img class="user-avatar rounded-circle" src="<?php if ($user_info[0]->image_address == '') {
                                                                                echo base_url() . "images/profile_pic/default.png";
                                                                            } else {
                                                                                echo base_url() . $user_info[0]->image_address;
                                                                            } ?>" alt="User Avatar">
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
                    <div class="col-md-12 mb-3">
                        <strong class="card-title">Team <?php echo $team_info[0]['team_name']; ?></strong>
                        <strong class="card-title float-right"><?php echo $total_players ?> Players</strong>
                    </div>
                </div>
                <div class="row">
                    <?php
                        if (isset($team_players)) {
                            foreach ($team_players as $players) {
                    ?>
                    <div class="col-md-6">
                        <div class="card teams">
                            <i class="fa fa-trash delete-team-btn"></i>
                            <div class="card-body p-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="w-25">
                                        <img class="rounded-circle bg-light" src="<?php echo base_url() . $players->image_address; ?>" alt="team img" width="75">
                                    </div>
                                    <div class="w-75">
                                        <strong class="card-title mb-0 d-block"><?php echo $players->full_name; ?></strong>
                                        <p class="card-title mb-0 d-block small-text text-dark"><?php echo $players->playing_role; ?>&nbsp;<?php echo $players->batting_style; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-md-12">
                                    <div class="team-city">
                                        <i class="fa fa-map-marker" style="font-size: 0.85rem"></i>&nbsp;<small><?php echo $players->city; ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    } }
                    else {
                    ?>
                    <div class="col-md-12">
                        <p style="text-align: center">0 Player Added</p>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <div class="create-team-btn">
                        <a href="<?php echo base_url('add-players' . '/' . $team_id); ?>">ADD PLAYERS</a>
                    </div>
                 </div>
                </div>
                <!-- Widgets  -->
                <!-- <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-white br-0 d-flex justify-content-between">
                                <strong class="card-title inline-block large-text">Team <?php echo $team_info[0]['team_name']; ?></strong>
                                <div class="total-player" style="font-size: 1rem; color: #4e5665;"><?php echo $total_players ?> Players</div>
                            </div>

                            <div class="card-body card-block">
                                <div class="row">
                                    <?php
                                    if (isset($team_players)) {
                                        foreach ($team_players as $players) {
                                    ?>
                                            <div class="col-md-6">
                                                <div class="team-player-card">
                                                <div class="head">
                                                    <div class="right-half">
                                                        <img src="<?php echo base_url() . $players->image_address; ?>" alt="<?php echo is_null($players->image_address); ?>" width="95">
                                                    </div>
                                                    <div class="left-half">
                                                        <div class="name"><?php echo $players->full_name; ?></div>
                                                        <div class="playing-role"><?php echo $players->playing_role; ?>&nbsp;<?php echo $players->batting_style; ?></div>
                                                    </div>
                                                </div>
                                                <div class="body">
                                                    <div class="city"><i class="fa fa-map-marker"></i>&nbsp;<?php echo $players->city; ?></div>
                                                </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="col-md-12">
                                            <p style="text-align: center">0 Player Added</p>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                <div class="col-md-12">
                                    <div class="create-team-btn">
                                        <a href="<?php echo base_url('add-players' . '/' . $team_id); ?>">ADD PLAYERS</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>js/main.js"></script>
    <script src="<?php echo base_url(); ?>js/userscript.js"></script>
</body>

</html>
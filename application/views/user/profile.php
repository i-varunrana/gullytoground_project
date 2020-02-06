<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
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
                        <a href="<?php echo base_url('home');?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('profile');?>"> <i class="menu-icon fa fa-user"></i>My Profile</a>
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
                    <a class="navbar-brand" href="./"><img src="<?php echo base_url(); ?>images/icon/logo-icon.png" alt="Logo" width="32"></a>
                    <a class="navbar-brand hidden" href="./"><img src="<?php echo base_url(); ?>images/icon/logo-icon.png" alt="Logo" width="32"></a>
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
                            <img class="user-avatar rounded-circle" src="<?php if($user_info[0]->image_address == ''){ echo base_url()."images/profile_pic/default.png"; } else { echo base_url().$user_info[0]->image_address; }?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?php echo base_url('profile');?>"><i class="fa fa- user"></i>My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="<?php echo base_url('settings'); ?>"><i class="fa fa -cog"></i>Settings</a>

                            <a class="nav-link" href="<?php echo base_url('ControlUnit/userLogout');?>"><i class="fa fa-power -off"></i>Logout</a>
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

                    <!-- Porfile card -->
                    <div class="col-md-12">
                        <section class="card">
                            <div class="twt-feed blue-bg">
                                <div class="corner-ribon black-ribon">
                                </div>
                                <div class="wtt-mark"></div>

                                <div class="media">
                                    <a href="#">
                                        <img class="align-self-center mr-3 bg-dark rounded-circle p-1"  alt="profile pic" src="<?php if($user_info[0]->image_address == ''){ echo base_url()."images/profile_pic/default.png"; } else { echo base_url().$user_info[0]->image_address; }?>" style="width:110px; height:110px;">
                                    </a>
                                    <div class="media-body">
                                        <h3 class="text-white display-6"><?php echo $user_info[0]->full_name; ?></h3>
                                        <p class="text-light inline-block"><?php echo $user_info[0]->playing_role; ?></p>
                                        <p class="text-light inline-block"><b><?php echo $user_info[0]->batting_style; ?></b></p>
                                    </div>
                                </div>
                            </div>
                            <div class="weather-category twt-category">
                                <ul>
                                    <li class="active">
                                        <h4 class="text-dark"><?php echo $user_stats[0]->matches; ?></h4>
                                        Total Matches
                                    </li>
                                    <li>
                                        <h4 class="text-dark"><?php echo $user_stats[0]->runs; ?></h4>
                                        Total Runs
                                    </li>
                                    <li>
                                        <h4 class="text-dark"><?php echo $user_stats[0]->wickets; ?></h4>
                                        Total Wickets
                                    </li>
                                </ul>
                            </div>
                            <footer class="twt-footer">
                            </footer>
                        </section>
                    </div>
                    <!-- Porfile card -->
                    
                    <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-white br-0">
                                    <strong class="card-title">My Profile <span class="badge pull-right mt-1 flat-color-1 fw-r"><a class="profile-edit-btn" href="<?php echo base_url('settings')?>">EDIT</a></span></strong>
                                </div>
                                <div class="card-body">
                                    <div class="myprofile-category twt-category">
                                        <ul>
                                            <li>
                                                <h5><?php echo empty($user_info[0]->user_id) ? '-' : $user_info[0]->user_id; ?></h5>
                                                MOBILE NUMBER
                                            </li>
                                            <li>
                                                <h5><?php echo empty($user_info[0]->city) ? '-' : $user_info[0]->city; ?></h5>
                                                LOCATION
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <h5><?php echo empty($user_info[0]->playing_role) ? '-' : $user_info[0]->playing_role; ?></h5>
                                                PLAYING ROLE
                                            </li>
                                            <li>
                                                <h5><?php echo empty($user_info[0]->dob) ? '-' : $user_info[0]->dob; ?></h5>
                                                DATE OF BIRTH
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <h5><?php echo empty($user_info[0]->batting_style) ? '-' : $user_info[0]->batting_style; ?></h5>
                                                BATTING STYLE
                                            </li>
                                            <li>
                                                <h5><?php echo empty($user_info[0]->balling_style) ? '-' : $user_info[0]->balling_style; ?></h5>
                                                BOWLING STYLE
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <h5><?php echo empty($user_info[0]->gender) ? '-' : $user_info[0]->gender; ?></h5>
                                                GENDER
                                            </li>
                                            <li>
                                                <h5><?php echo empty($user_info[0]->ball_type) ? '-' : $user_info[0]->ball_type; ?></h5>
                                                BALL TYPE
                                            </li>
                                        </ul>
                                        <ul class="w-100">
                                            <li>
                                                <h5><?php echo empty($user_info[0]->email) ? '-' : $user_info[0]->email; ?></h5>
                                                EMAIL
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

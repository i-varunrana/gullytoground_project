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

                <!-- Message for user -->
                <?php if(!$profile_complete) {?>
                <div class="alert alert-warning" role="alert">
                    Please complete your profile to get tournament updates and more features. Give it a click if you like <a href="<?php echo base_url('profile');?>" class="alert-link">Profile Page</a>
                </div>
                <?php } ?>
                <!-- /Message for user -->

                <!-- Widgets  -->
                <div class="row">
                    <!-- Porfile card -->
                    <div class="col-md-12 col-lg-12">
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
                                        <p class="text-light inline-block text-capitalize"><?php echo $user_info[0]->playing_role; ?></p>
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

                </div>    
                <!-- /Widgets -->
                <div class="mb-3 title bold">
                    <strong class="card-title">UPCOMING TOURNAMENTS</strong>
                </div>
                <!-- Tournaments -->
                <div class="row ov-h">

                        <div class="col-md-12">

                            <div class="left-arrow">
                                <img src="<?php echo base_url(); ?>images/icon/left_arrow.png" alt="swipe left">
                            </div>

                            <!-- Tournament cards wrapper -->
                            <div class="demo__card-cont">

                            <?php  
                            foreach ($tournaments as $tournament)  
                            {  
                            ?>

                                <!-- tournament cards -->
                                <div class="demo__card">
                                    <div class="card-body no-padding">
                                        <div class="tournament-bg">
                                        </div>
                                        <div class="card-text p-3">
                                            <h5 class="mt-2 mb-2 light-text bold"><?php echo $tournament->t_name; ?></h5>
                                            <div class="mb-1 light-text small-text"><i class="fa fa-calendar blue"></i>&nbsp; <?php echo $tournament->t_start_date; ?> to <?php echo $tournament->t_end_date; ?></div>
                                            <div class="light-text small-text"><i class="fa fa-map-marker blue"></i>&nbsp;&nbsp;<?php echo $tournament->t_city; ?></div>
                                            <hr>
                                            <div class="light-text wrap pl-1 extra-small-text"><?php echo $tournament->t_ground; ?> , <?php echo $tournament->t_city; ?></div>
                                        </div>
                                    </div>
                                    <div class="demo__card__drag"></div>
                                </div>

                                <?php 
                                }  
                                ?> 

                            </div>
                            <!-- tournament cards wrapper -->

                            <div class="right-arrow">
                            <img src="<?php echo base_url(); ?>images/icon/right_arrow.png" alt="swipe right">
                            </div>

                        </div>    

                    </div> 

                </div>
                <!-- /Tournaments --> 
                <div class="clearfix"></div>

                <div class="mb-3 title">
                <strong class="card-title">FEATURED PLAYERS</strong>
                </div>

                <!-- Players Card Stacks -->
                <div class="row ov-h">
                    <div class="col-md-12">
                        <div class="left-arrow">
                            <img src="<?php echo base_url(); ?>images/icon/left_arrow.png" alt="swipe left">
                        </div>
                        <!-- Players cards wrapper -->
                        <div class="demo__card-cont">

                            <!-- Players cards -->
                            <div class="demo__card">
                            <section class="card">
                                <div class="twt-feed teal-bg">
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
                                <div class="demo__card__drag"></div>
                            </div>
                        </div>
                        <div class="right-arrow">
                            <img src="<?php echo base_url(); ?>images/icon/right_arrow.png" alt="swipe right">
                        </div>
                    </div>
                </div>
                <!-- End players Card Stacks-->

                <div class="clearfix"></div>
                <!--  Stats  -->
                <div class="row">
                    <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header bg-white br-0">
                                            <strong class="card-title">My Stats</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="default-tab">
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link active" id="nav-bating-tab" data-toggle="tab" href="#nav-bating" role="tab" aria-controls="nav-bating" aria-selected="true">Bating</a>
                                                    <a class="nav-item nav-link" id="nav-bowling-tab" data-toggle="tab" href="#nav-bowling" role="tab" aria-controls="nav-bowling" aria-selected="false">Bowling</a>
                                                </div>
                                            </nav>
                                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-bating" role="tabpanel" aria-labelledby="nav-bating-tab">
                                                    <div class="row">
                                                            <div class="w-30 mr-1">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="stat-widget-one">
                                                                                <div class="stat-content dib">
                                                                                    <div class="stat-text">Matches</div>
                                                                                    <div class="stat-digit">50</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="w-30 mr-1">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="stat-widget-one">
                                                                                <div class="stat-content dib">
                                                                                    <div class="stat-text">Innings</div>
                                                                                    <div class="stat-digit">30</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="w-30 mr-1">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="stat-widget-one">
                                                                                <div class="stat-content dib">
                                                                                    <div class="stat-text">Not out</div>
                                                                                    <div class="stat-digit">10</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                    </div>
                                                    <div class="row">
                                                            <div class="w-30 mr-1">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="stat-widget-one">
                                                                                <div class="stat-content dib">
                                                                                    <div class="stat-text">Runs</div>
                                                                                    <div class="stat-digit">187</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="w-30 mr-1">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="stat-widget-one">
                                                                                <div class="stat-content dib">
                                                                                    <div class="stat-text">Highest Runs</div>
                                                                                    <div class="stat-digit">58</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="w-30 mr-1">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="stat-widget-one">
                                                                                <div class="stat-content dib">
                                                                                    <div class="stat-text">Avg</div>
                                                                                    <div class="stat-digit">62.33</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                    </div>
                                                    <div class="row">
                                                            <div class="w-30 mr-1">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="stat-widget-one">
                                                                                <div class="stat-content dib">
                                                                                    <div class="stat-text">6s</div>
                                                                                    <div class="stat-digit">50</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="w-30 mr-1">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="stat-widget-one">
                                                                                <div class="stat-content dib">
                                                                                    <div class="stat-text">Innings</div>
                                                                                    <div class="stat-digit">30</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="w-30 mr-1">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="stat-widget-one">
                                                                                <div class="stat-content dib">
                                                                                    <div class="stat-text">Not out</div>
                                                                                    <div class="stat-digit">10</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="nav-bowling" role="tabpanel" aria-labelledby="nav-bowling-tab">
                                                        <div class="row">
                                                                <div class="w-30 mystat-card">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="stat-widget-one">
                                                                                    <div class="stat-content dib">
                                                                                        <div class="stat-text">Matches</div>
                                                                                        <div class="stat-digit">50</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="w-30 mystat-card">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="stat-widget-one">
                                                                                    <div class="stat-content dib">
                                                                                        <div class="stat-text">Innings</div>
                                                                                        <div class="stat-digit">30</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="w-30 mystat-card">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="stat-widget-one">
                                                                                    <div class="stat-content dib">
                                                                                        <div class="stat-text">Overs</div>
                                                                                        <div class="stat-digit">10</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="row">
                                                                <div class="w-30 mystat-card">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="stat-widget-one">
                                                                                    <div class="stat-content dib">
                                                                                        <div class="stat-text">Maidens</div>
                                                                                        <div class="stat-digit">187</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="w-30 mystat-card">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="stat-widget-one">
                                                                                    <div class="stat-content dib">
                                                                                        <div class="stat-text">Wickets</div>
                                                                                        <div class="stat-digit">58</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="w-30 mystat-card">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="stat-widget-one">
                                                                                    <div class="stat-content dib">
                                                                                        <div class="stat-text">Avg</div>
                                                                                        <div class="stat-digit">62.33</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="row">
                                                                <div class="w-30 mystat-card">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="stat-widget-one">
                                                                                    <div class="stat-content dib">
                                                                                        <div class="stat-text">Wides</div>
                                                                                        <div class="stat-digit">50</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="w-30 mystat-card">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="stat-widget-one">
                                                                                    <div class="stat-content dib">
                                                                                        <div class="stat-text">Noballs</div>
                                                                                        <div class="stat-digit">30</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="w-30 mystat-card">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="stat-widget-one">
                                                                                    <div class="stat-content dib">
                                                                                        <div class="stat-text">Runs</div>
                                                                                        <div class="stat-digit">100</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>    
                    </div>
                <!--  /# Stats -->

                <!-- widgets -->
                <div class="row">
                    <div class="col-sm-12 mb-4">
                        <div class="card-group">
                            <div class="card col-md-6 no-padding ">
                                <div class="card-body">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="ti ti-hand-point-down"></i>
                                    </div>

                                    <div class="h4 mb-0">
                                        <span class="count"><?php echo $user_stats[0]->fifties; ?></span>
                                    </div>

                                    <small class="text-muted text-uppercase font-weight-bold">50's</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-md-6 no-padding ">
                                <div class="card-body">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="ti ti-hand-point-down"></i>
                                    </div>
                                    <div class="h4 mb-0">
                                        <span class="count"><?php echo $user_stats[0]->hundreds; ?></span>
                                    </div>
                                    <small class="text-muted text-uppercase font-weight-bold">100's</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-md-6 no-padding ">
                                <div class="card-body">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="ti ti-face-smile"></i>
                                    </div>
                                    <div class="h4 mb-0">
                                        <span class="count"><?php echo $user_stats[0]->won; ?></span>
                                    </div>
                                    <small class="text-muted text-uppercase font-weight-bold">Won</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-md-6 no-padding ">
                                <div class="card-body">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="ti ti-face-sad"></i>
                                    </div>
                                    <div class="h4 mb-0">
                                        <span class="count"><?php echo $user_stats[0]->loss; ?></span>
                                    </div>
                                    <small class="text-muted text-uppercase font-weight-bold">Loss</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 40%; height: 5px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /#widgets -->

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
    <script src="<?php echo base_url(); ?>js/card-swipe.js"></script>
</body>
</html>

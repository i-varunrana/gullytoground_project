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
                            <img class="user-avatar rounded-circle" src="<?php if($user_dp[0]->image_address == ''){ echo base_url()."images/profile_pic/default.png"; } else { echo base_url().$user_dp[0]->image_address; }?>" alt="User Avatar">
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
                                                                                    <div class="stat-digit"><?php echo $user_stats[0]->matches;?></div>
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
                                                                                    <div class="stat-digit"><?php echo $user_stats[0]->batting_innings;?></div>
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
                                                                                    <div class="stat-digit"><?php echo $user_stats[0]->not_out;?></div>
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
                                                                                    <div class="stat-digit"><?php echo $user_stats[0]->runs;?></div>
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
                                                                                    <div class="stat-digit"><?php echo $user_stats[0]->highest_runs;?></div>
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
                                                                                    <div class="stat-digit"><?php echo $user_stats[0]->batting_avg;?></div>
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
                                                                                    <div class="stat-text">SR</div>
                                                                                    <div class="stat-digit"><?php echo $user_stats[0]->batting_sr;?></div>
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
                                                                                    <div class="stat-text">50s</div>
                                                                                    <div class="stat-digit"><?php echo $user_stats[0]->fifties;?></div>
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
                                                                                    <div class="stat-text">100s</div>
                                                                                    <div class="stat-digit"><?php echo $user_stats[0]->hundreds;?></div>
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
                                                                                    <div class="stat-text">Ducks</div>
                                                                                    <div class="stat-digit"><?php echo $user_stats[0]->ducks;?></div>
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
                                                                                    <div class="stat-text">Won</div>
                                                                                    <div class="stat-digit"><?php echo $user_stats[0]->won;?></div>
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
                                                                                    <div class="stat-text">loss</div>
                                                                                    <div class="stat-digit"><?php echo $user_stats[0]->loss;?></div>
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
                                                                                        <div class="stat-digit"><?php echo $user_stats[0]->matches;?></div>
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
                                                                                        <div class="stat-digit"><?php echo $user_stats[0]->balling_innings;?></div>
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
                                                                                        <div class="stat-digit"><?php echo $user_stats[0]->overs;?></div>
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
                                                                                        <div class="stat-digit"><?php echo $user_stats[0]->maidens;?></div>
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
                                                                                        <div class="stat-digit"><?php echo $user_stats[0]->wickets;?></div>
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
                                                                                        <div class="stat-digit"><?php echo $user_stats[0]->balling_avg;?></div>
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
                                                                                        <div class="stat-text">Runs</div>
                                                                                        <div class="stat-digit"><?php echo $user_stats[0]->give_runs;?></div>
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
                                                                                        <div class="stat-text">Best Balling</div>
                                                                                        <div class="stat-digit"><?php echo $user_stats[0]->best_balling;?></div>
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
                                                                                        <div class="stat-text">Five Wickets</div>
                                                                                        <div class="stat-digit"><?php echo $user_stats[0]->five_wickets;?></div>
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
                                                                                        <div class="stat-text">Dot Balls</div>
                                                                                        <div class="stat-digit"><?php echo $user_stats[0]->dot_balls;?></div>
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
                                                                                        <div class="stat-text">4s</div>
                                                                                        <div class="stat-digit"><?php echo $user_stats[0]->give_fours;?></div>
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
                                                                                        <div class="stat-text">6s</div>
                                                                                        <div class="stat-digit"><?php echo $user_stats[0]->give_sixes;?></div>
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
</body>
</html>

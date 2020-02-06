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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
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
                            <img class="user-avatar rounded-circle" src="<?php echo base_url().$user_info[0]['image_address'];?>" alt="User Avatar">
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-white br-0">
                                <strong class="card-title text-center inline-block">Register Tournament</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="add-tournament-bg grid column x-center y-center">
                                    <div class="add-banner">
                                        <img id="add-banner-img" src="<?php echo base_url();?>images/icon/add_bg.png" alt="add banner" data-toggle="modal" data-target="#scrollmodal">
                                        <div class="add-banner-text">ADD BANNER</div> 
                                    </div>
                                </div>
                                <form class="tournament-register-form" method="POST">
                                <div class="row">    
                                <div class="col-md-12">
                                    <div class="form-group"><label for="name" class=" form-control-label">Tournament Name</label><input type="text" id="name" name="t_name" placeholder="tournament name" class="form-control" required></div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label for="City" class=" form-control-label">City</label><input type="text" id="city" name="t_city" placeholder="city" class="form-control caps" required></div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label for="Ground" class=" form-control-label">Ground</label><input type="text" id="ground" name="t_ground" placeholder="ground" class="form-control caps" required></div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label for="Organizer Name" class=" form-control-label">Organizer Name*</label><input type="text" id="organizer-name" name="t_organizer_name" placeholder="organizer name" class="form-control caps" required></div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label for="Organizer Number" class=" form-control-label">Organizer Number</label><input type="text" id="organizer-number" name="t_organizer_number" placeholder="organizer number" class="form-control" required></div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-check-inline form-check"><label for="terms" class=" form-check-label"></label><input type="checkbox" id="terms" class="form-check-input" required>Allow player to contact me on whatsApp for Team Registration</div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label for="Tournament Type" class="form-control-label">Tournament Type</label>
                                        <select name="t_type" class="form-control" required>
                                            <option value="open">Open</option>
                                            <option value="corporate">Corporate</option>
                                            <option value="community">Community</option>
                                            <option value="school">School</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="Ball Type" class="form-control-label">Ball Type</label>
                                            <select name="t_ball_type" class="form-control" required>
                                                <option value="tennis">Tennis</option>
                                                <option value="leather">Leather</option>
                                                <option value="other">Other</option>
                                            </select>    
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="Overs" class="form-control-label">Overs</label>
                                            <select name="t_overs" class="form-control" required>
                                                <option value="tennis">Limited Overs</option>
                                                <option value="leather">Test Match</option>
                                            </select>    
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-4">
                                            <div class="form-group"><label for="start date" class=" form-control-label">Start Date*</label><input type="text" id="start-date" name="t_start_date" placeholder="date" class="form-control datepicker" required readonly></div>
                                        </div>
                                        <div class="col-lg-6 col-md-4">
                                            <div class="form-group"><label for="end date" class=" form-control-label">End Date*</label><input type="text" id="end-date" name="t_end_date" placeholder="date" class="form-control datepicker" required readonly></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="Additional Information" class=" form-control-label">Additional Information</label><textarea name="t_info" id="textarea-input" rows="7" placeholder="Add more details of the tournament, like Prizes, Awards, Entry Fees, Rules, etc." class="form-control"></textarea></div>
                                    </div>
                                    </div>
                                        <button type="submit" class="btn btn-success btn-lg btn-block register-tournament-btn" data-img="">Register</button>
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

    <div id="uploadimageModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="font-weight-bold">Crop & Upload Image</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="image_demo"></div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center" style="padding-top:30px;">
                            <button id="upload-btn" class="btn btn-success crop_image small pr-5 pl-5">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="scrollmodalLabel">Upload Image</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="upload-section">
                                <div class="add-tournament-banner">Upload</div>
                                <input id="input-image" name="profile-pic" type="file" hidden>
                            </div>
                            <div class="library">
                                <div class="title">
                                    Select from our Gallery
                                </div>
                                <div class="row content">
                                    <div class=" col-md-3 banner" data-id="" data-value="images/banner/default.jpg">
                                        <img src="<?php echo base_url();?>images/banner/default.jpg" alt="">
                                    </div>
                                    <div class="col-md-3 banner" data-id="" data-value="images/banner/default1.jpg">
                                        <img src="<?php echo base_url();?>images/banner/default1.jpg" alt="">
                                    </div>
                                    <div class="col-md-3 banner" data-id="" data-value="images/banner/default2.jpg">
                                        <img src="<?php echo base_url();?>images/banner/default2.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button id="save-img-btn" type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>js/main.js"></script>
    <script src="<?php echo base_url(); ?>js/userscript.js"></script>
    <script src="<?php echo base_url(); ?>js/croppie.js"></script>
    <script src="<?php echo base_url(); ?>js/crop-banner.js"></script>
    <script>
        $('.datepicker').datepicker({
            format: 'dd-M-yyyy',
        });
    </script>
</body>
</html>

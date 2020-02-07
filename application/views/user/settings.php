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

                <!-- profile edit card -->
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-white br-0">
                                <strong class="card-title inline-block">Edit Profile</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <div class="rounded-circle bg-dark">
                                        <img class="upload-dp p-1" src="<?php if($user_info[0]->image_address == ''){ echo base_url()."images/profile_pic/default.png"; } else { echo base_url().$user_info[0]->image_address; }?>" alt="change profile pic" width="128">
                                        <div class="add-image-icon">
                                            <i class="fa fa-plus plus-icon"></i>
                                        </div>
                                        <input id="input-image" name="profile-pic" type="file" hidden>
                                    </div>
                                </div>
                                <form class="update-profile-form" method="POST">
                                <div class="col-md-12">
                                <div class="form-group"><label for="name" class=" form-control-label">Name</label><input type="text" id="name" name="full_name" placeholder="<?php echo $user_info[0]->full_name; ?>" class="form-control text-capitalize"></div>
                                </div>
                                <div class="col-md-12">
                                <div class="form-group"><label for="role" class=" form-control-label">Playing Role</label>
                                    <select name="playing_role" class="form-control">
                                        <option value="batsman">Batsman</option>
                                        <option value="bowler">Bowler</option>
                                        <option value="all rounder">All Rounder</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-12">
                                <div class="form-group"><label for="date-of-birth" class=" form-control-label">Date of Birth</label><input type="date" id="date-of-birth" name="dob" placeholder="<?php echo $user_info[0]->dob; ?>" class="form-control"></div>
                                </div>
                                <div class="col-md-12">
                                <div class="form-group"><label for="batting style" class=" form-control-label">Batting Style</label>
                                    <select name="batting_style" class="form-control">
                                        <option value="LHB">LHB</option>
                                        <option value="RHB">RHB</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-12">
                                <div class="form-group"><label for="balling style" class=" form-control-label">Balling Style</label>
                                    <select name="balling_style" class="form-control">
                                        <option value="Right-arm fast">Right-arm fast</option>
                                        <option value="Right-arm medium">Right-arm medium</option>
                                        <option value="Left-arm fast">Left-arm fast</option>
                                        <option value="Left-arm medium">Left-arm medium</option>
                                        <option value="Slow left-arm orthodox">Slow left-arm othodox</option>
                                        <option value="Slow left-arm chinaman">Slow left-arm chinaman</option>
                                        <option value="Right-arm Off Break">Right-arm Off Break</option>
                                        <option value="Right-arm Leg Break">Right-arm Lef Break</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-12">
                                <div class="form-group"><label for="gender" class=" form-control-label">Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-12">
                                <div class="form-group"><label for="ball type" class=" form-control-label">Ball Type</label>
                                    <select name="ball_type" class="form-control">
                                        <option value="Tennis">Tennis</option>
                                        <option value="Leather">Leather</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-12">
                                <div class="form-group"><label for="email" class=" form-control-label">Email</label><input type="text" id="email" name="email" placeholder="<?php echo $user_info[0]->email; ?>" class="form-control"></div>
                                </div>
                                <div class="col-md-12">
                                <div class="form-group"><label for="city" class=" form-control-label">Location</label><input type="text" id="city" name="city" placeholder="<?php echo $user_info[0]->city; ?>" class="form-control text-capitalize"></div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-lg btn-block mt-3">Update</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- change password card -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-white br-0">
                                <strong class="card-title inline-block">Change Password</strong>
                            </div>
                            <div class="card-body card-block">
                                <form class="update-password-form" method="POST">
                                <div class="col-md-12">
                                <div class="form-group"><label for="new-password" class=" form-control-label">New Password</label><input type="password" id="new-password" placeholder="New Password" class="form-control" required></div>
                                </div>
                                <div class="col-md-12">
                                <div class="form-group"><label for="confirm-password" class=" form-control-label">Confirm Password</label><input type="password" id="confirm-password" name="password" placeholder="Confirm Password" class="form-control" required></div>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg btn-block">Update</button>
                                </form>
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>js/main.js"></script>
    <script src="<?php echo base_url(); ?>js/userscript.js"></script>
    <script src="<?php echo base_url(); ?>js/croppie.js"></script>
    <script src="<?php echo base_url(); ?>js/crop-dp.js"></script>
</body>
</html>

<html>
    <head>
        <title>gullytoground</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/mystyle.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Oswald&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script>
            const BASE_URL = "<?php echo base_url(); ?>";
        </script>
    </head>
    <body>
        <section class="login-section">
            <div class="first-box">
                <div class="logo">
                    <img src="<? echo base_url(); ?>images/icon/logo-icon.png" width="44">
                </div>
            </div>
            <div class="second-box">
                <div class="head">
                    <strong class="title">Login</strong>
                </div>
                <div class="login-panel base">
                    <form id="login-form" method="POST">
                        <div class="input-field username">
                            <i class="fa fa-user"></i>
                            <input name="phone" type="text" placeholder="Phone No."  maxlength="10"required>
                        </div>
                        <div class="input-field password">
                            <i class="fa fa-key"></i>
                            <input name="password" type="password" placeholder="Password" required maxlength="10" minlength="6">
                        </div>
                        <div class="forget-pass">
                        <a id="forgot-password" href="#">forgetton password?</a>
                        </div>
                        <div class="login-btn">
                            <button type="submit">login</button>
                        </div>
                    </form>
                    <div class="new-account">
                        <p>
                            Don't have an account? <a href="<?php echo base_url('ControlUnit/registerPage');?>">Get started</a>
                        </p>
                    </div>
                </div>
                <div class="forgot-panel base hide">
                    <div class="input-field">
                    <i class="fa fa-phone"></i>
                    <input type="text" placeholder="Registered Phone No.">
                    </div>
                    <div class="reset-btn">
                    <button>RESET</button>
                    </div>
                    <div class="back-to-login">
                        <p>
                            <a id="back-to-login-btn" href="#"><i class="fa fa-arrow-left"></i> Back to login</a>
                        </p>
                    </div>
                </div>
            </div>  
        </section>
        <script src="<?php echo base_url(); ?>js/jquery.min.js" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>js/myscript.js" type="text/javascript"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>    
</html>
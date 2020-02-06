<html>
    <head>
        <title>gullytoground</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/mystyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script>
            const BASE_URL = "<?php echo base_url(); ?>";
        </script>
    </head>
    <body>
      <section class="register-section">
            <div class="first-box">
                <div class="logo">
                    <img src="<?php echo base_url();?>/images/icon/logo-icon.png" alt="logo" width="44">
                </div>
            </div>
            <div class="second-box">
              <div class="head">
                <strong>Register Here</strong>
              </div>
              <div class="base">
                <form id="register-form" method="POST">
                  <div class="input-field">
                      <i class="fa fa-user"></i>
                      <input name="full-name" type="text" placeholder="Full Name" required>
                    </div>
                    <div class="input-field">
                      <i class="fa fa-phone"></i>
                      <input name="phone" type="text" placeholder="Phone No." required >
                    </div>
                    <div class="input-field">
                      <i class="fa fa-key"></i>
                      <input name="password" type="text" placeholder="Create password"  required maxlength="10">
                    </div>
                    <div class="register-btn">
                      <button>Register</button>
                    </div>
                </form>  
                <div class="have-account">
                  <p>
                    have an account? <a href="<?php echo base_url('ControlUnit');?>"> Login</a>
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
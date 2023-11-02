<form action="doLogin" class="remember-login-frm" id="remember-login-frm" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card card-signup">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon"><i  class="material-icons">lock_open</i></div>
                  <h3 class="card-title">Login<small></small></h3>
                </div>
                <div class="card-body">
                     <!--Body-->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-user"></i></div>
                            </div>
                            <input type="text" class="form-control" id="remail" name="user_name" placeholder="Username *" value="<?php if (isset($_COOKIE["loginId"])) {
    echo $_COOKIE["loginId"];
} ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></div>
                            </div>
                            <input type="password" class="form-control" id="rpassword" name="password" placeholder="Password *" value="<?php if (isset($_COOKIE["loginPass"])) {
    echo $_COOKIE["loginPass"];
} ?>">
                        </div>
                    </div>                                

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" <?php if (isset($_COOKIE["loginId"])) { ?> checked="checked" <?php } ?>> Remember Me
                            </label>  
                            <a href="<?php print site_url(); ?>forgot" class="text-primary">Forgot Password?</a> 
                            <button type="submit" id="contact-send-a" class="btn-purple btn rounded-right float-right">Login</button>
                        </div>
                    </div>

                    <div class="text-center">
                        
                    </div>

                </div>
                <div class="card-footer">
                  <div class="stats">
                     <i class="fa fa-copyright"></i> Metro Infotech
                  </div>
                </div>
            </div>
        </div>          
    </div>
</form>

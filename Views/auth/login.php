<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-2"></div>
        <div class="col-lg-6 col-md-6 col-sm-8">
            <div class="panel panel-dark" style="margin-top: 100px;">
                <div class="panel-body">
                    <?php
                        $error = \App\System\Helper::flush('error');
                        if($error != false) {
                    ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Error!</strong> <?php echo $error; ?>
                    </div>
                    <?php } ?>
					<?php
					$msg = \App\System\Helper::flush('registered');
					if($msg != false) {
						?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $msg; ?>
                        </div>
					<?php } ?>
                    <form class="form-horizontal" method="post" action="<?php echo \App\System\Helper::url('authenticate'); ?>">
                        <fieldset>
                            <legend>Login</legend>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-10">
                                    <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                                <div class="col-lg-10">
                                    <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
<!--                                <label for="remember" class="col-lg-2 control-label">Remember Me</label>-->
                                <div class="col-lg-offset-2 col-lg-6">
                                    <div class="checkbox checkbox-primary">
                                        <input type="checkbox" id="remember" name="remember" value="store">
                                        <label for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary" name="login">Login</button>
                        </div>
                        <hr>
                        Didn't have an account? <a href="<?php echo \App\System\Helper::url('register'); ?>">Click here</a><br>
                        <a href="<?php echo \App\System\Helper::url('forgotpassword'); ?>">Forgot Password?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
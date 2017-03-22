<div class="container">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-2"></div>
		<div class="col-lg-6 col-md-6 col-sm-8">
			<div class="panel panel-dark" style="margin-top: 100px;">
				<div class="panel-body">
					<?php
					$name_e = \App\System\Helper::flush('name_exists');
					$email_e = \App\System\Helper::flush('email_exists');
					$empty = \App\System\Helper::flush('empty');
					if($name_e != false || $email_e != false || $empty != false) {
						?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Error!</strong> <?php echo ($name_e != false) ? $name_e : ""; echo ($email_e != false) ? $email_e : ""; echo ($empty != false) ? $empty : ""; ?>
						</div>
					<?php } ?>
					<form class="form-horizontal" method="post" action="<?php echo \App\System\Helper::url('registration'); ?>">
						<fieldset>
							<legend>Register</legend>
							<div class="form-group">
								<label for="inputName" class="col-lg-2 control-label">Username</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" name="name" id="inputName" placeholder="Username">
								</div>
							</div>
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
						</fieldset>
						<div class="text-center">
							<button type="submit" class="btn btn-lg btn-primary" name="register">Register</button>
						</div>
						<hr>
						Already have an account? <a href="<?php echo \App\System\Helper::url('login'); ?>">Click here</a><br>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include '../Shared/header.php';  ?>  
<!--end top-->
		<div id="login">

		<h2><span class="fontawesome-lock"></span>Register</h2>

		<form action="#" method="POST">

			<fieldset>

				<p><label for="username">Username</label></p>
				<p><input type="username" id="username" value="" onBlur="if(this.value=='')this.value='username'" onFocus="if(this.value=='username')this.value=''"></p> 

				<p><label for="password">Password</label></p>
				<p><input type="password" id="password" value="" onBlur="if(this.value=='')this.value='password'" onFocus="if(this.value=='password')this.value=''"></p>

<!--				<p><label for="password">Re-type Password</label></label></p>
				<p><input type="password" id="password" value="" onBlur="if(this.value=='')this.value='password'" onFocus="if(this.value=='password')this.value=''"></p>

				<p><label for="email">Email</label></label></p>
				<p><input type="email" id="email" value="" onBlur="if(this.value=='')this.value='email'" onFocus="if(this.value=='email')this.value=''"></p>-->

				<p><a href="#" class="btn btn-primary" role="button">Register</a></p>
				<p><a href="<?php echo PATH_VIEW_ADMIN; ?>/index.php">Return</a></p>

			</fieldset>

		</form>

	</div> 
	<!-- end login -->

<?php  include '../Shared/header.php'; ?>

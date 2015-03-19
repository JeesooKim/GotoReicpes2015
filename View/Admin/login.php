<?php include ('../../View/Shared/header.php') ?>

		<h2><span class="fontawesome-lock"></span>User Login</h2>

		<form action="../../View/Admin/index.php" method="POST">

			<fieldset>

				<p><label for="username">Username</label></p>
				<p><input type="username" id="username" value="username" onBlur="if(this.value=='')this.value='username'" onFocus="if(this.value=='username')this.value=''"></p> 

				<p><label for="password">Password</label></p>
				<p><input type="password" id="password" value="password" onBlur="if(this.value=='')this.value='password'" onFocus="if(this.value=='password')this.value=''"></p> 

				<p><input type="submit" value="Log In"></p>
				<p><a href="../../View/Admin/index.php">Return</a></p>

			</fieldset>

		</form>

		<?php include ('../../View/Shared/footer.php') ?>

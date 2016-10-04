<?php if (validation_errors()): ?>
	<div class="alert-login gagal">
		<?php echo validation_errors(); ?>
	</div>
<?php endif ?>
<div class="form-login">
	<div class="header-login">
		<img src="<?php echo base_url('images/login.png') ?>">
		<h4>Login</h4>
	</div>
	<div class="content-login">
		<form method="post" action="<?php echo site_url('login/index')?>">
			<table>
				<tr>
				<td><label>Username</label></td>
				<td><input type="text" name="username" placeholder="Username" class="input-text" autocomplete="off"></td>
			</tr>
			<tr>
				<td><label>Password</label></td>
				<td><input type="password" name="password" placeholder="Password" class="input-text" autocomplete="off"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Login" class="input-btn"></td>
			</tr>
			</table>
		</form>
	</div>	
</div>
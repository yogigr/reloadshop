<!-- validation errors -->
<?php if (validation_errors()): ?>
	<div class="alert gagal">
		<?php echo validation_errors(); ?>
	</div>
<?php endif ?>


<!--Form input-->
<div class="form-input">
	<div class="form-input-header">
		<h4>Tambah User</h4>
	</div>
	<div class="form-input-content">
		<form method="post" action="<?php echo site_url('users/edit/'.$user['id_user']); ?>">
			<table>
				<tr>
					<td><label>Nama Lengkap&nbsp;&nbsp;</label></td>
					<td><input type="text" name="nama_lengkap" value="<?php echo $user['nama_lengkap'] ?>" class="input-text" placeholder="Nama Lengkap" autocomplete="off">&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td><label>Username&nbsp;&nbsp;</label></td>
					<td><input type="text" name="username" value="<?php echo $user['username'] ?>" class="input-text" placeholder="Username" autocomplete="off">&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td><label>No Telp&nbsp;&nbsp;</label></td>
					<td><input type="text" name="telp" value="<?php echo $user['telp'] ?>" class="input-text" placeholder="No Telp" autocomplete="off"></td>
				</tr>
				<tr>
					<td><label>Alamat</label></td>
					<td colspan="2"><textarea name="alamat" cols="50" rows="4"><?php echo $user['alamat']; ?></textarea></td>
				</tr>
				<tr>
					<td><label>Level</label></td>
					<td>
						<select name="level" class="input-text">
							<?php  
							if ($user['level'] == 'admin') {
								?>
								<option value="admin" selected>Admin</option>
								<option value="kasir">Kasir</option>
								<?php
							} else {
								?>
								<option value="admin">Admin</option>
								<option value="kasir" selected>Kasir</option>
								<?php
							}

							?>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="reset" name="reset" value="Reset" class="input-btn">
						<input type="submit" name="submit" value="Update" class="input-btn">
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<!--Form input-->
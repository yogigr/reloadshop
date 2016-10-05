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
		<form method="post" action="<?php echo site_url('users/insert'); ?>">
			<table>
				<tr>
					<td><label>Nama Lengkap&nbsp;&nbsp;</label></td>
					<td><input type="text" name="nama_lengkap" class="input-text" placeholder="Nama Lengkap" autocomplete="off">&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td><label>Username&nbsp;&nbsp;</label></td>
					<td><input type="text" name="username" class="input-text" placeholder="Username" autocomplete="off">&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td><label>Password&nbsp;&nbsp;</label></td>
					<td><input type="password" name="password" class="input-text" placeholder="Password" autocomplete="off">&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td><label>Konfirmasi Password&nbsp;&nbsp;</label></td>
					<td><input type="password" name="passconf" class="input-text" placeholder="Konfirmasi Password" autocomplete="off">&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td><label>No Telp&nbsp;&nbsp;</label></td>
					<td><input type="text" name="telp" class="input-text" placeholder="No Telp" autocomplete="off"></td>
				</tr>
				<tr>
					<td><label>Alamat</label></td>
					<td colspan="2"><textarea name="alamat" cols="50" rows="4"></textarea></td>
				</tr>
				<tr>
					<td><label>Level</label></td>
					<td>
						<select name="level" class="input-text">
							<option value="" selected disabled>Level</option>
							<option value="admin">Admin</option>
							<option value="kasir">Kasir</option>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="reset" name="reset" value="Reset" class="input-btn">
						<input type="submit" name="submit" value="Tambah" class="input-btn">
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<!--Form input-->
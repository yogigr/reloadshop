<!-- validation errors -->
<?php if (validation_errors()): ?>
	<div class="alert gagal">
		<?php echo validation_errors(); ?>
	</div>
<?php endif ?>


<!--Form input-->
<div class="form-input">
	<div class="form-input-header">
		<h4>Tambah Supplier</h4>
	</div>
	<div class="form-input-content">
		<form method="post" action="<?php echo site_url('supplier/insert'); ?>">
			<table>
				<tr>
					<td><label>Nama Supplier&nbsp;&nbsp;</label></td>
					<td><input type="text" name="nama_supplier" class="input-text" placeholder="Nama Supplier" autocomplete="off">&nbsp;&nbsp;</td>
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
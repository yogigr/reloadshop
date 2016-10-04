<!-- validation errors -->
<?php if (validation_errors()): ?>
	<div class="alert gagal">
		<?php echo validation_errors(); ?>
	</div>
<?php endif ?>


<!--Form input-->
<div class="form-input">
	<div class="form-input-header">
		<h4>Edit Supplier</h4>
	</div>
	<div class="form-input-content">
		<form method="post" action="<?php echo site_url('supplier/edit/'.$supplier['id_supplier']); ?>">
			<table>
				<tr>
					<td><label>Nama Supplier&nbsp;&nbsp;</label></td>
					<td><input type="text" name="nama_supplier" value="<?php echo $supplier['nama_supplier']; ?>" class="input-text" placeholder="Nama Supplier" autocomplete="off">&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td><label>No Telp&nbsp;&nbsp;</label></td>
					<td><input type="text" name="telp" value="<?php echo $supplier['telp']; ?>" class="input-text" placeholder="No Telp" autocomplete="off"></td>
				</tr>
				<tr>
					<td><label>Alamat</label></td>
					<td colspan="2"><textarea name="alamat" cols="50" rows="4"><?php echo $supplier['alamat']; ?></textarea></td>
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
<!-- validation errors -->
<?php if (validation_errors()): ?>
	<div class="alert gagal">
		<?php echo validation_errors(); ?>
	</div>
<?php endif ?>

<!-- pesan berhasil -->
<?php if ($this->session->has_userdata('berhasil')): ?>
	<div class="alert sukses">
		<p><?php echo $this->session->userdata('berhasil'); ?></p>
		<?php  
		# hapus session
		$this->session->unset_userdata('berhasil');
		?>
	</div>
<?php endif ?>


<!--Form input-->
<div class="form-input">
	<div class="form-input-header">
		<h4>Tambah Kategori</h4>
	</div>
	<div class="form-input-content">
		<form method="post" action="<?php echo site_url('kategori/insert'); ?>">
			<table>
				<tr>
					<td><label>Nama Kategori</label>&nbsp;&nbsp;</td>
					<td>
						<input type="text" name="nama_kategori" class="input-text" placeholder="Nama Kategori" autocomplete="off">
					</td>
				</tr>
				
				<tr>
					<td></td>
					<td>
						<input type="submit" name="submit" value="Tambah" class="input-btn">
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<!--Form input-->
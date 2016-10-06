<!-- validation errors -->
<?php if (validation_errors()): ?>
	<div class="alert gagal">
		<?php echo validation_errors(); ?>
	</div>
<?php endif ?>


<!--Form input-->
<div class="form-input">
	<div class="form-input-header">
		<h4>Tambah Barang</h4>
	</div>
	<div class="form-input-content">
		<form method="post" action="<?php echo site_url('barang/insert'); ?>">
			<table>
				<tr>
					<td>
						<label>Kode Barang&nbsp;&nbsp;</label>
					</td>
					<td>
						<input type="text" name="kode_barang" value="<?php echo $kode_barang; ?>" class="input-text" placeholder="Kode Barang" autocomplete="off" readonly>&nbsp;&nbsp;
					</td>
					<td>
						<label>Nama Barang</label>&nbsp;&nbsp;
					</td>
					<td>
						<input type="text" name="nama_barang" class="input-text" placeholder="Nama Barang" autocomplete="off">
					</td>
				</tr>
				<tr>
					<td>
						<label>Kategori&nbsp;&nbsp;</label>
					</td>
					<td>
						<select name="kategori" class="select-text">
							<option value="" selected disabled>Pilih Kategori</option>
							<?php foreach ($kategoris as $kategori): ?>
								<option value="<?php echo $kategori['id_kategori']; ?>"><?php echo ucwords($kategori['nama_kategori']); ?></option>
							<?php endforeach ?>
						</select>
					</td>
					<td>
						<label>Stok Awal</label>&nbsp;&nbsp;
					</td>
					<td>
						<input type="number" name="stok" class="input-text" placeholder="Stok Awal" autocomplete="off">
					</td>
				</tr>
				<tr>
					<td>
						<label>Harga Beli (Rp)&nbsp;&nbsp;</label>
					</td>
					<td>
						<input type="number" name="harga_beli" class="input-text" placeholder="Harga Beli" autocomplete="off">&nbsp;&nbsp;
					</td>
					<td>
						<label>Harga Jual (Rp)</label>&nbsp;&nbsp;
					</td>
					<td>
						<input type="number" name="harga_jual" class="input-text" placeholder="Harga Jual" autocomplete="off">
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
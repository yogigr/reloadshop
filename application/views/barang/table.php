	<?php if ($this->session->has_userdata('berhasil')): ?>
		<div class="alert sukses">
			<p><?php echo $this->session->userdata('berhasil'); ?></p>
			<?php  
			# hapus session
			$this->session->unset_userdata('berhasil');
			?>
		</div>
	<?php endif ?>
	<?php if ($this->session->has_userdata('gagal')): ?>
		<div class="alert gagal">
			<p><?php echo $this->session->userdata('gagal'); ?></p>
			<?php  
			# hapus session gagal
			$this->session->unset_userdata('gagal');
			?>
		</div>
	<?php endif ?>
<!--table-->
	<div class="table">
		<div class="table-header">
			<h4>Table Barang</h4>
		</div>
		<!--table-content-->
		<div class="table-content">
			<!--btn tambah-->
			
			<!--Form cari-->
			<form method="get" action="<?php echo site_url('barang/search'); ?>">
				<table>
					<tr>
						<td>
							<label>Kode</label>
							&nbsp;
						</td>
						<td>
							<input type="text" name="kode_barang" class="input-text" placeholder="Kode Barang" autocomplete="off">
							&nbsp;&nbsp;
						</td>
						
				
						<td>
							<label>Nama Barang</label>
							&nbsp;
						</td>
						<td>
							<input type="text" name="nama_barang" class="input-text" placeholder="Nama Barang" autocomplete="off">
						</td>
					</tr>
					<tr>
						<td>
							<label>Kategori</label>
							&nbsp;
						</td>
						<td>
							<select name="kategori" class="select-text">
								<option value="">Pilih Kategori</option>
								<?php foreach ($kategoris as $kategori): ?>
									<option value="<?php echo $kategori['id_kategori'] ?>"><?php echo $kategori['nama_kategori']; ?></option>
								<?php endforeach ?>
							</select>
						</td>
				
						<td>
							<label>Order By</label>
							&nbsp;
						</td>
						<td>
							<select name="order_key" class="select-text">
								<option value="" selected disabled>Pilih Urutan</option>
								<option value="harga_jual">Harga Jual</option>
								<option value="harga_beli">Harga Beli</option>
								<option value="stok">STOK</option>
							</select>
						</td>
						<td>
							<select name="order_value" class="select-text">
								<option value="" selected disabled>Pilih Nilai Urutan</option>
								<option value="desc">Besar</option>
								<option value="asc">Kecil</option>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="submit" value="Filter Barang" class="input-btn"></td>
					</tr>
				</table>
			</form>
			<!--Form cari-->
			<br>
			<!--table saya-->
			<table class="table-saya">
				
				<tr>
					<th>No</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Kategori</th>
					<th>Harga Beli</th>
					<th>Harga Jual</th>
					<th>Stok</th>
					<th>Action</th>
				</tr>
				
				<?php
				

				$no = $this->uri->segment(3) + 1; 
				foreach ($barangs as $barang): ?>
					<tr>
						<td style="width: 50px; text-align: center"><?php echo $no; ?></td>
						<td><?php echo $barang['kode_barang']; ?></td>
						<td><?php echo ucwords($barang['nama_barang']); ?></td>
						<td><?php echo strtoupper($this->mkategori->detail($barang['kategori'])['nama_kategori']); ?></td>
						<td style="text-align: right;"><?php echo $barang['harga_beli']; ?></td>
						<td style="text-align: right;"><?php echo $barang['harga_jual']; ?></td>
						<td style="text-align: right;"><?php echo $barang['stok']; ?></td>
						<td style="text-align: center">
							<a href="<?php echo site_url('barang/edit/'.$barang['id_barang']); ?>">
								<img src="<?php echo base_url('images/edit.png') ?>">
							</a>
							<a href="<?php echo site_url('barang/delete/'.$barang['id_barang']); ?>" onclick="return confirm('yakin hapus data?');">
								<img src="<?php echo base_url('images/hapus.png'); ?>">
							</a>
						</td>
					</tr>
				<?php
					$no++; 
				endforeach ?>
			</table>
			<!--table saya-->

			<?php echo $this->pagination->create_links(); ?>
			
		</div>
		<!--table-content-->
	</div>
	<!--table-->
	<input type="submit" name="submit" class="input-btn kiri" value="Tambah Barang" onclick="window.location='<?php echo site_url('barang/insert'); ?>'">
	<?php if ($this->session->has_userdata('berhasil')): ?>
		<div class="alert sukses">
			<p><?php echo $this->session->userdata('berhasil'); ?></p>
			<?php  
			# hapus session
			$this->session->unset_userdata('berhasil');
			?>
		</div>
	<?php endif ?>
<!--table-->
	<div class="table">
		<div class="table-header">
			<h4>Table Supplier</h4>
		</div>
		<!--table-content-->
		<div class="table-content">
			<!--btn tambah-->
			
			<input type="submit" name="submit" class="input-btn kiri" value="Tambah Supplier" onclick="window.location='<?php echo site_url('supplier/insert'); ?>'">
			
			<!--Form cari-->
			<form class="form-cari" method="get" action="<?php echo site_url('supplier/search'); ?>">
				<table>
					<tr>
						<td>
							<label>Cari Data</label>
							&nbsp;
						</td>
						<td>
							<input type="text" name="keyword" class="input-text" placeholder="By Nama Supplier" autocomplete="off" required>
						</td>
					</tr>
				</table>
			</form>
			<!--Form cari-->

			<!--table saya-->
			<table class="table-saya">
				<tr>
					<th>No</th>
					<th>Nama Supplier</th>
					<th>Telp</th>
					<th>Alamat</th>
					<th>Action</th>
				</tr>
				
				<?php
				$no = $this->uri->segment(3) + 1; 
				foreach ($suppliers as $supplier): ?>
					<tr>
						<td style="width: 50px; text-align: center"><?php echo $no; ?></td>
						<td><?php echo ucwords($supplier['nama_supplier']); ?></td>
						<td><?php echo $supplier['telp']; ?></td>
						<td><?php echo ucwords($supplier['alamat']); ?></td>
						<td style="text-align: center">
							<a href="<?php echo site_url('supplier/edit/'.$supplier['id_supplier']); ?>">
								<img src="<?php echo base_url('images/edit.png') ?>">
							</a>
							<a href="<?php echo site_url('supplier/delete/'.$supplier['id_supplier']); ?>" onclick="return confirm('yakin hapus data?');">
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
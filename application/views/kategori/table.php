	<!--table-->
	<div class="table">
		<div class="table-header">
			<h4>Table Kategori</h4>
		</div>
		<!--table-content-->
		<div class="table-content">
			<!--Form cari-->
			<form class="form-cari" method="get" action="<?php echo site_url('kategori/search'); ?>">
				<table>
					<tr>
						<td>
							<label>Cari Data</label>
							&nbsp;
						</td>
						<td>
							<input type="text" name="keyword" class="input-text" placeholder="By Nama Kategori" autocomplete="off" required>
						</td>
					</tr>
				</table>
			</form>
			<!--Form cari-->

			<!--table saya-->
			<table class="table-saya">
				<tr>
					<th>No</th>
					<th>Nama Kategori</th>
					<th>Action</th>
				</tr>
				
				<?php
				$no = $this->uri->segment(3) + 1; 
				foreach ($kategories as $kategori): ?>
					<tr>
						<td style="width: 50px; text-align: center"><?php echo $no; ?></td>
						<td><?php echo ucwords($kategori['nama_kategori']); ?></td>
						<td style="text-align: center">
							<a href="<?php echo site_url('kategori/edit/'.$kategori['id_kategori']); ?>">
								<img src="<?php echo base_url('assets/images/edit.png') ?>">
							</a>
							<a href="<?php echo site_url('kategori/delete/'.$kategori['id_kategori']); ?>" onclick="return confirm('yakin hapus data?');">
								<img src="<?php echo base_url('assets/images/hapus.png'); ?>">
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
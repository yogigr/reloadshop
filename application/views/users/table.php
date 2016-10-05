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
			<h4>Table Users</h4>
		</div>
		<!--table-content-->
		<div class="table-content">
			<!--btn tambah-->
			
			<input type="submit" name="submit" class="input-btn kiri" value="Tambah User" onclick="window.location='<?php echo site_url('users/insert'); ?>'">
			
			<!--Form cari-->
			<form class="form-cari" method="get" action="<?php echo site_url('users/search'); ?>">
				<table>
					<tr>
						<td>
							<label>Cari Data</label>
							&nbsp;
						</td>
						<td>
							<input type="text" name="keyword" class="input-text" placeholder="By username or nama lengkap" autocomplete="off" required>
						</td>
					</tr>
				</table>
			</form>
			<!--Form cari-->

			<!--table saya-->
			<table class="table-saya">
				<tr>
					<th>No</th>
					<th>Username</th>
					<th>Nama Lengkap</th>
					<th>Telp</th>
					<th>Alamat</th>
					<th>level</th>
					<th>Login Terakhir</th>
					<th>Action</th>
				</tr>
				
				<?php
				$no = $this->uri->segment(3) + 1; 
				foreach ($users as $user): ?>
					<tr>
						<td style="width: 50px; text-align: center"><?php echo $no; ?></td>
						<td><?php echo $user['username']; ?></td>
						<td><?php echo $user['nama_lengkap']; ?></td>
						<td><?php echo $user['telp']; ?></td>
						<td><?php echo $user['alamat']; ?></td>
						<td><?php echo $user['level']; ?></td>
						<td><?php echo $user['last_on']; ?></td>
						<td style="text-align: center">
							<a href="<?php echo site_url('users/edit/'.$user['id_user']); ?>">
								<img src="<?php echo base_url('images/edit.png') ?>">
							</a>
							<a href="<?php echo site_url('users/delete/'.$user['id_user']); ?>" onclick="return confirm('yakin hapus data?');">
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
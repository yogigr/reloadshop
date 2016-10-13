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
			<h4>Pembelian</h4>
		</div>
		<!--table-content-->
		<div class="table-content">
			<!--btn tambah-->
			
			<!--Form cari-->
			<form method="get" action="<?php echo site_url('pembelian/search'); ?>">
				<table>
					<tr>
						<td>
							<label>Kode Pembelian</label>
							&nbsp;
						</td>
						<td>
							<input type="text" name="kode_pembelian" class="input-text" placeholder="Cari by Kode Pembelian" autocomplete="off" required>
							&nbsp;&nbsp;
						</td>
					</tr>
				</table>
			</form>
			<!--Form cari-->
			<br>
			<!--table saya-->
			<table class="table-saya">
				
				<tr>
					<th>No</th>
					<th>Kd Pmblian</th>
					<th>No Nota</th>
					<th>Supplier</th>
					<th>Tot Pmblian</th>
					<th>Operator</th>
					<th>Tgl Pmblian</th>
					<th>Tgl Input</th>
					<th>Detail</th>
				</tr>
				
				<?php
				$no = $this->uri->segment(3) + 1; 
				foreach ($pembelians as $pembelian): ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $pembelian['kode_pembelian']; ?></td>
						<td><?php echo $pembelian['no_nota']; ?></td>
						<td style="text-align: center"><?php echo $this->msupplier->detail($pembelian['id_supplier'])['nama_supplier']; ?></td>
						<td style="text-align: right"><?php echo $this->mpembelian->total_dtlpembelian($pembelian['kode_pembelian'])['total_pembelian']; ?></td>
						<td style="text-align: center"><?php echo $this->musers->detail($pembelian['id_user'])['nama_lengkap']; ?></td>
						<td style="text-align: center"><?php echo $pembelian['tanggal_beli']; ?></td>
						<td style="text-align: center"><?php echo $pembelian['tanggal_input']; ?></td>
						<td style="text-align: center">
							<a href="<?php echo site_url('pembelian/view/'.$pembelian['kode_pembelian']); ?>">
								<img src="<?php echo base_url('assets/images/view.png') ?>">
							</a>
							<a href="<?php echo site_url('pembelian/hapus/'.$pembelian['kode_pembelian']); ?>" onclick="return confirm('Yakin hapus order pembelian?')">
								<img src="<?php echo base_url('assets/images/hapus.png') ?>">
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
	<input type="submit" name="submit" class="input-btn kiri" value="Pembelian Baru" onclick="window.location='<?php echo site_url('pembelian/insert'); ?>'">
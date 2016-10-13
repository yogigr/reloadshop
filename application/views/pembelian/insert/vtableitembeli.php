<?php 
$no = 1;
foreach ($item_belis as $itembeli): ?>
	<tr>
		<td style="text-align: right"><?php echo $no; ?></td>
		<td><?php echo $itembeli['kode_barang']; ?></td>
		<td><?php echo $this->mbarang->ambil_nama_barang($itembeli['kode_barang'])['nama_barang']; ?></td>
		<td id="col_qty" style="text-align: right"><?php echo $itembeli['qty_beli']; ?></td>
		<td style="text-align: right"><?php echo $itembeli['harga_beli']; ?></td>
		<td id="col_totbel" style="text-align: right"><?php echo $itembeli['total']; ?></td>
		<td style="text-align: center">
			<button onclick="editItemBeli('<?php echo $itembeli["id_dtlpembelian"] ?>')" class="btn-edit-item"><img src="<?php echo base_url('assets/images/edit.png') ?>"></button>
			<button onclick="hapusItemBeli('<?php echo $itembeli["id_dtlpembelian"] ?>')" class="btn-hapus-item"><img src="<?php echo base_url('assets/images/hapus.png') ?>"></button>
		</td>	
	</tr>
<?php 
	$no++;
endforeach ?>
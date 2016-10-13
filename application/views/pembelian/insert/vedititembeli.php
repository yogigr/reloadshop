
<tr>
	<td>
		<input type="text" name="kode_barang" id="kode_barang" value="<?php echo $item_beli['kode_barang']; ?>" placeholder="Kode Barang" class="input-text" onkeyup="tampilNamaBarang(this.value)" maxlength="6" style="width:78px" autocomplete="off">
	</td>
	<td>
		<input type="text" name="nama_barang" id="nama_barang" value="<?php echo $this->mbarang->ambil_nama_barang($item_beli['kode_barang'])['nama_barang']; ?>" class="input-text" placeholder="Nama Barang" disabled="disabled" style="width: 325px">
	</td>
	<td>
		<input type="text" id="quantity" name="quantity" value="<?php echo $item_beli['qty_beli'] ?>" class="input-text" placeholder="Quantity" style="width: 60px;" onfocus="startCalc();" onblur="stopCalc();" autocomplete="off" maxlength="3">
	</td>

	<td>
		<input type="text" id="total_harga" name="total_harga" value="<?php echo $item_beli['total'] ?>" class="input-text" placeholder="Rp. Total Harga" onfocus="startCalc();" onblur="stopCalc();" autocomplete="off">
	</td>
	<td>
		<input type="text" id="harga_satuan" name="harga_satuan" value="<?php echo $item_beli['harga_beli']; ?>" class="input-text" placeholder="Rp. Harga Satuan" disabled="disable">
	</td>

	<td>
		<input type="submit" name="submit" value="Update" class="input-btn" id="tombol-simpan" onclick="updateItemBeli('<?php echo $item_beli["id_dtlpembelian"] ?>')">
	</td>
</tr>


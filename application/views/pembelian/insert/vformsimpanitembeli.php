<tr>
	<td>
		<input type="text" name="kode_barang" id="kode_barang" placeholder="Kode Barang" class="input-text" onkeyup="tampilNamaBarang(this.value)" maxlength="6" style="width:78px" autocomplete="off">
	</td>
	<td>
		<input type="text" name="nama_barang" id="nama_barang" class="input-text" placeholder="Nama Barang" disabled="disabled" style="width: 325px">
	</td>
	<td>
		<input type="text" id="quantity" name="quantity" class="input-text" placeholder="Quantity" style="width: 60px;" onfocus="startCalc();" onblur="stopCalc();" autocomplete="off" maxlength="3">
	</td>

	<td>
		<input type="text" id="total_harga" name="total_harga" class="input-text" placeholder="Rp. Total Harga" onfocus="startCalc();" onblur="stopCalc();" autocomplete="off">
	</td>
	<td>
		<input type="text" id="harga_satuan" name="harga_satuan" value="0" class="input-text" placeholder="Rp. Harga Satuan" disabled="disable">
	</td>

	<td>
		<input type="submit" name="submit" value="Simpan" class="input-btn" id="tombol-simpan" onclick="simpanItemBeli()">
	</td>
</tr>
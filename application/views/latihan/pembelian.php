<form method="get" action="<?php echo site_url('latihan/index'); ?>">
	<table>
		<tr>
			<td><label>Kode Pembelian</label></td>
			<td><input type="text" name="kode_pembelian"></td>
		</tr>
		<tr>
			<td><label>TGL Pembelian</label></td>
			<td><input type="text" id="tanggal_pembelian" name="tanggal_pembelian"></td>
		</tr>
		<tr>
			<td colspan="2"><h5 style="margin-bottom: 0px">Detail Pembelian</h5></td>
		</tr>
		<tr>
			<td><input type="text" name="kode_barang" placeholder="kode_barang"></td>
			<td><input type="text" id="quantity" name="quantity" placeholder="Quantity" onfocus="startCalc()" onblur="stopCalc()"></td>
			<td><input type="text" id="total_harga" name="total_harga" placeholder="Total Harga" onfocus="startCalc()" onblur="stopCalc()"></td>
			<td><input type="text" id="harga_satuan" name="harga_satuan" placeholder="Harga satuan" disabled="disabled" onfocus="startCalc()" onblur="stopCalc()"></td>
			<td><input type="submit" name="submit" value="Beli"></td>
		</tr>
	</table>
</form>
<table class="table-beli">
	<tr>
		<th>No</th>
		<th>Kode Barang</th>
		<th>Qty</th>
		<th>Harga Satuan</th>
		<th>Total</th>
	</tr>
</table>

<style type="text/css">
	.table-beli {
		width: 100%;
		border-collapse: collapse;
	}
	.table-beli, .table-beli tr, .table-beli td {
		border: 1px solid #ccc;
	}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/jquery-ui/jquery-ui.css') ?>">
<script type="text/javascript" src="<?php echo base_url('assets/jquery.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/jquery-ui/jquery-ui.js') ?>"></script>
<script type="text/javascript">
	// date picker
$(function(){
	$('#tanggal_pembelian').datepicker();
});

// hitung otomatis
function startCalc(){
	interval = setInterval("calc()", 1);
}

function calc(){
	var quantity = document.getElementById("quantity").value ;
	var total_harga = document.getElementById('total_harga').value ;
	document.getElementById('harga_satuan').value = Math.round(total_harga / quantity)  ;
}

function stopCalc(){
	clearInterval(interval);
}
</script>
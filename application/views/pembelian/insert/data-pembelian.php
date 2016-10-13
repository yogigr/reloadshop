
<div class="form-input">
	<div class="form-input-header">
		<h4>Data Pembelian</h4>
	</div>
	<div class="form-input-content">
		<table>
			<tr>
				<td><label>Kode Pembelian</label>&nbsp;&nbsp;</td>
				<td><input type="text" id="kode_pembelian" name="kode_pembelian" value="<?php echo $kode_pembelian; ?>" class="input-text" disabled="disabled"></td>
				<td width="50"></td>
				<td rowspan="5" class="display-total" id="total_beli">
					0
				</td>
			</tr>
			<tr>
				<td><label>Tgl Pembelian</label>&nbsp;&nbsp;</td>
				<td><input type="text" name="tanggal_beli" class="input-text" id="tanggal_beli" value="<?php echo date('m/d/Y'); ?>"></td>
			</tr>
			<tr>
				<td><label>Operator</label></td>
				<td>
					<select name="id_user" id="id_user" class="select-text">
						<?php  
						foreach ($users as $user) {
							if ($user['username'] == $this->session->userdata('username')) {
								?>
								<option value="<?php echo $user['id_user'] ?>" selected><?php echo $user['username']; ?></option>
								<?php
							} else {
								?>
								<option value="<?php echo $user['id_user'] ?>"><?php echo $user['username']; ?></option>
								<?php
							}
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Supplier</label></td>
				<td>
					<select name="id_supplier" id="id_supplier" class="select-text">
						<?php foreach ($suppliers as $supplier): ?>
							<option value="<?php echo $supplier['id_supplier'] ?>"><?php echo $supplier['nama_supplier'] ?></option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>No Nota</label></td>
				<td><input type="text" name="no_nota" id="no_nota" class="input-text" placeholder="Enter Nomor Nota *Apabila ada"></td>
			</tr>
		</table>
	</div>
</div>
<div class="form-input">
	<div class="form-input-header">
		<h4>Item Pembelian</h4>
	</div>
	<div class="form-input-content">
		<table id="form-dtlpembelian">
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
		</table>
		<br>
		<table class="table-saya">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Qty</th>
					<th>Harga</th>
					<th>Total</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody id="table-body-saya">
				
			</tbody>
			<tfoot>
				<tr>
					<td colspan="3" style="text-align: center"><strong>Grand Total</strong></td>
					<td style="text-align: right;font-weight: bold" id="tot_qty">0</td>
					<td colspan="3" style="text-align: right;font-weight: bold" id="tot_beli">0</td>
				</tr>
			</tfoot>
			
		</table>
	</div>
</div>
<table id="btn-proses-batal" style="float: right">
	<td colspan="7">
		<button class="input-btn" onclick="batalOrderBeli()">Batal</button>
		<button class="input-btn" onclick="simpanOrderBeli()">Proses</button>
	</td>
</table>

<!--Form input-->
<script type="text/javascript">

$(document).ready(function(){
	//load table
	var kode_pembelian = $('#kode_pembelian').val();
	var url = "<?php echo site_url('pembelian/table_item_beli/') ?>"  + kode_pembelian;
	$('#table-body-saya').load(url);
	//load total qty
	$('#tot_qty').load("<?php echo site_url('pembelian/total_qty/') ?>" +kode_pembelian);
	//load tot beli
	$('#tot_beli').load("<?php echo site_url('pembelian/total_beli/') ?>" +kode_pembelian);
	//load total beli
	$('#total_beli').load("<?php echo site_url('pembelian/total_beli/') ?>" +kode_pembelian);
});


// menampilkan nama barang dari kodedabarang yang di input
function tampilNamaBarang(kode){
	var url = "<?php echo site_url('pembelian/ambil_nama_barang'); ?>"+"?kode="+kode;
	$.get(url, function(data, status){
		if (status=='success') {
			$('#nama_barang').val(data);
		}else{
			$('#nama_barang').val( "request gagal");
		}
	});
}

// simpan item pembelian ke database
function simpanItemBeli(){
	var kode_pembelian = $('#kode_pembelian').val();
	var kode_barang = $('#kode_barang').val();
	var qty_beli = $('#quantity').val();
	var harga_beli = $('#harga_satuan').val();
	var total = $('#total_harga').val();
	var nama_barang = $('#nama_barang').val();
	var url = "<?php echo site_url('pembelian/simpan_item_beli') ?>";
	if (kode_pembelian==""||kode_barang==""||qty_beli==""||harga_beli==""||total_harga=="") {
		alert('isian input belum lengkap');
	} else if (nama_barang == 'Barang belum terdaftar') {
		alert('Kode Barang belum terdaftar');
	} else {
		$.post(url, 
			//data
			{
				kode_pembelian: kode_pembelian,
				kode_barang:kode_barang,
				qty_beli:qty_beli,
				harga_beli:harga_beli,
				total:total
			},
			// callback
			function(data, status){
				if (status=='success') {
					$('#kode_barang').val(null);$('#quantity').val(null);$('#harga_satuan').val(null);$('#total_harga').val(null);$('#nama_barang').val(null);
					// load table 
					$('#table-body-saya').load("<?php echo site_url('pembelian/table_item_beli/') ?>" + kode_pembelian);
					//load total qty
					$('#tot_qty').load("<?php echo site_url('pembelian/total_qty/') ?>" +kode_pembelian);
					//load tot beli
					$('#tot_beli').load("<?php echo site_url('pembelian/total_beli/') ?>" +kode_pembelian);
					//load total beli
					$('#total_beli').load("<?php echo site_url('pembelian/total_beli/') ?>" +kode_pembelian);
				}	
			}
		);
		
	}
}

function editItemBeli(id_dtlpembelian){
	$('.btn-edit-item').prop('disabled', true);
	$('.btn-hapus-item').prop('disabled', true);
	var url = "<?php echo site_url('pembelian/edit_item_beli/') ?>" + id_dtlpembelian;
	$('#form-dtlpembelian').load(url);
}

function updateItemBeli(id_dtlpembelian){
	var kode_pembelian = $('#kode_pembelian').val();
	var kode_barang = $('#kode_barang').val();
	var qty_beli = $('#quantity').val();
	var harga_beli = $('#harga_satuan').val();
	var total = $('#total_harga').val();
	var nama_barang = $('#nama_barang').val();
	var url = "<?php echo site_url('pembelian/update_item_beli/') ?>" + id_dtlpembelian;
	if (kode_pembelian==""||kode_barang==""||qty_beli==""||harga_beli==""||total_harga=="") {
		alert('isian input belum lengkap');
	} else if (nama_barang == 'Barang belum terdaftar') {
		alert('Kode Barang belum terdaftar');
	} else {
		$.post(url, 
			//data
			{
				kode_pembelian: kode_pembelian,
				kode_barang:kode_barang,
				qty_beli:qty_beli,
				harga_beli:harga_beli,
				total:total
			},
			// callback
			function(data, status){
				if (status=='success') {
					//load form simpan kosong
					$('#form-dtlpembelian').load("<?php echo site_url('pembelian/form_simpan_item_beli') ?>");
					// load table 
					$('#table-body-saya').load("<?php echo site_url('pembelian/table_item_beli/') ?>" + kode_pembelian);
					//load total qty
					$('#tot_qty').load("<?php echo site_url('pembelian/total_qty/') ?>" +kode_pembelian);
					//load tot beli
					$('#tot_beli').load("<?php echo site_url('pembelian/total_beli/') ?>" +kode_pembelian);
					//load total beli
					$('#total_beli').load("<?php echo site_url('pembelian/total_beli/') ?>" +kode_pembelian);
				}	
			}
		);	
	}
}

function hapusItemBeli(id_dtlpembelian){
	var konfirmasi = confirm("Yakin Tidak Jadi Beli Barang Ini?");
	if (konfirmasi == true) {
		var url="<?php echo site_url('pembelian/hapus_item_beli/') ?>"+id_dtlpembelian;
		var kode_pembelian = $('#kode_pembelian').val();
		$.get(url, function(data, status){
			if (status=='success') {
				// load table 
				$('#table-body-saya').load("<?php echo site_url('pembelian/table_item_beli/') ?>" + kode_pembelian);
				//load total qty
				$('#tot_qty').load("<?php echo site_url('pembelian/total_qty/') ?>" +kode_pembelian);
				//load tot beli
				$('#tot_beli').load("<?php echo site_url('pembelian/total_beli/') ?>" +kode_pembelian);
				//load total beli
				$('#total_beli').load("<?php echo site_url('pembelian/total_beli/') ?>" +kode_pembelian);
			}
		});
	} else {
		return false;
	}	
}

function simpanOrderBeli(){
	var kode_pembelian = $('#kode_pembelian').val();
	var tanggal_beli = $('#tanggal_beli').val();
	var id_user = $('#id_user').val();
	var id_supplier = $('#id_supplier').val();
	var no_nota = $('#no_nota').val();
	var tot_beli = $('#tot_beli').text();
	if (kode_pembelian==""||tanggal_beli==""||id_user==""||id_supplier==""||tot_beli=="") {
		alert('Anda belum melakukan order sama sekali');
	} else {
		url = "<?php echo site_url('pembelian/simpan_order_beli') ?>" ;
		$.post(url, 
			// data
			{
				kode_pembelian: kode_pembelian,
				tanggal_beli:tanggal_beli,
				id_user:id_user,
				id_supplier:id_supplier,
				no_nota:no_nota
			},
			function(data, status){
				if (status=='success') {
					alert(data);
					window.location.href = "<?php echo site_url('pembelian'); ?>" ;
				}
			}
		);
	}
}

function batalOrderBeli(){
	var kode_pembelian = $('#kode_pembelian').val();
	konfirmasi = confirm('Yakin anda batal order beli ?');
	if (konfirmasi == true) {
		url = "<?php echo site_url('pembelian/batal_order_beli/'); ?>"+kode_pembelian;
		$.get(url, function(data, status){
			if (status=='success') {
				window.location.href = "<?php echo site_url('pembelian') ?>" ;
			}
		});
	} else {
		return false;
	}

}

</script>


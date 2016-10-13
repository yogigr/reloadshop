// date picker
$(function(){
	$('#tanggal_beli').datepicker();
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
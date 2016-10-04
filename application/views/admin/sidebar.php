			<!--Sidebar-->
			<div class="sidebar">
				<div class="menu">
					<div class="menu-header">
						<h4>Master</h4>
					</div>
					<div class="menu-content">
						<ul>
							<li><a href="<?php echo site_url('kategori') ?>">Kategori</a></li>
							<li><a href="">Barang</a></li>
							<li><a href="<?php echo site_url('supplier'); ?>">Supplier</a></li>
							<li><a href="">Users</a></li>
						</ul>
					</div>
				</div>
				<div class="menu">
					<div class="menu-header">
						<h4>Transaksi</h4>
					</div>
					<div class="menu-content">
						<ul>
							<li><a href="">Pembelian</a></li>
							<li><a href="">Penjualan</a></li>
						</ul>
					</div>
				</div>
				<div class="menu">
					<div class="menu-header">
						<h4>Report</h4>
					</div>
					<div class="menu-content">
						<ul>
							<li><a href="">Report Pembelian</a></li>
							<li><a href="">Report Penjualan</a></li>
							<li><a href="">Report Stok Barang</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!--Sidebar-->
			<div class="content">
				<!--Breadcrumb-->
				<div class="breadcrumb">
					<li><a href="Home">Home</a></li> /
					<li><a href="#"><?php echo ucwords($induk); ?></a></li> /
					<li><?php echo ucwords($title); ?></li>
				</div>
				<!--Breadcrumb-->

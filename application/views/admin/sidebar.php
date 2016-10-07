			<!--Sidebar-->
			<div class="sidebar">
				<div class="menu">
					<div class="menu-header">
						<h4>Master</h4>
					</div>
					<div class="menu-content">
						<ul>
							<li><a href="<?php echo site_url('kategori') ?>">Kategori</a></li>
							<li><a href="<?php echo site_url('barang'); ?>">Barang</a></li>
							<li><a href="<?php echo site_url('supplier'); ?>">Supplier</a></li>
							<li><a href="<?php echo site_url('users'); ?>">Users</a></li>
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
				<div class="menu">
					<div class="menu-header">
						<h4>Status</h4>
					</div>
					<div class="menu-content">
						<ul>
							<li>Level: <i class="sukses"><?php echo ucwords($this->session->userdata('level')); ?></i></li>
							<li>Host: <i class="sukses"><?php echo $_SERVER['HTTP_HOST']; ?></i></li>
						</ul>
					</div>		
				</div>
				<div class="menu">
					<div class="menu-header">
						<h4>Identitas</h4>
					</div>
					<div class="menu-content">
						<ul>
							<li>Nama Toko: <i class="sukses">Reloadshop</i></li>
							<li>Owner: <i class="sukses">Chinot Moron</i></li>
							<li>Alamat: <i class="sukses">Rajagaluh</i></li>
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

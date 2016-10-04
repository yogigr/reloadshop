<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<!-- header -->
		<div class="header">
			<a href="#" class="brand-text">Reloadshop</a>
			<div class="nav-right">
				<a href="#"><img src="images/user.png">&nbsp;&nbsp;User</a>
				<a href="#"><img src="images/settings.png">&nbsp;&nbsp;Settings</a>
				<a href="#"><img src="images/logout.png">&nbsp;&nbsp;Logout</a>
			</div>
		</div>
		<!-- / header -->

		<!--Content-->
		<div class="main">
		 	<!--Sidebar-->
			<div class="sidebar">
				<div class="menu">
					<div class="menu-header">
						<h4>Master</h4>
					</div>
					<div class="menu-content">
						<ul>
							<li><a href="">Kategori</a></li>
							<li><a href="">Barang</a></li>
							<li><a href="">Supplier</a></li>
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
					<li><a href="">Master</a></li> /
					<li>Kategori</li>
				</div>
				<!--Breadcrumb-->

				<!--Alert-->
				<div class="alert sukses">
					<p>Berhasil menambahkan akun</p>
				</div>
				<!--Alert-->

				<!--Form input-->
				<div class="form-input">
					<div class="form-input-header">
						<h4>Tambah Kategori</h4>
					</div>
					<div class="form-input-content">
						<form>
							<table>
								<tr>
									<td><label>Nama Kategori</label></td>
								</tr>
								<tr>
									<td>
										<input type="text" name="nama_kategori" class="input-text" placeholder="Nama Kategori">
									</td>
								</tr>
								<tr>
									<td>
										<input type="submit" name="submit" value="Tambah" class="input-btn">
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
				<!--Form input-->

				<!--table-->
				<div class="table">
					<div class="table-header">
						<h4>Table Kategori</h4>
					</div>
					<!--table-content-->
					<div class="table-content">
						<!--Form cari-->
						<form class="form-cari">
							<table>
								<tr>
									<td>
										<label>Cari Data</label>
										&nbsp;
									</td>
									<td>
										<input type="text" name="keyword" class="input-text">
									</td>
								</tr>
							</table>
						</form>
						<!--Form cari-->

						<!--table saya-->
						<table class="table-saya">
							<tr>
								<th>No</th>
								<th>Nama Kategori</th>
								<th>Action</th>
							</tr>
							<tr>
								<td>1</td>
								<td>LCD</td>
								<td style="text-align: center">
									<a href=""><img src="images/edit.png"></a>
									<a href=""><img src="images/hapus.png"></a>
								</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Mainboard</td>
								<td style="text-align: center">
									<a href=""><img src="images/edit.png"></a>
									<a href=""><img src="images/hapus.png"></a>
								</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Ram</td>
								<td style="text-align: center">
									<a href=""><img src="images/edit.png"></a>
									<a href=""><img src="images/hapus.png"></a>
								</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Hardisk</td>
								<td style="text-align: center">
									<a href=""><img src="images/edit.png"></a>
									<a href=""><img src="images/hapus.png"></a>
								</td>
							</tr>
							<tr>
								<td>5</td>
								<td>Processor</td>
								<td style="text-align: center">
									<a href=""><img src="images/edit.png"></a>
									<a href=""><img src="images/hapus.png"></a>
								</td>
							</tr>
						</table>
						<!--table saya-->

						<!--pagination-->
						<ul class="pagination">
							<li>
								<a href="">first</a>
							</li>
							<li>
								<a href=""><< prev</a>
							</li>
							<li>
								<a href="">1</a>
							</li>
							<li>
								<a href="">2</a>
							</li>
							<li>
								<a href="">3</a>
							</li>
							<li>
								<a href="">4</a>
							</li>
							<li>
								<a href="">5</a>
							</li>
							<li>
								<a href="">next >></a>
							</li>
							<li>
								<a href="">last</a>
							</li>
						</ul>
						<!--pagination-->
					</div>
					<!--table-content-->
				</div>
				<!--table-->
			</div>
			<!--Content-->

			<!--sidebar 2-->
			<div class="sidebar2">
				<div class="menu">
					<div class="menu-header">
						<h4>Status</h4>
					</div>
					<div class="menu-content">
						<ul>
							<li>Level: Admin</li>
							<li>IP adress: 192.168.1.100</li>
						</ul>
					</div>		
				</div>
				<div class="menu">
					<div class="menu-header">
						<h4>Identitas</h4>
					</div>
					<div class="menu-content">
						<ul>
							<li>Nama Toko: Reloadshop</li>
							<li>Owner: Chinot Moron</li>
							<li>Alamat: Rajagaluh</li>
						</ul>
					</div>		
				</div>
			</div>
			<!--sidebar 2-->

		</div>
		<!--/Main-->
	</div>
	<!--/container-->
</body>
</html>
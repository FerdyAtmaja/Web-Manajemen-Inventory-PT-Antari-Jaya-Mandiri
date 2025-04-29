<?php 
	// cek level utk tampil menu sesuai dgn hak akses
	// jika hak akses=admin tampilkan menu
if($_SESSION['hak_akses']=='operasional') { ?>
	<!-- sidebar menu -->
		<ul class="sidebar-menu">
			<li class="header">MAIN MENU</li>

	<?php 
		// fungsi utk cek menu aktif
		// jika menu branda dipilih, menu beranda aktif
		if ($_GET["module"]=="beranda") { ?>
			<li class="active">
				<a href="?module=beranda"><i class="fa fa-home"></i>Beranda</a>
			</li>
	<?php 
		}
	// jika tidak, menu home tdk aktif
	else { ?>
		<li>
			<a href="?module=beranda"><i class="fa fa-home"></i>Beranda</a>
		</li>
	<?php 
		}

	// <!-- jika menu data  barang dipilih, maka aktif -->

	if($_GET["module"]=="barang" || $_GET["module"]=="form_barang") { ?>
		<li class="active">
			<a href="?module=barang"><i class="fa fa-folder"></i>Data Produk</a>
		</li>
	<?php 
	}

	// jika tdk, maka menu data barang tdk aktif
	else { ?>
		<li>
			<a href="?module=barang"><i class="fa fa-folder"></i>Data Produk</a>
		</li>


	<?php 
		}

	// <!-- jika menu data  suplier dipilih, maka aktif -->

	if($_GET["module"]=="supplier" || $_GET["module"]=="form_supplier") { ?>
		<li class="active">
			<a href="?module=supplier"><i class="fa fa-folder"></i>Data Supplier</a>
		</li>
	<?php 
	}

	// jika tdk, maka menu data supplier tdk aktif
	else { ?>
		<li>
			<a href="?module=supplier"><i class="fa fa-folder"></i>Data Supplier</a>
		</li>

	<?php 
		}

	// jika menu data barang masuk dipilih, maka menu data barang masuk aktif
	if($_GET["module"]=="barang_masuk" || $_GET["module"]=="form_barang_masuk") {?>
		<li class="active">
			<a href="?module=barang_masuk"><i class="fa fa-cloud-download"></i>Transaksi Produk Masuk</a>
		</li>

	<?php 
		}
	// jika tdk, maka menu data barang masuk tdk aktif
	else { ?>
		<li>
			<a href="?module=barang_masuk"><i class="fa fa-cloud-download"></i>Transaksi Produk Masuk</a>
		</li>

	<?php 
	}
	// jika menu data barang keluar dipilih, maka menu data barang keluar aktif
	if($_GET["module"]=="barang_keluar" || $_GET["module"]=="form_barang_keluar") {?>
		<li class="active">
			<a href="?module=barang_keluar"><i class="fa fa-share-square"></i>Transaksi Produk Keluar</a>
		</li>

	<?php 
		}
	// jika tdk, maka menu data barang keluar tdk aktif
	else { ?>
		<li>
			<a href="?module=barang_keluar"><i class="fa fa-share-square"></i>Transaksi Produk Keluar</a>
		</li>

	<?php 
	}

	// jika menu laporan stok barang dipilih menu lap stok barang aktif
	if($_GET["module"]=="lap_stok"){?>
		<li class="active treeview">
			<a href="javascript:void(0);">
				<i class="fa fa-file-text"></i><span>Laporan</span><i class="fa fa-angle-left pull-right"></i>
			</a>
				<ul class="treeview-menu">
					<li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i>Stok Produk</a>
					</li>
					<li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i>Produk Masuk</a></li>
					<li><a href="?module=lap_barang_keluar"><i class="fa fa-circle-o"></i>Produk Keluar</a></li>
				</ul>
		</li>
	<?php 
	 }


	 // jika menu laporan barang masuk dipilih, menu lap barang masuk aktif
	 elseif($_GET["module"]=="lap_barang_masuk"){?>
	 	<li class="active treeview">
	 		<a href="javascript:void(0);">
	 			<i class="fa fa-file-text"></i><span>Laporan</span><i class="fa fa-angle-left pull-right"></i>
	 		</a>
	 			<ul class="treeview-menu">
	 				<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i>Stok Produk</a></li>
	 				<li class="active"><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i>Produk Masuk</a></li>
	 				<li><a href="?module=lap_barang_keluar"><i class="fa fa-circle-o"></i>Produk Keluar</a></li>
	 			</ul>
	 	</li>
	 <?php 
	 }

	 // jika menu laporan barang keluar dipilih, menu lap barang keluar aktif
	 elseif($_GET["module"]=="lap_barang_keluar"){?>
	 	<li class="active treeview">
	 		<a href="javascript:void(0);">
	 			<i class="fa fa-file-text"></i><span>Laporan</span><i class="fa fa-angle-left pull-right"></i>
	 		</a>
	 			<ul class="treeview-menu">
	 				<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i>Stok Produk</a></li>
	 				<li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i>Produk Masuk</a></li>
	 				<li class="active"><a href="?module=lap_barang_keluar"><i class="fa fa-circle-o"></i>Produk Keluar</a></li>
	 			</ul>
	 	</li>
	 <?php 
	 }
	 // jjika menu laporan tdk dipilih, menu lap tdk aktif
	 else{ ?>
	 	<li class="treeview">
	 		<a href="javascript:void(0);">
	 			<i class="fa fa-file-text"></i> <span>Laporan</span><i class="fa fa-angle-left pull-right"></i>
	 		</a>
	 		<ul class="treeview-menu">
	 			<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i>Stok Produk</a></li>
	 			<li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i>Produk Masuk</a></li>
	 			<li><a href="?module=lap_barang_keluar"><i class="fa fa-circle-o"></i>Produk Keluar</a></li>
	 		</ul>
	 	</li>
	 <?php 
	}
	
}
// jika hak akses = pemilik ,tampilkan menu
elseif($_SESSION['hak_akses']=='administrator') { ?>
	<!--sidebar menu start  -->
		<ul class="sidebar-menu">
			<li class="header">MAIN MENU</li>


			<?php 
				// fungsi utk cek menu aktif
				// jika menu beranda dipilih maka akan aktif
				if($_GET["module"]=="beranda") {?>
					<li class="active"> 
						<a href="?module=beranda"><i class="fa fa-home"></i>Beranda</a>
					</li>
			<?php 
			}
			// jika tdk, menu beranda tdk aktif
			else {?>
				<li>
					<a href="?module=beranda"><i class="fa fa-home"></i>Beranda</a>
				</li>
			<?php 
			}

			// <!-- jika menu data  barang dipilih, maka aktif -->

			if($_GET["module"]=="barang" || $_GET["module"]=="form_barang") { ?>
				<li class="active">
					<a href="?module=barang"><i class="fa fa-folder"></i>Data Produk</a>
				</li>
			<?php 
			}

			// jika tdk, maka menu data barang tdk aktif
			else { ?>
				<li>
					<a href="?module=barang"><i class="fa fa-folder"></i>Data Produk</a>
				</li>


			<?php 
				}

			// <!-- jika menu data  suplier dipilih, maka aktif -->

			if($_GET["module"]=="supplier" || $_GET["module"]=="form_supplier") { ?>
				<li class="active">
					<a href="?module=supplier"><i class="fa fa-folder"></i>Data Supplier</a>
				</li>
			<?php 
			}

			// jika tdk, maka menu data supplier tdk aktif
			else { ?>
				<li>
					<a href="?module=supplier"><i class="fa fa-folder"></i>Data Supplier</a>
				</li>

			<?php 
				}

			// jika menu data barang masuk dipilih, maka menu data barang masuk aktif
			if($_GET["module"]=="barang_masuk" || $_GET["module"]=="form_barang_masuk") {?>
				<li class="active">
					<a href="?module=barang_masuk"><i class="fa fa-cloud-download"></i>Transaksi Produk Masuk</a>
				</li>

			<?php 
				}
			// jika tdk, maka menu data barang masuk tdk aktif
			else { ?>
				<li>
					<a href="?module=barang_masuk"><i class="fa fa-cloud-download"></i>Transaksi Produk Masuk</a>
				</li>

			<?php 
			}
			// jika menu data barang keluar dipilih, maka menu data barang keluar aktif
			if($_GET["module"]=="barang_keluar" || $_GET["module"]=="form_barang_keluar") {?>
				<li class="active">
					<a href="?module=barang_keluar"><i class="fa fa-share-square"></i>Transaksi Produk Keluar</a>
				</li>

			<?php 
				}
			// jika tdk, maka menu data barang keluar tdk aktif
			else { ?>
				<li>
					<a href="?module=barang_keluar"><i class="fa fa-share-square"></i>Transaksi Produk Keluar</a>
				</li>

			<?php 
			}

			// jika menu laporan stok barang dipilih menu lap stok barang aktif
			if($_GET["module"]=="lap_stok"){?>
				<li class="active treeview">
					<a href="javascript:void(0);">
						<i class="fa fa-file-text"></i><span>Laporan</span><i class="fa fa-angle-left pull-right"></i>
					</a>
						<ul class="treeview-menu">
							<li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i>Stok Produk</a>
							</li>
							<li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i>Produk Masuk</a></li>
							<li><a href="?module=lap_barang_keluar"><i class="fa fa-circle-o"></i>Produk Keluar</a></li>
						</ul>
				</li>
			<?php 
			}


			// jika menu laporan barang masuk dipilih, menu lap barang masuk aktif
			elseif($_GET["module"]=="lap_barang_masuk"){?>
				<li class="active treeview">
					<a href="javascript:void(0);">
						<i class="fa fa-file-text"></i><span>Laporan</span><i class="fa fa-angle-left pull-right"></i>
					</a>
						<ul class="treeview-menu">
							<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i>Stok Produk</a></li>
							<li class="active"><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i>Produk Masuk</a></li>
							<li><a href="?module=lap_barang_keluar"><i class="fa fa-circle-o"></i>Produk Keluar</a></li>
						</ul>
				</li>
			<?php 
			}

			// jika menu laporan barang keluar dipilih, menu lap barang keluar aktif
			elseif($_GET["module"]=="lap_barang_keluar"){?>
				<li class="active treeview">
					<a href="javascript:void(0);">
						<i class="fa fa-file-text"></i><span>Laporan</span><i class="fa fa-angle-left pull-right"></i>
					</a>
						<ul class="treeview-menu">
							<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i>Stok Produk</a></li>
							<li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i>Produk Masuk</a></li>
							<li class="active"><a href="?module=lap_barang_keluar"><i class="fa fa-circle-o"></i>Produk Keluar</a></li>
						</ul>
				</li>
			<?php 
			}
			// jjika menu laporan tdk dipilih, menu lap tdk aktif
			else{ ?>
				<li class="treeview">
					<a href="javascript:void(0);">
						<i class="fa fa-file-text"></i> <span>Laporan</span><i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i>Stok Produk</a></li>
						<li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i>Produk Masuk</a></li>
						<li><a href="?module=lap_barang_keluar"><i class="fa fa-circle-o"></i>Produk Keluar</a></li>
					</ul>
				</li>
			<?php 
			}

			// jika menu user dipilih, menu user aktif
			if($_GET["module"]=="user" || $_GET["module"]=="form_user"){?>
				<li class="active">
					<a href="?module=user"><i class="fa fa-user"></i>Manajemen User</a>
				</li>

			<?php 
			}
			// jika tdk, menu user tdk aktf
			else{ ?>
				<li>
					<a href="?module=user"><i class="fa fa-user"></i>Manajemen User</a>
				</li>
			<?php 
			}
			// jika menu ubah password dipilih maka akan aktif
			if($_GET["module"]=="password"){?>
				<li class="active">
					<a href="?module=password"><i class="fa fa-lock"></i>Ubah Password</a>
				</li>
			<?php 
				}
			// jika tdk menu ubah password tdk aktif
			else { ?>
				<li>
					<a href="?module=password"><i class="fa fa-lock"></i>Ubah Password</a>
				</li>
			<?php 
				}
			 ?>
	</ul>
	<!-- sidebarmenu end -->

<?php 
}
?>
<!-- content header -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Laporan Stok Produk

    <!--<a class="btn btn-primary btn-social pull-right" href="modules/lap_stok/cetak.php" target="_blank">
      <i class="fa fa-print"></i> Cetak-->
    </a>
  </h1>

</section>


<!-- main content -->
<section class="content">

<div class="row">
		<div class="col-md-12">
			
			<!-- form laporan -->
			<div class="box box-primary">
				<!-- form start -->
				<form class="form-horizontal" method="GET" target="_blank">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-1 control-label">Tanggal</label>
							<div class="col-sm-2">
								<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_awal" autocomplete="off" required>
							</div>

							<label class="col-sm-1 control-label">s.d.</label>
							<div class="col-sm-2">
								<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_akhir" autocomplete="off" required>
							</div>
						</div>
					</div>

					<div class="box-footer">
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary btn-social" formaction="modules/lap_stok/cetakPDF.php">
									<i class="fa fa-file-pdf"></i> Cetak PDF
								</button>

								<button type="submit" class="btn btn-success btn-social" formaction="modules/lap_stok/exportExcel.php">
									<i class="fa fa-file-excel"></i> Cetak Excel
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-body">
					<!-- tampilan tabel pakaian -->
					<table id="dataTables1" class="table table-bordered table-striped table-hover">
						<!-- tampilan tabel header -->
						<thead>
							<tr>
								<th class="center">No.</th>
								<th class="center">Kode Barang</th>
								<th class="center">Nama Barang</th>					
								<th class="center">Harga Beli</th>
								<th class="center">Harga Jual</th>
								<th class="center">Stok</th>
								
							</tr>
						</thead>
						<!-- tampilan tabel body -->
						<tbody>
							<?php 
							$no=1;
							// query utk tampilkan data dr tabel pakaian
							$query = mysqli_query($mysqli, "SELECT kd_barang,nama_barang,harga_beli,harga_jual,stok FROM tb_barang ORDER BY nama_barang ASC") or die('Ada kesalahan pada query tampil data barang: '.mysqli_error($mysqli));

							// tampilkan data
							while($data = mysqli_fetch_assoc($query)){
					              $harga_beli = format_rupiah($data['harga_beli']);
					              $harga_jual = format_rupiah($data['harga_jual']);
					              // menampilkan isi tabel dari database ke tabel di aplikasi
					              echo "<tr>
					              			<td width='30' class='center'>$no</td>
					              			<td width='80' class='center'>$data[kd_barang]</td>
					              			<td width='100' class='center'>$data[nama_barang]</td>

					              			<td width='100' align='right'>Rp. $harga_beli</td>
					              			<td width='100' align='right'>Rp. $harga_jual</td>
					              			<td width='80' align='right'>$data[stok]</td>
					              			
					              		</tr>";
					              	$no++;
					              }
 							 ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- content header -->
<section class="content-header">
	<h1>
		<i class="fa fa-file-text-o icon-title"></i>Laporan Data Barang Masuk
	</h1>
	<ol class="breadcrumb">
		<li><a href="?module=beranda"><i class="fa fa-home"></i>Beranda</a></li>
		<li class="active">Laporan</li>
		<li class="active">Data Barang Masuk</li>
	</ol>
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
								<button type="submit" class="btn btn-primary btn-social" formaction="modules/lap_barang_masuk/cetakPDF.php">
									<i class="fa fa-file-pdf"></i> Cetak PDF
								</button>

								<button type="submit" class="btn btn-success btn-social" formaction="modules/lap_barang_masuk/exportExcel.php">
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
			<?php 
				// fungsi utk tampil pesan
				// jika alert = "" (kosong)
				// tampilkan pesan "" (kosong
				if(empty($_GET['alert'])){
					echo "";
				}
				// jika alert=1
				// tampilkan pesan sukses "data batik masuk berhasil disimpan"
				elseif($_GET['alert']==1){
					echo "<div class='alert alert-success alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert aria-hidden='true'>&times;</button>
							<h4><i class='icon fa fa-check-circle'></i>Sukses!</h4>Data Produk Masuk berhasil disimpan
						</div>";
				}
			 ?>

			 

			 <div class="box box-primary">
			 	<div class="box-body">
			 		<!-- tampilan tabel -->
			 		<table id="dataTables1" class="table table-bordered table-striped table-hover text-center">
			 			<!-- tampilan tabel header -->
			 			<thead>
			 				<tr>
			 					<th class="center">No.</th>
			 					<th class="center">Kode Transaksi</th>
			 					<th class="center">Tanggal</th>
			 					<th class="center">Total</th>
			 					<!--<th class="center">Aksi</th>-->
			 				</tr>
			 			</thead>

			 			<tbody>
			 				<?php 
			 					$no =1;
			 					// query utk tampilkan data dr tabel pakaian
			 					$query = mysqli_query($mysqli, "SELECT kd_transaksi, tanggal_masuk, sub_total FROM tb_barang_masuk ORDER BY kd_transaksi DESC") or die('Ada kesalahan pada query tampil data Barang masuk: '.mysqli_error($mysqli));

			 					// tampilkan data
			 					while ($data = mysqli_fetch_assoc($query)) {
			 						$tanggal = $data['tanggal_masuk'];
			 						$exp = explode('-',$tanggal);
			 						$tanggal_masuk = $exp[2]."-".$exp[1]."-".$exp[0];
			 					?>
			 					<!-- // tampilkan isi tabel dr database ke tbl di app -->
								<tr>
									<td width='30' class='center'><?php echo $no ?></td>
									<td width='100' class='center'><?php echo $data['kd_transaksi'] ?></td>
									<td width='80' class='center'><?php echo $tanggal_masuk ?></td>
									<td width='100' class='right'>Rp. <?php echo number_format($data['sub_total'], 0,',','.') ?></td>
									
									<!--<td class='center' width='80'>-->
										<!--<div>
											<button type='button' class='btn btn-info detail_masuk' data-toggle='modal' data-target='#myModal' id='<?php echo $data['kd_transaksi'] ?>'>Detail</button>
										</div>-->
									</td>
								</tr>
								<?php $no++; } ?>
			 			</tbody>
			 		</table>
					 

					<!-- Start Modal -->
					<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Detail Transaksi</h4>
								</div>
							<div class="modal-body">
								<!-- <p>Bagian body modal</p> -->
								<table id="dataTables1" class="table table-bordered table-striped table-hover text-center">
									<thead>
										<tr>
											<!-- <th class="center">No.</th> -->
											<th class="center">Nama Barang</th>
											<th class="center">Kategori</th>
											<th class="center">Jumlah</th>
											<th class="center">Harga</th>
										</tr>
									</thead>
									<tbody id="table-detail-masuk">
									
									</tbody>
								</table>
							</div>
							<div class="fetched-data"></div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
							</div>	
						</div>
					</div>

			 	</div>
			 </div>
		</div>
	</div>
</section>

	
<script>

	$(document).ready(function(){
		 $('.detail_masuk').each(function(i, v){
			$('.detail_masuk').eq(i).click(function() {
				// reset modal
				$('#table-detail-masuk tr').detach();
				
				const kode = $(this).attr("id");

				$.ajax({
					url: 'modules/barang_masuk/proses.php',
					type: 'post',
					dataType: 'json',
					data: {detail: kode},
					success: function(data) {
						$.each(data, function(index, value){
							$('#table-detail-masuk').append('<tr><td>'+value.nama_barang+'</td><td>'+value.kategori+'</td><td>'+value.jumlah_masuk+'</td><td>'+value.harga+'</td></tr>');
						})
					}
				});

			});
		 })

	});


</script>
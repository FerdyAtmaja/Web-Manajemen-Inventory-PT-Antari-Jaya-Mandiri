<?php 

session_start();
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Login Aplikasi Manajemen Stok Antari Jaya</title>
 	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 	<meta name="description" content="Aplikasi Manajemen Stok Antari Jaya">


 	<link rel="shortcut-icon" href="assets/img/logo4.png" />
    <!-- Theme style -->
    <link href="assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
 	  <!-- Bootstrap 3.3.2 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" type="text/css" />  
    <!-- DATA TABLES -->
    <!-- <link href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" /> -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!-- Datepicker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Chosen Select -->
    <link href="https://cdn.jsdelivr.net/npm/chosen-js@1.8.7/chosen.min.css" rel="stylesheet">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.18/css/skins/skin-blue.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
 

    
    <script type="text/javascript" src="assets/js/jquery-3.4.1.js"></script>
 	<!-- Fungsi untuk membatasi karakter yang diinputkan -->
    <script language="javascript">
      function getkey(e)
      {
        if (window.event)
          return window.event.keyCode;
        else if (e)
          return e.which;
        else
          return null;
      }

      function goodchars(e, goods, field)
      {
        var key, keychar;
        key = getkey(e);
        if (key == null) return true;
       
        keychar = String.fromCharCode(key);
        keychar = keychar.toLowerCase();
        goods = goods.toLowerCase();
       
        // check goodkeys
        if (goods.indexOf(keychar) != -1)
            return true;
        // control keys
        if ( key==null || key==0 || key==8 || key==9 || key==27 )
          return true;
          
        if (key == 13) {
          var i;
          for (i = 0; i < field.form.elements.length; i++)
            if (field == field.form.elements[i])
              break;
          i = (i + 1) % field.form.elements.length;
          field.form.elements[i].focus();
          return false;
        };
        // else return false
        return false;
      }
    </script>
  </head>
 <body class="skin-blue fixed">
 	<div class="wrapper">
 		<header class="main-header">
 			<!-- logo -->
 			<a href="?module=beranda" class="logo">
       <img style="margin-top:-1px;margin-right:5px" src="assets/img/ajm.png" width="48" alt="Logo">
 				<span style="font-size: 12px; font-weight:bold;">ANTARI JAYA MANDIRI</span>
 			</a>
 			<!-- header navbar -->
 			<nav class="navbar navbar-static-top" role="navigation">
 				<!-- sidebar button -->
 				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
 					<span class="sr-only">Toggle Navigation</span>
 				</a>
 				<div class="navbar-custom-menu">
 					<ul class="nav navbar-nav">
 						<!-- panggil file top_menu.php utk tampilkan menu -->
 						<?php include "top_menu.php" ?>
 					</ul>
 				</div>
 			</nav>
 		</header>
 		<aside class="main-sidebar">
 			<section class="sidebar">
 				<!-- panggil file sidebar_menu.phputk tsmpilkan menu -->
 				<?php include "sidebar_menu.php" ?>
 			</section>
 		</aside>

 		<!-- content wrapper  -->
 		<div class="content-wrapper">
 			<!-- panggil filr content_menu.php utk tampilkan konten -->
 			<?php include "content.php" ?>

 			<!-- Logout -->
 			<div class="modal fade" id="logout">
 				<div class="modal-dialog">
 					<div class="modal-content">
 						<div class="modal-header">
 							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
 							</button>
 							<h4 class="modal-title"><i class="fa fa-sign-out">Logout</i></h4>
 						</div>
 						<div class="modal-body">
 							<p>Apakah Anda yakin ingin logout ?</p>
 						</div>
 						<div class="modal-footer">
 							<a type="button" class="btn btn-danger" href="logout.php">Ya, Logout</a>
 							<button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
 						</div>
 					</div>
 				</div>
 			</div>

 		</div>

 		<footer class="main-footer">
 			<strong>Copyright &copy;PT. Antari Jaya Mandiri 2023</strong>
 		</footer>
 	</div>

    <!-- jQuery 3.7.0 -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <!-- chosen select -->
    <script src="https://cdn.jsdelivr.net/npm/chosen-js@1.8.7/chosen.jquery.min.js"></script>
    <!-- DATA TABES SCRIPT -->
    <!-- <script src="assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script> -->
    <!-- Datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fastclick/0.6.0/fastclick.min.js'></script>
    <!-- maskMoney -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/js/app.min.js" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        // datepicker plugin
        $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        });

        // chosen select
        $('.chosen-select').chosen({allow_single_deselect:true}); 
        //resize the chosen on window resize
        
        // mask money
        $('#harga_beli').maskMoney({thousands:'.', decimal:',', precision:0});
        $('#harga_jual').maskMoney({thousands:'.', decimal:',', precision:0});
        $('#harga').maskMoney({thousands:'.', decimal:',', precision:0});

        $(window)
        .off('resize.chosen')
        .on('resize.chosen', function() {
          $('.chosen-select').each(function() {
             var $this = $(this);
             $this.next().css({'width': $this.parent().width()});
          })
        }).trigger('resize.chosen');
        //resize chosen on sidebar collapse/expand
        $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
          if(event_name != 'sidebar_collapsed') return;
          $('.chosen-select').each(function() {
             var $this = $(this);
             $this.next().css({'width': $this.parent().width()});
          })
        });
    
    
        $('#chosen-multiple-style .btn').on('click', function(e){
          var target = $(this).find('input[type=radio]');
          var which = parseInt(target.val());
          if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
           else $('#form-field-select-4').removeClass('tag-input-style');
        });

        // DataTables
        $("#dataTables1").dataTable();
        $('#dataTables2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });

       
      });
    </script>

  </body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>System Rekomendasi Pembelian Mobil</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('asset/css/bootstrap.min.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/style.css')?>">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
    <!--navbar  -->

      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
         <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           <a href="<?php echo site_url('Welcome')  ?>" class="navbar-brand">ReMob</a>
         </div>
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           <ul class="nav navbar-nav navbar-right">
           <li><a href="<?php echo site_url('Mobnew')  ?>">Input Mobil</a></li>
           <li><a href="<?php echo site_url('Mobview')  ?>">View Daftar Mobil</a></li>
           <li><a href="<?php echo site_url('Mobrec')  ?>">Rekomendasi Mobil</a></li>
           </ul>
         </div>
        </div>
      </nav>
    <!-- end of navbar -->
 
<!-- jumbotron -->
    <div class="jumbotron text-center">
      <img src="<?php echo base_url('asset/img/mobil1.jpg')?>" class="img-circle">
      <h2>Silahkan Memberikan Bobot dari 0-100 Kondisi yang Diinginkan</h2>
      <h3>Jika Kondisi Sangat Diinginkan Maka Berikan Bobot yang Besar </h3>
      <hr>
    </div>
<!-- akhir jumbotron -->
<!-- View Rekomen -->
	<section class="tampilmob">
		<div class="container">
		  <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Ranking</th>
              <th scope="col">Keterangan</th>
              
            </tr>
          </thead>
          <?php $no=1;
          foreach($mobil as $u){ 
          ?>
              <tr>
               <td> <?php echo $no ?></td>
            <td><h3> <?php echo "Merk: ".$u->merk ?>
              <p></p>
            <?php echo "Tahun Produksi: ".$u->tahunpro_mobil?>
            <p></p>
            <?php echo "Tipe Mobil: ".$u->tipe_mobil ?>
            <p></p>
            <?php echo "Tingkat Kecepatan: ".$u->kecepatan ?>
            <p></p>
            <?php echo "Panjang/Ukuran: ".$u->panjang ?>
            <p></p>
            <?php echo "Harga : ".$u->harga_mobil ?></td>
            <p></p></h3></td>
        </tr>
          <?php } ?>
        </table>
		</div>
	</section>
<!-- End of View Rekomen -->


  <!-- footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <p><i class="glyphicon glyphicon-copyright-mark"></i> copyright 2017 | build by Arya</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- end footer -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('asset/js/jquery-3.2.1.min.js')?>"></script>
    <script src="<?php echo base_url('asset/js/bootstrap.min.js')?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
  </body>
</html>
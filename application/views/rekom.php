<!-- jumbotron -->
    <div class="jumbotron text-center">
      <img src="asset/img/mobil1.jpg" class="img-circle">
      <h2>Silahkan Memberikan Bobot</h2>
      <hr>
    </div>
<!-- akhir jumbotron -->
<!-- Inputan Bobot -->
<section class="bobot" id="bobotmob">
	<div class="container">
		<div class="row">
		<div class="col-sm-12">
			<form style="font-size: 20px" action="<?php echo base_url(). 'Mobtamrec/topsisu'; ?>" method="post">
				<div class="form-group">
					<label for="bobot_tahun">Bobot Tahun Produksi</label>
				      <select class="form-control" id="bobot_tahun" name="bobot_tahun" value="<?php echo set_value('bobot_tahun'); ?>" >
				        <option selected>Pilih...</option>
				        <option value="5">Sangat Penting</option>
				        <option value="4">Penting</option>
				        <option value="3">Cukup</option>
				        <option value="2">Tidak Penting</option>
				        <option value="1">Sangat Tidak Penting</option>
				      </select>
				</div>
				<div class="form-group">
					<label for="bobot_kec">Bobot Kecepatan</label>
				      <select class="form-control" id="bobot_kec" name="bobot_kec" value="<?php echo set_value('bobot_kec'); ?>" >
				        <option selected>Pilih...</option>
				        <option value="5">Sangat Penting</option>
				        <option value="4">Penting</option>
				        <option value="3">Cukup</option>
				        <option value="2">Tidak Penting</option>
				        <option value="1">Sangat Tidak Penting</option>
				      </select>
				</div>
				<div class="form-group">
					<label for="bobot_ukuran">Bobot Ukuran</label>
				      <select class="form-control" id="bobot_ukuran" name="bobot_ukuran" value="<?php echo set_value('bobot_ukuran'); ?>" >
				        <option selected>Pilih...</option>
				        <option value="5">Sangat Penting</option>
				        <option value="4">Penting</option>
				        <option value="3">Cukup</option>
				        <option value="2">Tidak Penting</option>
				        <option value="1">Sangat Tidak Penting</option>
				      </select>
				</div>
				<div class="form-group">
					<label for="bobot_harga">Bobot Harga</label>
				      <select class="form-control" id="bobot_harga" name="bobot_harga" value="<?php echo set_value('bobot_harga'); ?>" >
				        <option selected>Pilih...</option>
				        <option value="5">Sangat Penting</option>
				        <option value="4">Penting</option>
				        <option value="3">Cukup</option>
				        <option value="2">Tidak Penting</option>
				        <option value="1">Sangat Tidak Penting</option>
				      </select>
				</div>
				<div><input type="submit" value="Submit" class="btn btn-success" /></div>
			</form><?php echo form_close(); ?>
			</div>
		</div>
	</div>
</section>
<!-- akhir inputan -->
<!-- View Rekomen -->
	<section class="tampilmob">
		<div class="container">
		  <div class="row">
          <div class="col-sm-5">
            <h2>Gambar</h2>
          </div>
          <div class="col-sm-5">
            <h2>Kondisi</h2>
          </div>
          <div class="col-sm-2">
            <h2>Link</h2>
          </div>
        </div>
		</div>
	</section>
<!-- End of View Rekomen -->
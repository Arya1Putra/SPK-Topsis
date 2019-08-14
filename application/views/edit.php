<!-- jumbotron -->
    <div class="jumbotron text-center">
      <img src="<?php echo base_url('asset/img/mobil1.jpg')?>" class="img-circle">
      <h2>Silahkan Memasukkan Data yang Ingin di Edit</h2>
      <hr>
    </div>
<!-- akhir jumbotron -->

<!-- Inputan -->
<section class="inputan" id="inputan">
	<div class="container">
		<div class="row">
		<div class="col-sm-12">
			<form style="font-size: 20px"  action="<?php echo base_url(). 'Mobview/edit_data/'.$id; ?>" method="post" >
				<div class="form-group">
					<?php  	echo "id: ".$id?>
					<p></p>
					<label for="merk">Merk</label>
				      <select class="form-control" id="merk" name="merk" value="<?php echo set_value('merk'); ?>" >
				        <option selected>Pilih...</option>
				        <option value="1">Honda</option>
				        <option value="2">Daihatsu</option>
				        <option value="3">Toyota</option>
				        <option value="4">Suzuki</option>
				        <option value="5">KIA</option>
				        <option value="6">Lainnya</option>
				      </select>
				</div>
				<div class="form-group"><label for="tipe">Tipe Mobil</label>
					<input type="text" id="tipe" name="tipe" class="form-control" placeholder="Masukkan Tipe Mobil" value="<?php echo set_value('tipe'); ?>">
				</div>
				<div class="form-group"><label for="tahun">Tahun Produksi</label>
					<input type="text" id="tahun" name="tahun" class="form-control" placeholder="Masukkan Tahun Produksi Mobil" value="<?php echo set_value('tahun'); ?>">
				</div>
				
				<div class="form-group"><label for="kec">Tingkat Kecepatan</label>
					<input type="text" id="kec" name="kec" class="form-control" placeholder="Masukkan Tingkat Kecepatan" value="<?php echo set_value('kec'); ?>">
				</div>
				<div class="form-group"><label for="ukuran">Panjang/Ukuran</label>
					<input type="text" id="ukuran" name="ukuran" class="form-control" placeholder="Masukkan ukuran" value="<?php echo set_value('ukuran'); ?>">
				</div>
				<div class="form-group"><label for="harga">Harga</label>
					<input type="text" id="harga" name="harga" class="form-control" placeholder="Masukkan Harga Mobil (Baru)" value="<?php echo set_value('harga'); ?>">
				</div>
				  <div class="form-group">
					<label for="bobot_tahun">Bobot Tahun Produksi</label>
				      <select class="form-control" id="bobot_tahun" name="bobot_tahun" value="<?php echo set_value('bobot_tahun'); ?>" >
				        <option selected>Pilih...</option>
				        <option value="5">Sangat Bagus</option>
				        <option value="4">Bagus</option>
				        <option value="3">Cukup</option>
				        <option value="2">Kurang</option>
				        <option value="1">Sangat Kurang</option>
				      </select>
				</div>
				<div class="form-group">
					<label for="bobot_kec">Bobot Kecepatan</label>
				      <select class="form-control" id="bobot_kec" name="bobot_kec" value="<?php echo set_value('bobot_kec'); ?>" >
				        <option selected>Pilih...</option>
				        <option value="5">Sangat Bagus</option>
				        <option value="4">Bagus</option>
				        <option value="3">Cukup</option>
				        <option value="2">Kurang</option>
				        <option value="1">Sangat Kurang</option>
				      </select>
				</div>
				<div class="form-group">
					<label for="bobot_ukuran">Bobot Ukuran</label>
				      <select class="form-control" id="bobot_ukuran" name="bobot_ukuran" value="<?php echo set_value('bobot_ukuran'); ?>" >
				        <option selected>Pilih...</option>
				        <option value="5">Sangat Besar</option>
				        <option value="4">Besar</option>
				        <option value="3">Cukup</option>
				        <option value="2">Kecil</option>
				        <option value="1">Sangat Kecil</option>
				      </select>
				</div>
				<div class="form-group">
					<label for="bobot_harga">Bobot Harga</label>
				      <select class="form-control" id="bobot_harga" name="bobot_harga" value="<?php echo set_value('bobot_harga'); ?>" >
				        <option selected>Pilih...</option>
				        <option value="5">Sangat Murah</option>
				        <option value="4">Murah</option>
				        <option value="3">Cukup</option>
				        <option value="2">Mahal</option>
				        <option value="1">Sangat Mahal</option>
				      </select>
				</div>
			  	<div><input type="submit" value="Submit" class="btn btn-success" /></div>
			</form><?php echo form_close(); ?>
			</div>
		</div>
	
	</div>
</section>
<!-- akhir inputan -->
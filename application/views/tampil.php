<!-- jumbotron -->
    <div class="jumbotron text-center">
      <img src="asset/img/mobil1.jpg" class="img-circle">
      <h2>Daftar Mobil</h2>
      <hr>
    </div>
    <!-- akhir jumbotron -->

    <!-- view -->
    <section class="list" id="list">
      <div class="container" id="viewbro">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Edit/Hapus</th>
            </tr>
          </thead>
          <?php 
          $no = 1;
          foreach($mobil as $u){ 
          ?>
              <tr>
               <td> <?php echo $no++ ?></td>
           
            <td><?php echo "Merk: ".$u->merk ?>
              <p></p>
            <?php echo "Tahun Produksi: ".$u->tahunpro_mobil?>
            <p></p>
            <?php echo "Tipe Mobil: ".$u->tipe_mobil ?>
            <p></p>
            <?php echo "Tingkat Kecepatan: ".$u->kecepatan ?>
            <p></p>
            <?php echo "Panjang/Ukuran: ".$u->panjang ?>
            <p></p>
            <?php echo "Harga : ".$u->harga_mobil ?>
            <p></p></td>
                 <td><?php echo anchor('Mobview/edit/'.$u->id,'Edit'); ?>
                  <?php echo anchor('Mobview/hapus/'.$u->id,'Hapus'); ?></td>
        </tr>
          <?php } ?>
        </table>
          
        </div>
        </div>
    </section>
    <!-- end of view -->
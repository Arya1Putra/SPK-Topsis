<?php

class M_data extends CI_Model{
	
	function tampil_data(){
		$ngambil = $this->db->query('
		SELECT mobil.id_mobil as id, merk.merk_nama as merk, mobil.tahunpro_mobil as tahunpro_mobil, mobil.tipe_mobil as tipe_mobil, mobil.kecepatan as kecepatan, mobil.panjang as panjang, mobil.harga_mobil as harga_mobil FROM mobil, merk WHERE mobil.merk_id=merk.merk_id');
		return $ngambil;
	}

  
 // Fungsi untuk menyimpan data ke database
  public function save($data){
    $this->db->insert('mobil', $data);
 }
 public function selekbobot(){
 	 $sql = $this->db->query('SELECT id_mobil FROM `mobil` LIMIT 0,1');
 	 return $sql;

 }
   public function simpanbobot($data){
   	$this->db->insert('bobot', $data);
   }
   public function hapus_data($id){
		$this->db->query('DELETE FROM mobil WHERE mobil.id_mobil='.$id.'');
	}
   public function edit_data($id,$data){
   	$this->db->where('mobil.id_mobil', $id);
   	$this->db->UPDATE('mobil', $data);
   }
   public function edit_bobot($id,$kriteria,$bobot_nilai){
   	$this->db->set('bobot_nilai', $bobot_nilai);
   	$this->db->where('bobot.id_mobil',$id);
   	$this->db->where('bobot.kriteria_id', $kriteria);
   	$this->db->UPDATE('bobot');
   }
   public function topsis1($bobot_tahun,$bobot_kecepatan,$bobot_ukuran,$bobot_harga){
   	$bobotbro=array($bobot_tahun,$bobot_kecepatan,$bobot_ukuran,$bobot_harga);
   	return $bobotbro;
   }
   public function akartahun($ambiltahun){
   		$hasil=0;$i=0;
		foreach ($ambiltahun as $m) {
				$hasil=$hasil+($ambiltahun[$i]['tahunpro_mobil']*$ambiltahun[$i]['tahunpro_mobil']);
				$i++;	
		}

		$akar=sqrt($hasil);
		return $akar;
   }
   public function akarkecepatan($ambilkecepatan){
        $hasil=0;$i=0;
		foreach ($ambilkecepatan as $m) {
			$hasil=$hasil+($ambilkecepatan[$i]['kecepatan']*$ambilkecepatan[$i]['kecepatan']);
			$i++;
		}
		$akar=sqrt($hasil);
		return $akar;
   }
   public function akarpanjang($ambilpanjang){
   		$hasil=0;$i=0;
		foreach ($ambilpanjang as $m) {
			$hasil=$hasil+($ambilpanjang[$i]['panjang']*$ambilpanjang[$i]['panjang']);
			$i++;
		}
		$akar=sqrt($hasil);
		return $akar;
   }
   public function akarharga($ambilharga){
   		$hasil=0;$i=0;
		foreach ($ambilharga as $m) {
			$hasil=$hasil+($ambilharga[$i]['harga_mobil']*$ambilharga[$i]['harga_mobil']);
			$i++;
		}
		$akar=sqrt($hasil);
		return $akar;
   }
   public function hitungmobil($itungmobil){
   		$id=array();$i=0;
		foreach ($itungmobil as $am) {
			array_push($id,$itungmobil[$i]['id_mobil']);
			$i++;
		}
		return $id;
   }
   public function cari_y($jumlahkategori,$bobotbro,$akar_tahun,$akar_kec,$akar_panjang,$akar_harga){
   	$i=0;$j=0;
	$y=array(array());
   	foreach ($jumlahkategori as $jk) {
					$kat_tahun=$jumlahkategori[$i]['tahunpro_mobil'];
					$kat_kec=$jumlahkategori[$i]['kecepatan'];
					$kat_panjang=$jumlahkategori[$i]['panjang'];
					$kat_harga=$jumlahkategori[$i]['harga_mobil'];
					$y[$i][$j]=$kat_tahun/$akar_tahun*$bobotbro[0];
					$j++;
					$y[$i][$j]=$kat_kec/$akar_kec*$bobotbro[1];
					$j++;
					$y[$i][$j]=$kat_panjang/$akar_panjang*$bobotbro[2];
					$j++;
					$y[$i][$j]=$kat_harga/$akar_harga*$bobotbro[3];
					$j=0;
					$i++;
		}
		return $y;
   }
   public function y_max($jum_kat){
   		$y=$jum_kat;
   		$ymax=array();
				$ymaxi=max($y[0][0],$y[1][0],$y[2][0]);
				array_push($ymax, $ymaxi);
				$ymaxi=max($y[0][1],$y[1][1],$y[2][1]);
				array_push($ymax, $ymaxi);
				$ymaxi=max($y[0][2],$y[1][2],$y[2][2]);
				array_push($ymax, $ymaxi);
				$ymaxi=min($y[0][3],$y[1][3],$y[2][3]);
				array_push($ymax, $ymaxi);
				return $ymax;
   }
   public function y_min($jum_kat){
   		$y=$jum_kat;
   		$ymin=array();
				$ymini=min($y[0][0],$y[1][0],$y[2][0]);
				array_push($ymin, $ymini);
				$ymini=min($y[0][1],$y[1][1],$y[2][1]);
				array_push($ymin, $ymini);
				$ymini=min($y[0][2],$y[1][2],$y[2][2]);
				array_push($ymin, $ymini);
				$ymini=max($y[0][3],$y[1][3],$y[2][3]);
				array_push($ymin, $ymini);
				return $ymin;
   }
   public function ranking($jum_kat,$ymax,$ymin){
   		$y=$jum_kat;
   		$d1=sqrt(($y[0][0]-$ymax[0])*($y[0][0]-$ymax[0])+(($y[0][1]-$ymax[1])*($y[0][1]-$ymax[1])+(($y[0][2]-$ymax[2]))+(($y[0][3]-$ymax[3])*($y[0][3]-$ymax[3]))));
		$d2=sqrt(($y[1][0]-$ymax[0])*($y[1][0]-$ymax[0])+(($y[1][1]-$ymax[1])*($y[1][1]-$ymax[1])+(($y[1][2]-$ymax[2]))+(($y[1][3]-$ymax[3])*($y[1][3]-$ymax[3]))));
		$d3=sqrt(($y[2][0]-$ymax[0])*($y[2][0]-$ymax[0])+(($y[2][1]-$ymax[1])*($y[2][1]-$ymax[1])+(($y[2][2]-$ymax[2]))+(($y[2][3]-$ymax[3])*($y[2][3]-$ymax[3]))));

		$d1m=sqrt(($y[0][0]-$ymin[0])*($y[0][0]-$ymin[0])+(($y[0][1]-$ymin[1])*($y[0][1]-$ymin[1])+(($y[0][2]-$ymin[2]))+(($y[0][3]-$ymin[3])*($y[0][3]-$ymin[3]))));
		$d2m=sqrt(($y[1][0]-$ymin[0])*($y[1][0]-$ymin[0])+(($y[1][1]-$ymin[1])*($y[1][1]-$ymin[1])+(($y[1][2]-$ymin[2]))+(($y[1][3]-$ymin[3])*($y[1][3]-$ymin[3]))));
		$d3m=sqrt(($y[2][0]-$ymin[0])*($y[2][0]-$ymin[0])+(($y[2][1]-$ymin[1])*($y[2][1]-$ymin[1])+(($y[2][2]-$ymin[2]))+(($y[2][3]-$ymin[3])*($y[2][3]-$ymin[3]))));
		

		$v1 = $d1m / ($d1 + $d1m);
		$v2 = $d2m / ($d2 + $d2m);
		$v3 = $d3m / ($d3 + $d3m);
		$hasil=array($v1,$v2,$v3);
		return $hasil;

   }
   public function ngambil_datatahun(){
   	return $this->db->query('SELECT mobil.tahunpro_mobil FROM mobil');
   }
   public function ngambil_datakecepatan(){
   	return $this->db->query('SELECT mobil.kecepatan FROM mobil');
   }
   public function ngambil_datapanjang(){
   	return $this->db->query('SELECT mobil.panjang FROM mobil');
   }
   public function ngambil_dataharga(){
   	return $this->db->query('SELECT mobil.harga_mobil FROM mobil');
   }
   public function jumlahmobil(){
   	return $this->db->query('SELECT id_mobil,tahunpro_mobil,harga_mobil,kecepatan,panjang FROM mobil');
   }
   public function kat_jum(){
   	return $this->db->query('SELECT tahunpro_mobil,harga_mobil,kecepatan,panjang FROM mobil');
   }
   public function ranking1($idb){
   	return $this->db->query('SELECT mobil.id_mobil as id, merk.merk_nama as merk, mobil.tahunpro_mobil as tahunpro_mobil, mobil.tipe_mobil as tipe_mobil, mobil.kecepatan as kecepatan, mobil.panjang as panjang, mobil.harga_mobil as harga_mobil FROM mobil, merk WHERE mobil.merk_id=merk.merk_id AND id_mobil='.$idb.'');
   }
}

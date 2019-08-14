<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobtamrec extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_data');
		$this->load->helper('url');
 
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	// public function ()
	// {
		
		
	// }
	// public function jumlahtahun($ambiltahun){
	// 	$hasil=0;
	// 	foreach ($mobil as $m) {
	// 		$tahun=$m->tahunpro_mobil;
	// 		$hasil=$hasil+( $tahun* $tahun);
	// 	}
	// 	$akar=sqrt($hasil);
	// 	return $akar;
	// }
	// public function jumlahkec($ambilkecepatan){
	// 	$hasil=0;
	// 	foreach ($mobil as $m) {
	// 		$kec=$m->kecepatan;
	// 		$hasil=$hasil+( $kec* $kec);
	// 	}
	// 	$akar=sqrt($hasil);
	// 	return $akar;
	// }
	// public function jumlahpanjang($ambilpanjang){
	// 	$hasil=0;
	// 	foreach ($mobil as $m) {
	// 		$panjang=$m->panjang;
	// 		$hasil=$hasil+( $panjang* $panjang);
	// 	}
	// 	$akar=sqrt($hasil);
	// 	return $akar;
	// }
	// public function jumlahharga($ambilharga){
	// 	$hasil=0;
	// 	foreach ($mobil as $m) {
	// 		$harga=$m->harga_mobil;
	// 		$hasil=$hasil+( $harga* $harga);
	// 	}
	// 	$akar=sqrt($hasil);
	// 	return $akar;
	// }
	

		//cari akar 
	public function topsisu(){

		$bobot_tahun = $this->input->post('bobot_tahun');
		$bobot_kecepatan = $this->input->post('bobot_kec');
		$bobot_ukuran = $this->input->post('bobot_ukuran');
		$bobot_harga = $this->input->post('bobot_harga');
		$bobotbro=$this->M_data->topsis1($bobot_tahun,$bobot_kecepatan,$bobot_ukuran,$bobot_harga);

		$ambiltahun = $this->M_data->ngambil_datatahun()->result_array();
		$akar_tahun=$this->M_data->akartahun($ambiltahun);//akar tahun
		//
		$ambilkecepatan= $this->M_data->ngambil_datakecepatan()->result_array();
		$akar_kec=$this->M_data->akarkecepatan($ambilkecepatan);//akar kecepatan
		//
		$ambilpanjang= $this->M_data->ngambil_datapanjang()->result_array();
		$akar_panjang=$this->M_data->akarpanjang($ambilpanjang);//akar panjang
		//
		$ambilharga = $this->M_data->ngambil_dataharga()->result_array();
		$akar_harga=$this->M_data->akarharga($ambilharga);

		//cari y
		$ambilmobil=$this->M_data->jumlahmobil()->result_array();
		$itungmobil=$this->M_data->hitungmobil($ambilmobil);
		// $jmly=$n*4;
		// $i=0;$j=0;
		// $y=array();
		// $id=array();
		// foreach ($ambilmobil as $am) {
		// 	array_push($id, .$am->id_mobil);
		// }	
		$jumlahkategori=$this->M_data->kat_jum()->result_array();
		$jum_kat=$this->M_data->cari_y($jumlahkategori,$bobotbro,$akar_tahun,$akar_kec,$akar_panjang,$akar_harga);
		$ymax=$this->M_data->y_max($jum_kat);
		$ymin=$this->M_data->y_min($jum_kat);
		$hasil=$this->M_data->ranking($jum_kat,$ymax,$ymin);
		// foreach ($jumlahkategori as $jk) {
		// 	while($i<=3){
		// 			$kat_tahun=$jk->tahunpro_mobil;
		// 			$kat_kec=$jk->kecepatan;
		// 			$kat_panjang=$jk->panjang;
		// 			$kat_harga=$jk->harga_mobil;
		// 			$y[$i][$j]=$kat_tahun/$akartahunproduksi*$bobot_tahun;
		// 			$j++;
		// 			$y[$i][$j]=$kat_kec/$akarkecepatan*$bobot_kec;
		// 			$j++;
		// 			$y[$i][$j]=$kat_panjang/$akarpanjang*$bobot_panjang;
		// 			$j++;
		// 			$y[$i][$j]=$kat_harga/$akarharga*$bobot_harga;
		// 			$j++;
		// 			$i++;
		// 	}
		// }
		// $ymax=array();
		// $ymin=array();
		// 		$ymaxi=max($y[0][0],$y[1][0],$y[2][0]);
		// 		$ymini=min($y[0][0],$y[1][0],$y[2][0]);
		// 		array_push($ymax, $ymaxi);
		// 		array_push($ymin, $ymini);
		// 		$ymaxi=max($y[0][1],$y[1][1],$y[2][1]);
		// 		$ymini=min($y[0][1],$y[1][1],$y[2][1]);
		// 		array_push($ymax, $ymaxi);
		// 		array_push($ymin, $ymini);
		// 		$ymaxi=max($y[0][2],$y[1][2],$y[2][2]);
		// 		$ymini=min($y[0][2],$y[1][2],$y[2][2]);
		// 		array_push($ymax, $ymaxi);
		// 		array_push($ymin, $ymini);
		// 		$ymaxi=min($y[0][3],$y[1][3],$y[2][3]);
		// 		$ymini=max($y[0][3],$y[1][3],$y[2][3]);
		// 		array_push($ymax, $ymaxi);
		// 		array_push($ymin, $ymini);
		// 		$d1=sqrt(($y[0][0]-$ymax[0])*($y[0][0]-$ymax[0])+(($y[0][1]-$ymax[1])*($y[0][1]-$ymax[1])+(($y[0][2]-$ymax[2]))+(($y[0][3]-$ymax[3])*($y[0][3]-$ymax[3])));
		// 		$d2=sqrt(($y[1][0]-$ymax[0])*($y[1][0]-$ymax[0])+(($y[1][1]-$ymax[1])*($y[1][1]-$ymax[1])+(($y[1][2]-$ymax[2]))+(($y[1][3]-$ymax[3])*($y[1][3]-$ymax[3])));
		// 		$d3=sqrt(($y[2][0]-$ymax[0])*($y[2][0]-$ymax[0])+(($y[2][1]-$ymax[1])*($y[2][1]-$ymax[1])+(($y[2][2]-$ymax[2]))+(($y[2][3]-$ymax[3])*($y[2][3]-$ymax[3])));
		// 		$d4=sqrt(($y[3][0]-$ymax[0])*($y[3][0]-$ymax[0])+(($y[3][1]-$ymax[1])*($y[3][1]-$ymax[1])+(($y[3][2]-$ymax[2]))+(($y[3][3]-$ymax[3])*($y[3][3]-$ymax[3])));

		// 		$d1m=sqrt(($y[0][0]-$ymin[0])*($y[0][0]-$ymin[0])+(($y[0][1]-$ymin[1])*($y[0][1]-$ymin[1])+(($y[0][2]-$ymin[2]))+(($y[0][3]-$ymin[3])*($y[0][3]-$ymin[3])));
		// 		$d2m=sqrt(($y[1][0]-$ymin[0])*($y[1][0]-$ymin[0])+(($y[1][1]-$ymin[1])*($y[1][1]-$ymin[1])+(($y[1][2]-$ymin[2]))+(($y[1][3]-$ymin[3])*($y[1][3]-$ymin[3])));
		// 		$d3m=sqrt(($y[2][0]-$ymin[0])*($y[2][0]-$ymin[0])+(($y[2][1]-$ymin[1])*($y[2][1]-$ymin[1])+(($y[2][2]-$ymin[2]))+(($y[2][3]-$ymin[3])*($y[2][3]-$ymin[3])));
		// 		$d4m=sqrt(($y[3][0]-$ymin[0])*($y[3][0]-$ymin[0])+(($y[3][1]-$ymin[1])*($y[3][1]-$ymin[1])+(($y[3][2]-$ymin[2]))+(($y[3][3]-$ymin[3])*($y[3][3]-$ymin[3])));

		// $v1 = $d1m / ($d1 + $d1m);
		// $v2 = $d2m / ($d2 + $d2m);
		// $v3 = $d3m / ($d3 + $d3m);
		if ($hasil[0] >= $hasil[1] && $hasil[0] >= $hasil[2]) {
			$idb=$itungmobil[0];
		    $nampilkan['mobil']=$this->M_data->ranking1($idb)->result();
		    
		    $this->load->view('tampilan_rekom',$nampilkan);
		    

		} else if ($hasil[1] >= $hasil[0] && $hasil[1] >= $hasil[2]) {
		    $idb=$itungmobil[1];
		    $nampilkan['mobil']=$this->M_data->ranking1($idb)->result();
		    
		    $this->load->view('tampilan_rekom',$nampilkan);
		    
		} else if ($hasil[2] >= $hasil[0] && $hasil[2] >= $hasil[1]) {
		    $idb=$itungmobil[2];
		    $nampilkan['mobil']=$this->M_data->ranking1($idb)->result();
		    
		    $this->load->view('tampilan_rekom',$nampilkan);

		} 
}
}

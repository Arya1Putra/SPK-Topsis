<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobnew extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->model('M_data');
 
	}
	public function index()
	{
		
		$this->load->view('header');
		$this->load->view('masukkan');
		$this->load->view('footer');

	}
	function tambah_aksi(){
	$tahunmobil = $this->input->post('tahun');
  	$hargamobil = $this->input->post('harga');
  	$tipemobil = $this->input->post('tipe');
    $data = array(
		      	'merk_id' => $this->input->post('merk'),
		      	'tahunpro_mobil' => $this->input->post('tahun'),
		      	'harga_mobil' => $this->input->post('harga'),
				'tipe_mobil' => $this->input->post('tipe'),			
		      	'kecepatan' => $this->input->post('kec'),	
		      	'panjang' => $this->input->post('ukuran')

	);
	 $this->M_data->save($data);
	 $sql = $this->M_data->selekbobot()->row_array();
	
	$kriteria_tahun= 1;
    $kriteria_kec = 2;
    $kriteria_ukuran= 3;
    $kriteria_harga= 4;
    $data = array(
    	'kriteria_id'=>$kriteria_tahun,
    	'id_mobil'=> $sql['id_mobil'],
    	'bobot_nilai' => $this->input->post('bobot_tahun')
    );
    $this->M_data->simpanbobot($data);
    $data = array(
    	'kriteria_id'=> $kriteria_kec,
    	'id_mobil'=> $sql['id_mobil'],
    	'bobot_nilai' => $this->input->post('bobot_kec')
    );
    $this->M_data->simpanbobot($data);
    $data = array(
    	'kriteria_id'=> $kriteria_ukuran,
    	'id_mobil'=> $sql['id_mobil'],
    	'bobot_nilai' => $this->input->post('bobot_ukuran')
    );
    $this->M_data->simpanbobot($data);
    $data = array(
    	'kriteria_id'=> $kriteria_harga,
    	'id_mobil'=> $sql['id_mobil'],
    	'bobot_nilai' => $this->input->post('bobot_harga')
    );
    $this->M_data->simpanbobot($data);
      redirect('Mobnew','refresh');

	}

}

	
  



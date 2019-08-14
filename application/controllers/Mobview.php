<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobview extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_data');
		$this->load->helper('url');
 
	}
	public function index()
	{
		$this->load->view('header');
		$data['mobil'] = $this->M_data->tampil_data()->result();
		$this->load->view('tampil',$data);
		$this->load->view('footer');

	}
	function hapus($id){
		$this->M_data->hapus_data($id);
		redirect('Mobview');
	}
	function edit($id){
		$data['id']=$id;
		$this->load->view('header');
		$this->load->view('edit',$data);
		$this->load->view('footer');
	}
	function edit_data($id){
		$data = array(
		      	'merk_id' => $this->input->post('merk'),
		      	'tahunpro_mobil' => $this->input->post('tahun'),
		      	'harga_mobil' => $this->input->post('harga'),
				'tipe_mobil' => $this->input->post('tipe'),			
		      	'kecepatan' => $this->input->post('kec'),	
		      	'panjang' => $this->input->post('ukuran')

	);
	 $this->M_data->edit_data($id,$data);
	$kriteria_tahun= 1;
    $kriteria_kec = 2;
    $kriteria_ukuran= 3;
    $kriteria_harga= 4;
    $bobot_nilai1 = $this->input->post('bobot_tahun');
    $bobot_nilai2 = $this->input->post('bobot_kec');
    $bobot_nilai3 = $this->input->post('bobot_ukuran');
    $bobot_nilai4 = $this->input->post('bobot_harga');
    
    $this->M_data->edit_bobot($id,$kriteria_tahun,$bobot_nilai1);
    $this->M_data->edit_bobot($id,$kriteria_kec,$bobot_nilai2);
    $this->M_data->edit_bobot($id,$kriteria_ukuran,$bobot_nilai3);
    $this->M_data->edit_bobot($id,$kriteria_harga,$bobot_nilai4);
      redirect('Mobview','refresh');

	}
}

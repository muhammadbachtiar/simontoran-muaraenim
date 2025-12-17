<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Access Controller
*| --------------------------------------------------------------------------
*| access site
*|
*/
class Laporan extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model([
			'model_laporan',
			'group/model_group'
		]);
	}

	/**
	* show all access
	*
	* @var $offset String
	*/

	
	
	public function harian(){
	   	$this->is_allowed('laporan_list'); 
	   	$this->template->title('Laporan Harian');
	   	$nama = $this->model_laporan->get_nama_bagian();
	   	$harian = $this->model_laporan->laporanharian_bagian();
	   	$this->data['harian'] = $harian;
	   	$this->data['column_names'] =array_keys((array)$harian[0]);
	   	$this->data['title'] = 'Laporan Harian berdasarkan Bagian';
		$this->render('backend/standart/administrator/laporan/laporan_harian', $this->data);
	}
	
		public function hariansub(){
	   	$this->is_allowed('laporan_list'); 
	   	$this->template->title('Laporan Harian Sub Kegiatan');
	   	$harian = $this->model_laporan->laporanharian_bagian_sub();
	   	$this->data['harian'] = $harian;
	   	$this->data['column_names'] =array_keys((array)$harian[0]);
	   		$this->data['title'] = 'Laporan Harian berdasarkan Sub Kegiatan';
		$this->render('backend/standart/administrator/laporan/laporan_harian', $this->data);
	}
	
	public function bulanan(){
	   	$this->is_allowed('laporan_list'); 
	   	$this->template->title('Laporan Bulanan');
	   	$lap = $this->model_laporan->laporanbulanan_bagian();
	   	$this->data['lap'] = $lap;
	   	$this->data['column_names'] =array_keys((array)$lap[0]);
	   	$this->data['title'] = 'Laporan Bulanan berdasarkan Bagian';
		$this->render('backend/standart/administrator/laporan/laporan_bulanan', $this->data);
	}
	
	public function bulanansub(){
	   	$this->is_allowed('laporan_list'); 
	   	$this->template->title('Laporan Bulanan');
	   	$lap = $this->model_laporan->laporanbulanan_bagian_sub();
	   	$this->data['lap'] = $lap;
	   	$this->data['column_names'] =array_keys((array)$lap[0]);
	   	$this->data['title'] = 'Laporan Bulanan berdasarkan Sub Kegiatan';
		$this->render('backend/standart/administrator/laporan/laporan_bulanan', $this->data);
	}
	
	
	public function bagian(){
	   	$this->is_allowed('laporan_list'); 
	   	$this->template->title('Laporan Bagian');
	   	$lap = $this->model_laporan->laporanbagian('laporan_bagian');
	   	$this->data['lap'] = $lap;
	   	$this->data['column_names'] =array_keys((array)$lap[0]);
	   	$this->data['title'] = 'Laporan Per Bagian';
		$this->render('backend/standart/administrator/laporan/laporan_bulanan', $this->data);
	}
	
	public function subkegiatan(){
	   	$this->is_allowed('laporan_list'); 
	   	$this->template->title('Laporan Sub Kegiatan');
	   	$lap = $this->model_laporan->getdata('laporan_subkegiatan');
	   	$this->data['lap'] = $lap;
	   	$this->data['column_names'] =array_keys((array)$lap[0]);
	   	$this->data['title'] = 'Laporan Per Sub Kegiatan';
		$this->render('backend/standart/administrator/laporan/laporan_bulanan', $this->data);
	}
		public function kegiatan(){
	   	$this->is_allowed('laporan_list'); 
	   	$this->template->title('Laporan Kegiatan');
	   	$lap = $this->model_laporan->getdata('laporan_kegiatan');
	   	$this->data['lap'] = $lap;
	   	$this->data['column_names'] =array_keys((array)$lap[0]);
	   	$this->data['title'] = 'Laporan Per Kegiatan';
		$this->render('backend/standart/administrator/laporan/laporan_bulanan', $this->data);
	}
	
	public function program(){
	   	$this->is_allowed('laporan_list'); 
	   	$this->template->title('Laporan Program');
	   	$lap = $this->model_laporan->getdata('laporan_program');
	   	$this->data['lap'] = $lap;
	   	$this->data['column_names'] =array_keys((array)$lap[0]);
	   	$this->data['title'] = 'Laporan Per Program';
		$this->render('backend/standart/administrator/laporan/laporan_bulanan', $this->data);
	}
	
	public function realisasifinal(){
	   	$this->is_allowed('setorpb_list'); 
	   	$this->template->title('Laporan Harian');
	   	$bagian = $this->model_laporan->get_nama_bagian();
	    $res = $this->model_laporan->getdata('realisasi_final',$bagian);
	   	$this->data['harian'] = $res;
	   	$this->data['column_names'] =array_keys((array)$res[0]);
	   	
	   	$this->data['title'] = 'Realisasi Final PB STS';
		$this->render('backend/standart/administrator/laporan/laporan_final', $this->data);
	}
	
	public function rekapspj(){
	   	$this->is_allowed('laporan_rekapspj'); 
	   	$this->template->title('Rekap SPJ');
	   	$bagian = $this->model_laporan->get_nama_bagian_pptk();
	    $res = $this->model_laporan->getdata('laporan_rekap_subkegiatan',$bagian);
	   	$this->data['harian'] = $res;
	   	$this->data['column_names'] =array_keys((array)$res[0]);
	   	
	   	$this->data['title'] = 'Rekap Register SPJ';
		$this->render('backend/standart/administrator/laporan/laporan_rekapspj', $this->data);
	}
	
	
	


	
}


/* End of file Access.php */
/* Location: ./application/controllers/administrator/Access.php */
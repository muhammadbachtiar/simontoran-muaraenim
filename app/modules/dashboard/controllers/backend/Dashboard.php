<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Dashboard Controller
*| --------------------------------------------------------------------------
*| For see your board
*|
*/
class Dashboard extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_dashboard');
	}

	public function index()
	{
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/', 'refresh');
		}
		$this->data['rekap']= $this->model_dashboard->getData();
		$this->data['chart_data'] = $this->model_dashboard->get_all();
		$this->data['chart_data_jenis'] = $this->model_dashboard->get_total_nominal_per_jenis();
		$this->data['chart_kdh'] = $this->model_dashboard->get_kdh_nominal_per_jenis();
		$this->render('backend/standart/dashboard', $this->data);
	}

	public function chart()
	{
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/','refresh');
		}

		$data = [];
		$this->render('backend/standart/chart', $data);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/administrator/Dashboard.php */
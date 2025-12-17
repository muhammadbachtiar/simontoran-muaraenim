<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*| --------------------------------------------------------------------------
*| Web Controller
*| --------------------------------------------------------------------------
*| For default controller
*|
*/
class Beranda extends Front
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $data=[];
    	$this->template->build('front/standart/beranda/beranda', $data);
		
	}
}
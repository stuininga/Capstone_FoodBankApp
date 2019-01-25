<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		
		// moving data from controller to view

		$data['heading'] = "CI Home Page";

		$this->load->view('includes/header');
		$this->load->view('home_view', $data);
		$this->load->view('includes/footer');
	}
}

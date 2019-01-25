<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Birds extends CI_Controller {

	
	public function index()
	{
		
		// moving data from controller to view

		$data['heading'] = "Birds Section";

		$this->load->view('includes/header');
		$this->load->view('birds_view', $data);
		$this->load->view('includes/footer');
	}
	public function loon()
	{
		
		// moving data from controller to view


		echo "<h1>This is the Loon Page</h1>";
		/*data['heading'] = "CI Home Page";

		$this->load->view('includes/header');
		$this->load->view('home_view', $data);
		$this->load->view('includes/footer');*/
	}
}

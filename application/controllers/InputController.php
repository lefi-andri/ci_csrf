<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		// $this->load->library('encryption');
		$this->load->helper('security');
		$this->load->helper('site');
	}

	public function index()
	{
		
	}

	public function add()
	{
		// echo '<pre>';
		// print_r($_SESSION);
		// echo '</pre>';
		// echo $this->security->get_csrf_token_name();
		// echo '<br>';
		// echo $this->security->get_csrf_hash();
		
		$this->data = [];
		$this->data['title'] = 'Add';

		$this->form_validation->set_rules('nama', 'Nama', 'required');

		if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('input/form_add', $this->data);
        }
        else
        {
        	cek_csrf();

        	echo 'Sukses';
        }

	}

}

/* End of file InputController.php */
/* Location: ./application/controllers/InputController.php */
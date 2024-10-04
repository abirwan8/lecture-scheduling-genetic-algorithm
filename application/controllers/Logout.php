<?php 
	/**
	* 
	*/
	class Logout extends CI_Controller
	{
		
		public function index(){
			$this->load->library('session');
			session_destroy();

			// Delete cookies

			$this->load->helper('cookie');
			delete_cookie('username');
			delete_cookie('password');

			redirect('/login','refresh');
		}

	}
?>

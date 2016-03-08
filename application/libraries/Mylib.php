<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mylib
{
		public $message="success";

	public function __construct()
	{
        // $CI =& get_instance();
        // $this->ci->load->helper('url');
        // $this->ci->load->database();
       	// $this->ci->load->library('session');
	}
	public function show()
	{
		$data = $this->message;
		echo $data;
	}
	

}

/* End of file Mylib.php */
/* Location: ./application/libraries/Mylib.php */

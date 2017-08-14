<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
    }

	public function index()
	{
		$data['body']					= 'page-sub-page';
		$data['title']					= '| 404 Page Not Found';
		$data['boxberita']				= TRUE;	
		$data['boxfakultas']			= TRUE;	
		$data['boxlayanan']				= TRUE;		
		$data['boxvideo']				= TRUE;		
		$this->load->vars($data);
		$this->load->view('error');
	}


}

/* End of file error.php */
/* Location: ./application/controllers/error.php */
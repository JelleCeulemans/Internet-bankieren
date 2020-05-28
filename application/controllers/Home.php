<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
	    $data['titel'] = 'Algemene informatie';
        $partials = array('inhoud' => 'main_menu');
        $this->template->load('main_master', $partials, $data);
	}

    public function theorie()
    {
        $data['titel'] = 'Theorie';
        $partials = array('inhoud' => 'theorie');
        $this->template->load('main_master', $partials, $data);
    }

}

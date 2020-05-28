<?php defined('BASEPATH') OR exit('No direct script access allowed');

class overschrijvenNaarJezelf extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $data['titel'] = 'Overschrijven naar jezelf';
        $partials = array('inhoud' => 'overschrijvenNaarJezelf');
        $this->template->load('main_master', $partials, $data);
    }
}
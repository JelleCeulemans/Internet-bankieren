<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['titel'] = 'Quiz';
        $partials = array('inhoud' => 'quiz');
        $this->template->load('main_master', $partials, $data);
    }


}

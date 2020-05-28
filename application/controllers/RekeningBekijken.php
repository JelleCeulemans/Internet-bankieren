<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RekeningBekijken extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $data['titel'] = 'Rekeningen Bekijken';
        $partials = array('inhoud' => 'rekeningBekijken');
        $this->template->load('main_master', $partials, $data);
    }

    public function naarzichtrekening() {
        $data['titel'] = 'Zichtrekening BART COPPENS';
        $partials = array('inhoud' => 'zicht');
        $this->template->load('main_master', $partials, $data);
    }
    public function naarspaar1() {
        $data['titel'] = 'Spaarrekening 1 BART COPPENS';
        $partials = array('inhoud' => 'spaar1');
        $this->template->load('main_master', $partials, $data);
    }
    public function naarspaar2() {
        $data['titel'] = 'Spaarrekening 2 BART COPPENS';
        $partials = array('inhoud' => 'spaar2');
        $this->template->load('main_master', $partials, $data);
    }
}
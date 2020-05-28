<?php defined('BASEPATH') OR exit('No direct script access allowed');

class OverschrijvenNaarAnderen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['titel'] = 'Overschrijven naar anderen';
        $partials = array('inhoud' => 'overschrijvenNaarAnderen');
        $this->template->load('main_master', $partials, $data);
    }

    public function naarBetalen() {
        $data['persNota'] = $this->input->post('persNota');
        $data['naamAdres'] = $this->input->post('naamAdres1') ."</div><div>" . $this->input->post('naamAdres2') . "</div><div>" . $this->input->post('naamAdres3');

        $data['titel'] = 'Overschrijving tekenen';
        $partials = array('inhoud' => 'tekenen');
        $this->template->load('main_master', $partials, $data);
    }
}
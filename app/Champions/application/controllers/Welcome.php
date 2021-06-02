<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Champions_model');
        $this->load->model('Habilities_model');
        $this->load->model('Stats_model');
        $this->load->model('Tips_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('welcome_message');
    }

    public function verChampion($id_champion = null)
    {
        if ($id_champion != null) {

            if ($this->Champions_model->get_champion($id_champion)) {
                $data['id_champion'] = $id_champion;
                $this->load->view('view_champion', $data);
            } else {
                redirect('/');
            }
        } else {
            redirect('/');
        }
    }

    public function addChampion()
    {
        $this->load->view('add_champion');
    }

    public function verItems()
    {
        if ($this->Champions_model->get_champion($id_champion)) {
            $data['id_champion'] = $id_champion;
            $this->load->view('view_champion', $data);
        } else {
            redirect('/');
        }
    }
}

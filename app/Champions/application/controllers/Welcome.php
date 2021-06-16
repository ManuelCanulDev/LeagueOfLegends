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

    public function editarChampion($id_champion = null)
    {
        if ($id_champion != null) {
            $data['champion'] = $this->Champions_model->get_champion($id_champion);

            if (isset($data['champion']['id'])) {
                $data['id_champion'] = $id_champion;
                //$data['habilities'] = $this->Habilities_model->get_habilities_by_champion($id_champion);
                //$data['stats'] = $this->Stats_model->get_stats_by_champion($id_champion);
                //$data['tips'] = $this->Tips_model->get_tips_by_champion($id_champion);
                $this->load->view('edit_champion', $data);
            } else {
                redirect('/');
            }
        } else {
            redirect('/');
        }
    }

    public function agregarHabilidad($id_champion = null)
    {
        if ($id_champion != null) {
            $data['champion'] = $this->Champions_model->get_champion($id_champion);

            if (isset($data['champion']['id'])) {
                $data['id_champion'] = $id_champion;
                $this->load->view('add_hability_champion', $data);
            } else {
                redirect('/');
            }
        } else {
            redirect('/');
        }
    }

    public function agregarEstadistica($id_champion = null)
    {
        if ($id_champion != null) {
            $data['champion'] = $this->Champions_model->get_champion($id_champion);

            if (isset($data['champion']['id'])) {
                $data['id_champion'] = $id_champion;
                $this->load->view('add_stats_champion', $data);
            } else {
                redirect('/');
            }
        } else {
            redirect('/');
        }
    }

    public function agregarTip($id_champion = null)
    {
        if ($id_champion != null) {
            $data['champion'] = $this->Champions_model->get_champion($id_champion);

            if (isset($data['champion']['id'])) {
                $data['id_champion'] = $id_champion;
                $this->load->view('add_tips_champion', $data);
            } else {
                redirect('/');
            }
        } else {
            redirect('/');
        }
    }
}

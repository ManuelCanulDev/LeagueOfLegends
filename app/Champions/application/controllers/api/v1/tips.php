<?php
/*
Generated by Manuigniter v2.0
www.manuigniter.com
 */

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class tips extends REST_Controller
{
    private $code01 = '001'; //CODIGO CORRECTO.
    private $code02 = '002'; //VALOR NO ENCONTRADO.
    private $code03 = '003'; //FALTAN PARAMETROS.
    private $code04 = '004'; //CODIGO NO CORRECTO.

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tips_model');
        $this->load->helper('text');
        $this->load->library('upload');
    }

    public function add_post()
    {
        $id_champion = $this->input->post('id_champion');
        $tip = $this->input->post('tip');

        if ($id_champion == '' || $tip == '') {
            $this->response([
                'status' => false,
                'error' => true,
                'message' => 'ERROR',
                'system_code' => $this->code03,
            ], 400);
        } else {
           
            $tip = array(
                'id' => null,
                'champion' => $id_champion,
                'tip' => $tip,
            );

            $tip_added = $this->Tips_model->add_tip($tip);

            $get_tip = $this->Tips_model->get_tip($tip_added);

            if ($get_tip) {
                $this->response([
                    'status' => true,
                    'error' => false,
                    'message' => "OK",
                    'system_code' => $this->code01,
                    'data' => $get_tip,
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'error' => true,
                    'message' => 'ERROR: ' . $this->code04,
                    'system_code' => $this->code04,
                ], 400);
            }
        }
    }

    public function update_post()
    {
        if(isset($_POST['field']) && isset($_POST['value']) && isset($_POST['id'])){

            $newTip = array(
                'tip' => $_POST['value'],
            );
         
            if($this->Tips_model->update_tip($newTip, $_POST['id'])){

                $get_tip = $this->Tips_model->get_tip($_POST['id']);

                $this->response([
                    'status' => true,
                    'error' => false,
                    'message' => "OK",
                    'system_code' => $this->code01,
                    'data' => $get_tip,
                ], 200);
            }else{
                $this->response([
                    'status' => false,
                    'error' => true,
                    'message' => 'ERROR: ' . $this->code04,
                    'system_code' => $this->code04,
                ], 400);
            }
         }else{
            $this->response([
                'status' => false,
                'error' => true,
                'message' => 'ERROR',
                'system_code' => $this->code03,
            ], 400);
         }
    }
}

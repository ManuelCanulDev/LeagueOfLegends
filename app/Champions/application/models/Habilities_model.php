<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Habilities_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_habilities($params = array())
    {
        try {
            $this->db->order_by('id', 'asc');
            if (isset($params) && !empty($params)) {
                $this->db->limit($params['limit'], $params['offset']);
            }
            return $this->db->get('champion_habilities')->result_array();
        } catch (Exception $ex) {
            throw new Exception('Habilities_model model : Error in get_all_habilities function - ' . $ex);
        }
    }

    public function get_habilities_by_champion($id_champion)
    {
        try {
            return $this->db->get_where('champion_habilities', array('champion' => $id_champion))->result_array();
        } catch (Exception $ex) {
            throw new Exception('Champions_model Model : Error in get_habilities_by_champion function - ' . $ex);
        }
    }
}

/* End of file Habilities.php */

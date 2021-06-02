<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Items_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_items($params = array())
    {
        try {
            $this->db->order_by('id', 'asc');
            if (isset($params) && !empty($params)) {
                $this->db->limit($params['limit'], $params['offset']);
            }
            return $this->db->get('items')->result_array();
        } catch (Exception $ex) {
            throw new Exception('Items_model model : Error in get_all_items function - ' . $ex);
        }
    }
}

/* End of file Habilities.php */

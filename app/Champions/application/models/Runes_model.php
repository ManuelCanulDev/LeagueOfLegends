<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Runes_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_runes($params = array())
    {
        try {
            $this->db->order_by('id', 'asc');
            if (isset($params) && !empty($params)) {
                $this->db->limit($params['limit'], $params['offset']);
            }
            return $this->db->get('runes')->result_array();
        } catch (Exception $ex) {
            throw new Exception('Runes_model model : Error in get_all_runes function - ' . $ex);
        }
    }
}

/* End of file Habilities.php */

/* End of file Runes.php */

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tips_model extends CI_Model
{

    public function get_all_tips()
    {
        try {
            return $this->db->get('champion_tips')->result_array();
        } catch (Exception $ex) {
            throw new Exception('Tips_model Model : Error in get_all_tips function - ' . $ex);
        }
    }

    public function get_tips_by_champion($id_champion)
    {
        try {
            return $this->db->get_where('champion_tips', array('champion' => $id_champion))->result_array();
        } catch (Exception $ex) {
            throw new Exception('Tips_model Model : Error in get_tips_by_champion function - ' . $ex);
        }
    }

    public function add_tip($params)
    {
        try {
            $this->db->insert('champion_tips', $params);
            return $this->db->insert_id();
        } catch (Exception $ex) {
            throw new Exception('Tips_model model : Error in add_add_tiphability function - ' . $ex);
        }
    }

    public function get_tip($id_tip)
    {
        try {
            return $this->db->get_where('champion_tips', array('id' => $id_tip))->row_array();
        } catch (Exception $ex) {
            throw new Exception('Habilities_model Model : Error in get_hability function - ' . $ex);
        }
    }
}

/* End of file Tips.php */

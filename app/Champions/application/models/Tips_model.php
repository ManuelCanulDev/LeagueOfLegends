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

}

/* End of file Tips.php */

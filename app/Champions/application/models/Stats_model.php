<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Stats_model extends CI_Model
{

    public function get_all_stats()
    {
        try {
            return $this->db->get('champion_stats')->result_array();
        } catch (Exception $ex) {
            throw new Exception('Stats_model model : Error in get_all_stats function - ' . $ex);
        }
    }

    public function get_stats_by_champion($id_champion)
    {
        try {
            return $this->db->get_where('champion_stats', array('champion' => $id_champion))->result_array();
        } catch (Exception $ex) {
            throw new Exception('Champions_model Model : Error in get_stats_by_champion function - ' . $ex);
        }
    }

}

/* End of file Stats.php */

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
            throw new Exception('Stats_model Model : Error in get_stats_by_champion function - ' . $ex);
        }
    }

    public function add_stat($params)
    {
        try {
            $this->db->insert('champion_stats', $params);
            return $this->db->insert_id();
        } catch (Exception $ex) {
            throw new Exception('Stats_model model : Error in add_stat function - ' . $ex);
        }
    }

    public function get_stat($id_champion, $name)
    {
        try {
            return $this->db->get_where('champion_stats', array('champion' => $id_champion, 'name' => $name))->row_array();
        } catch (Exception $ex) {
            throw new Exception('Stats_model Model : Error in get_stat function - ' . $ex);
        }
    }

    public function get_stat_by_id($id_stat)
    {
        try {
            return $this->db->get_where('champion_stats', array('id' => $id_stat))->row_array();
        } catch (Exception $ex) {
            throw new Exception('Stats_model Model : Error in get_stat_by_id function - ' . $ex);
        }
    }

    public function update_stat($params, $id_stat)
    {
        try {
            $this->db->where('id', $id_stat);
            return $this->db->update('champion_stats', $params);
        } catch (Exception $ex) {
            throw new Exception('Stats_model model : Error in update_stat function - ' . $ex);
        }
    }

}

/* End of file Stats.php */

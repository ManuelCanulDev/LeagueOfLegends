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
            $this->db->order_by('id', 'desc');
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
            throw new Exception('Habilities_model Model : Error in get_habilities_by_champion function - ' . $ex);
        }
    }

    public function get_last_id($id_champion)
    {
        $query2 = $this->db->query('SELECT MAX(id) as ultimo_id FROM champion_habilities WHERE champion = '.$id_champion);

        $row = $query2->row();
        return $row->ultimo_id;
    }

    public function add_hability($params)
    {
        try {
            $this->db->insert('champion_habilities', $params);
            return $this->db->insert_id();
        } catch (Exception $ex) {
            throw new Exception('Habilities_model model : Error in add_hability function - ' . $ex);
        }
    }

    public function get_hability($id_hability,$id_champion)
    {
        try {
            return $this->db->get_where('champion_habilities', array('id' => $id_hability, 'champion' => $id_champion))->row_array();
        } catch (Exception $ex) {
            throw new Exception('Habilities_model Model : Error in get_hability function - ' . $ex);
        }
    }

    public function update_hability($params, $id_hability, $id_champion)
    {
        try {
            $this->db->where('id', $id_hability);
            $this->db->where('champion', $id_champion);
            return $this->db->update('champion_habilities', $params);
        } catch (Exception $ex) {
            throw new Exception('Habilities_model model : Error in update_hability function - ' . $ex);
        }
    }
}

/* End of file Habilities.php */

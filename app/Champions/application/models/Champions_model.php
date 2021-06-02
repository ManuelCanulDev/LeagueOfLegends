<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Champions_model
 *
 * This Model for ...
 *
 * @package        CodeIgniter
 * @category    Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Champions_model extends CI_Model
{

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------

    // ------------------------------------------------------------------------
    public function get_champion($id_champion)
    {
        try {
            return $this->db->get_where('champions', array('id' => $id_champion))->row_array();
        } catch (Exception $ex) {
            throw new Exception('Champions_model Model : Error in get_champion function - ' . $ex);
        }
    }

    public function get_all_champions($params = array())
    {
        try {
            $this->db->order_by('id', 'asc');
            if (isset($params) && !empty($params)) {
                $this->db->limit($params['limit'], $params['offset']);
            }
            return $this->db->get('champions')->result_array();
        } catch (Exception $ex) {
            throw new Exception('Champions_model model : Error in get_all_champions function - ' . $ex);
        }
    }

    public function get_all_champions_count()
    {
        try {
            $this->db->from('champions');
            return $this->db->count_all_results();
        } catch (Exception $ex) {
            throw new Exception('Champions_model model : Error in get_all_champions_count function - ' . $ex);
        }
    }

    public function add_champion($params)
    {
        try {
            $this->db->insert('champions', $params);
            return $this->db->insert_id();
        } catch (Exception $ex) {
            throw new Exception('Champions_model model : Error in add_champion function - ' . $ex);
        }
    }

    public function delete_champion($id_champion)
    {
        try {
            return $this->db->delete('champions', array('id' => $id_champion));
        } catch (Exception $ex) {
            throw new Exception('Champions_model model : Error in delete_champion function - ' . $ex);
        }
    }

    public function update_champion($params, $id_champion)
    {
        try {
            $this->db->where('id', $id_champion);
            return $this->db->update('champions', $params);
        } catch (Exception $ex) {
            throw new Exception('Champions_model model : Error in update_champion function - ' . $ex);
        }
    }

    public function get_last_id()
    {
        $query2 = $this->db->query('SELECT MAX(id) as ultimo_id FROM champions');

        $row = $query2->row();
        return $row->ultimo_id;
    }

    // ------------------------------------------------------------------------

}

/* End of file Champions_model.php */
/* Location: ./application/models/Champions_model.php */

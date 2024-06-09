<?php
class Submenu_model extends CI_Model
{
    private $_table = 'submenu';

    public function getAll()
    {
        $this->db->where('id!=', 9);
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->result_array();
    }
}

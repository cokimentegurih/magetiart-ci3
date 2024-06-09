<?php
class User_role_model extends CI_Model
{
    private $_table = 'user_role';

    public function getAll()
    {
        $this->db->where('id!=', 1);
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->result_array();
    }

    public function insertRole()
    {
        $title = $this->input->post('title', true);
        $slug = url_title($title, '-', true);

        $this->db->set('title', $title);
        $this->db->set('slug', $slug);
        $this->db->set('created_at', 'NOW()', FALSE);

        return $this->db->insert($this->_table);
    }

    public function getRoleBySlug($slug)
    {
        $this->db->where('slug', $slug);
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->row_array();
    }

    public function deleteRole($slug)
    {
        $this->db->set('created_at', NULL);
        $this->db->where('slug', $slug);
        return $this->db->update($this->_table);
    }

    public function editRole()
    {
        $title = $this->input->post('title', true);
        $slug = url_title($title, '-', true);
        $id = $this->input->post('id', true);

        $this->db->set('title', $title);
        $this->db->set('slug', $slug);

        $this->db->where('id', $id);
        return $this->db->update($this->_table);
    }
}

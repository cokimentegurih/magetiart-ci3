<?php
class Kategori_model extends CI_Model
{
    private $_table = 'kategori';

    public function getAllParent()
    {
        $this->db->where('parent_id', NULL);
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->result_array();
    }

    public function getAll()
    {
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->result_array();
    }

    public function getAllSubForId($id)
    {
        $this->db->where('parent_id', $id);
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->result_array();
    }

    public function getKategoriBySlug($slug)
    {
        $this->db->where('slug', $slug);
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->row_array();
    }

    public function getKategoriById($id)
    {
        $this->db->where('id', $id);
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->row_array();
    }

    public function deleteKategori($slug)
    {
        $this->db->set('created_at', NULL);
        $this->db->where('slug', $slug);
        return $this->db->update($this->_table);
    }

    public function insertKategori($id = '')
    {
        $title = $this->input->post('title', true);
        $slug = url_title($title, '-', true);

        $this->db->set('title', $title);
        $this->db->set('slug', $slug);
        if ($id) {
            $this->db->set('parent_id', $id);
        } else {
            $this->db->set('parent_id', NULL);
        }
        $this->db->set('created_at', 'NOW()', FALSE);

        return $this->db->insert($this->_table);
    }

    public function editKategori($id = '')
    {

        $title = $this->input->post('title', true);
        $slug = url_title($title, '-', true);
        $parent = $this->input->post('parent', true);
        $id = $this->input->post('id', true);

        $this->db->set('title', $title);
        $this->db->set('slug', $slug);
        if ($parent) {
            $this->db->set('parent_id', $parent);
        }

        $this->db->where('id', $id);
        return $this->db->update($this->_table);
    }
}

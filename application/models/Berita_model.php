<?php
class Berita_model extends CI_Model
{
    private $_table = 'berita';

    public function getAll()
    {
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->result_array();
    }

    public function getBeritaBySlug($slug)
    {
        $this->db->where('slug', $slug);
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->row_array();
    }

    public function getBeritaByKeyword()
    {
        $keyword = $this->input->post('keyword', true);

        $this->db->like('title', $keyword);
        $this->db->or_like('link', $keyword);

        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->result_array();
    }

    public function deleteBerita($slug)
    {
        $this->db->set('created_at', NULL);
        $this->db->where('slug', $slug);
        return $this->db->update($this->_table);
    }

    public function changeImage($image)
    {
        return $this->db->set('image', $image);
    }

    public function insertBerita()
    {
        $title = $this->input->post('title', true);
        $slug = url_title($title, '-', true);
        $link = $this->input->post('link', true);

        $this->db->set('title', $title);
        $this->db->set('slug', $slug);
        $this->db->set('link', $link);
        $this->db->set('created_at', 'NOW()', FALSE);

        return $this->db->insert($this->_table);
    }

    public function editBerita()
    {
        $title = $this->input->post('title', true);
        $slug = url_title($title, '-', true);
        $link = $this->input->post('link', true);
        $id = $this->input->post('id', true);

        $this->db->set('title', $title);
        $this->db->set('slug', $slug);
        $this->db->set('link', $link);

        $this->db->where('id', $id);
        return $this->db->update($this->_table);
    }
}

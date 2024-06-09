<?php
class Dekorasi_model extends CI_Model
{
    private $_table = 'dekorasi';

    public function getAllForType($type)
    {
        $this->db->where('type', $type);
        return $this->db->get($this->_table)->result_array();
    }

    public function getAllForTable($type)
    {
        $queries = $this->getAllForType($type);
        if ($queries) {
            foreach ($queries as $query) {
                $data[] = $query['slug'];
            }
        }
        if ($type == 'seniman') {
            $field = 'email';
        } else {
            $field = 'slug';
        }
        $this->db->select('*');
        $this->db->from($type);
        if (isset($data)) {
            $this->db->where_in($field, $data);
        }
        return $this->db->get()->result_array();
    }

    public function getAllCategory()
    {
        $this->db->where('type', 'kategori');
        $this->db->or_where('type', 'koleksi');
        return $this->db->get($this->_table)->result_array();
    }

    public function getDekorasiBySlug($slug)
    {
        $this->db->where('slug', $slug);
        return $this->db->get($this->_table)->row_array();
    }

    public function getAllSubExcept($title)
    {
        $queries = $this->getAllCategory();
        if ($queries) {
            foreach ($queries as $query) {
                if ($query['title'] != $title) {
                    $not_title[] = $query['title'];
                }
            }
        }
        $this->db->select('kategori.title');
        $this->db->from('kategori');
        $this->db->where('parent_id!=', NULL);
        if (isset($not_title)) {
            $this->db->where_not_in('title', $not_title);
        }
        return $this->db->get()->result_array();
    }

    public function getAllTableForExcept($type, $slug)
    {
        $queries = $this->getAllForType($type);
        if ($type == 'seniman') {
            $field = 'email';
        } else {
            $field = 'slug';
        }
        if ($queries) {
            foreach ($queries as $query) {
                if ($query['slug'] != $slug) {
                    $not_slug[] = $query['slug'];
                }
            }
        }
        $this->db->select('*');
        $this->db->from($type);
        $this->db->where('created_at!=', NULL);
        if (isset($not_slug)) {
            $this->db->where_not_in($field, $not_slug);
        }
        return $this->db->get()->result_array();
    }

    public function changeImage($image)
    {
        return $this->db->set('image', $image);
    }

    public function editDekorasi()
    {
        $title = $this->input->post('title', true);
        $slug = url_title($title, '-', true);
        $description = $this->input->post('description', true);
        $id = $this->input->post('id', true);

        $this->db->set('title', $title);
        $this->db->set('slug', $slug);
        if ($description) {
            $this->db->set('description', $description);
        } else {
            $this->db->set('description', NULL);
        }
        $this->db->set('updated_at', 'NOW()', FALSE);

        $this->db->where('id', $id);
        return $this->db->update($this->_table);
    }

    public function editDekorasiTables()
    {
        $slug = $this->input->post('slug', true);
        $id = $this->input->post('id', true);

        $this->db->set('slug', $slug);
        $this->db->set('updated_at', 'NOW()', FALSE);

        $this->db->where('id', $id);
        return $this->db->update($this->_table);
    }
}

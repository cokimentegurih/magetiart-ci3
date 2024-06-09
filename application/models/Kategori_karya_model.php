<?php
class Kategori_karya_model extends CI_Model
{
    private $_table = 'kategori_karya';

    public function getAllforId($id)
    {
        $this->db->select('kk.*, karya.title, karya.image');
        $this->db->from($this->_table . ' AS kk');
        $this->db->join('karya', 'karya.id = kk.karya_id');
        $this->db->where('kk.kategori_id', $id);
        return $this->db->get()->result_array();
    }

    public function getAllexceptId($id)
    {
        $queries = $this->getAllbyCatId($id);
        if ($queries) {
            foreach ($queries as $query) {
                $not_id[] = $query['karya_id'];
            }
        }
        $this->db->select('id, title, image');
        $this->db->from('karya');
        if (isset($not_id)) {
            $this->db->where_not_in('id', $not_id);
        }
        return $this->db->get()->result_array();
    }

    public function getAllbyCatId($id)
    {
        $this->db->select('karya_id');
        $this->db->where('kategori_id', $id);
        return $this->db->get($this->_table)->result_array();
    }

    public function getAllSub($id)
    {
        $this->db->where('parent_id', $id);
        return $this->db->get($this->_table)->result_array();
    }

    public function getKategoriFromSub($id)
    {
        $this->db->select('kategori.slug');
        $this->db->from($this->_table . ' AS kk');
        $this->db->join('kategori', 'kategori.id = kk.kategori_id');
        $this->db->where('kk.id', $id);
        return $this->db->get()->row_array();
    }

    public function delete()
    {
        $id = $this->input->post('art', true);
        $this->db->where_in('id', $id);
        return $this->db->delete($this->_table);
    }

    public function insertKategori($id)
    {
        $data = $this->input->post('art', true);
        foreach ($data as $d) {
            $batch[] = [
                'karya_id' => $d,
                'kategori_id' => $id,
                'created_at' => date('Y-m-d H:i:s')
            ];
        }

        return $this->db->insert_batch($this->_table, $batch);
    }

    public function editKategori()
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

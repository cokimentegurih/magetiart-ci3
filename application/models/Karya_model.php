<?php
class Karya_model extends CI_Model
{
    private $_table = 'karya';

    public function getAll()
    {
        $this->db->select('k.*, seniman.name');
        $this->db->from($this->_table . ' AS k');
        $this->db->join('seniman', 'seniman.id = k.seniman_id');
        $this->db->where('k.created_at!=', NULL);
        return $this->db->get()->result_array();
    }

    public function getAllLimit($number)
    {
        $this->db->limit($number, rand(1, $this->db->count_all($this->_table) - 3));
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->result_array();
    }

    public function getAllBySeniman($id, $limit = '')
    {
        if ($limit) {
            $this->db->limit($limit);
        }
        $this->db->where('seniman_id', $id);
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->result_array();
    }

    public function getKaryaBySlug($slug)
    {
        $this->db->select('k.*, seniman.name');
        $this->db->from($this->_table . ' AS k');
        $this->db->join('seniman', 'seniman.id = k.seniman_id');
        $this->db->where('k.created_at!=', NULL);
        $this->db->where('k.slug', $slug);
        return $this->db->get()->row_array();
    }

    public function getFilterById($id)
    {
        $this->db->select('k.*');
        $this->db->from($this->_table . ' AS k');
        $this->db->join('kategori_karya', 'kategori_karya.karya_id = k.id');
        $this->db->where('kategori_karya.kategori_id', $id);
        $this->db->where('k.created_at!=', NULL);
        return $this->db->get()->result_array();
    }

    public function getKaryaById($id)
    {
        $this->db->where('id', $id);
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->row_array();
    }

    public function getKaryaByKeyword()
    {
        $keyword = $this->input->post('keyword', true);

        $this->db->select('k.*, seniman.name');
        $this->db->from($this->_table . ' AS k');
        $this->db->join('seniman', 'seniman.id = k.seniman_id');
        $this->db->like('k.title', $keyword);
        $this->db->or_like('k.year', $keyword);
        $this->db->or_like('k.material', $keyword);
        $this->db->or_like('k.width', $keyword);
        $this->db->or_like('k.height', $keyword);
        $this->db->or_like('k.description', $keyword);
        $this->db->or_like('k.price', $keyword);
        $this->db->or_like('seniman.name', $keyword);

        $this->db->where('k.created_at!=', NULL);
        return $this->db->get()->result_array();
    }

    public function getFilterByKeyword($id)
    {
        $keyword = $this->input->post('keyword', true);

        $this->db->select('k.*, kategori_karya.kategori_id');
        $this->db->from($this->_table . ' AS k');
        $this->db->join('kategori_karya', 'kategori_karya.karya_id = k.id');
        $this->db->where('kategori_karya.kategori_id', $id);
        $this->db->where('k.created_at!=', NULL);

        $this->db->group_start();
        $this->db->or_like('k.title', $keyword);
        $this->db->or_like('k.year', $keyword);
        $this->db->or_like('k.material', $keyword);
        $this->db->or_like('k.width', $keyword);
        $this->db->or_like('k.height', $keyword);
        $this->db->or_like('k.description', $keyword);
        $this->db->or_like('k.price', $keyword);
        $this->db->group_end();

        return $this->db->get()->result_array();
    }


    public function getManyKaryaById($array_to_question_marks)
    {
        $this->db->where_in('id', $array_to_question_marks);
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->result_array();
    }

    public function deleteKarya($slug)
    {
        $this->db->set('created_at', NULL);
        $this->db->where('slug', $slug);
        return $this->db->update($this->_table);
    }

    public function changeImage($image)
    {
        return $this->db->set('image', $image);
    }

    public function insertKarya()
    {
        $title = $this->input->post('title', true);
        $slug = url_title($title, '-', true);
        $artist = $this->input->post('artist', true);
        $description = $this->input->post('description', true);
        $year = $this->input->post('year', true);
        $material = $this->input->post('material', true);
        $width = $this->input->post('width', true);
        $height = $this->input->post('height', true);
        $quantity = $this->input->post('quantity', true);
        $price = $this->input->post('price', true);

        $this->db->set('title', $title);
        $this->db->set('slug', $slug);
        $this->db->set('seniman_id', $artist);
        $this->db->set('description', $description);
        $this->db->set('year', $year);
        $this->db->set('material', $material);
        $this->db->set('width', $width);
        $this->db->set('height', $height);
        $this->db->set('quantity', $quantity);
        $this->db->set('price', $price);
        $this->db->set('created_at', 'NOW()', FALSE);

        return $this->db->insert($this->_table);
    }

    public function editKarya()
    {
        $title = $this->input->post('title', true);
        $slug = url_title($title, '-', true);
        $artist = $this->input->post('artist', true);
        $description = $this->input->post('description', true);
        $year = $this->input->post('year', true);
        $material = $this->input->post('material', true);
        $width = $this->input->post('width', true);
        $height = $this->input->post('height', true);
        $quantity = $this->input->post('quantity', true);
        $price = $this->input->post('price', true);
        $id = $this->input->post('id', true);

        $this->db->set('title', $title);
        $this->db->set('slug', $slug);
        $this->db->set('seniman_id', $artist);
        $this->db->set('description', $description);
        $this->db->set('year', $year);
        $this->db->set('material', $material);
        $this->db->set('width', $width);
        $this->db->set('height', $height);
        $this->db->set('quantity', $quantity);
        $this->db->set('price', $price);

        $this->db->where('id', $id);
        return $this->db->update($this->_table);
    }
}

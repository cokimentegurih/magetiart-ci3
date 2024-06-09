<?php
class Seniman_model extends CI_Model
{
    private $_table = 'seniman';

    public function getAll()
    {
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->result_array();
    }

    public function getIdName()
    {
        $this->db->where('created_at!=', NULL);
        $this->db->select('id, name');
        return $this->db->get($this->_table)->result_array();
    }

    public function getSenimanByEmail($email)
    {
        $this->db->where('email', $email);
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->row_array();
    }

    public function getSenimanByKeyword()
    {
        $keyword = $this->input->post('keyword', true);

        $this->db->like('name', $keyword);
        $this->db->or_like('place', $keyword);
        $this->db->or_like('profile', $keyword);
        $this->db->or_like('ig', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('fb', $keyword);

        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->result_array();
    }

    public function deleteSeniman($email)
    {
        $this->db->set('created_at', NULL);
        $this->db->where('email', $email);
        return $this->db->update($this->_table);
    }

    public function changeImage($image)
    {
        return $this->db->set('image', $image);
    }

    public function changeCover($cover)
    {
        return $this->db->set('cover', $cover);
    }

    public function insertSeniman()
    {
        $name = $this->input->post('name', true);
        $place = $this->input->post('place', true);
        $profile = $this->input->post('profile', true);
        $ig = $this->input->post('ig', true);
        $email = $this->input->post('email', true);
        $fb = $this->input->post('fb', true);

        $this->db->set('name', $name);
        $this->db->set('place', $place);
        $this->db->set('profile', $profile);
        $this->db->set('ig', $ig);
        $this->db->set('email', $email);
        $this->db->set('fb', $fb);
        $this->db->set('created_at', 'NOW()', FALSE);

        return $this->db->insert($this->_table);
    }

    public function editSeniman()
    {
        $name = $this->input->post('name', true);
        $place = $this->input->post('place', true);
        $profile = $this->input->post('profile', true);
        $ig = $this->input->post('ig', true);
        $email = $this->input->post('email', true);
        $fb = $this->input->post('fb', true);
        $id = $this->input->post('id', true);

        $this->db->set('name', $name);
        $this->db->set('place', $place);
        $this->db->set('profile', $profile);
        $this->db->set('ig', $ig);
        $this->db->set('email', $email);
        $this->db->set('fb', $fb);

        $this->db->where('id', $id);
        return $this->db->update($this->_table);
    }
}

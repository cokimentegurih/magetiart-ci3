<?php
class User_model extends CI_Model
{
    private $_table = 'user';

    public function getAll()
    {
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->result_array();
    }

    public function getUserByEmailName($email)
    {
        $this->db->where('email', $email);
        $this->db->or_where('username', $email);
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->row_array();
    }

    public function getUserById($id)
    {
        $this->db->where('id', $id);
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->row_array();
    }

    public function changeImage($image)
    {
        return $this->db->set('image', $image);
    }

    public function editUser()
    {
        $name = $this->input->post('name', true);
        $username = $this->input->post('username', true);
        $email = $this->input->post('email', true);
        $phone = $this->input->post('phone', true);
        $adress = $this->input->post('adress', true);
        $role = $this->input->post('role', true);
        $id = $this->input->post('id', true);

        $this->db->set('name', $name);
        $this->db->set('username', $username);
        $this->db->set('email', $email);
        $this->db->set('phone', $phone);
        $this->db->set('adress', $adress);
        if ($role) {
            $this->db->set('role_id', $role);
        }
        $this->db->where('id', $id);
        return $this->db->update($this->_table);
    }

    public function insertUser()
    {
        $name = $this->input->post('name', true);
        $username = $this->input->post('username', true);
        $email = $this->input->post('email', true);
        $phone = $this->input->post('phone', true);
        $adress = $this->input->post('adress', true);
        $password = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);

        $this->db->set('name', $name);
        $this->db->set('username', $username);
        $this->db->set('email', $email);
        $this->db->set('phone', $phone);
        $this->db->set('adress', $adress);
        $this->db->set('password', $password);
        $this->db->set('created_at', 'NOW()', FALSE);

        return $this->db->insert($this->_table);
    }

    public function registerUser()
    {
        $name = 'nama';
        $username = $this->input->post('username', true);
        $email = $this->input->post('email', true);
        $phone = '12345678';
        $image = 'default.jpg';
        $adress = 'Jl. Kota/Kabupaten Provinsi';
        $password = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);

        $this->db->set('name', $name);
        $this->db->set('username', $username);
        $this->db->set('email', $email);
        $this->db->set('phone', $phone);
        $this->db->set('adress', $adress);
        $this->db->set('password', $password);
        $this->db->set('image', $image);
        $this->db->set('role_id', 3);
        $this->db->set('created_at', 'NOW()', FALSE);

        return $this->db->insert($this->_table);
    }

    public function deleteUser($username)
    {
        $this->db->set('created_at', NULL);
        $this->db->where('username', $username);
        return $this->db->update($this->_table);
    }

    public function changePasswordUser($new_password)
    {
        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

        $this->db->set('password', $password_hash);
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update($this->_table);
    }

    public function changePasswordByEmail($email)
    {
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $this->db->set('password', $password);
        $this->db->where('email', $email);
        return $this->db->update($this->_table);
    }

    public function getAdminPhone()
    {
        $this->db->select('phone');
        $this->db->where('role_id', 1);
        $this->db->where('created_at!=', NULL);
        return $this->db->get($this->_table)->result_array();
    }
}

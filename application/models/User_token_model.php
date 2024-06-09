<?php
class User_token_model extends CI_Model
{
    private $_table = 'user_token';

    public function insertToken($user_token)
    {
        $this->db->set('email', $user_token['email']);
        $this->db->set('token', $user_token['token']);
        $this->db->set('created_at', 'NOW()', FALSE);

        return $this->db->insert($this->_table);
    }

    public function getToken($token)
    {
        $this->db->where('token', $token);
        return $this->db->get($this->_table)->row_array();
    }

    public function delete($email)
    {
        $this->db->where('email', $email);
        return $this->db->delete($this->_table);
    }
}

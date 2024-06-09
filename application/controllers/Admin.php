<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    private $_user;
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
        $this->_user = $this->User_model->getUserByEmailName($this->session->userdata('email'));
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard - MagetiArt',
            'currentUser' => $this->_user
        ];

        $this->load->view('admin/templates/head', $data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dashboard/index');
        $this->load->view('admin/templates/footer');
    }

    public function blocked()
    {
        $data = [
            'title' => 'Access Locked',
            'currentUser' => $this->_user,
        ];

        $this->load->view('admin/templates/head', $data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dashboard/blocked');
        $this->load->view('admin/templates/footer');
    }
}

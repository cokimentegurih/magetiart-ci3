<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{
    private $_user;
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_role_model');
        $this->load->model('Submenu_model');
        $this->load->model('User_model');
        $this->_user = $this->User_model->getUserByEmailName($this->session->userdata('email'));
    }

    public function index()
    {
        $data = [
            'title' => 'Role - MagetiArt',
            'sidenav' => 'User',
            'roles' => $this->User_role_model->getAll(),
            'currentUser' => $this->_user
        ];

        $this->load->view('admin/templates/head', $data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/user/role/index');
        $this->load->view('admin/templates/footer');
    }

    public function add()
    {
        $data = [
            'title' => 'Role - MagetiArt',
            'sidenav' => 'User',
            'currentUser' => $this->_user
        ];

        $rules = [
            [
                'field' => 'title',
                'label' => 'Judul',
                'rules' => 'trim|required|is_unique[user_role.title]',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'is_unique' => 'Field %s sudah terdaftar.'
                ]
            ],
        ];

        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == false) {

            $this->load->view('admin/templates/head', $data);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/user/role/add');
            $this->load->view('admin/templates/footer');
        } else {

            $this->User_role_model->insertRole();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Role baru sudah ditambahkan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>');
            redirect('Role');
        }
    }

    public function edit($slug)
    {
        $role = $this->User_role_model->getRoleBySlug($slug);
        $data = [
            'title' => 'Role - MagetiArt',
            'sidenav' => 'User',
            'currentUser' => $this->_user,
            'role' => $role
        ];

        $rules = [
            [
                'field' => 'title',
                'label' => 'Judul',
                'rules' => 'trim|required|is_unique[user_role.title]',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'is_unique' => 'Field %s sudah terdaftar.'
                ]
            ],
        ];

        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == false) {

            $this->load->view('admin/templates/head', $data);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/user/role/edit');
            $this->load->view('admin/templates/footer');
        } else {

            $this->User_role_model->editRole();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Salah satu role sudah diperbarui!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('Role');
        }
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Role - MagetiArt',
            'sidenav' => 'User',
            'role' => $this->User_role_model->getRoleBySlug($slug),
            'submenus' => $this->Submenu_model->getAll(),
            'js' => 'role-script.js',
            'currentUser' => $this->_user
        ];

        $this->load->view('admin/templates/head', $data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/user/role/detail');
        $this->load->view('admin/templates/footer');
    }

    public function changeAccess()
    {
        $submenu_id = $this->input->post('submenuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'submenu_id' => $submenu_id

        ];

        $result = $this->db->get_where('user_access_submenu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_submenu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Access Changed!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            $this->db->delete('user_access_submenu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">Access Changed!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function delete($slug)
    {
        $this->User_role_model->deleteRole($slug);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Salah satu role sudah dihapus!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('Role');
    }
}

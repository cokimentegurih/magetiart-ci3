<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    private $_user;
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Kategori_model');
        $this->load->model('Kategori_karya_model');
        $this->load->model('Karya_model');
        $this->load->model('User_model');
        $this->_user = $this->User_model->getUserByEmailName($this->session->userdata('email'));
    }

    public function index()
    {
        $data = [
            'title' => 'Kategori - MagetiArt',
            'sidenav' => 'Tabel',
            'currentUser' => $this->_user,
            'categories' => $this->Kategori_model->getAllParent()
        ];

        $this->load->view('admin/templates/head', $data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/table/kategori/index');
        $this->load->view('admin/templates/footer');
    }

    public function sub_index($slug)
    {
        $parent = $this->Kategori_model->getKategoriBySlug($slug);
        $data = [
            'title' => 'Kategori - MagetiArt',
            'sidenav' => 'Tabel',
            'currentUser' => $this->_user,
            'parent' => $parent,
            'categories' => $this->Kategori_model->getAllSubForId($parent['id'])
        ];

        $this->load->view('admin/templates/head', $data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/table/kategori/index');
        $this->load->view('admin/templates/footer');
    }

    public function detail($slug)
    {
        $category = $this->Kategori_model->getKategoriBySlug($slug);
        $parent = $this->Kategori_model->getKategoriById($category['parent_id']);
        $data = [
            'title' => 'Kategori - MagetiArt',
            'sidenav' => 'Tabel',
            'currentUser' => $this->_user,
            'parent' => $parent,
            'category' => $category,
            'arts' => $this->Kategori_karya_model->getAllforId($category['id'])
        ];

        $rules = [
            [
                'field' => 'art',
                'label' => 'Aksi',
                'rules' => 'trim|callback_checkbox_check',
            ],
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {

            $this->load->view('admin/templates/head', $data);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/table/kategori/detail');
            return $this->load->view('admin/templates/footer');
        } else {

            $this->Kategori_karya_model->delete();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Data karya dari salah satu kategori sudah dihapus!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('Kategori/detail/' . $category['slug']);
        }
    }

    public function add($slug = '')
    {
        $parent = '';
        if ($slug) {
            $parent = $this->Kategori_model->getKategoriBySlug($slug);
        }
        $data = [
            'title' => 'Kategori - MagetiArt',
            'sidenav' => 'Tabel',
            'currentUser' => $this->_user,
            'parent' => $parent
        ];

        $rules = [
            [
                'field' => 'title',
                'label' => 'Judul',
                'rules' => 'trim|required|is_unique[kategori.title]',
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
            $this->load->view('admin/table/kategori/add');
            return $this->load->view('admin/templates/footer');
        } else {

            if ($parent) {
                $this->Kategori_model->insertKategori($parent['id']);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Sub Kategori baru sudah ditambahkan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                redirect('Kategori/sub_index/' . $parent['slug']);
            } else {
                $this->Kategori_model->insertKategori();
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Kategori baru sudah ditambahkan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                redirect('Kategori');
            }
        }
    }

    function checkbox_check()
    {
        if (!empty($_POST['art'])) return true;
        $this->form_validation->set_message('checkbox_check', 'Field %s harus dipilih minimal 1.');
        return false;
    }

    public function detail_add($slug)
    {
        $category = $this->Kategori_model->getKategoriBySlug($slug);
        $parent = $this->Kategori_model->getKategoriById($category['parent_id']);
        $data = [
            'title' => 'Kategori - MagetiArt',
            'sidenav' => 'Tabel',
            'currentUser' => $this->_user,
            'parent' => $parent,
            'category' => $category,
            'arts' => $this->Kategori_karya_model->getAllexceptId($category['id'])
        ];

        $rules = [
            [
                'field' => 'art',
                'label' => 'Checklist',
                'rules' => 'trim|callback_checkbox_check',
            ],
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {

            $this->load->view('admin/templates/head', $data);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/table/kategori/add_karya');
            return $this->load->view('admin/templates/footer');
        } else {

            $this->Kategori_karya_model->insertKategori($category['id']);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Karya sudah ditambahkan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('Kategori/detail/' . $category['slug']);
        }
    }

    public function edit($slug)
    {
        $category = $this->Kategori_model->getKategoriBySlug($slug);
        $parent = '';
        $parents = '';
        if ($category['parent_id']) {
            $parent = $this->Kategori_model->getKategoriById($category['parent_id']);
            $parents = $this->Kategori_model->getAllParent();
        }

        if ($category['title'] == $this->input->post('title')) {
            $title_rules = 'trim|required';
        } else {
            $title_rules = 'trim|required|is_unique[kategori.title]';
        }

        $data = [
            'title' => 'Kategori - MagetiArt',
            'sidenav' => 'Tabel',
            'currentUser' => $this->_user,
            'category' => $category,
            'parent' => $parent,
            'parents' => $parents
        ];

        $rules = [
            [
                'field' => 'title',
                'label' => 'Judul',
                'rules' => $title_rules,
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
            $this->load->view('admin/table/kategori/edit');
            return $this->load->view('admin/templates/footer');
        } else {

            if ($parent) {
                $this->Kategori_model->editKategori($category['parent_id']);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Sub Kategori sudah diperbarui!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                redirect('Kategori/sub_index/' . $parent['slug']);
            } else {
                $this->Kategori_model->editKategori();
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Kategori sudah diperbarui!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                redirect('Kategori');
            }
        }
    }

    public function delete($slug)
    {
        $this->Kategori_model->deleteKategori($slug);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Salah satu data kategori sudah dihapus!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('Kategori');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dekorasi extends CI_Controller
{
    private $_user;
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Dekorasi_model');
        $this->load->model('Kategori_model');
        $this->load->model('User_model');
        $this->_user = $this->User_model->getUserByEmailName($this->session->userdata('email'));
    }

    public function index()
    {
        $data = [
            'title' => 'Dekorasi - MagetiArt',
            'sidenav' => 'Dekorasi',
            'css' => 'admin/dekorasi/style.css',
            'artworks' => $this->Dekorasi_model->getAllForType('karya'),
            'collections' => $this->Dekorasi_model->getAllForType('koleksi'),
            'artstyles' => $this->Dekorasi_model->getAllForType('kategori'),
            'artists' => $this->Dekorasi_model->getAllForTable('seniman'),
            'newss' => $this->Dekorasi_model->getAllForTable('berita'),
            'currentUser' => $this->_user,
        ];

        $this->load->view('admin/templates/head', $data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/table/dekorasi/index');
        $this->load->view('admin/templates/footer');
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Berita - MagetiArt',
            'sidenav' => 'Tabel',
            'currentUser' => $this->_user,
            'news' => $this->Berita_model->getBeritaBySlug($slug)
        ];

        $this->load->view('admin/templates/head', $data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/table/berita/detail');
        $this->load->view('admin/templates/footer');
    }

    public function file_check($str)
    {
        $allowed_mime_type_arr = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png');
        $allowed_size = 2000000;
        $mime = get_mime_by_extension($_FILES['image']['name']);
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
            if (!in_array($mime, $allowed_mime_type_arr)) {
                $this->form_validation->set_message('file_check', 'File harus berupa gif/jpg/png file.');
                return false;
            }
            if ($_FILES['image']['size'] > $allowed_size) {
                $this->form_validation->set_message('file_check', 'Ukuran file maksimal 2MB.');
                return false;
            }
            return true;
        }
    }

    public function edit($slug)
    {
        $categories = '';
        $decoration = $this->Dekorasi_model->getDekorasiBySlug($slug);
        if ($decoration['type'] == 'koleksi' || $decoration['type'] == 'kategori') {
            $categories = $this->Dekorasi_model->getAllSubExcept($decoration['title']);
        }


        if ($decoration['title'] == $this->input->post('title')) {
            $title_rules = 'trim|required';
        } else {
            $title_rules = 'trim|required|is_unique[dekorasi.title]';
        }

        $data = [
            'title' => 'Dekorasi - MagetiArt',
            'sidenav' => 'Dekorasi',
            'currentUser' => $this->_user,
            'js' => 'img-script.js',
            'decoration' => $decoration,
            'categories' => $categories
        ];

        $rules = [
            [
                'field' => 'title',
                'label' => 'Judul',
                'rules' => $title_rules,
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'is_unique' => 'Field %s sudah terdaftar, pilih yang lain.'
                ]
            ]
        ];
        $this->form_validation->set_rules($rules);

        if (!($decoration['type'] == 'kategori' || $decoration['type'] == 'kategori')) {
            $this->form_validation->set_rules([
                'field' => 'description',
                'label' => 'Deskripsi',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ]);
        }

        $this->form_validation->set_rules('image', 'Gambar', 'callback_file_check');

        if ($this->form_validation->run() == false) {

            $this->load->view('admin/templates/head', $data);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/table/dekorasi/edit');
            return $this->load->view('admin/templates/footer');
        } else {
            // cek jika ada gambar yang akan di-upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './public/img/admin/dekorasi/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $this->input->post('oldImage');
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'public/img/admin/dekorasi/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->Dekorasi_model->changeImage($new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->Dekorasi_model->editDekorasi();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Salah satu data dekorasi sudah diperbarui!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('Dekorasi');
        }
    }

    public function editTable($slug)
    {
        $decoration = $this->Dekorasi_model->getDekorasiBySlug($slug);
        $tables = $this->Dekorasi_model->getAllTableForExcept($decoration['type'], $decoration['slug']);


        if ($decoration['slug'] == $this->input->post('slug')) {
            $slug_rules = 'trim|required';
        } else {
            $slug_rules = 'trim|required|is_unique[dekorasi.slug]';
        }

        $data = [
            'title' => 'Dekorasi - MagetiArt',
            'sidenav' => 'Dekorasi',
            'currentUser' => $this->_user,
            // 'js' => 'img-script.js',
            'decoration' => $decoration,
            'tables' => $tables
        ];

        $rules = [
            [
                'field' => 'slug',
                'label' => 'Judul',
                'rules' => $slug_rules,
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'is_unique' => 'Field %s sudah terdaftar, pilih yang lain.'
                ]
            ]
        ];
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {

            $this->load->view('admin/templates/head', $data);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/table/dekorasi/edit_tables');
            return $this->load->view('admin/templates/footer');
        } else {

            $this->Dekorasi_model->editDekorasiTables();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Salah satu data dekorasi sudah diperbarui!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('Dekorasi');
        }
    }
}

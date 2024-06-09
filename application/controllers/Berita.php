<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    private $_user;
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Berita_model');
        $this->load->model('User_model');
        $this->_user = $this->User_model->getUserByEmailName($this->session->userdata('email'));
    }

    public function index()
    {
        $data = [
            'title' => 'Berita - MagetiArt',
            'sidenav' => 'Tabel',
            'currentUser' => $this->_user,
            'newss' => $this->Berita_model->getAll()
        ];

        $this->load->view('admin/templates/head', $data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/table/berita/index');
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

    public function add()
    {
        $data = [
            'title' => 'Berita - MagetiArt',
            'sidenav' => 'Tabel',
            'currentUser' => $this->_user,
            'js' => 'img-script.js'
        ];

        $rules = [
            [
                'field' => 'title',
                'label' => 'Judul',
                'rules' => 'trim|required|is_unique[berita.title]',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'is_unique' => 'Field %s sudah terdaftar.'
                ]
            ],
            [
                'field' => 'link',
                'label' => 'Sumber Tautan',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
        ];

        $this->form_validation->set_rules($rules);
        $this->form_validation->set_rules('image', 'Gambar', 'callback_file_check');

        if ($this->form_validation->run() == false) {

            $this->load->view('admin/templates/head', $data);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/table/berita/add');
            return $this->load->view('admin/templates/footer');
        } else {

            // cek jika ada gambar yang akan di-upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './public/img/admin/berita/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $image = $this->upload->data('file_name');
                    $this->Berita_model->changeImage($image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->Berita_model->insertBerita();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Karya baru sudah ditambahkan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('Berita');
        }
    }

    public function edit($slug)
    {
        $news = $this->Berita_model->getBeritaBySlug($slug);
        if ($news['title'] == $this->input->post('title')) {
            $title_rules = 'trim|required';
        } else {
            $title_rules = 'trim|required|is_unique[berita.title]';
        }

        $data = [
            'title' => 'Berita - MagetiArt',
            'sidenav' => 'Tabel',
            'currentUser' => $this->_user,
            'js' => 'img-script.js',
            'news' => $news
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
            [
                'field' => 'link',
                'label' => 'Sumber Tautan',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
        ];

        $this->form_validation->set_rules($rules);
        $this->form_validation->set_rules('image', 'Gambar', 'callback_file_check');

        if ($this->form_validation->run() == false) {

            $this->load->view('admin/templates/head', $data);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/table/berita/edit');
            return $this->load->view('admin/templates/footer');
        } else {
            // cek jika ada gambar yang akan di-upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './public/img/admin/berita/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $this->input->post('oldImage');
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'public/img/admin/berita/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->Berita_model->changeImage($new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->Berita_model->editBerita();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Data berita sudah diperbarui!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('Berita');
        }
    }

    public function delete($slug)
    {
        $this->Berita_model->deleteBerita($slug);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Salah satu data berita sudah dihapus!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('Berita');
    }
}

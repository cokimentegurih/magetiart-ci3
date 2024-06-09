<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karya extends CI_Controller
{
    private $_user;
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Karya_model');
        $this->load->model('Seniman_model');
        $this->load->model('User_model');
        $this->_user = $this->User_model->getUserByEmailName($this->session->userdata('email'));
    }

    public function index()
    {
        $data = [
            'title' => 'Karya - MagetiArt',
            'sidenav' => 'Tabel',
            'currentUser' => $this->_user,
            'arts' => $this->Karya_model->getAll()
        ];

        $this->load->view('admin/templates/head', $data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/table/karya/index');
        $this->load->view('admin/templates/footer');
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Karya - MagetiArt',
            'sidenav' => 'Tabel',
            'currentUser' => $this->_user,
            'art' => $this->Karya_model->getKaryaBySlug($slug)
        ];

        $this->load->view('admin/templates/head', $data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/table/karya/detail');
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
            'title' => 'Karya - MagetiArt',
            'sidenav' => 'Tabel',
            'currentUser' => $this->_user,
            'artists' => $this->Seniman_model->getIdName(),
            'js' => 'img-script.js'
        ];

        $rules = [
            [
                'field' => 'title',
                'label' => 'Judul',
                'rules' => 'trim|required|is_unique[karya.title]',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'is_unique' => 'Field %s sudah terdaftar.'
                ]
            ],
            [
                'field' => 'artist',
                'label' => 'Seniman',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus dipilih.'
                ]
            ],
            [
                'field' => 'description',
                'label' => 'Deksripsi Karya',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
            [
                'field' => 'year',
                'label' => 'Tahun',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
            [
                'field' => 'material',
                'label' => 'Material',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
            [
                'field' => 'width',
                'label' => 'Panjang',
                'rules' => 'trim|required|numeric',
                'errors' => [
                    'required' => '%s harus diisi.',
                    'numeric' => '%s harus angka.'
                ]
            ],
            [
                'field' => 'height',
                'label' => 'Lebar',
                'rules' => 'trim|required|numeric',
                'errors' => [
                    'required' => '%s harus diisi.',
                    'numeric' => '%s harus angka.'
                ]
            ],
            [
                'field' => 'quantity',
                'label' => 'Jumlah',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
            [
                'field' => 'price',
                'label' => 'Harga',
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
            $this->load->view('admin/table/karya/add');
            return $this->load->view('admin/templates/footer');
        } else {

            // cek jika ada gambar yang akan di-upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './public/img/admin/karya/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $image = $this->upload->data('file_name');
                    $this->Karya_model->changeImage($image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->Karya_model->insertKarya();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Karya baru sudah ditambahkan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>');
            redirect('Karya');
        }
    }

    public function edit($slug)
    {
        $art = $this->Karya_model->getKaryaBySlug($slug);
        if ($art['title'] == $this->input->post('title')) {
            $title_rules = 'trim|required';
        } else {
            $title_rules = 'trim|required|is_unique[karya.title]';
        }

        $data = [
            'title' => 'Karya - MagetiArt',
            'sidenav' => 'Tabel',
            'currentUser' => $this->_user,
            'js' => 'img-script.js',
            'artists' => $this->Seniman_model->getIdName(),
            'art' => $art
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
                'field' => 'artist',
                'label' => 'Seniman',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus dipilih.'
                ]
            ],
            [
                'field' => 'description',
                'label' => 'Deksripsi Karya',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
            [
                'field' => 'year',
                'label' => 'Tahun',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
            [
                'field' => 'material',
                'label' => 'Material',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
            [
                'field' => 'width',
                'label' => 'Panjang',
                'rules' => 'trim|required|numeric',
                'errors' => [
                    'required' => '%s harus diisi.',
                    'numeric' => '%s harus angka.'
                ]
            ],
            [
                'field' => 'height',
                'label' => 'Lebar',
                'rules' => 'trim|required|numeric',
                'errors' => [
                    'required' => '%s harus diisi.',
                    'numeric' => '%s harus angka.'
                ]
            ],
            [
                'field' => 'quantity',
                'label' => 'Jumlah',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
            [
                'field' => 'price',
                'label' => 'Harga',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
        ];

        $this->form_validation->set_rules($rules);
        $this->form_validation->set_rules('image', 'Foto', 'callback_file_check');

        if ($this->form_validation->run() == false) {

            $this->load->view('admin/templates/head', $data);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/table/karya/edit');
            return $this->load->view('admin/templates/footer');
        } else {
            // cek jika ada gambar yang akan di-upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './public/img/admin/karya/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $this->input->post('oldImage');
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'public/img/admin/karya/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->Karya_model->changeImage($new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->Karya_model->editKarya();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Data karya sudah diperbarui!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('Karya');
        }
    }

    public function delete($slug)
    {
        $this->Karya_model->deleteKarya($slug);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Salah satu data karya sudah dihapus!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('Karya');
    }
}

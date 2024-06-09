<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seniman extends CI_Controller
{
    private $_user;
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Seniman_model');
        $this->load->model('User_model');
        $this->_user = $this->User_model->getUserByEmailName($this->session->userdata('email'));
    }

    public function index()
    {
        $data = [
            'title' => 'Seniman - MagetiArt',
            'sidenav' => 'Tabel',
            'currentUser' => $this->_user,
            'artists' => $this->Seniman_model->getAll()
        ];

        $this->load->view('admin/templates/head', $data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/table/seniman/index');
        $this->load->view('admin/templates/footer');
    }

    public function detail($email)
    {
        $data = [
            'title' => 'Seniman - MagetiArt',
            'sidenav' => 'Tabel',
            'currentUser' => $this->_user,
            'artist' => $this->Seniman_model->getSenimanByEmail($email)
        ];

        $this->load->view('admin/templates/head', $data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/table/seniman/detail');
        $this->load->view('admin/templates/footer');
    }

    public function file_check($str, $imgField)
    {
        $allowed_mime_type_arr = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png');
        $allowed_size = 2000000;
        $mime = get_mime_by_extension($_FILES[$imgField]['name']);
        if (isset($_FILES[$imgField]['name']) && $_FILES[$imgField]['name'] != "") {
            if (!in_array($mime, $allowed_mime_type_arr)) {
                $this->form_validation->set_message('file_check', 'File harus berupa gif/jpg/png file.');
                return false;
            }
            if ($_FILES[$imgField]['size'] > $allowed_size) {
                $this->form_validation->set_message('file_check', 'Ukuran file maksimal 2MB.');
                return false;
            }
            return true;
        }
    }

    public function add()
    {
        $rules = [
            [
                'field' => 'name',
                'label' => 'Nama',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
            [
                'field' => 'place',
                'label' => 'Asal Seniman',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
            [
                'field' => 'profile',
                'label' => 'Profile Seniman',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
            [
                'field' => 'ig',
                'label' => 'Instagram',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|is_unique[seniman.email]',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'valid_email' => 'Field %s tidak valid.',
                    'is_unique' => 'Field %s sudah terdaftar.'
                ]
            ],
            [
                'field' => 'fb',
                'label' => 'Facebook',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
        ];

        $this->form_validation->set_rules($rules);
        $this->form_validation->set_rules('image', 'Foto', 'callback_file_check[image]');
        $this->form_validation->set_rules('cover', 'Sampul', 'callback_file_check[cover]');

        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Seniman - MagetiArt',
                'sidenav' => 'Tabel',
                'currentUser' => $this->_user,
                'js' => 'img-script.js'
            ];

            $this->load->view('admin/templates/head', $data);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/table/seniman/add');
            $this->load->view('admin/templates/footer');
        } else {

            // cek jika ada gambar yang akan di-upload
            $upload_image = $_FILES['image']['name'];
            $upload_cover = $_FILES['cover']['name'];

            if ($upload_image && $upload_cover) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './public/img/admin/seniman/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $image = $this->upload->data('file_name');
                    $this->Seniman_model->changeImage($image);
                } else {
                    echo $this->upload->display_errors();
                }

                if ($this->upload->do_upload('cover')) {
                    $cover = $this->upload->data('file_name');
                    $this->Seniman_model->changeCover($cover);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->Seniman_model->insertSeniman();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Seniman baru sudah ditambahkan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('Seniman');
        }
    }

    public function edit($email)
    {
        $artist = $this->Seniman_model->getSenimanByEmail($email);
        if ($artist['email'] == $this->input->post('email')) {
            $email_rules = 'trim|required|valid_email';
        } else {
            $email_rules = 'trim|required|valid_email|is_unique[seniman.email]';
        }
        $rules = [
            [
                'field' => 'name',
                'label' => 'Nama',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
            [
                'field' => 'place',
                'label' => 'Asal Seniman',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
            [
                'field' => 'profile',
                'label' => 'Profile Seniman',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
            [
                'field' => 'ig',
                'label' => 'Instagram',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => $email_rules,
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'valid_email' => 'Field %s tidak valid.',
                    'is_unique' => 'Field %s sudah terdaftar.'
                ]
            ],
            [
                'field' => 'fb',
                'label' => 'Facebook',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
        ];

        $this->form_validation->set_rules($rules);
        $this->form_validation->set_rules('image', 'Foto', 'callback_file_check[image]');
        $this->form_validation->set_rules('cover', 'Sampul', 'callback_file_check[cover]');

        $data = [
            'title' => 'Seniman - MagetiArt',
            'sidenav' => 'Tabel',
            'currentUser' => $this->_user,
            'js' => 'img-script.js',
            'artist' => $artist
        ];

        if ($this->form_validation->run() == false) {

            $this->load->view('admin/templates/head', $data);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/table/seniman/edit');
            $this->load->view('admin/templates/footer');
        } else {

            // cek jika ada gambar yang akan di-upload
            $upload_image = $_FILES['image']['name'];
            $upload_cover = $_FILES['cover']['name'];

            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './public/img/admin/seniman/';

            $this->load->library('upload', $config);

            if ($upload_image) {
                if ($this->upload->do_upload('image')) {

                    $old_image = $this->input->post('oldImage');
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'public/img/admin/seniman/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->Seniman_model->changeImage($new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            if ($upload_cover) {
                if ($this->upload->do_upload('cover')) {
                    $old_cover = $this->input->post('oldCover');
                    if ($old_cover != 'default.jpg') {
                        unlink(FCPATH . 'public/img/admin/seniman/' . $old_cover);
                    }
                    $new_cover = $this->upload->data('file_name');
                    $this->Seniman_model->changeCover($new_cover);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->Seniman_model->editSeniman();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Data seniman sudah diperbarui!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('Seniman');
        }
    }

    public function delete($email)
    {
        $this->Seniman_model->deleteSeniman($email);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Salah satu data seniman sudah dihapus!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('Seniman');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    private $_user;
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
        $this->load->model('User_role_model');
        $this->_user = $this->User_model->getUserByEmailName($this->session->userdata('email'));
    }

    public function index()
    {
        $data = [
            'title' => 'Profil - MagetiArt',
            'sidenav' => 'User',
            'currentUser' => $this->_user
        ];

        $this->load->view('admin/templates/head', $data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/user/profil/index');
        $this->load->view('admin/templates/footer');
    }

    public function account()
    {
        $data = [
            'title' => 'Akun - MagetiArt',
            'sidenav' => 'User',
            'users' => $this->User_model->getAll(),
            'currentUser' => $this->_user
        ];

        $this->load->view('admin/templates/head', $data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/user/akun/index');
        $this->load->view('admin/templates/footer');
    }

    public function role()
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

    public function detail($username)
    {
        $data = [
            'title' => 'Akun - MagetiArt',
            'sidenav' => 'User',
            'currentUser' => $this->_user,
            'user' => $this->User_model->getUserByEmailName($username)
        ];

        $this->load->view('admin/templates/head', $data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/user/akun/detail');
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
            'title' => 'Akun - MagetiArt',
            'sidenav' => 'User',
            'js' => 'img-script.js',
            'roles' => $this->User_role_model->getAll(),
            'currentUser' => $this->_user
        ];

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
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[8]|is_unique[user.username]',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'min_length' => 'Field %s minimal 8 karakter.',
                    'is_unique' => 'Field %s sudah terdaftar.'
                ]
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|is_unique[user.email]',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'valid_email' => 'Field %s tidak valid.',
                    'is_unique' => 'Field %s sudah terdaftar.'
                ]
            ],
            [
                'field' => 'phone',
                'label' => 'Nomor HP',
                'rules' => 'trim|required|numeric|min_length[8]|max_length[14]',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'numeric' => 'Field %s harus nomor.',
                    'min_length' => 'Field %s minimal 8 karakter.',
                    'max_length' => 'Field %s maksimal 14 karakter.'

                ]
            ],
            [
                'field' => 'adress',
                'label' => 'Alamat',
                'rules' => 'trim|required|min_length[5]',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'min_length' => 'Field %s minimal 5 karakter.'

                ]
            ],
            [
                'field' => 'role',
                'label' => 'Role',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus dipilih.'
                ]
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[8]|matches[konfirmasiPassword]',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'min_length' => 'Field %s minimal 8 karakter.',
                    'matches' => 'Konfirmasi password tidak sama.'
                ]
            ],
            [
                'field' => 'konfirmasiPassword',
                'label' => 'Konfirmasi Password',
                'rules' => 'trim|required|min_length[8]|matches[password]',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'min_length' => 'Field %s minimal 8 karakter.',
                    'matches' => 'Konfirmasi password tidak sama.'
                ]
            ],
        ];

        $this->form_validation->set_rules($rules);
        $this->form_validation->set_rules('image', 'Foto', 'callback_file_check');
        if ($this->form_validation->run() == false) {

            $this->load->view('admin/templates/head', $data);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/user/akun/add');
            $this->load->view('admin/templates/footer');
        } else {
            // cek jika ada gambar yang akan di-upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './public/img/admin/user/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $image = $this->upload->data('file_name');
                    $this->User_model->changeImage($image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->User_model->insertUser();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">User baru sudah ditambahkan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('User/account');
        }
    }

    public function delete($username)
    {
        $this->User_model->deleteUser($username);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Salah satu akun sudah dihapus!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('User/account');
    }

    public function edit($username)
    {
        $roles = '';
        $currentUser = $this->_user;
        $role_rules = '';
        if ($currentUser['username'] != $username) {
            $title = 'Akun - MagetiArt';
            $user = $this->User_model->getUserByEmailName($username);
            if ($user['role_id'] != 1) {
                $roles = $this->User_role_model->getAll();
                $role_rules = 'trim|required';
            }
        } else {
            $title = 'Profil - MagetiArt';
            $user = $currentUser;
        }

        if ($user['username'] == $this->input->post('username')) {
            $username_rules = 'trim|required|min_length[8]';
        } else {
            $username_rules = 'trim|required|min_length[8]|is_unique[user.username]';
        }

        if ($user['email'] == $this->input->post('email')) {
            $email_rules = 'trim|required|valid_email';
        } else {
            $email_rules = 'trim|required|valid_email|is_unique[user.email]';
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
                'field' => 'username',
                'label' => 'Username',
                'rules' => $username_rules,
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'min_length' => 'Field %s minimal 8 karakter.',
                    'is_unique' => 'Field %s sudah terdaftar.'
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
                'field' => 'phone',
                'label' => 'Nomor HP',
                'rules' => 'trim|required|numeric|min_length[8]|max_length[14]',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'numeric' => 'Field %s harus nomor.',
                    'min_length' => 'Field %s minimal 8 karakter.',
                    'max_length' => 'Field %s maksimal 14 karakter.'

                ]
            ],
            [
                'field' => 'adress',
                'label' => 'Alamat',
                'rules' => 'trim|required|min_length[5]',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'min_length' => 'Field %s minimal 5 karakter.'

                ]
            ],
            [
                'field' => 'role',
                'label' => 'Role',
                'rules' => $role_rules,
                'errors' => [
                    'required' => 'Field %s harus dipilih.'
                ]
            ],
        ];

        $this->form_validation->set_rules($rules);
        $this->form_validation->set_rules('image', 'Foto', 'callback_file_check');

        $data = [
            'title' => $title,
            'sidenav' => 'User',
            'js' => 'img-script.js',
            'currentUser' => $currentUser,
            'roles' => $roles,
            'user' => $user
        ];

        if ($this->form_validation->run() == false) {

            $this->load->view('admin/templates/head', $data);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/user/profil/edit');
            $this->load->view('admin/templates/footer');
        } else {
            // cek jika ada gambar yang akan di-upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './public/img/admin/user/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $this->input->post('oldImage');
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'public/img/admin/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->User_model->changeImage($new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->User_model->editUser();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Profil user sudah diperbarui!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            if ($title == 'Akun - MagetiArt') {
                redirect('User/account/');
            } else {
                redirect('User');
            }
        }
    }

    public function changePassword($username)
    {
        $currentUser = $this->_user;
        if ($currentUser['username'] != $username) {
            $title = 'Akun - MagetiArt';
            $user = $this->User_model->getUserByEmailName($username);
        } else {
            $title = 'Profil - MagetiArt';
            $user = $currentUser;
        }

        $rules = [
            [
                'field' => 'passwordLama',
                'label' => 'Password Lama',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'min_length' => 'Field %s minimal 8 karakter.'
                ]
            ],
            [
                'field' => 'password',
                'label' => 'Password Baru',
                'rules' => 'trim|required|min_length[8]|matches[konfirmasiPassword]',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'min_length' => 'Field %s minimal 8 karakter.',
                    'matches' => 'Konfirmasi password tidak sama.'
                ]
            ],
            [
                'field' => 'konfirmasiPassword',
                'label' => 'Konfirmasi Password',
                'rules' => 'trim|required|min_length[8]|matches[password]',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'min_length' => 'Field %s minimal 8 karakter.',
                    'matches' => 'Konfirmasi password tidak sama.'
                ]
            ],
        ];

        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => $title,
                'sidenav' => 'User',
                'currentUser' => $currentUser,
                'user' => $user
            ];

            $this->load->view('admin/templates/head', $data);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/user/profil/password');
            $this->load->view('admin/templates/footer');
        } else {
            $current_password = $this->input->post('passwordLama');
            $new_password = $this->input->post('password');
            if (!password_verify($current_password, $user['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">Password lama tidak sesuai!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                redirect('User/changePassword/' . $user['username']);
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">Password baru tidak boleh sama dengan password lama!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    redirect('User/changePassword/' . $user['username']);
                } else {
                    // password sudah ok
                    $this->User_model->changePasswordUser($new_password);

                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Password user telah diubah!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    if ($title == 'Akun - MagetiArt') {
                        redirect('User/detail/' . $user['username']);
                    } else {
                        redirect('User');
                    }
                }
            }
        }
    }
}

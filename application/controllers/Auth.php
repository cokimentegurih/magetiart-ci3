<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        Parent::__construct();
        $this->load->model('User_model');
        $this->load->model('User_token_model');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('Admin');
        }

        $rules = [
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field %s harus diisi.'
                ]
            ],
        ];
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Halaman Login',
                'css' => 'user/auth/style.css'
            ];
            $this->load->view('user/templates/header', $data);
            $this->load->view('user/auth/login');
            $this->load->view('user/templates/footer');
        } else {
            // validasinya success
            $this->_login();
        }
    }

    public function register()
    {
        if ($this->session->userdata('email')) {
            redirect('Admin');
        }

        $rules = [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[2]|is_unique[user.username]',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'min_length' => 'Field %s minimal 5 karakter.',
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
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Halaman Login',
                'css' => 'user/auth/style.css'
            ];
            $this->load->view('user/templates/header', $data);
            $this->load->view('user/auth/register');
            $this->load->view('user/templates/footer');
        } else {
            // validasinya success
            $this->User_model->registerUser();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">User baru sudah ditambahkan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>');
            $notifs = $this->session->userdata('notifs');
            $notifs['checkout'] = [
                'title' => 'Akun baru telah dibuat!',
                'text' => 'Selamat bergabung di MagetiArt! Silakan lengkapi data diri Anda di menu profil.',
                'date' => date('m/d/Y h:i:s a', time()),
                'image' => 'profil.jpg'
            ];
            $data = [
                'notifs' => $notifs
            ];
            $this->session->set_userdata($data);
            redirect('Auth');
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->User_model->getUserByEmailName($email);
        // jika usernya ada
        if ($user) {
            // cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                $notifs = $this->session->userdata('notifs');
                $notifs['checkout'] = [
                    'title' => 'Selamat datang kembali! Anda sekarang masuk ke MagetiArt.',
                    'text' => 'Jelajahi karya seni terbaru dari komunitas seniman Magetan dan nikmati pengalaman belanja yang unik.',
                    'date' => date('m/d/Y h:i:s a', time()),
                    'image' => 'profile.jpg'
                ];
                $data = [
                    'notifs' => $notifs
                ];
                $this->session->set_userdata($data);
                redirect('Home');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password tidak sesuai.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Email/Username belum didaftarkan.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');

        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Kamu telah logout!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

        redirect('Auth');
    }

    public function forgotPassword()
    {
        $rules = [
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'valid_email' => 'Field %s tidak valid.',
                ]
            ],
        ];
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Halaman Lupa Password',
                'css' => 'user/auth/style.css'
            ];
            $this->load->view('user/templates/header', $data);
            $this->load->view('user/auth/forgot_password');
            $this->load->view('user/templates/footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->User_model->getUserByEmailName($email);

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token
                ];

                $this->User_token_model->insertToken($user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Silakan cek email Anda untuk mengubah password!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Email belum didaftarkan. Silakan daftar dulu!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'amanullah0daffa@gmail.com',
            'smtp_pass' => 'syrn yvep tojb iokb',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('amanullah0daffa@gmail.com', 'Amanullah Daffa');
        $this->email->to($this->input->post('email'));

        if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik link berikut untuk mengubah password Anda : <a href="' . base_url() . 'Auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a><br>Berlaku selama 5 menit.');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->User_model->getUserByEmailName($email);
        if ($user) {
            $user_token = $this->User_token_model->getToken($token);

            if ($user_token) {

                if (time() - $user_token['created_at'] < (60 * 5)) {
                    $this->session->set_userdata('reset_email', $email);
                    $this->changePassword();
                } else {
                    $this->User_token_model->delete($email);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Ubah password gagal! Token kadaluarsa.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Ubah password gagal! Token salah.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Ubah password gagal! Email salah.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('Auth');
        }

        $rules = [
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
                'title' => 'Halaman Ubah Password',
                'css' => 'user/auth/style.css'
            ];
            $this->load->view('user/templates/header', $data);
            $this->load->view('user/auth/change_password');
            $this->load->view('user/templates/footer');
        } else {
            $email = $this->session->userdata('reset_email');

            $this->User_model->changePasswordByEmail($email);

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Password sudah diubah! Silakan login.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('Auth');
        }
    }
}

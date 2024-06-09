<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Dekorasi_model');
    }

    private function isiKeranjang()
    {
        $products_in_cart = (($this->session->userdata('cart'))) ? $this->session->userdata('cart') : [];

        $items = 0;
        if ($products_in_cart) {
            foreach ($products_in_cart as $product => $value) {
                $items += $value;
            }
        }
        $data = [
            'items' => $items
        ];
        return $data;
    }

    public function index()
    {
        $user = '';
        $carts = 0;
        if ($this->session->userdata('email')) {
            $user = $this->User_model->getUserByEmailName($this->session->userdata('email'));
        }
        if ($this->session->userdata('cart')) {
            $carts = $this->isiKeranjang();
        }
        $data = [
            'title' => 'Home - MagetiArt',
            'css' => 'user/home/style.css',
            'user' => $user,
            'items' => ($carts) ? $carts['items'] : '',
            'artworks' => $this->Dekorasi_model->getAllForType('karya'),
            'collections' => $this->Dekorasi_model->getAllForType('koleksi'),
            'artstyles' => $this->Dekorasi_model->getAllForType('kategori'),
            'artists' => $this->Dekorasi_model->getAllForTable('seniman'),
            'newss' => $this->Dekorasi_model->getAllForTable('berita')
        ];

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/home/index');
        $this->load->view('user/templates/footer');
    }

    public function notification()
    {
        $notifs = $this->session->userdata('notifs');
        if ($notifs) {
            $notifs = array_reverse($notifs);
        }
        $data = [
            'title' => 'Home - MagetiArt',
            'css' => 'user/home/notif-style.css',
            'notifs' => $notifs
        ];

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/home/notif');
        $this->load->view('user/templates/footer');
    }

    public function deleteNotif()
    {
        $this->session->unset_userdata('notifs');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Notifikasi telah dibaca semua!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('Home/notification');
    }
}

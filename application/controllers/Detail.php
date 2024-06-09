<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karya_model');
        $this->load->model('Seniman_model');
        $this->load->model('User_model');
    }

    public function karya($slug)
    {
        $data = [
            'title' => 'Detail - MagetiArt',
            'css' => 'user/detail/karya-style.css',
            'art' => $this->Karya_model->getKaryaBySlug($slug),
            'collections' => $this->Karya_model->getAllLimit(3),
        ];

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/detail/karya');
        $this->load->view('user/templates/footer');
    }

    public function checkout($slug)
    {
        $user = '';
        if ($this->session->userdata('email')) {
            $user = $this->User_model->getUserByEmailName($this->session->userdata('email'));
        }

        $product = $this->Karya_model->getKaryaBySlug($slug);
        $price = intval(str_replace('.', '', trim($product['price'], "IDR")));

        $data = [
            'title' => 'Checkout - MagetiArt',
            'css' => 'user/keranjang/style.css',
            'user' => $user,
            'products_in_cart' => 1,
            'product' => $product,
            'subtotal' => $price,
            'items' => 1
        ];

        $rules = [
            [
                'field' => 'name',
                'label' => 'Nama',
                'rules' => 'trim|required|min_length[4]',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'min_length' => 'Field %s minimal 4 karakter.',

                ]
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'valid_email' => 'Field %s tidak valid.'
                ]
            ],
            [
                'field' => 'phone',
                'label' => 'Nomor WA',
                'rules' => 'trim|required|numeric|min_length[8]|max_length[14]',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'numeric' => 'Field %s harus nomor.',
                    'min_length' => 'Field %s minimal 8 karakter.',
                    'max_length' => 'Field %s maksimal 14 karakter.'
                ]
            ],
            [
                'field' => 'address',
                'label' => 'Alamat Lengkap',
                'rules' => 'trim|required|min_length[5]',
                'errors' => [
                    'required' => 'Field %s harus diisi.',
                    'min_length' => 'Field %s minimal 5 karakter.',

                ]
            ],
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {
            $this->load->view('user/templates/header', $data);
            $this->load->view('user/detail/form');
            $this->load->view('user/templates/footer');
        } else {
            $pesan = "";

            date_default_timezone_set('Asia/Bangkok');
            $pesan = "Pemesanan Karya Seni MagetiArt
                \nInformasi Pemesan
                \nNama : " . $this->input->post('name') .
                "\nEmail : " . $this->input->post('email') .
                "\nNomor WA : " . $this->input->post('phone') .
                "\nAlamat : " . $this->input->post('address') .
                "\nTanggal : " . date('m/d/Y h:i:s a', time()) . "\n";
            $i = 1;

            $pesan .=
                "\nNomor : " . $i .
                "\nJudul : " . $product['title'] .
                "\nHarga Satuan " . $product['price'] .
                "\nJumlah : 1
                \nTotal Harga: " . $product['price'] . "\n";
            $i++;

            $pesan .= "\nTotal Pembayaran : IDR " . $product['price'];
            $pesan .= "\n\nSilakan hubungi nomor berikut jika terjadi masalah :
            ";

            $contacts = $this->User_model->getAdminPhone();
            foreach ($contacts as $contact) {
                $pesan .= "\n" . $contact['phone'] . " .";
            }
            $pesan .= "\nTerima kasih atas pesanan Anda!";
            $whatsapp = "'https://wa.me/6285853316491?text=' + encodeURIComponent(`" . $pesan . "`)";

            echo "<script>window.open('https://wa.me/6285853316491?text=' + encodeURIComponent(`" . $pesan . "`));</script>";

            $notifs = $this->session->userdata('notifs');
            $notifs['checkout_' . rand()] = [
                'title' => 'Kamu telah checkout keranjang belanja!',
                'text' => 'Silakan lanjutkan pemesanan (Continue to Chat) melalui Whatsapp dengan nomor tertera. Apabila ada masalah hubungi juga nomor lain yang telah disajikan.',
                'date' => date('m/d/Y h:i:s a', time()),
                'image' => 'transport.png'
            ];
            $data = [
                'notifs' => $notifs
            ];
            $this->session->set_userdata($data);

            $pesan .= "\n\n
            🚚 Status Pengiriman:
            Pesanan Anda akan segera diproses dan dikirimkan dengan cinta dan kehati-hatian. Kami akan memberi tahu Anda melalui email ketika pesanan Anda sudah dalam perjalanan menuju rumah Anda.

            📧 Hubungi Kami:
            Jika Anda memiliki pertanyaan atau membutuhkan bantuan lebih lanjut, tim layanan pelanggan kami siap membantu. Hubungi kami melalui nomor di atas.";

            $pesan .= "\n
            Terima kasih atas dukungan Anda terhadap MagetiArt! Kami berharap pesanan Anda membawa kebahagiaan dan inspirasi yang tak terhingga.

            Salam Seni,
            Tim MagetiArt 🎨✨";

            $this->session->set_flashdata('message', nl2br($pesan));
            $this->session->set_flashdata('whatsapp', $whatsapp);
            echo "<script>window.location.href=' " . base_url('Keranjang') . "';</script>";
        }
    }

    public function seniman($email)
    {
        $artist = $this->Seniman_model->getSenimanByEmail($email);
        $data = [
            'title' => 'Detail - MagetiArt',
            'css' => 'user/detail/seniman-style.css',
            'artist' => $artist,
            'collections' => $this->Karya_model->getAllBySeniman($artist['id'], 4),
        ];

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/detail/seniman');
        $this->load->view('user/templates/footer');
    }

    public function kustom()
    {
        $data = [
            'title' => 'Kustom - MagetiArt',
            'css' => 'user/detail/kustom-style.css',
        ];

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/detail/kustom');
        $this->load->view('user/templates/footer');
    }

    public function detailKustom()
    {
        $data = [
            'title' => 'Kustom - MagetiArt',
            'css' => 'user/detail/kustom-style.css',
        ];

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/detail/detail-kustom');
        $this->load->view('user/templates/footer');
    }
}

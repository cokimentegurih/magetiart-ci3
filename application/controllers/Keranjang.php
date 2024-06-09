<?php
class Keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karya_model');
        $this->load->model('User_model');
    }

    public function index()
    {
        $carts = $this->isiKeranjang();
        $data = [
            'title' => 'Keranjang - MagetiArt',
            'css' => 'user/keranjang/style.css',
            'products_in_cart' => $carts['products_in_cart'],
            'products' => $carts['products'],
            'subtotal' => $carts['subtotal'],
            'items' => $carts['items']
        ];
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/keranjang/index');
        $this->load->view('user/templates/footer');
    }

    public function checkout()
    {
        $carts = $this->isiKeranjang();
        if (empty($carts['products'])) {
            echo "<script>alert('Keranjang belanja masih kosong.')</script>";
            echo "<script>window.location.href='" . base_url('Keranjang') . "';</script>";
        }
        $user = '';
        if ($this->session->userdata('email')) {
            $user = $this->User_model->getUserByEmailName($this->session->userdata('email'));
        }

        $data = [
            'title' => 'Checkout - MagetiArt',
            'css' => 'user/keranjang/style.css',
            'user' => $user,
            'products_in_cart' => $carts['products_in_cart'],
            'products' => $carts['products'],
            'subtotal' => $carts['subtotal'],
            'items' => $carts['items']
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
            $this->load->view('user/keranjang/form');
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

            foreach ($carts['products'] as $product) {
                $pesan .=
                    "\nNomor : " . $i .
                    "\nJudul : " . $product['title'] .
                    "\nHarga Satuan " . $product['price'] .
                    "\nJumlah : " . $carts['products_in_cart'][$product['id']] .
                    "\nTotal Harga: IDR " . number_format("" . (float)intval(str_replace('.', '', trim($product['price'], "IDR"))) * (int)$carts['products_in_cart'][$product['id']] . "", 0, ",", ".") . "\n";
                $i++;
            }

            $pesan .= "\nTotal Pembayaran : IDR " . number_format("" . $carts['subtotal'] . "", 0, ",", ".");
            $pesan .= "\n\nSilakan hubungi nomor berikut jika terjadi masalah :
            ";

            $contacts = $this->User_model->getAdminPhone();
            foreach ($contacts as $contact) {
                $pesan .= "\n" . $contact['phone'] . " .";
            }
            $pesan .= "\nTerima kasih atas pesanan Anda!";
            $whatsapp = "'https://wa.me/6285853316491?text=' + encodeURIComponent(`" . $pesan . "`)";

            echo "<script>window.open('https://wa.me/6285853316491?text=' + encodeURIComponent(`" . $pesan . "`));</script>";
            $this->session->unset_userdata('cart');

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

    private function isiKeranjang()
    {
        $products_in_cart = (($this->session->userdata('cart'))) ? $this->session->userdata('cart') : [];

        $products = [];
        $subtotal = 0.00;
        $items = 0;
        if ($products_in_cart) {
            $products = $this->Karya_model->getManyKaryaById(array_keys($products_in_cart));

            foreach ($products as $product) {
                $items += $products_in_cart[$product['id']];
                $product['price'] = intval(str_replace('.', '', trim($product['price'], "IDR")));
                $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
            }
        }
        $data = [
            'products_in_cart' => $products_in_cart,
            'products' => $products,
            'subtotal' => $subtotal,
            'items' => $items
        ];
        return $data;
    }

    public function update()
    {
        if ($this->input->method() === 'post') {
            $product_id = $this->input->post('product_id');

            $quantity = 1;
            $product = $this->Karya_model->getKaryaById($product_id);
            $carts = $this->session->userdata('cart');
            $notifs = $this->session->userdata('notifs');
            if ($product) {
                if (($this->input->post('add'))) {
                    if ($carts) {
                        if (array_key_exists($product_id, $carts)) {
                            if ($carts[$product_id] >= $product['quantity']) {
                                $carts[$product_id] = $product['quantity'];
                            } else {
                                $carts[$product_id] += $quantity;
                            }
                        } else {
                            $carts[$product_id] = $quantity;
                            $notifs['cart_' . $product_id] = [
                                'title' => 'Produk ditambahkan ke keranjang!',
                                'text' => $product['title'] . ' ditambahkan ke keranjang. Silakan cek keranjang belanja Anda.',
                                'date' => date('m/d/Y h:i:s a', time()),
                                'image' => 'shopping.png'
                            ];
                        }
                    } else {
                        $carts = [
                            $product_id => $quantity
                        ];
                        $notifs['cart_' . $product_id] = [
                            'title' => 'Produk ditambahkan ke keranjang!',
                            'text' => $product['title'] . ' ditambahkan ke keranjang. Silakan cek keranjang belanja Anda.',
                            'date' => date('m/d/Y h:i:s a', time()),
                            'image' => 'shopping.png'
                        ];
                    }
                }
                if (($this->input->post('minus'))) {
                    if ($carts) {
                        if (array_key_exists($product_id, $carts)) {
                            if ($carts[$product_id] == 1) {
                                $carts[$product_id] = [];
                                unset($carts[$product_id]);
                                $notifs['cart_' . $product_id] = [
                                    'title' => 'Produk dikeluarkan dari keranjang!',
                                    'text' => $product['title'] . ' dikeluarkan dari keranjang. Silakan cek keranjang belanja Anda.',
                                    'date' => date('m/d/Y h:i:s a', time()),
                                    'image' => 'shopping.png'
                                ];
                            } else {
                                $carts[$product_id] -= $quantity;
                            }
                        }
                    }
                }
                if (($this->input->post('delete'))) {
                    $carts[$product_id] = [];
                    unset($carts[$product_id]);
                    $notifs['cart_' . $product_id] = [
                        'title' => 'Produk dikeluarkan dari keranjang!',
                        'text' => $product['title'] . ' dikeluarkan dari keranjang. Silakan cek keranjang belanja Anda.',
                        'date' => date('m/d/Y h:i:s a', time()),
                        'image' => 'shopping.png'
                    ];
                }
            }

            if (!empty($carts)) {
                $data = [
                    'cart' => $carts
                ];
                $this->session->set_userdata($data);
            } else {
                $this->session->unset_userdata('cart');
            }

            if (isset($notifs)) {
                $data = [
                    'notifs' => $notifs
                ];
                $this->session->set_userdata($data);
                // echo '<pre>';
                // var_dump($this->session->userdata('notifs'));
                // echo '</pre>';
                // die;
            } else {
                $this->session->unset_userdata('notifs');
            }
        }
        redirect('Keranjang');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('Karya_model');
        $this->load->model('Seniman_model');
        $this->load->model('Berita_model');
    }

    public function index()
    {
        $arts = $this->Karya_model->getAll();
        if ($this->input->post('keyword')) {
            $arts = $this->Karya_model->getKaryaByKeyword();
        }
        $data = [
            'title' => 'Produk - MagetiArt',
            'css' => 'user/produk/style.css',
            'arts' => $arts,
            'categories' => $this->Kategori_model->getAll()

        ];

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/produk/header');
        $this->load->view('user/produk/sidebar');
        $this->load->view('user/produk/index');
        $this->load->view('user/templates/footer');
    }

    public function category($slug)
    {
        $subcategory = $this->Kategori_model->getKategoriBySlug($slug);
        $arts = $this->Karya_model->getFilterById($subcategory['id']);
        if ($this->input->post('keyword')) {
            $arts = $this->Karya_model->getFilterByKeyword($subcategory['id']);
        }
        $data = [
            'title' => $subcategory['title'] . ' - MagetiArt',
            'css' => 'user/produk/style.css',
            'arts' => $arts,
            'subcategory' => $subcategory['slug'],
            'categories' => $this->Kategori_model->getAll()
        ];

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/produk/header');
        $this->load->view('user/produk/sidebar');
        $this->load->view('user/produk/index');
        $this->load->view('user/templates/footer');
    }

    public function seniman()
    {
        $products = $this->Seniman_model->getAll();
        if ($this->input->post('keyword')) {
            $products = $this->Seniman_model->getSenimanByKeyword();
        }
        $data = [
            'title' => 'Daftar Seniman - MagetiArt',
            'css' => 'user/produk/style.css',
            'products' => $products,
            'categories' => $this->Kategori_model->getAll()

        ];

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/produk/header');
        $this->load->view('user/produk/sidebar');
        $this->load->view('user/produk/product');
        $this->load->view('user/templates/footer');
    }

    public function bySeniman($email)
    {
        $artist = $this->Seniman_model->getSenimanByEmail($email);
        $data = [
            'title' => $artist['name'] . ' - MagetiArt',
            'css' => 'user/produk/style.css',
            'arts' => $this->Karya_model->getAllBySeniman($artist['id']),
            'artist' => $artist,
            'artists' => $this->Seniman_model->getAll()
        ];

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/produk/by-seniman/header');
        $this->load->view('user/produk/by-seniman/sidebar');
        $this->load->view('user/produk/index');
        $this->load->view('user/templates/footer');
    }

    public function berita()
    {
        $products = $this->Berita_model->getAll();
        if ($this->input->post('keyword')) {
            $products = $this->Berita_model->getBeritaByKeyword();
        }
        $data = [
            'title' => 'Daftar Berita - MagetiArt',
            'css' => 'user/produk/style.css',
            'products' => $products,
            'categories' => $this->Kategori_model->getAll()

        ];

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/produk/header');
        $this->load->view('user/produk/sidebar');
        $this->load->view('user/produk/product');
        $this->load->view('user/templates/footer');
    }
}

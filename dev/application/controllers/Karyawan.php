<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends Backend_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('user_helper');
        $this->load->model('Karyawan_model');
    }
    public function index()
    {
        $data['page'] = "karyawan";
        $data['script'] = "tables";
        $data['record'] = $this->Karyawan_model->getAll();
        $this->site->view($data);
    }

    public function action($param)
    {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            if ($param == 'ambil') {
            }
            if ($param == 'tambah') {
                $post = $this->input->post(null, true);
                $upload_image = $_FILES['image']['name'];

                if ($upload_image) {
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './upload/avatars/';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('image')) {
                        echo "Gambar Gagal Upload. Gambar harus bertipe gif|jpg|png dan max size 2mb";
                        die();
                    } else {
                        $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
                        $image = $data['upload_data']['file_name'];
                        $data['photo'] = $this->upload->data('file_name');
                    }
                }
                $data = [
                    'nip' => $post['nip'],
                    'name' => $post['full_name'],
                    'email' => $post['email'],
                    'phone' => $post['phone'],
                    'active' => 1,
                ];
                // $this->Karyawan_model->insert($data);
                echo json_encode(['response' => 'success', 'data' => $data]);
            }
        }
    }

    public function newKaryawan()
    {
        $data = array(
            'nip' => rand(),
            'name' => GeraHash(10),
            'email' => 'admin@gmail.com',
            'phone' => '0857' + rand(),
            'active' => 1
        );
        $this->db->set($data);
        $this->db->insert('karyawan');
        echo "sukses";
    }
}

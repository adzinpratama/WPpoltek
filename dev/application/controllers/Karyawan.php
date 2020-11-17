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
        // $data['record'] = $this->db->Karyawan_model->getAll();
        $this->site->view($data);
    }

    public function action($param)
    {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            if ($param == 'ambil') {
                if ($this->input->is_ajax_request()) {

                    $record = $this->Karyawan_model->getAll();
                    $data = array('responce' => 'success', 'posts' => $record);
                    echo json_encode($data);
                }
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

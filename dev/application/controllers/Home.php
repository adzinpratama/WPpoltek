<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Frontend_Controller
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
    public $post;
    public function index()
    {
        $data = [
            'name' => '',
            'email' => '',
            'nip' => '',
            'photo' => '',
            'record' => $this->Absen_model->getAbsen()
        ];

        $this->site->view($data);
    }
    public function absen()
    {
        $post = $this->input->post('nip', true);
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('nothing', 'Nip Tidak Boleh Kosong');
            redirect('home');
        } else {
            $this->db->where('nip', $post);
            $cek = $this->db->get('karyawan')->row_array();
            if ($cek) {
                $this->post = $post;
                // $this->session->set_flashdata('command', 'perintah');


                // $data = [
                //     'name' => $cek['name'],
                //     'email' => $cek['email'],
                //     'nip' => $cek['nip'],
                //     'photo' => $cek['photo'],
                //     'record' => $this->Absen_model->getAbsen()
                // ];

                // $this->site->view($data);
                $post = $this->post;
                $this->db->insert('absen', array('nip' => $post));
                $this->session->set_flashdata('notif', 'Berhasil');
                redirect('home');
            } else {
                $this->session->set_flashdata('nothing', 'Nip Anda Tidak Terdaftar');
                redirect('home');
            }
        }





        // return  json_encode(['status' => 'success']);

    }
    public function confirm()
    {
        $post = $this->post;
        $this->db->insert('absen', array('nip' => $post));
        $this->session->set_flashdata('notif', 'Berhasil');
        redirect('home');
    }
}

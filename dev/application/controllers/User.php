<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends Backend_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('user_helper');
    }
    public function index()
    {
        $data['user'] = $this->User_model->getAll();
        $data['page'] = "user";
        $data['script'] = "user";
        $this->site->view($data);
    }

    public function login()
    {

        $post = $this->input->post(NULL, TRUE);
        $this->pass = $this->input->post('password');

        if (isset($post['username'])) {
            $this->user_detail = $this->User_model->getLogin(array('username' => $post['username']), array('email' => $post['username']));
        }
        $this->form_validation->set_message('required', '%s kosong,Tolong diisi !');
        $rules = $this->User_model->rules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $login_data = array(
                'ID' => $this->user_detail->ID,
                'username' => $post['username'],
                'full_name' => $this->user_detail->full_name,
                'logged_in' => TRUE,
                'active' => $this->user_detail->active,
                'last_login' => $this->user_detail->last_login,
                'group' => $this->user_detail->group,
                'email' => $this->user_detail->email,
                'image' => $this->user_detail->photo
            );
            $this->session->set_userdata($login_data);

            if (isset($post['remember'])) {
                $expire = time() + (86400 * 7);
                set_cookie('username', $post['username'], $expire, "/");
                set_cookie('password', $post['password'], $expire, "/");
            }
            $this->db->where('ID', $this->user_detail->ID);
            $this->db->update('user', ['last_login' => date('Y-m-d H:i:s')]);

            redirect('dashboard');
        }
    }
    public function password_check($str)
    {
        $user_detail = $this->user_detail;
        if (@$user_detail->password == crypt($str, @$user_detail->password)) {
            return TRUE;
        } else if (@$user_detail->password) {
            $this->form_validation->set_message('password_check', 'Password Salah !');
            return FALSE;
        } else {
            $this->form_validation->set_message('password_check', 'Anda tidak memiliki hak akses admin ! ');
            return FALSE;
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('user/login');
    }
    public function action($param)
    {

        if ($param == 'add') {
            $post = $this->input->post(null, true);
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './upload/avatars/';
                // $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    // echo "Gambar Gagal Upload. Gambar harus bertipe gif|jpg|png dan max size 2mb";
                    // die();
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error);
                } else {
                    $data['photo'] = $this->upload->data('file_name');
                    // print_r($this->upload->data());
                    // die();
                }
            }
            $data = [
                'username' => $post['username'],
                'full_name' => $post['full_name'],
                'group' => $post['group'],
                'password' => bCrypt($post['password'], 12),
                'email' => $post['email'],
                'phone' => $post['phone'],
                'active' => 1,
            ];
            $this->User_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
            redirect('user');
        } else if ($param == 'get') {
            $post = $this->input->post(NULL, TRUE);
            if (!empty($post['id'])) {
                echo json_encode(array(
                    'status' => 'success',
                    'data' => $this->User_model->get($post['id'])
                ));
            }
        }
    }

    public function delete()
    {
        $this->db->where('ID', $this->input->post('id'));
        $this->db->delete('user');
        echo json_encode(['status' => 'success']);
    }

    public function newUser()
    {
        $data = array(
            'username' => 'admin',
            'full_name' => 'Admin',
            'group' => 'admin',
            'password' => bCrypt('admin', 12),
            'email' => 'admin@gmail.com',
            'phone' => '085701727153',
            'active' => 1
        );
        $this->db->set($data);
        $this->db->insert('user');
        echo "sukses";
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backend_Controller extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['User_model', 'Karyawan_model', 'Absen_model']);
        $user_session = $this->session->userdata;
        if ($this->uri->segment(2) == 'login') {
            if (isset($user_session['logged_in']) && $user_session['logged_in'] == TRUE && $user_session['group'] == 'admin') {
                redirect(base_url('dashboard'));
            }
        } else {
            if (!isset($user_session['logged_in']) || $user_session['group'] != 'admin') {
                $this->session->sess_destroy();
                redirect(base_url('user/login'));
            }
        }

        $this->site->menu = array(
            1 => array(
                'location' => 'dashboard',
                'menu_title' => 'Dashboard',
                'icon' => 'tachometer'
            ),
            2 => array(
                'location' => 'user',
                'menu_title' => 'User',
                'icon' => 'users'
            ),
            3 => array(
                'location' => 'karyawan',
                'menu_title' => 'Karyawan',
                'icon' => 'github-alt'
            ),
            4 => array(
                'location' => 'absen',
                'menu_title' => 'Absensi',
                'icon' => 'book'
            )

        );
        $this->site->side = 'backend';
    }
}

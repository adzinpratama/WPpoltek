<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backend_Controller extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');

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
            )
        );
    }
}

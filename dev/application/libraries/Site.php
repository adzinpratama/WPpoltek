<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site
{
    public $menu;

    function view($data = NULL)
    {
        $data['menu'] = $this->menu;

        $CI = &get_instance();
        $CI->load->view('index', $data);
    }
}

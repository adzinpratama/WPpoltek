<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site
{
    public $menu;
    public $side;

    function view($data = NULL, $pages = NULL)
    {
        $data['menu'] = $this->menu;

        $CI = &get_instance();
        $pages ? $CI->load->view($this->side . '/' . $pages, $data) : $CI->load->view($this->side . '/index', $data);
    }
}

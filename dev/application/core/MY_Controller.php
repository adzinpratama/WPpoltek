<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library(array('Site'));
        $this->load->helper('template_helper');
    }
}

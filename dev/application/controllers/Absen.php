<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {

        $data['page'] = "absen ";
        $this->load->view('index', $data);
    }
}

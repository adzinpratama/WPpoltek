<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends Backend_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {

        $data['page'] = "absensi";
        $this->site->view($data);
    }
}

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
        $data['record'] = $this->Absen_model->getAbsen();
        // print_r($data);
        // die();
        $data['page'] = "absensi";
        $data['script'] = ['absen', 'custom'];
        $this->site->view($data);
    }
    public function action($param)
    {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            if ($param == 'ambil') {
                $list = $this->Absen_model->getAbsen();
                $data = array();
                foreach ($list as $field) {
                    $no = 1;
                    $row = array();
                    $row[] = $no;
                    $row[] = $field['nip'];
                    $row[] = $field['name'];
                    $row[] = $field['email'];
                    $row[] = $field['time'];;
                    $no++;
                    $data[] = $row;
                }

                $output = array(
                    // "draw" => $_POST['draw'],
                    // "recordsTotal" => $this->Karyawan_model->count_all(),
                    // "recordsFiltered" => $this->Karyawan_model->count_filtered(),
                    "data" => $data,
                );
                //output dalam format JSON
                echo json_encode($output);
            }
        }
    }
}

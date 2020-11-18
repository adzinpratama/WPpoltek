<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends Backend_Controller
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

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('user_helper');
        $this->load->model('Karyawan_model');
    }
    public function index()
    {
        $data['page'] = "karyawan";
        $data['script'] = "tables";
        // $data['record'] = $this->db->Karyawan_model->getAll();
        $this->site->view($data);
    }

    public function action($param)
    {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            if ($param == 'ambil') {
                $list = $this->Karyawan_model->getAll();
                $data = array();
                foreach ($list as $field) {
                    $row = array();
                    $row[] = '<label class="pos-rel">
                    <input type="checkbox" class="ace" />
                    <span class="lbl"></span>
                </label>';
                    $row[] = $field['nip'];
                    $row[] = $field['name'];
                    $row[] = $field['email'];
                    $row[] = '<div class="hidden-sm hidden-xs action-buttons">
                    <a class="blue" href="karyawan/view/' . $field["ID"] . '">
                        <i class="ace-icon fa fa-search-plus bigger-130"></i>
                    </a>

                    <a class="green" href="karyawan/edit/' . $field["ID"] . '">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>

                    <a class="red" href="#" id="hapus" data-id="' . $field["ID"] . '">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                    </a>
                </div>

                <div class="hidden-md hidden-lg">
                    <div class="inline pos-rel">
                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                            <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                            <li>
                                <a href="karyawan/action/view?id=' . $field["ID"] . '" class="tooltip-info" data-rel="tooltip" title="View">
                                    <span class="blue">
                                        <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                    </span>
                                </a>
                            </li>

                            <li>
                                <a href="karyawan/action/edit?id=' . $field["ID"] . '" class="tooltip-success" data-rel="tooltip" title="Edit">
                                    <span class="green">
                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                    </span>
                                </a>
                            </li>

                            <li>
                                <a href="#" id="hapus" data-id="' . $field["ID"] . '" class="tooltip-error" data-rel="tooltip" title="Delete">
                                    <span class="red">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>';
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
            if ($param == 'tambah') {
                $post = $this->input->post(null, true);
                $upload_image = $_FILES['image']['name'];
                $data = [
                    'nip' => $post['nip'],
                    'name' => $post['full_name'],
                    'email' => $post['email'],
                    'phone' => $post['phone'],
                    'active' => 1,
                ];

                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 500;
                $config['upload_path'] = './upload/avatars/';
                // $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                if ($upload_image) {
                    if (!$this->upload->do_upload('image')) {
                        $error = $this->upload->display_errors();
                        echo json_encode(['response' => 'failed', 'error' => $error]);
                    } else {
                        $photo = $this->upload->data('file_name');
                        $data['photo'] = $photo;
                    }
                }
                $this->Karyawan_model->insert($data);
                echo json_encode(['response' => 'success', 'data' => $data]);
            }
        }
    }
    public function edit($param)
    {
        $data['record'] = $this->Karyawan_model->get($param);
        $data['page'] = "form_edit";
        $this->site->view($data);
    }
    public function view($param)
    {
        $data['record'] = $this->Karyawan_model->get($param);
        // var_dump($data);
        // die();
        $data['page'] = "edit_form";
        $this->site->view($data);
    }

    public function do_update()
    {
        $post = $this->input->post(null, true);
        $upload_image = $_FILES['image']['name'];
        $data = [
            'nip' => $post['nip'],
            'name' => $post['full_name'],
            'email' => $post['email'],
            'phone' => $post['phone'],
            'active' => 1
        ];

        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 500;
        $config['upload_path'] = './upload/avatars/';
        // $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($upload_image) {
            if (!$this->upload->do_upload('image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', '<div class="alert alert-info">' . $error . '</div>');
            } else {
                $photo = $this->upload->data('file_name');
                $data['photo'] = $photo;
            }
        }



        $this->Karyawan_model->update($post['id'], $data);
        $this->session->set_flashdata('notif', '<div class="alert alert-success">Data Berhasil DiUpdate !</div>');
        redirect('admin/karyawan');
    }
    public function delete()
    {
        $this->Karyawan_model->delete($this->input->post('id'));
        echo json_encode(['status' => 'success']);
    }

    public function newKaryawan()
    {
        $data = array(
            'nip' => rand(),
            'name' => GeraHash(10),
            'email' => 'admin@gmail.com',
            'phone' => '0857' + rand(),
            'active' => 1
        );
        $this->db->set($data);
        $this->db->insert('karyawan');
        echo "sukses";
    }
}

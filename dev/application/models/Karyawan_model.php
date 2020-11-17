<?php defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{
    protected $_table_name = 'karyawan';


    function __construct()
    {
        parent::__construct();
    }
    function get($id)
    {

        $this->db->where('ID', $id);
        return $this->db->get($this->_table_name)->row_array();
    }

    function getAll()
    {
        return $this->db->get($this->_table_name)->result_array();
    }

    function insert($data)
    {

        $this->db->set($data);
        $this->db->insert($this->_table_name);
        $id = $this->db->insert_id();
        return $id;
    }
}

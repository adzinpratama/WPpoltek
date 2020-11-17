<?php defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{
    protected $_table_name = 'karyawan';
    protected $column_order = array('nip', 'name', 'email'); //field yang ada di table user
    protected $column_search = array('nip', 'name', 'email'); //field yang diizin untuk pencarian 
    protected $order = array('ID' => 'asc'); // default order 


    function __construct()
    {
        parent::__construct();
    }
    function get($id)
    {

        $this->db->where('ID', $id);
        return $this->db->get($this->_table_name)->row();
    }

    function getAll()
    {
        return $this->db->get($this->_table_name)->result();
    }

    function insert($data)
    {

        $this->db->set($data);
        $this->db->insert($this->_table_name);
        $id = $this->db->insert_id();
        return $id;
    }
}

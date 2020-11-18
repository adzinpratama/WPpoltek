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
        return $this->db->get($this->_table_name)->row_array();
    }

    function getAll()
    {
        return $this->db->get($this->_table_name)->result_array();
    }
    function update($id, $data)
    {
        $this->db->where('ID', $id);
        $this->db->set($data);
        return $this->db->update($this->_table_name);
    }

    function insert($data)
    {

        $this->db->set($data);
        $this->db->insert($this->_table_name);
        $id = $this->db->insert_id();
        return $id;
    }

    function count_filtered()
    {
        // $this->_get_datatables_query();
        $query = $this->db->get($this->_table_name);
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->_table_name);
        return $this->db->count_all_results();
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->_table_name);
    }
}

<?php defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_model extends MY_Model
{
    protected $_table_name = 'karyawan';
    protected $_primary = 'ID';


    function __construct()
    {
        parent::__construct();
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
}

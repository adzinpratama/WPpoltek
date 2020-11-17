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
    private function _get_datatables_query()
    {

        $this->db->from($this->_table_name);

        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
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

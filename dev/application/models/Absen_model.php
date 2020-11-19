<?php defined('BASEPATH') or exit('No direct script access allowed');

class Absen_model extends MY_Model
{
    protected $_table_name = 'absen';

    protected $_primary = '';



    function __construct()
    {
        parent::__construct();
    }

    function getAbsen()
    {
        $this->db->select('*');
        $this->db->join('karyawan', 'karyawan.nip = absen.nip', 'inner');
        $this->db->order_by('absen.time', 'desc');
        $query = $this->db->get($this->_table_name);
        return $query->result_array();
    }

    function getSelect($id)
    {
        $this->db->limit(10);
        $this->db->filter('absen.time');
        return $this->getAbsen();
    }
}

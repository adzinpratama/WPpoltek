<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    protected $_table_name;
    protected $_primary;


    function get($id)
    {

        $this->db->where($this->_primary, $id);
        return $this->db->get($this->_table_name)->row_array();
    }

    function getAll()
    {
        return $this->db->get($this->_table_name)->result_array();
    }

    function getLogin($where, $orwhere)
    {
        $this->db->where($where)->or_where($orwhere);
        $this->db->limit(1);
        return $this->db->get($this->_table_name)->row();
    }
    function insert($data)
    {

        $this->db->set($data);
        $this->db->insert($this->_table_name);
        $id = $this->db->insert_id();
        return $id;
    }
    function delete($id)
    {
        $this->db->where($this->_primary, $id);
        return $this->db->delete($this->_table_name);
    }
    function update($id, $data)
    {
        $this->db->where($this->_primary, $id);
        $this->db->set($data);
        return $this->db->update($this->_table_name);
    }
}

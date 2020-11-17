<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    protected $_table_name = 'user';

    public $rules = array(
        'username' => array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|required'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required|callback_password_check'
        )
    );


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
}

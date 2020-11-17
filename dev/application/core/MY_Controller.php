<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library(array('Site'));
        $this->load->helper('template_helper');


        $user_session = $this->session->userdata;
        if ($this->uri->segment(2) == 'login') {
            if (isset($user_session['logged_in']) && $user_session['logged_in'] == TRUE && $user_session['group'] == 'admin') {
                redirect(base_url('dashboard'));
            }
        } else {
            if (!isset($user_session['logged_in']) || $user_session['group'] != 'admin') {
                $this->session->sess_destroy();
                redirect(base_url('user/login'));
            }
        }
    }
}

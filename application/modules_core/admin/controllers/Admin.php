<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // $this->checklogin();
        $this->no_cache();
    }

    public function index()
    {

        $this->load->view('login');
    }

    public function Edit()
    {

        $this->load->view('admin_user_edit');

    }

    public function add()
    {

        $this->load->view('admin_user_add');
    }

    public function display()
    {

        $this->load->view('admin_user_view');
    }
}

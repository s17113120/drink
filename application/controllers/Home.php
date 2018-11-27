<?php

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        // $this->load->model("transaction_model","",true);
        $this->load->helper('url');
    }

    function index()
    {
        // display information for the view
        header("Location: " . base_url("Order"));
    }

}


/* End of file student.php */
/* Location: ./application/controllers/student.php */
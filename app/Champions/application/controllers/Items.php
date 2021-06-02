<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Items extends CI_Controller
{

    public function index()
    {
        $this->load->view('item_view');
    }

}

/* End of file  Item.php */

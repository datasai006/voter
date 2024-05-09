<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Voter extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Voter_model');
    }

    public function index() {
        // Load the form view
        $this->load->view('voter_form');
    }

    public function add_voter() {
        // Get form data
        
        $booth_no = $this->input->post('booth_no');
        $serial_no = $this->input->post('serial_no');
        $userid = $this->session->userdata('user_id');
        // Call model method to insert data
        $result = $this->Voter_model->insert_voter($userid,$booth_no, $serial_no);

        if ($result) {
            // Data inserted successfully
        //   redirect("Voter/viewdata");
          $data['voter_data'] = $this->Voter_model->get_all_voters();
       
        $this->load->view('voter_table', $data);
        } else {
            // Failed to insert data
            echo "Failed to insert data.";
        }
    }
    public function viewdata(){
          $data['voter_data'] = $this->Voter_model->get_all_voters();
       
        $this->load->view('voter_table', $data);
    }
   
 
}
?>
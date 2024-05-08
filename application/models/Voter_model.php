<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Voter_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

   public function insert_voter($userid, $booth_no, $serial_no) {
        // Insert data into tbl_voter table
        $data = array(
            'userid' => $userid,
            'booth_no' => $booth_no,
            'serial_no' => $serial_no
        );
        $this->db->insert('tbl_voter', $data);

        return $this->db->affected_rows() > 0;
    }
     public function get_all_voters() {
        // Retrieve all voter data from tbl_voter table
        $query = $this->db->get('tbl_voter');
        return $query->result_array();
    }
}
?>
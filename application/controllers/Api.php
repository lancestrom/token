<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    public function check_token()
    {
        header("Content-Type: application/json");

        $token = $this->input->get('token');

        $query = $this->db->get_where('token_keluar', ['token' => $token]);

        if ($query->num_rows() > 0) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "failed"]);
        }
    }
}

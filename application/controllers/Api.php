<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    public function cek_token()
    {
        $token_input = $this->input->post('token');

        // ambil token dari database
        $db_token = $this->db->get_where('token_keluar', ['id' => 1])->row()->token;

        if ($token_input == $db_token) {
            echo json_encode([
                "success" => true,
                "message" => "Token benar"
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Token salah"
            ]);
        }
    }
}

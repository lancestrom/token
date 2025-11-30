<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    public function cek_token()
    {
        header('Content-Type: application/json');

        $inputToken = $this->input->post('token');

        $cek = $this->db->get_where('token_keluar', ['token' => $inputToken])->row();

        if ($cek) {
            echo json_encode(["success" => true, "message" => "Token benar"]);
        } else {
            echo json_encode(["success" => false, "message" => "Token salah"]);
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            exit;
        }
    }

    public function index()
    {
        echo json_encode([
            'status' => 'ok',
            'message' => 'API is running. Use check_token or check_token_masuk with token parameter.'
        ]);
    }

    public function check_token()
    {
        $token = trim($this->input->get_post('token', true));

        if ($token === '') {
            echo json_encode(["status" => "failed", "message" => "token required"]);
            return;
        }

        $query = $this->db->get_where('token_keluar', ['token_keluar' => $token]);

        if ($query->num_rows() > 0) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "failed"]);
        }
    }

    public function check_token_masuk()
    {
        $token = trim($this->input->get_post('token', true));

        if ($token === '') {
            echo json_encode(["status" => "failed", "message" => "token required"]);
            return;
        }

        $query = $this->db->get_where('token_masuk', ['token_masuk' => $token]);

        if ($query->num_rows() > 0) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "failed"]);
        }
    }
}

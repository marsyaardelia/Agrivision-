<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit();
        }
    }

    private function _check_auth() {
        $headers = $this->input->request_headers();
        $auth    = isset($headers['Authorization']) ? $headers['Authorization'] : '';
        $token   = str_replace('Bearer ', '', $auth);

        if (empty($token)) return false;

        $decoded = json_decode(base64_decode($token), true);
        if (!$decoded || !isset($decoded['id'])) return false;

        // Check token expiry
        if (isset($decoded['exp']) && $decoded['exp'] < time()) return false;

        return $decoded;
    }

    public function handle($id = null) {
        $auth = $this->_check_auth();
        if (!$auth) {
            http_response_code(401);
            echo json_encode(['status' => false, 'message' => 'Unauthorized']);
            return;
        }

        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET' && $id === null) {
            $this->_get_all();
        } elseif ($method === 'GET' && $id !== null) {
            $this->_get_by_id($id);
        } else {
            http_response_code(405);
            echo json_encode(['status' => false, 'message' => 'Method not allowed']);
        }
    }

    private function _get_all() {
        $page     = (int)($this->input->get('page')     ?: 1);
        $per_page = (int)($this->input->get('per_page') ?: 10);
        $offset   = ($page - 1) * $per_page;

        $posts = $this->db
            ->limit($per_page, $offset)
            ->order_by('created_at', 'DESC')
            ->get('posts')
            ->result();

        http_response_code(200);
        echo json_encode($posts);
    }

    private function _get_by_id($id) {
        $post = $this->db->get_where('posts', ['id' => $id])->row();

        if (!$post) {
            http_response_code(404);
            echo json_encode(['status' => false, 'message' => 'Post not found']);
            return;
        }

        http_response_code(200);
        echo json_encode($post);
    }
}
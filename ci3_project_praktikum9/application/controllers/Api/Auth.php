<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit();
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => false, 'message' => 'Method not allowed']);
            return;
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $email    = isset($input['email'])    ? $input['email']    : $this->input->post('email');
        $password = isset($input['password']) ? $input['password'] : $this->input->post('password');

        if (empty($email) || empty($password)) {
            http_response_code(400);
            echo json_encode(['status' => false, 'message' => 'Email and password are required']);
            return;
        }

        $user = $this->db->get_where('users', ['email' => $email])->row();

        if (!$user) {
            http_response_code(401);
            echo json_encode(['status' => false, 'message' => 'Invalid credentials']);
            return;
        }

        // Support both bcrypt and md5
        $valid = false;
        if (password_verify($password, $user->password)) {
            $valid = true;
        } elseif (md5($password) === $user->password) {
            $valid = true;
        }

        if (!$valid) {
            http_response_code(401);
            echo json_encode(['status' => false, 'message' => 'Invalid credentials']);
            return;
        }

        // Generate simple token
        $token = bin2hex(random_bytes(32));

        // Store token in session or just return it
        // For simplicity, we encode user info in token
        $access_token = base64_encode(json_encode([
            'id'    => $user->id,
            'email' => $user->email,
            'token' => $token,
            'exp'   => time() + 86400
        ]));

        http_response_code(200);
        echo json_encode([
            'status'       => true,
            'message'      => 'Login successful',
            'access_token' => $access_token,
            'user'         => [
                'id'    => $user->id,
                'name'  => $user->name,
                'email' => $user->email,
            ]
        ]);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => false, 'message' => 'Method not allowed']);
            return;
        }

        $input    = json_decode(file_get_contents('php://input'), true);
        $name     = isset($input['name'])     ? $input['name']     : $this->input->post('name');
        $email    = isset($input['email'])    ? $input['email']    : $this->input->post('email');
        $password = isset($input['password']) ? $input['password'] : $this->input->post('password');

        if (empty($name) || empty($email) || empty($password)) {
            http_response_code(400);
            echo json_encode(['status' => false, 'message' => 'Name, email, and password are required']);
            return;
        }

        $existing = $this->db->get_where('users', ['email' => $email])->row();
        if ($existing) {
            http_response_code(409);
            echo json_encode(['status' => false, 'message' => 'Email already registered']);
            return;
        }

        $data = [
            'name'       => $name,
            'email'      => $email,
            'password'   => password_hash($password, PASSWORD_BCRYPT),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->insert('users', $data);
        $id = $this->db->insert_id();

        http_response_code(201);
        echo json_encode([
            'status'  => true,
            'message' => 'Register successful',
            'user'    => ['id' => $id, 'name' => $name, 'email' => $email]
        ]);
    }

    public function logout() {
        http_response_code(200);
        echo json_encode(['status' => true, 'message' => 'Logout successful']);
    }

    public function me() {
        $headers = $this->input->request_headers();
        $auth    = isset($headers['Authorization']) ? $headers['Authorization'] : '';
        $token   = str_replace('Bearer ', '', $auth);

        if (empty($token)) {
            http_response_code(401);
            echo json_encode(['status' => false, 'message' => 'Unauthorized']);
            return;
        }

        $decoded = json_decode(base64_decode($token), true);
        if (!$decoded || !isset($decoded['id'])) {
            http_response_code(401);
            echo json_encode(['status' => false, 'message' => 'Invalid token']);
            return;
        }

        $user = $this->db->get_where('users', ['id' => $decoded['id']])->row();
        if (!$user) {
            http_response_code(404);
            echo json_encode(['status' => false, 'message' => 'User not found']);
            return;
        }

        http_response_code(200);
        echo json_encode([
            'status' => true,
            'user'   => ['id' => $user->id, 'name' => $user->name, 'email' => $user->email]
        ]);
    }
}
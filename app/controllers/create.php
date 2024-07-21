<?php
class Create extends Controller {

    public function index() {		
        $this->view('create/index');
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->model('User');
            if ($user->create($username, $password)) {
                header('Location: /login');
            } else {
                $this->view('create/index', ['error' => 'Registration failed.']);
            }
        }
    }
}

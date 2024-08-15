<?php

class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        // Check request method
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize form inputs
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Init Data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            // Validate Name
            if (empty($data['name'])) {
                $data['name_error'] = 'Name is required';
            }

            // Validate Email
            if (empty($data['email'])) {
                $data['email_error'] = 'Email is required';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_error'] = 'Email already exists';
                }
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_error'] = 'Password is required';
            } elseif (strlen($data['password']) < 6) {
                $data['password_error'] = 'Password should be at least 6 characters';
            }

            // Validate Confirm Password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_error'] = 'Confirm password is required';
            } elseif ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_error'] = 'Password and Confirm password do not match';
            }

            // Make Sure errors empty
            if (
                empty($data['name_error']) &&
                empty($data['email_error']) &&
                empty($data['password_error']) &&
                empty($data['confirm_password_error'])
            ) {

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->userModel->register($data)) {
                    flash('register_success', 'Account registered successfully. Please login here');
                    redirect('users/login');
                } else {
                    die('Error User Registration');
                }
            } else {
                // Load Register view with errors
                $this->view('auth/register', $data);
            }
        } else {
            // RegisterForm page
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            $this->view("auth/register", $data);
        }
    }

    public function login()
    {
        // Check request method
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process LoginForm(submit)
            // Sanitize form inputs
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Init Data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_error' => '',
                'password_error' => ''
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_error'] = 'Email is required';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_error'] = 'Invalid email format';
            } elseif (!$this->userModel->findUserByEmail($data['email'])) {
                // User Not Found
                $data['email_error'] = 'User with this email not found !';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_error'] = 'Password is required';
            }

            // Make Sure errors empty
            if (
                empty($data['email_error']) &&
                empty($data['password_error'])
            ) {
                // Validated
                $loggedInUser = $this->userModel->login($data);
                if ($loggedInUser) {
                    // Create session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_error'] = 'incorrect password';
                    $this->view('auth/login', $data);
                }
            } else {
                // Load login view with errors
                $this->view('auth/login', $data);
            }

        } else {
            // Init Data
            $data = [
                'email' => '',
                'password' => '',
                'email_error' => '',
                'password_error' => ''
            ];

            $this->view('auth/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;

        redirect('pages');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }
}
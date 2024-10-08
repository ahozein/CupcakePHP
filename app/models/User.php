<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $this->db->fetch();

        // Check email exist
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Register User
    public function register($data)
    {
        $this->db->query('INSERT INTO users ( name, email , password) VALUES (:name , :email ,:password)');

        // Bind value
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Login User
    public function login($data)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');

        // Bind value
        $this->db->bind(':email',$data['email']);

        // Execute
        $row = $this->db->fetch();

        $hash_password = $row->password;

        if( password_verify( $data['password'] , $hash_password ) ){
            return $row;
        }else{
            return false;
        }
    }
}
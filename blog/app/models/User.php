<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    // Get users
    public function getUsers() {
        $this->db->query('SELECT * FROM users');
        return $this->db->resultSet();
    }
    public function getUserByName($username) {
        $this->db->query('SELECT * FROM users WHERE user_name = :username');
        $this->db->bind(':username', $username);
        return $this->db->single();
    }

    public function register($data) {
        $this->db->query('INSERT INTO users (user_name, user_email, password) VALUES(:username, :email, :password)');

        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password) {
        $this->db->query('SELECT * FROM users WHERE user_name = :username');

        //Bind value
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hashedPassword = $row->password;
        // Sha256 password
        $password = hash('sha256', $password);
        // Check pass
        if ($hashedPassword === $password) {
            return $row;
        } else {
            return false;
        }

    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE user_email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
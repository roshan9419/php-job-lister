<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Get User by Id
    public function getUserById($user_id)
    {
        $this->db->query("SELECT * FROM users WHERE id = :user_id");
        $this->db->bind(":user_id", $user_id);
        return $this->db->single();
    }

    // Get user using email
    public function getUserByEmail($email) {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(":email", $email);
        return $this->db->single();
    }

    // Create user
    public function create($name, $email, $password)
    {
        // insert query
        $this->db->query("INSERT INTO users (name, email, password) VALUES (:name, :email, :pass)");

        // bind data
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':pass', password_hash($password, PASSWORD_DEFAULT));

        // execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

<?php
class Auth
{
    private $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function logout() {
        // clear the session
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_role']);
    }

    public function login($email, $password)
    {
        $user = $this->user->getUserByEmail($email);
        if (!$user || !password_verify($password, $user->password)) {
            throw new Exception("Incorrect email or password" );
        }

        // store login session
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_role'] = $user->role;

        return true;
    }

    public function register($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];

        // check if email is already in use
        $user = $this->user->getUserByEmail($email);
        if ($user) {
            throw new Exception("E-mail already taken");
        }

        return $this->user->create($name, $email, $password);
    }
}

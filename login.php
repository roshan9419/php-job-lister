<?php include_once 'config/init.php'; ?>

<?php
$auth = new Auth;

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    try {
        $auth->login($email, $pass);
        redirect('index.php');
    } catch (Exception $e) {
        redirect('login.php', $e->getMessage(), 'fail');
    }
}

$template = new Template('templates/auth/login.php');

echo $template;
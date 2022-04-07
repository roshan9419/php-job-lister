<?php include_once 'config/init.php'; ?>

<?php
$auth = new Auth;

if (isset($_POST['register'])) {
    $data = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'confirm_password' => $_POST['confirm_password']
    );

    if ($data['password'] != $data['confirm_password']) {
        redirect('register.php', "Password don't match", 'fail');
    }

    if (strlen($data['password']) < 6) {
        redirect('register.php', "Password required at-least 6 characters", 'fail');
    }

    try {
        if ($auth->register($data)) {
            redirect('login.php', 'Registered Successfully', 'success');
        } else {
            redirect('register.php', 'Something went wrong', 'fail');
        }
    } catch (Exception $e) {
        redirect('register.php', $e->getMessage(), 'fail');
    }
}

$template = new Template('templates/auth/register.php');

echo $template;
<?php include_once 'config/init.php'; ?>

<?php
$auth = new Auth;
$auth->logout();
redirect('index.php');
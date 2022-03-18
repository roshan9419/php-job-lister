<?php include_once 'config/init.php'; ?>

<?php
$template = new Template('templates/frontpage.php');
$template->title = 'Latest Jobs';
$template->appName = 'JobLister';

echo $template;
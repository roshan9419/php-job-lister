<?php include_once 'config/init.php'; ?>

<?php
$application = new Application;
$auth = new Auth;
$job = new Job;

if (!$auth->isUserAuthenticated()) {
    redirect('login.php');
}

$template = new Template('templates/applications.php');

$jobs = array();
$applications = $application->getUserApplications($_SESSION['user_id']);

foreach ($applications as $key => $value) {
    if (!in_array($value->job_id, $jobs)) {
        $jobs[$value->job_id] = $job->getJob($value->job_id);
    }
}

$template->jobs = $jobs;
$template->applications = $applications;

echo $template;
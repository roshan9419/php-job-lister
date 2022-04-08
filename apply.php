<?php include_once 'config/init.php'; ?>

<?php
$auth = new Auth;
$application = new Application;

$job_id = $_GET['id'];

if (!$auth->isUserAuthenticated()) {
    redirect('login.php');
}

if ($application->getUserApplicationByJobId($_SESSION['user_id'], $job_id)) {
    redirect('job.php?id=' . $job_id, 'You have already applied to this job', 'fail');
}

if ($application->create($_SESSION['user_id'], $job_id)) {
    redirect('job.php?id=' . $job_id, 'Successfully applied to this Job', 'success');
} else {
    redirect('job.php?id=' . $job_id, 'Something went wrong', 'fail');
}

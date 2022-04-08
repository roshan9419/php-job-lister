<?php include_once 'config/init.php'; ?>

<?php
$job = new Job;
$auth = new Auth;
$application = new Application;

if (isset($_POST['delete'])) {
    $job_id = $_POST['del_id'];

    if (!$auth->isAdmin()) {
        redirect('job.php?id=' . $job_id, "Unauthorized Access - You're not allowed to do this operation", 'fail');
    }

    if ($job->delete($job_id)) {
        redirect('index.php', 'Job Deleted', 'success');
    } else {
        redirect('job.php?id=' . $job_id, 'Not able to delete Job', 'fail');
    }
}

$template = new Template('templates/job/view.php');

$job_id = isset($_GET['id']) ? $_GET['id'] : null;

$template->job = $job->getJob($job_id);

$applied = false;
if ($auth->isUserAuthenticated()) {
    if ($application->getUserApplicationByJobId($_SESSION['user_id'], $job_id)) {
        $applied = true;
    }
}

$template->applied = $applied;

echo $template;
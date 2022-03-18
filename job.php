<?php include_once 'config/init.php'; ?>

<?php
$job = new Job;

if (isset($_POST['delete'])) {
    $job_id = $_POST['del_id'];
    if ($job->delete($job_id)) {
        redirect('index.php', 'Job Deleted', 'success');
    } else {
        redirect('index.php', 'Not able to delete Job', 'fail');
    }
}

$template = new Template('templates/job-view.php');

$job_id = isset($_GET['id']) ? $_GET['id'] : null;

$template->job = $job->getJob($job_id);

echo $template;
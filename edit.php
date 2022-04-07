<?php include_once 'config/init.php'; ?>

<?php
$job = new Job;
$auth = new Auth;

$job_id = isset($_GET['id']) ? $_GET['id'] : null;

if ($job_id && isset($_POST['submit'])) {
    $data = array(
        'job_title' => $_POST['job_title'],
        'company' => $_POST['company'],
        'category_id' => $_POST['category_id'],
        'description' => $_POST['description'],
        'location' => $_POST['location'],
        'salary' => $_POST['salary'],
        'contact_user' => $_POST['contact_user'],
        'contact_email' => $_POST['contact_email'],
    );

    if (!$auth->isAdmin()) {
        redirect('edit.php?id=' . $job_id, "Unauthorized Access - You're not allowed to do this operation", 'fail');
    }

    if ($job->update($job_id, $data)) {
        redirect('job.php?id=' . $job_id, 'Job has been updated successfully', 'success');
    } else {
        redirect('edit.php?id=' . $job_id, 'Something went wrong', 'fail');
    }
}

$template = new Template('templates/job/edit.php');

$template->categories = $job->getCategories();
$template->job = $job->getJob($job_id);

echo $template;

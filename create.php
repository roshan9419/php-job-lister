<?php include_once 'config/init.php'; ?>

<?php
$job = new Job;

if (isset($_POST['submit'])) {
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
    if ($job->create($data)) {
        redirect('index.php', 'Job has been listed successfully', 'success');
    } else {
        redirect('index.php', 'Something went wrong', 'fail');
    }
}

$template = new Template('templates/job/create.php');

$template->categories = $job->getCategories();

echo $template;
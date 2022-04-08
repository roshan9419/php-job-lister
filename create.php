<?php include_once 'config/init.php'; ?>

<?php
$job = new Job;
$auth = new Auth;

if (isset($_POST['submit'])) {
    $data = array(
        'job_title' => $_POST['job_title'],
        'company' => $_POST['company'],
        'category_id' => $_POST['category_id'],
        'description' => $_POST['description'],
        'location' => $_POST['location'],
        'location_type' => $_POST['location_type'],
        'salary' => $_POST['salary'],
        'contact_user' => $_POST['contact_user'],
        'contact_email' => $_POST['contact_email'],
        'job_type' => $_POST['job_type'],
        'skills' => $_POST['skills'],
        'experience' => (int)$_POST['experience']
    );

    if (!$auth->isAdmin()) {
        redirect('create.php', "Unauthorized Access - You're not allowed to do this operation", 'fail');
    }

    if ($job->create($data)) {
        redirect('index.php', 'Job has been listed successfully', 'success');
    } else {
        redirect('create.php', 'Something went wrong', 'fail');
    }
}

$template = new Template('templates/job/create.php');

$template->categories = $job->getCategories();
$template->job_types = [
    'Internship',
    'Full-time',
    'Part-time',
    'Contract',
    'Temporary',
    'Volunteer'
];
$template->location_types = ["Remote", "On-site", "Hybrid"];

echo $template;

<?php include_once 'config/init.php'; ?>

<?php
$job = new Job;

$template = new Template('templates/frontpage.php');

$category = isset($_GET['category']) ? $_GET['category'] : null;

if ($category) {
    $template->title = 'Jobs in '.$job->getCategory($category)->name;
    $template->jobs = $job->getJobsByCategory($category);
} else {
    $template->title = 'Recent Job openings';
    $template->jobs = $job->getAllJobs();
}


$template->categories = $job->getCategories();

echo $template;
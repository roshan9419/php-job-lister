<?php include '../inc/header.php' ?>
<div class="container">

    <h2 class="page-header"><?php echo $job->job_title; ?> (<?php echo $job->location; ?>)</h2>
    <small>Posted By: <?php echo $job->contact_user; ?> on <?php echo $job->post_date; ?></small>
    <hr>

    <p class="lead"><?php echo $job->description; ?></p>

    <ul class="list-group">
        <li class="list-group-item">
            <strong>Company: </strong><?php echo $job->company; ?>
        </li>
        <li class="list-group-item">
            <strong>Salary: </strong><?php echo $job->salary; ?>
        </li>
        <li class="list-group-item">
            <strong>Contact E-mail: </strong><?php echo $job->contact_email; ?>
        </li>
    </ul>
    <br><br>

    <a href="index.php">Go Back</a>
    <br><br>

    <?php if ($_SESSION['user_role'] == 'ADMIN') { ?>
    <div>
        <a href="edit.php?id=<?php echo $job->id; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
        <form style="display:inline" action="job.php" method="POST">
            <input type="hidden" name="del_id" value="<?php echo $job->id; ?>">
            <button type="submit" class="btn btn-danger" name="delete"> <i class="bi bi-trash"></i> Delete</button>
        </form>
    </div>
    <?php } ?>

</div>
<?php include '../inc/footer.php' ?>
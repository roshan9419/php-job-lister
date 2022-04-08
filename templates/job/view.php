<?php include '../inc/header.php' ?>

<style>
    .heading {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .title-heading {
        font-size: 2.2rem;
        font-weight: bolder;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
    }

    .apply-btn {
        background: royalblue;
        color: white;
        text-decoration: none;
        padding: 10px 15px;
        font-size: 1rem;
        height: min-content;
    }

    .applied-btn {
        background: seagreen;
        color: white;
        text-decoration: none;
        padding: 10px 15px;
        font-size: 1rem;
        height: min-content;
    }

    .apply-btn:hover {
        color: rgb(184, 184, 184)
    }

    .skill {
        margin-right: 5px;
        background: royalblue;
        color: white;
        padding: 3px 6px;
        border-radius: 10%;
        font-size: 0.8rem;
        font-weight: bold
    }
</style>

<div class="container">
    <div class="heading">
        <span class="title-heading"><?php echo $job->job_title; ?></span>
        <?php
        if ($applied) {
            echo "<a class='applied-btn'>Applied</a>";
        } else {
            echo "<a href='apply.php?id=" . $job->id . "' class='apply-btn'>Apply Now</a>";
        }
        ?>
    </div>
    <h4 class="text-muted"><?php echo $job->location; ?> (<?php echo $job->location_type; ?>)</h4>
    <hr>
    <div class="mb-5"></div>

    <h5>Skills Required</h5>
    <?php foreach (explode(",", $job->skills) as $skill) : ?>
        <span class="skill"><?php echo $skill; ?></span>
    <?php endforeach; ?>

    <div class="mb-5"></div>

    <div class="description">
        <?php echo $job->description; ?>
    </div>
    <div class="mb-5"></div>
    <ul class="list-group">
        <li class="list-group-item">
            <strong>Job Type: </strong><?php echo $job->job_type; ?>
        </li>
        <li class="list-group-item">
            <strong>Experience: </strong><?php echo $job->experience; ?> yrs
        </li>
        <?php if ($job->salary) { ?>
            <li class="list-group-item">
                <strong>Salary: </strong><?php echo $job->salary; ?>
            </li>
        <?php } ?>
        <li class="list-group-item">
            <strong>Company: </strong><?php echo $job->company; ?>
        </li>
        <li class="list-group-item">
            <strong>Contact User: </strong><?php echo $job->contact_user; ?>
        </li>
        <li class="list-group-item">
            <strong>Contact E-mail: </strong><?php echo $job->contact_email; ?>
        </li>
    </ul>
    <br><br>
    <a href="index.php">Go Back</a>
    <br><br>

    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'ADMIN') { ?>
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
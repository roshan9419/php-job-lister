<?php include 'inc/header.php' ?>

<style>
    .heading {
        background-color: royalblue;
        color: white;
        padding: 10px;
        margin-top: 20px;
        text-align: center;
    }
</style>

<div class="container" style="min-height: 50vh;">
    <div class="heading">
        <h2>My Job Applications</h2>
    </div>
    <div class="mb-5"></div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Job Title</th>
                <th scope="col">Job Type</th>
                <th scope="col">Location</th>
                <th scope="col">Applied Date</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($applications as $item) : ?>
                <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <td><?php echo !$jobs[$item->job_id] ? "<span class='text-muted'><i>Job deleted</i></span>" : "<a style='text-decoration:none' href='job.php?id=" . $item->job_id . "'>" . $jobs[$item->job_id]->job_title . "</a>" ?></td>
                    <td><?php echo !$jobs[$item->job_id] ? "<span class='text-muted'><i>Job deleted</i></span>" : $jobs[$item->job_id]->job_type; ?></td>
                    <td><?php echo !$jobs[$item->job_id] ? "<span class='text-muted'><i>Job deleted</i></span>" : $jobs[$item->job_id]->location . " (" . $jobs[$item->job_id]->location_type . ")"; ?></td>
                    <td><?php echo $item->applied_date; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php include 'inc/footer.php' ?>
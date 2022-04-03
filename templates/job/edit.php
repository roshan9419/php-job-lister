<?php include '../inc/header.php' ?>

<div class="container card p-4 mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">


    <h2 class="page-header">Edit Job Listing</h2>
    <hr>

    <form action="edit.php?id=<?php echo $job->id; ?>" method="POST">
        <div class="form-group mb-2">
            <label>Company</label>
            <input type="text" class="form-control" name="company" value="<?php echo $job->company; ?>">
        </div>
        <div class="form-group mb-2">
            <label>Category</label>
            <select name="category_id" id="" class="form-control">
                <option value="0">Choose Category</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category->id; ?>" <?php if ($job->category_id == $category->id) echo "selected"; ?>>
                        <?php echo $category->name; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mb-2">
            <label>Job Title</label>
            <input type="text" class="form-control" name="job_title" value="<?php echo $job->job_title; ?>">
        </div>
        <div class="form-group mb-2">
            <label>Description</label>
            <textarea class="form-control" name="description"><?php echo $job->description; ?></textarea>
        </div>
        <div class="form-group mb-2">
            <label>Location</label>
            <input type="text" class="form-control" name="location" value="<?php echo $job->location; ?>">
        </div>
        <div class="form-group mb-2">
            <label>Salary</label>
            <input type="text" class="form-control" name="salary" value="<?php echo $job->salary; ?>">
        </div>
        <div class="form-group mb-2">
            <label>Contact User</label>
            <input type="text" class="form-control" name="contact_user" value="<?php echo $job->contact_user; ?>">
        </div>
        <div class="form-group mb-3">
            <label>Contact E-mail</label>
            <input type="email" class="form-control" name="contact_email" value="<?php echo $job->contact_email; ?>">
        </div>
        <input type="submit" class="btn btn-primary" value="Update" name="submit">
    </form>
</div>
<?php include '../inc/footer.php' ?>
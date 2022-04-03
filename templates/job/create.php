<?php include '../inc/header.php' ?>
<div class="container card p-4 mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">

    <h2 class="page-header">Create Job Listing</h2>
    <hr>
    
    <form action="create.php" method="POST">
        <div class="form-group mb-2">
            <label>Company</label>
            <input type="text" class="form-control" name="company">
        </div>
        <div class="form-group mb-2">
            <label>Category</label>
            <select name="category_id" id="" class="form-control">
                <option value="0">Choose Category</option>
                <?php foreach($categories as $category):?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                    <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mb-2">
            <label>Job Title</label>
            <input type="text" class="form-control" name="job_title">
        </div>
        <div class="form-group mb-2">
            <label>Description</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="form-group mb-2">
            <label>Location</label>
            <input type="text" class="form-control" name="location">
        </div>
        <div class="form-group mb-2">
            <label>Salary</label>
            <input type="text" class="form-control" name="salary">
        </div>
        <div class="form-group mb-2">
            <label>Contact User</label>
            <input type="text" class="form-control" name="contact_user">
        </div>
        <div class="form-group mb-3">
            <label>Contact E-mail</label>
            <input type="email" class="form-control" name="contact_email">
        </div>
        <input type="submit" class="btn btn-primary" value="Submit" name="submit">
    </form>
</div>
<?php include '../inc/footer.php' ?>
<?php include 'inc/header.php' ?>

      <div class="jumbotron">
        <h1>Find a Job</h1>
        <form action="index.php" method="GET">
            <select name="category" id="" class="form-control">
              <option value="0">Choose Category</option>
              <?php foreach($categories as $category):?>
                <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
              <?php endforeach; ?>
            </select>
            <br>
            <input type="submit" value="FIND" class="btn btn-lg btn-success">
        </form>
      </div>

      <h3></h3>
      <?php echo $title; ?>
      <?php foreach($jobs as $job): ?>

      <div class="row marketing">
        <div class="col-md-10">
          <h4><?php echo $job->job_title; ?></h4>
          <p><?php echo $job->description; ?></p>
        </div>
        <div class="col-md-2">
            <a href="job.php?id=<?php echo $job->id; ?>" class="btn btn-default">View</a>
        </div>
      </div>
      <?php endforeach; ?>

<?php include 'inc/footer.php' ?>
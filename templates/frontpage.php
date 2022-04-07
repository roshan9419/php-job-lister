<?php include 'inc/header.php' ?>

<style>
    #lead {
        position: relative;
        min-height: 300px;
        max-height: 800px;
        background: url("assets/images/lead-bg.jpg");
        background-size: cover;
        padding: 15px;
        background-attachment: fixed;
    }

    #lead-content {
        position: absolute;
        z-index: 10;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -40%);
        text-align: center;
    }

    #lead-content h2 {
        color: #c6e2f5;
        font-weight: 500;
        font-size: 2.25rem;
    }

    #lead-overlay {
        position: absolute;
        height: 100%;
        width: 100%;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(33, 125, 187, 0.8);
        z-index: 1;
    }

    .search-container {
        padding: 15px;
        display: flex;
        justify-content: flex-end;
        outline: none;
        margin-top: 20px;
        margin-bottom: 20px;
        border-radius: 5px;
        background: white;
    }

    .search-box {
        outline: none;
        border: none;
        width: 100%;
    }

    .category-type {
        border: none;
        outline: none;
        cursor: pointer;
        color: #4e4e4e;
        font-size: 16px;
    }

    .vertical-bar {
        background-color: rgb(150, 150, 150);
        margin-right: 10px;
        padding: 0px;
        width: 1px;
        font-size: 0%;
    }

    .btn-rounded {
        display: inline-block;
        padding: 15px 25px;
        border-radius: 30px;
        transition: 0.5s ease all;
        text-decoration: none;
    }

    .btn-rounded-white {
        color: #fff;
        border: 3px solid #fff;
        background: transparent;
    }

    .btn-rounded-white:hover {
        color: #3498db;
        background: #fff;
    }
</style>

<div id="lead">
    <div id="lead-content">
        <h2>Find the <strong>best job</strong> that fits you</h2>

        <form action="index.php" method="GET">
            <div class="search-container">
                <input class="search-box" type="text" name="q" placeholder="Search using Job title or keyword..." autocomplete="off">
                <div class="vertical-bar">.</div>
                <select class="category-type" name="category" id="">
                    <option value="0">Choose Category</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn-rounded btn-rounded-white">Search Jobs</button>
        </form>

    </div>
    <div id="lead-overlay"></div>
</div>

<style>
    .job-card {
        padding: 20px;
        text-decoration: none;
        transition: 100ms ease-in-out;
    }

    .job-card:hover {
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07),
            0 2px 4px rgba(0, 0, 0, 0.07),
            0 4px 8px rgba(0, 0, 0, 0.07),
            0 8px 16px rgba(0, 0, 0, 0.07);
    }

    .job-card-header {
        display: flex;
        justify-content: space-between;
    }

    .job-title {
        text-decoration: none;
        font-size: 1.1rem;
        font-weight: 600;
        color: rgb(37, 37, 37);
    }

    .date-ago {
        height: 25px;
        background: rgba(65, 105, 225, 0.205);
        padding: 3px 6px;
        border-radius: 5px;
        font-size: 0.7rem;
        color: royalblue;
        display: block;
        width: max-content;
        white-space: nowrap;
    }

    .date-ago i {
        color: royalblue;
    }

    .job-items-row {
        display: flex;
        flex-wrap: wrap;
    }

    .job-item {
        margin-right: 20px;
    }

    .job-item i {
        color: rgb(85, 85, 85);
    }

    .job-desc {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        line-clamp: 2;
        -webkit-box-orient: vertical;
    }
</style>

<div class="container mt-5">
    <h3><?php echo $title; ?></h3>
    <hr>

    <?php foreach ($jobs as $job) : ?>

        <a class="job-card card mb-3" href="job.php?id=<?php echo $job->id; ?>">
            <div class="job-card-body">
                <div class="content">
                    <div class="job-card-header">
                        <h4 class="job-title"><?php echo $job->job_title; ?></h4>
                        <div class="date-ago">
                            <i class="bi bi-clock"></i>
                            <span>2 days ago</span>
                        </div>
                    </div>
                    <div>
                        <i style="color: rgb(51, 51, 51)" class="bi bi-building"></i>
                        <span style="color: rgb(51, 51, 51)" class="card-subtitle mb-2"><?php echo $job->company; ?></span>
                    </div>
                    <div class="job-items-row">
                        <div class="job-item">
                            <i class="bi bi-briefcase"></i>
                            <small class="text-muted">Internship</small>
                        </div>
                        <div class="job-item">
                            <i class="bi bi-bag"></i>
                            <small class="text-muted">2 Yrs</small>
                        </div>
                        <div class="job-item">
                            <i class="bi bi-people"></i>
                            <small class="text-muted">0 Applicants</small>
                        </div>
                        <div class="job-item">
                            <i class="bi bi-geo-alt"></i>
                            <small class="text-muted"><?php echo $job->location; ?></small>
                        </div>
                    </div>
                    <div class="job-item job-desc">
                        <i class="bi bi-file-earmark-text"></i>
                        <small class="text-muted"><?php echo $job->description; ?></small>
                    </div>
                    <div class="mb-2"></div>
                    <!-- @foreach ($job->skills_required as $skill)
                                <span class="skill">{{ $skill }}</span>
                            @endforeach -->
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>

<?php include 'inc/footer.php' ?>
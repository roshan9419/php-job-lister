<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/logo.svg">
    <title><?php echo APP_TITLE; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
</head>

<body style="background-color: #F9FAFC;">

    <style>
        .signin,
        .signup,
        .logout {
            border-radius: 5px;
            text-decoration: none;
            padding: 7px 10px 8px 10px;
        }

        .logout {
            color: white;
        }

        .signin {
            margin-right: 10px;
        }

        .signin,
        .signup {
            background-color: royalblue;
            color: white;
        }
    </style>

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="z-index: 1000;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="assets/images/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                <?php echo APP_TITLE; ?>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="index.php" class="nav-item nav-link active">Home</a>

                    <?php
                    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'ADMIN') {
                        echo "<a href='create.php' class='nav-item nav-link'>Create Job Post</a>";
                    }
                    ?>

                    <?php
                    if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'ADMIN') {
                        echo "<a href='applications.php' class='nav-item nav-link'>My Applications</a>";
                    }
                    ?>
                </div>

                <div class="navbar-nav ms-auto">
                    <?php
                    if (isset($_SESSION['user_name'])) {
                        echo "<strong class='nav-item nav-link'>Hi, " . $_SESSION['user_name'] . "!</strong>";
                        echo "<a href='logout.php' class='logout bg-danger'><i class='bi bi-box-arrow-left'></i> Logout</a>";
                    } else {
                        echo "<a href='login.php' class='signin'>Sign In</a>";
                        echo "<a href='register.php' class='signup'>Sign Up</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <?php displayMessage(); ?>
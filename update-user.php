<?php
    session_start();
    include "functions/users-functions.php";

    if ($_SESSION['role'] == "U") {
        include "user-menu.php";
    }
    else {
        include "admin-menu.php";
    }

    $dir = "images";
    if (!file_exists($dir)) {
        mkdir($dir, 0777);
    }

    $account_id = $_GET['account_id'];
    $user = getUser($account_id);
    $account = getUserAccount($account_id);

    if (isset($_POST['update'])) {
        updateUser($account_id, false);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid bg-warning text-white display-1 p-3">
        <i class="fa-solid fa-user-pen ms-5 me-3"></i>Update User
    </div>
    
    <div class="container mt-5">
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-8">
                    <div class="row">
                        <div class="col">
                            <label for="first_name" class="form-label">First Name</label>
                        </div>
                        <div class="col">
                            <label for="last_name" class="form-label">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="first_name" value="<?= $user['first_name'] ?>" id="fname" class="form-control" required>
                        </div>
                        <div class="col">
                            <input type="text" name="last_name" value="<?= $user['last_name'] ?>"  id="lname" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-8">
                            <label for="address" class="form-label">Address</label>
                        </div>
                        <div class="col-4">
                            <label for="contact_number" class="form-label">Contact Number</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <input type="text" name="address" value="<?= $user['address'] ?>" id="address" class="form-control" required>
                        </div>
                        <div class="col-4">
                            <input type="tel" name="contact_number" value="<?= $user['contact_number'] ?>" id="tel" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="username" class="form-label">Username</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="username" value="<?= $account['username'] ?>" id="username" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="pass" class="form-label">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password to confirm" required>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col text-center">
                            <a href="users.php" class="btn btn-outline-primary form-control w-25">Cancel</a>
                            <input type="submit" name="update" value="UPDATE" class="btn btn-primary form-control w-50">
                        </div>
                    </div>

                </div>
                <!-- Picture -->
                <div class="col-4">
                    <div class="col mt-4">
                        <img src="<?= $dir . '/' . $user['avatar'] ?>" alt="" class="w-100">
                        <div class="card mt-1">
                            <input type="file" name="avatar" id="avatar">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- script -->
    <script src="https://kit.fontawesome.com/2a92be50d6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
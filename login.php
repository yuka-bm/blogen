<?php
    include "functions/users-functions.php";

    if (isset($_POST['login'])) {
        login();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container text-center mt-5 w-50">
        <form action="" method="POST">
            <h2 class="display-3">LOGIN</h2>
            <input type="text" name="username" class="form-input form-control border-1 border-dark border-top-0 border-start-0 border-end-0 rounded-0 mt-4" placeholder="USER NAME" required>
            <input type="password" name="password" class="form-input form-control border-1 border-dark border-top-0 border-start-0 border-end-0 rounded-0 mt-4" placeholder="PASSWORD" required>
            <input type="submit" name="login" value="ENTER" class="btn btn-success form-control my-5">
        </form>

        <div class="row">
            <div class="col">
                <p><a href="#" class="text-dark">Create an Account</a></p>
            </div>
            <div class="col">
                <p><a href="#" class="text-dark">Remove Account</a></p>
            </div>
        </div>
    </div>
    
    <!-- script -->
    <script src="https://kit.fontawesome.com/2a92be50d6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
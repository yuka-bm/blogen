<?php
    session_start();
    include "admin-menu.php";
    include "functions/users-functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid bg-warning text-white display-1 p-3">
        <i class="fa-solid fa-user-pen ms-5 me-3"></i>User
    </div>

    <div class="container w-50">
        <h2 class="display-5">Add User</h2>
        <form action="#" method="POST">
            <div class="row mb-2">
                <div class="col">
                    <input type="text" name="first_name" id="first-name" class="form-control" placeholder="First Name" required>
                </div>
                <div class="col">
                    <input type="text" name="last_name" id="last-name" class="form-control" placeholder="Last Name" required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <input type="tel" name="contact_number" id="contact_number" class="form-control" placeholder="Contact Number" required>
                </div>
                <div class="col">
                    <input type="text" name="address" id="address" class="form-control" placeholder="Address" required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="submit" name="add" value="ADD" class="btn btn-warning form-control text-white">
                </div>
            </div>
        </form>
        <?php
            if (isset($_POST['add'])) {
                register(false);
            }
        ?>
    </div>

    <div class="container mt-5">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ACCOUNT ID</th>
                    <th>FULL NAME</th>
                    <th>CONTACT NUMBER</th>
                    <th>ADDRESS</th>
                    <th>USER NAME</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $users = getAllUsers();
                while ($user = $users->fetch_assoc()) {
                    $account = getUserAccount($user['account_id']);
                    if ($account['role'] == 'U') {
            ?>
                        <tr>
                            <td><?= $user['user_id'] ?></td>
                            <td><?= $user['first_name'] ?> <?= $user['last_name'] ?></td>
                            <td><?= $user['contact_number'] ?></td>
                            <td><?= $user['address'] ?></td>
                            <td><?= $account['username'] ?></td>
                            <td>
                                <a href="update-user.php?account_id=<?= $user['account_id'] ?>" class="btn btn-warning">Update</a>
                            </td>
                            <td>
                                <a href="delete-user.php?account_id=<?= $user['account_id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
            <?php
                    }
                }
            ?>
            </tbody>
        </table>

    </div>
    
    <!-- script -->
    <script src="https://kit.fontawesome.com/2a92be50d6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
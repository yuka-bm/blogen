<?php
    session_start();
    include "functions/posts-functions.php";
    include "functions/users-functions.php";
    include "functions/categories-functions.php";
    include "admin-menu.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid bg-danger text-white display-1 p-3">
        <i class="fa-solid fa-user-gear ms-5 me-3"></i>Dashboard
    </div>

    <div class="container mt-4">
        <p class="h5">ALL POSTS</p>
        <div class="row">
            <div class="col-9">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>TITLE</th>
                            <th>AUTHOR</th>
                            <th>CATEGORY</th>
                            <th>DATE POSTED</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $posts = getAllPosts();
                            while ($post = $posts->fetch_assoc()) {
                                $user = getUserAccount($post['account_id']);
                        ?>
                                <tr>
                                    <td><?= $post['post_id'] ?></td>
                                    <td><?= $post['post_title'] ?></td>
                                    <td><?= $user['username'] ?></td>
                                    <td><?= getCategoryName($post['category_id']) ?></td>
                                    <td><?= $post['date_posted'] ?></td>
                                    <td>
                                        <a href="post-details.php?post_id=<?= $post['post_id'] ?>" class="btn btn-outline-dark">
                                            <i class='fas fa-angle-double-right me-1'></i>Details
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="col">
                <div class="menu text-center text-white">
                    <div class="bg-primary mb-3 py-2 rounded-3">
                        <p class="h5">Posts</p>
                        <p class="h5"><i class="fa-solid fa-pen"></i></p>
                        <a href="posts.php" class="btn btn-outline-light">VIEW</a>
                    </div>
                    <div class="bg-success mb-3 py-2 rounded-3">
                        <p class="h5">Categories</p>
                        <p class="h5"><i class="fa-regular fa-pen-to-square"></i></p>
                        <a href="categories.php" class="btn btn-outline-light">VIEW</a>
                    </div>
                    <div class="bg-warning py-2 rounded-3">
                        <p class="h5">Users</p>
                        <p class="h5"><i class="fa-solid fa-users"></i></p>
                        <a href="users.php" class="btn btn-outline-light">VIEW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- script -->
    <script src="https://kit.fontawesome.com/2a92be50d6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
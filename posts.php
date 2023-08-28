<?php
    session_start();
    include "functions/posts-functions.php";
    include "functions/categories-functions.php";

    if ($_SESSION['role'] == "U") {
        include "user-menu.php";
        $page = "add-post-by-user.php";
    }
    else {
        include "admin-menu.php";
        $page = "add-post.php";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid bg-primary text-white display-1 p-3">
        <i class="fa-solid fa-pen-nib ms-5 me-3"></i>Post
    </div>

    <div class="container mt-5">
        <div class="text-end">
            <a href="<?= $page ?>" class="btn btn-outline-dark btn-lg">
                <i class="fa-regular fa-pen-to-square"></i>Add Post
            </a>
        </div>
        <table class="table table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>POST ID</th>
                    <th>TITLE</th>
                    <th>CATEGORY</th>
                    <th>DATE POSTED</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $posts = getAllPosts();
                while ($post = $posts->fetch_assoc()) {
                    if ($_SESSION['role'] == "A"
                        || ($_SESSION['role'] == "U" && $post['account_id'] == $_SESSION['account_id'])) {
            ?> 
                    <tr>
                        <td><?= $post['post_id'] ?></td>
                        <td><?= $post['post_title'] ?></td>
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
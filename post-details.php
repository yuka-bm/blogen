<?php
    session_start();
    include "functions/posts-functions.php";
    include "functions/categories-functions.php";
    include "functions/users-functions.php";

    if ($_SESSION['role'] == "U") {
        include "user-menu.php";
        $page = "update-post-by-user.php";
    }
    else {
        include "admin-menu.php";
        $page = "update-post-by-admin.php";
    }

    $post_id = $_GET['post_id'];
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

    <div class="container w-50 mt-5">
        <div class="row">
            <a href="posts.php" class="fs-3 text-decoration-none text-secondary col text-start">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
            <a href="<?= $page ?>?post_id=<?= $post_id ?>" class="fs-4 text-decoration-none text-secondary col text-end">
                <i class="fa-solid fa-pen me-2"></i>Edit
            </a>
        </div>
        <div class="bg-light mt-3 p-3">
        <?php
            $post = getPost($post_id);
            $user = getUserAccount($post['account_id']);
        ?> 
            <div class="display-5"><?= $post['post_title'] ?></div>
            <div class="mt-2">
                By: <span class="text-primary me-3"><?= $user['username'] ?></span>
                <span class="me-3"><?= ($post['date_posted']) ?></span>
                <?= getCategoryName($post['category_id']) ?>
            </div>
            <div class="fs-5 mt-4">
                <?= ($post['post_message']) ?>
            </div>
        </div>
    </div>
    
    <!-- script -->
    <script src="https://kit.fontawesome.com/2a92be50d6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
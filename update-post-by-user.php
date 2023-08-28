<?php
    session_start();
    include "functions/posts-functions.php";
    include "functions/categories-functions.php";
    include "user-menu.php";

    $post_id = $_GET['post_id'];
    $post = getPost($post_id);

    if (isset($_POST['update_post'])) {
        updatePost($post_id);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Post</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid bg-primary text-white display-1 p-3">
        <i class="fa-solid fa-pen-nib ms-5 me-3"></i>Post
    </div>

    <div class="container text-center mt-5 w-50">
        <form action="#" method="POST">
            <h2 class="display-3"><i class="fa-regular fa-pen-to-square"></i>Update Post</h2>
            <input type="text" name="post_title" value="<?= $post['post_title'] ?>" class="form-input form-control border-1 border-dark border-top-0 border-start-0 border-end-0 rounded-0 mt-4" placeholder="TITLE" required>
            <input type="date" name="date_posted" id="date" value="<?= $post['date_posted'] ?>" class="form-input form-control border-1 border-dark border-top-0 border-start-0 border-end-0 rounded-0 mt-4" required>
            <select  name="category_id" id="category_id" class="form-select border-1 border-dark border-top-0 border-start-0 border-end-0 rounded-0 mt-4" required>
                <option value="" hidden>CATEGORY</option>
                <?php
                    $categories = getAllCategories();
                    while ($category = $categories->fetch_assoc()) {
                        if ($category['category_id'] == $post['category_id']) {
                            echo "<option value=" . $category['category_id'] . " selected>" . $category['category_name'] . "</option>";
                        }
                        else {
                            echo "<option value=" . $category['category_id'] . ">" . $category['category_name'] . "</option>";
                        }
                    }
                ?>
            </select>
            <textarea name="post_message" id="post_message" rows="7" class="form-control border-1 border-dark mt-4" placeholder="MESSAGE"><?= $post['post_message'] ?></textarea>
            <input type="submit" name="update_post" value="UPDATE POST" class="btn btn-dark form-control my-5">
        </form>
    </div>
    
    <!-- script -->
    <script src="https://kit.fontawesome.com/2a92be50d6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
<?php
    session_start();
    include "functions/posts-functions.php";
    include "functions/categories-functions.php";
    include "user-menu.php";

    if (isset($_POST['post'])) {
        addPost();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post By User</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid bg-primary text-white display-1 p-3">
        <i class="fa-solid fa-pen-nib ms-5 me-3"></i>Post
    </div>

    <div class="container text-center mt-5 w-50">
        <form action="" method="POST">
            <h2 class="display-3"><i class="fa-regular fa-pen-to-square"></i>Add Post</h2>
            <input type="text" name="title" class="form-input form-control border-1 border-dark border-top-0 border-start-0 border-end-0 rounded-0 mt-4" placeholder="TITLE" required>
            <input type="date" name="date" id="date" class="form-input form-control border-1 border-dark border-top-0 border-start-0 border-end-0 rounded-0 mt-4" required>
            <select name="category" class="form-select border-1 border-dark border-top-0 border-start-0 border-end-0 rounded-0 mt-4" required>
                <option value="" hidden>CATEGORY</option>
                <?php
                    $categories = getAllCategories();
                    while ($category = $categories->fetch_assoc()) {
                        echo "<option value=" . $category['category_id'] . ">" . $category['category_name'] . "</option>";
                    }
                ?>
            </select>
            <textarea name="message" id="message" rows="7" class="form-control border-1 border-dark mt-4" placeholder="MESSAGE"></textarea>
            <input type="submit" name="post" value="POST" class="btn btn-dark form-control my-5">
        </form>
    </div>
    
    <!-- script -->
    <script src="https://kit.fontawesome.com/2a92be50d6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
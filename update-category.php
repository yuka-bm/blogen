<?php
    session_start();
    include "admin-menu.php";
    include "functions/categories-functions.php";

    $category_id = $_GET['category_id'];

    if (isset($_POST['update'])) {
        updateCategory();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid bg-success text-white display-1 p-3">
        <i class="fa-solid fa-folder ms-5 me-3"></i>Category
    </div>

    <div class="container mt-5 w-25 mx-auto">
        <form action="#" method="POST">
            <input type="text" name="category" id="category" class="form-control" value=<?= getCategoryName($category_id) ?> required >
            <button type="submit" name="update" class="btn btn-dark form-control mt-3">UPDATE</button>
        </form>
        <a href="categories.php" class="btn btn-outline-dark form-control mt-2">Cancel</a>
    </div>
    
    <!-- script -->
    <script src="https://kit.fontawesome.com/2a92be50d6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
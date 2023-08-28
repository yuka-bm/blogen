<?php
    session_start();
    include "admin-menu.php";
    include "functions/categories-functions.php";
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

    <div class="container mt-5">
        <form action="#" method="POST" class="w-50 mx-auto">
            <div class="row">
                <div class="col-3 text-end">
                    <label for="add_category" class="form-label">Add Category</label>
                </div>
                <div class="col-8">
                    <input type="text" name="add_category" id="add_category" class="form-control">
                </div>
                <div class="col-1">
                    <input type="submit" name="add" value="ADD" class="btn btn-success">
                </div>
            </div>
        </form>

        <?php
            if (isset($_POST['add'])) {
                addCategory();
            }
        ?>

        <table class="table table-striped mx-auto w-50 mt-4">
            <thead class="table-dark">
                <tr>
                    <th>CATEGORY ID</th>
                    <th>CATEGORY NAME</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $categories = getAllCategories();
                while ($category = $categories->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?= $category['category_id'] ?></td>
                        <td><?= $category['category_name'] ?></td>
                        <td>
                            <a href="update-category.php?category_id=<?= $category['category_id'] ?>" class='btn btn-warning'>Update</a>
                        </td>
                        <td>
                            <a href="delete-category.php?category_id=<?= $category['category_id'] ?>" class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>
            <?php
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
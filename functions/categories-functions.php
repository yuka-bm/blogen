<?php
    require_once "connection.php";

    function addCategory() {
        $category = $_POST['add_category'];

        if (null != $category) {
            $conn = connection();
            $sql = "INSERT INTO categories (category_name) VALUES ('$category')";

            if ($conn->query($sql)) {
                // header('refresh: 0');
                echo "<div class='alert alert-success mt-4 mx-auto w-50 p-2 text-center rounded'>NEW CATEGORY ADDED: $category</div>";
            }
            else {
                die('Error adding category' . $conn->error);
            }
        }
    }

    function getAllCategories() {
        $conn = connection();
        $sql = "SELECT * FROM categories";

        if ($categories = $conn->query($sql)) {
            return $categories;
        }
        else {
            die('Error retrieving category' . $conn->error);
        }
    }

    function getCategoryName($category_id) {
        $conn = connection();
        $sql = "SELECT * FROM categories WHERE category_id = $category_id";

        if ($result = $conn->query($sql)) {
            $category = $result->fetch_assoc();

            if (null != $category) {
                return $category['category_name'];
            }
            else {
                return "unknown";
            }
        }
        else {
            die('Error retrieving category' . $conn->error);
        }
    }

    function updateCategory() {
        $category_id = $_GET['category_id'];
        $category_name = $_POST['category'];

        if (null != $category_name) {
            $conn = connection();
            $sql = "UPDATE categories SET category_name = '$category_name' WHERE category_id = $category_id";
            
            if ($conn->query($sql)) {
                header('location: categories.php');
                exit;
            }
            else {
                die('Error updating category' . $conn->error);
            }
        }
    }

    function deleteCategory() {
        $category_id = $_GET['category_id'];
        $conn = connection();
        $sql = "DELETE FROM categories WHERE category_id = $category_id";

        if ($conn->query($sql)) {
            header('location: categories.php');
            exit;
        }
        else {
            die('Error deleating category' . $conn->error);
        }
}
?>

<?php
    require_once "connection.php";

    function getAllAuthors() {
        $conn = connection();
        $sql = "SELECT * FROM accounts";

        if ($result = $conn->query($sql)) {
            return $result;
        }
        else {
            die('Error retrieving authors: ' . $conn->error);
        }
    }

    function addPost() {
        $title = $_POST['title'];
        $date = $_POST['date'];
        $category = $_POST['category'];
        $message = $_POST['message'];
        if ($_SESSION['role'] == "U") {
            $author = $_SESSION['account_id'];
        }
        else {
            $author = $_POST['author'];
        }

        $conn = connection();
        $sql = "INSERT INTO posts (post_title, post_message, date_posted, category_id, account_id)
                            VALUES ('$title', '$message', '$date', '$category', '$author')";

        if ($conn->query($sql)) {
            header('location: posts.php');
            exit;
        }
        else {
            die('Error retrieving posts: ' . $conn->error);
        }
    }
    
    function getAllPosts() {
        $conn = connection();
        $sql = "SELECT * FROM posts";

        if ($result = $conn->query($sql)) {
            return $result;
        }
        else {
            die('Error retrieving posts: ' . $conn->error);
        }
    }
    
    function getPost($post_id) {
        $conn = connection();
        $sql = "SELECT * FROM posts WHERE post_id = $post_id";

        if ($result = $conn->query($sql)) {
            return $result->fetch_assoc();
        }
        else {
            die('Error retrieving posts: ' . $conn->error);
        }
    }

    function updatePost($post_id) {
        $post_title = $_POST['post_title'];
        $post_message = $_POST['post_message'];
        $date_posted = $_POST['date_posted'];
        $category_id = $_POST['category_id'];
        if ($_SESSION['role'] == "U") {
            $account_id = $_SESSION['account_id'];
            $location = "location: posts.php";
        }
        else {
            $account_id = $_POST['account_id'];
            $location = "location: dashboard.php";
        }

        $conn = connection();
        $sql = "UPDATE posts 
                SET post_title = '$post_title', post_message = '$post_message', date_posted = '$date_posted', 
                    category_id = $category_id, account_id = $account_id 
                WHERE post_id = $post_id";

        if ($conn->query($sql)) {
            header($location);
            exit;
        }
        else {
            die('Error updating posts: ' . $conn->error);
        }        
    }
?>
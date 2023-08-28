<?php
    require_once "connection.php";

    // function register
    function register($to_login){
        $conn = connection();
        //form data from register.php
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // $avatar = 'temporary_name.jpg';
        // check if the username is already exist
        $sql_userCheck = "SELECT * FROM accounts WHERE username = '$username'";

        if($result = $conn->query($sql_userCheck)){
            if($result->num_rows != 0){
                // echo "<p class='text-danger'>Username already exist!</p>";
                echo "<div class='alert alert-danger mt-4 mx-auto p-2 text-center rounded'>Username already exist!</div>";
            }
            else{
                //sql accounts
                $sql_accounts = "INSERT INTO accounts (username, password) VALUES ('$username', '$password')";
                if($conn->query($sql_accounts)){
                    /*insert_id---> will help us get the last generated account_id in the accounts table.
                        And it will pass to variable $account_id. and it is now the current id to send to the users table as Foreign Key*/
                    $account_id = $conn->insert_id; // 42
                    //if successful then create another sql: below;
                    // sql_users
                    $sql_users = "INSERT INTO users (first_name, last_name, address, contact_number, account_id) VALUES ('$first_name', '$last_name', '$address', '$contact_number', '$account_id')";
                    if($conn->query($sql_users)){
                        if ($to_login) {
                            header('location: login.php');
                            exit;
                        }
                        else {
                            echo "<div class='alert alert-success mt-4 mx-auto p-2 text-center rounded'>NEW USER ADDED: $username</div>";
                        }
                        // echo "<script> window.location = 'login.php'; </script>";
                    }else{
                        die("Error inserting to users table: " . $conn->error);
                    }
                }else{
                    die("Error inserting to accounts table: " . $conn->error);
                }
            }
        }else{
            die("Error query sql_userCheck: " . $conn->error);
        }
    }// end function register()

    //function login
    function login(){
        $conn = connection();
        //form data
        $username = $_POST['username'];
        $password = $_POST['password'];
        //variable for error
        $error = "<div class='alert alert-danger text-center fw-bold' role='alert'>Incorrect Username or Password</div>";
        $sql = "SELECT * FROM accounts WHERE username = '$username'";

        if($result = $conn->query($sql)){
            if($result->num_rows == 1){
                $user_details = $result->fetch_assoc();
                // $user_details = ['account_id' => 1, 'username' => 'chi', 'password' => '#tsd%sdADs', 'role' => 'A'];
                if(password_verify($password, $user_details['password'])){
                    session_start();
                    $_SESSION['account_id'] = $user_details['account_id'];
                    $_SESSION['role'] = $user_details['role'];
                    $_SESSION['username'] = $user_details['username'];
                    $_SESSION['full_name'] = getFullname($user_details['account_id']);// 'Chihiro Fujii';
                    if($user_details['role'] == 'A'){
                        header("location: dashboard.php");
                    }elseif($user_details['role'] == 'U'){
                        header("location: profile.php");
                    }
                    exit;
                }else{
                    echo $error;
                }
            }else{
                echo $error;
            }
        }else{
            die("Error: " . $conn->error); // try now login using different account admin and user
        }
    }//end function login

    //function getFullname
    function getFullname($account_id){
        $conn = connection();
        $sql = "SELECT first_name, last_name FROM users WHERE account_id = $account_id";
        if($result = $conn->query($sql)){
            $full_name = $result->fetch_assoc();
            // $full_name = ['first_name' => 'Chihiro', 'last_name' => 'Fujii'];
            return $full_name['first_name'] . " " . $full_name['last_name'];
            // return 'Chihiro Fujii';
        }else{
            die("Error: " . $conn->error); //now continue the login function
        }
    }// end function getFullname

    function getAllUsers() {
        $conn = connection();
        $sql = "SELECT * FROM users";
        
        if($result = $conn->query($sql)){
            return $result;
        }else{
            die("Error retrieving users: " . $conn->error);
        }
    }

    function getUserAccount($account_id) {
        $conn = connection();
        $sql = "SELECT * FROM accounts WHERE account_id = $account_id";
        
        if($result = $conn->query($sql)){
            return $result->fetch_assoc();
        }else{
            die("Error retrieving account: " . $conn->error);
        }
    }

    function getUser($account_id) {
        $conn = connection();
        $sql = "SELECT * FROM users WHERE account_id = $account_id";
        
        if($result = $conn->query($sql)){
            return $result->fetch_assoc();
        }else{
            die("Error retrieving user: " . $conn->error);
        }
    }

    function updateUser($account_id, $profile) {
        // info from form
        $password = $_POST['password'];
        // get account ID
        $user = getUser($account_id);
        $account = getUserAccount($account_id);
    
        if(password_verify($password, $account['password'])) {
            // info from form
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $contact_number = $_POST['contact_number'];
            $address = $_POST['address'];
            $avatar = $_FILES['avatar']['name'];
            $avatar_tmp = $_FILES['avatar']['tmp_name'];
            $username = $_POST['username'];
            
            if (null != $avatar) {
                $dir = "images";
                if (!file_exists($dir)) {
                    mkdir($dir, 0777);
                }
                $destination = $dir . "/" . $avatar;
                move_uploaded_file($avatar_tmp, $destination);
            }
            else {
                $avatar = $user['avatar'];
            }

            $conn = connection();
            $sql = "UPDATE accounts 
                    INNER JOIN users 
                    ON users.account_id = accounts.account_id
                    SET users.first_name = '$first_name', users.last_name = '$last_name', 
                        users.contact_number = '$contact_number', users.address = '$address',
                        accounts.username = '$username', users.avatar = '$avatar'
                    WHERE accounts.account_id = $account_id";
            
            if($conn->query($sql)){
                if ($profile) {
                    header('refresh: 0');
                }
                else {
                    header('location: users.php');
                    exit;
                }
            }
            else {
                die("Error updating user and account: " . $conn->error);
            }
        }
        else {
            echo "<div class='alert alert-danger text-center fw-bold m-3' role='alert'>Incorrect Password</div>";
        }
    }

    function deleteUser($account_id) {
        $user = getUser($account_id);
        $avatar = $user['avatar'];

        $conn = connection();
        $sql = "DELETE accounts, users FROM accounts 
        INNER JOIN users 
        ON users.account_id = accounts.account_id
        WHERE accounts.account_id = $account_id";
        // WHERE users.account_id = $account_id";
        
        if($conn->query($sql)){
            deleteAvatar($avatar);
            header('location: users.php');
        }else{
            die("Error retrieving users: " . $conn->error);
        }
    }

    function deleteAvatar($avatar) {
        $conn = connection();
        $sql = "SELECT avatar FROM users WHERE avatar = '$avatar'";

        if (null != $avatar) {
            if($result = $conn->query($sql)) {
                if ($result->num_rows == 0) {
                    unlink("images/$avatar");
                }
            }else{
                die("Error retrieving avatar: " . $conn->error);
            }
        }
    }

    function updatSession() {
        $user = getUserAccount($_SESSION['account_id']);
        $_SESSION['username'] = $user['username'];
        $_SESSION['full_name'] = getFullname($_SESSION['account_id']);
    }
?>
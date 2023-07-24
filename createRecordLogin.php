<?php
session_start();
include('connection_database.php');

$username = (!empty($_POST["username"])) ? $_POST["username"] : "";
$password = (!empty($_POST["password"])) ? $_POST["password"] : "";

// Check if username already exists in the register table
$checkQuery = "SELECT username FROM register WHERE username = '$username'";
$checkResult = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    // Username already exists in the register table

    // Check if username already exists in the user_login table
    $checkQuery2 = "SELECT username FROM user_login WHERE username = '$username'";
    $checkResult2 = mysqli_query($conn, $checkQuery2);

    if (mysqli_num_rows($checkResult2) > 0) {
        // Username already exists in the user_login table, update the existing record
        $updateQuery = "UPDATE user_login SET password = '$password' WHERE username = '$username'";
        if (mysqli_query($conn, $updateQuery)) {
            echo "Record updated successfully!";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        // Username doesn't exist in the user_login table, insert the new user
        $insertQuery = "INSERT INTO user_login (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($conn, $insertQuery)) {
            echo "Login successful!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    // Determine the role of the user
    $sql= "SELECT * FROM register WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $role = $row["userType"];

        if ($role == "admin"){
            echo '<script type="text/javascript">
            alert("Login successfully as admin");
            window.location = "admin_page.php";
            </script>';
            exit();
        } else {
            echo '<script type="text/javascript">
            alert("Login successfully as user");
            window.location = "user_page.php";
            </script>';
            exit();
        }
    } else {
        echo '<script type="text/javascript">
        alert("Password not correct");
        window.location = "login.html";
        </script>';
        exit();
    }
} else {
    // Username doesn't exist in the register table
    echo '<script type="text/javascript">
    alert("Username does not exist");
    window.location = "login.html";
    </script>';
    exit();
}

mysqli_close($conn);
?>




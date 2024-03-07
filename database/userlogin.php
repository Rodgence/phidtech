<!-- include database connection -->
<?php

include("dbconnection.php");

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Sanitize user inputs
    $email = ($_POST["email"]);
    $password = ($_POST["pass"]);

   

    // SQL query to fetch user based on email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);



    if ($result) {
        // Check if user exists
        if (mysqli_num_rows($result) == 1) {
            // Fetch user data
            $row = mysqli_fetch_assoc($result);
            // Verify password
            if ($row['password_hash'] == $hashed_password) {
                // Passwords match, user is authenticated
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                // Redirect to dashboard or desired page
                header("Location: ../admin/home.php");
                exit();
            } else {
                // Incorrect password
                $error_message = "Invalid email or password.";
            }

        } else {
            // User not found
            $error_message = "Invalid email or password.";
        }
    } else {
        // Error executing SQL query
        $error_message = "Error: " . mysqli_error($conn);
    }
}
?>

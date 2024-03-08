<!-- database connection -->
<?php
    include("../database/dbconnection.php");




// Check if the ID parameter is set in the URL
if (isset($_GET['id'])) {
    // Sanitize the ID parameter to prevent SQL injection
    $postId = mysqli_real_escape_string($conn, $_GET['id']);

    // Construct the DELETE query
    $sql = "DELETE FROM BlogPosts WHERE id = '$postId'";

    // Execute the DELETE query
    if (mysqli_query($conn, $sql)) {
        header("Location: home.php?message=deleted");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Post ID not provided";
}

// Close the database connection
mysqli_close($conn);
?>

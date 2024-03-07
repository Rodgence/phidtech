<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
  
<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-md-6 bg-light">
            <h3 class="text-center">
                Update a blog post
            </h3>

            <!-- input form -->
            <form action="blogpost.php" method="POST" enctype="multipart/form-data">
                    <label for="image" class="form-label">Blog image:</label>
                    <input type="file" name="image" id="" class="form-control mb-3" required>
                    <label for="title" class="form-label">Blog Post Title:</label>
                    <input type="text" name="title" id="" class="form-control mb-3" placeholder="Blog Title" required>
                    <textarea name="message" id="" cols="70" rows="10" placeholder="Enter a blog post" required></textarea>
                    <button class="btn bg-primary w-100 text-light" type="submit" name="submit">Publish</button>
            </form>
            <!-- show success message from php URL response -->
            <?php
                // Check if 'quote' parameter is set in the URL
                if(isset($_GET['quote'])){
                    $message = $_GET['quote'];

                    // Check if the message is 'updated'
                    if($message == "updated"){
                        ?>
                        <div class="alert alert-success mt-3" role="alert">
                            Hey! admin Your post was updated successfully 
                        </div>
                        <?php
                    }
                }
            ?>
            
        </div>
    </div>
</div>


</body>

<!-- script -->
<script src="../assets/vendor/bootstrap/css/bootstrap.min.js"></script>
</html>
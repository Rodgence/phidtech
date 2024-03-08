<!-- database connection -->
<?php
    include("../database/dbconnection.php");
    
?>


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
        <div class="col-md-12 bg-light">
            <h3 class="text-center">
                Update a blog post
            </h3>

            <!-- input form -->
            <form action="blogpost.php" method="POST" enctype="multipart/form-data">
                    <label for="image" class="form-label">Blog image:</label>
                    <input type="file" name="image" id="" class="form-control mb-3" required>
                    <label for="title" class="form-label">Blog Post Title:</label>
                    <input type="text" name="title" id="" class="form-control mb-3" placeholder="Blog Title" required>
                    <textarea name="message" id="" cols="140" rows="10" placeholder="Enter a blog post" required></textarea>
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
<div class="container">
    <div class="row">
        <div class="col-md-6">
        
             <!-- fetch from a database -->
             <?php
                                  $sql = "SELECT *, LEFT(message, 85) AS truncated_message FROM BlogPosts";
                                  $result = mysqli_query($conn, $sql);

                                  if (mysqli_num_rows($result) > 0) {
                                      // Output data of each row
                                      while($row = mysqli_fetch_assoc($result)) {
                              ?>
                                        
                                              
                                                  <img src="<?php echo $row["image_path"]; ?>" class="card-img-top" alt="...">
                                                  <div class="card-body mb-3">
                                                    <h5 class="card-title"><?php echo $row["title"]; ?></h5>
                                                    <p class="card-text"><?php echo $row["truncated_message"]; ?></p>
                                                    <a href="delete.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger w-100">Delete</a>
                                                  </div>
                                              
                                        
                              <?php
                                      }
                                  } else {
                                      echo "0 results";
                                  }

                                  mysqli_close($conn);
                        ?>                    
      
        </div>
    </div>
</div>


</body>

<!-- script -->
<script src="../assets/vendor/bootstrap/css/bootstrap.min.js"></script>
</html>
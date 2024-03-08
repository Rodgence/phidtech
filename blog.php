<?php
    include("includes/header.php");
    include("database/dbconnection.php");
?>


 <!-- query data from the database -->

 <div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
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
    <div class="col-md-2"></div>
  </div>
 </div>

  <?php
    include("includes/footer.php");
?>

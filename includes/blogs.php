<?php
    include("./database/dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phidtech</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
   
      <div class="container my-5">
          <div class="row d-flex justify-content-center">
            <h1 class="text-center mb-2">
                News & Events
            </h1>
              <div class="col-12">
                <div id="carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel" data-slide-to="0" class="active bg-secondary"></li>
                        <li data-target="#carousel" data-slide-to="1" class="bg-secondary"></li>
                        <li data-target="#carousel" data-slide-to="2" class="bg-secondary"></li>
                      </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="row">

                        <!-- fetch from a database -->
                        <?php
                                  $sql = "SELECT *, LEFT(message, 85) AS truncated_message FROM BlogPosts";
                                  $result = mysqli_query($conn, $sql);

                                  if (mysqli_num_rows($result) > 0) {
                                      // Output data of each row
                                      while($row = mysqli_fetch_assoc($result)) {
                              ?>
                                          <div class="col-12 col-md-6 col-xl-3 mb-4">
                                              <div class="card mr-3">
                                                  <img src="admin/<?php echo $row["image_path"]; ?>" class="card-img-top" alt="...">
                                                  <div class="card-body">
                                                    <h5 class="card-title"><?php echo $row["title"]; ?></h5>
                                                    <p class="card-text"><?php echo $row["truncated_message"]; ?></p>
                                                    <a href="./blog-single.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Read more</a>
                                                  </div>
                                              </div>
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
              </div>
          </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>
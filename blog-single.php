<!-- include header file -->
<?php
    include("includes/header.php");
    include("database/dbconnection.php");
?>

<body</>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <h2 >Read Now</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-12 entries">
 
            <!-- fetch from a database -->
            <?php
            if(isset($_GET['id']) && is_numeric($_GET['id'])) {
              $id = $_GET['id'];
                                  $sql = "SELECT *, LEFT(message, 10000) AS truncated_message FROM BlogPosts WHERE id=$id";
                                  $result = mysqli_query($conn, $sql);

                                  if (mysqli_num_rows($result) > 0) {
                                      // Output data of each row
                                      while($row = mysqli_fetch_assoc($result)) {
                                 ?> <article class="entry entry-single">

             <div class="entry-img">
                  <img src="admin/<?php echo $row["image_path"]; ?>" class="card-img-top"> 
              </div>

              <h2 class="entry-title">
                      <?php echo $row["title"]; ?>
              </h2>

              <div class="entry-content">
                <p>
                      <?php echo $row["truncated_message"]; ?>
                </p>


              </div>
              

            </article><!-- End blog entry -->

            </div><!-- End blog comments -->


            </div><!-- End sidebar --><?php
          }
        } else {
            echo "0 results";
        }

        mysqli_close($conn);
      }
?>


          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->

<?php
    include("includes/footer.php");
?>
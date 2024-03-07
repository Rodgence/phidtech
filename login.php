<!-- include header file -->
<?php
    include("includes/header.php");
?>

<!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight" >
           Hello  <br />
            <span class="text-danger" id="login">Admin</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
          Phidtech is an ICT and Business consulting company. It offers range of business activities.
          Login to update some changes, <small>remember Life is good.</small>
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
              <form action="database/userlogin.php" method="POST">
                <!-- 2 column grid layout with text inputs for the first and last names -->

                    <h2 class="text-center">Admin Login</h2>
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3" class="form-control" name="email" required>
                  <label class="form-label" for="form3Example3">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4" class="form-control" name="pass" required>
                  <label class="form-label" for="form3Example4">Password</label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-danger btn-block mb-4 w-100" id="login" name="submit">
                  Login
                </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->






<!-- include footer file -->
<?php
    include("includes/footer.php");
?>
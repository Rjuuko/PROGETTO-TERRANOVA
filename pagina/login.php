

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>FIVEHOUSE | Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/pricing/">

    
<style>
    .row{
        background-color:linear-gradient(#e66465, #9198e5);
    }
</style>
    

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Section: Design Block -->
<body>
<?php if(isset($_REQUEST['username']) and isset($_REQUEST['password'])) {
    echo "<h1>Benvenuto, " . $_REQUEST['username'] . "</h1>";}?>

<?php function db_connect() {
    $servername = "";
    $username = "";
    $password = "";
    $dbname = "";
}
$conn = mysqli_connect($servername, $username, $password, $dbname);?>


<section class="section">
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
      <div class="container">
        <div class="row gx-lg-5 align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="card">
              <div class="card-body py-5 px-md-5">
                <form>
                    <legend>
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <h1 class="my-5 display-3 fw-bold ls-tight"> Form di Login
                            </h1>
                          </div>
                    </legend>
                  <!-- 2 column grid layout with text inputs for the first and last names -->
  
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" id="form3Example3" class="form-control" />
                    <label class="form-label" for="form3Example3">Email address</label>

  
                  <!-- Password input -->

                    <input type="password" id="form3Example4" class="form-control" />
                    <label class="form-label" for="form3Example4">Password</label>
                  </div>
  
                  <!-- Checkbox -->
  
                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary btn-block mb-4">
                    Log in
                  </button>
                  <p><a href=register.php class="links">Need an account?</a>
  
                  <!-- Register buttons -->
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>

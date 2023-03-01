

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>FIVEHOUSE | Opzioni di accesso</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/pricing/">

    
<style>
    .row{
        background-color:linear-gradient(#e66465, #9198e5);
    }
    .card{
      width:63vw;
    }
</style>
    

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Section: Design Block -->
<body>
<?php 
  session_start();
  if(isset($_SESSION['email']) && isset($_SESSION['password'])){
    header("location: index.html");
  }
?>

<section class="section">
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
      <div class="container">
        <div class="row gx-lg-5 align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="card">
              <div class="card-body py-5 px-md-5">
                <form method="POST" action="login/registration.php" >
                    <legend>
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <h4 class="my-5 display-3 fw-bold ls-tight"> Form di Registrazione</h4>
                          </div>
                    </legend>
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <!-- Email input -->
                  
                  <div class="form-outline mb-4">

                  <!-- facoltativo dato che nel db nome può essere null -->
                    <label class="form-label" for="form3Example4">Nome</label>
                    <input type="text" id="form3Example4" class="form-control" />

                  <!-- facoltativo dato che nel db il cognome può essere null -->
                    <label class="form-label" for="form3Example4">Cognome</label>
                    <input type="text" id="form3Example4" class="form-control" />

                    <label class="form-label" for="form3Example3">Indirizzo Email</label>
                    <input type="email" id="form3Example3" class="form-control" name="email" />

                    <label class="form-label" for="form3Example4">Password</label>
                    <input type="password" id="form3Example4" class="form-control" name="passwd"/>

                    <!-- facoltativo dato che nel db numero di telefono può essere null -->
                    <label class="form-label" for="form3Example4">numero di telefono</label>
                    <input type="password" id="form3Example4" class="form-control" name="passwdconf" />
                  </div>
  
                  <!-- Checkbox -->
  
                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary btn-block mb-4">
                    Log in
                  </button>
                  <p><a href=login.php class="links">Already have an account?</a>
  
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

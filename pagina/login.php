

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
    div.alert {
      padding: 20px;
      background-color: red;
      color: white;
    }

    .closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
    }

    .closebtn:hover {
      color: black;
    }
</style>
    

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Section: Design Block -->
<body onload="displayalert()">



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
                <form method="POST" action='login/authentication.php' onSubmit="return checkLogin(this)">
                    <legend>
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <h1 class="my-5 display-3 fw-bold ls-tight"> Form di Login
                            </h1>
                          </div>
                    </legend>
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  
                  <!-- box of eventual errors -->
                  <?php 
                  if(isset($_REQUEST['e'])){
                  ?>
                  <div class="" id="errbox">
                    <p id="jserror"></p>
                  <?php
                    if($_REQUEST['e'] == 1){
                  ?>
                      <!-- Inserisci testo in caso di email sbagliata -->
                    <div class="alert">
                      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                      <strong>Errore</strong>. Indirizzo E-mail errato!
                     </div>
                  <?php }elseif($_REQUEST['e'] == 2){?>
                      <!-- Inserisci testo in caso di password sbagliata -->
                    <div class="alert">
                      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                      <strong>Errore</strong>. Password errata!
                     </div>
                  <?php }?> 
                  </div>
                  <?php }?>


                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" id="form3Example3" class="form-control" name="email" />
                    <label class="form-label" for="form3Example3">Email address</label>

  
                  <!-- Password input -->

                    <input type="password" id="form3Example4" class="form-control" name="passwd" />
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

  <script>
      function displayalert(){
        let check = <?php echo  isset($_REQUEST['newAcc']);?> 
        console.log(check)
        if(check){
          alert("Account creato con successo!");
        }
      }

    </script>
</body>
</html>

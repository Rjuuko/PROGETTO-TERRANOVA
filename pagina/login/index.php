<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Login </h1>   
    <div id="FormDiv">
        <form method="POST" action='authentication.php'>
            <label for="email" > Nome Utente </label> <br>
            <input type="text" id="email" name="email" placeholder="Nome Utente" > <br> 
            <label for="passwd">Password </label> <br>
            <input type="password" id="passwd" name="passwd" placeholder="Password"> <br>
            <input type="submit" value="login" class="button">
        </form>    
    </div>
</body>
</html>
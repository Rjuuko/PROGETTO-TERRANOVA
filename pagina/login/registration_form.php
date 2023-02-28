<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Registration </h1>
    <form method="POST" action="registration.php">
        <label for="email" > Email </label> <br>
            <input type="text" id="email" name="email" placeholder="Email" class="input"> <br> 
            <label for="passwd">Password </label> <br>
            <input type="password" id="passwd" name="passwd" placeholder="Password" class="input"> <br> 
            <label for="passwdconf">Conferma password </label> <br>
            <input type="password" id="passwdconf" name="passwdconf" placeholder="Password" class="input"> <br> 
            <input type="submit" value="CREATE ACCOUNT" class="button">
    </form>
</body>
</html>
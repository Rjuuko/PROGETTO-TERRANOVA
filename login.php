<!DOCTYPE html>
<html>
    <head>
        <title>FIVEHOUSE | Login</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <style>
        <?php include './style/styles.css'; ?>
</style>
    </head>
    <body class="body">
    <script src="terranovajs.js"></script>
        <form style=class:form>
            <fieldset style=class:fieldset>
                <legend style=class:legend>
                    <h1> Login </h1>
                </legend>
</br>
                <input type="email" style=margin-top:15% id="email" placeholder="email" name="mail" maxlength="50" required>
        <pre></pre>
                <input type="password" id="password" placeholder="Password" name="password" required>
                <pre></pre>
                <input onmouseover="change_bg(this)" onmouseout="change_bg_back(this)" type="submit" value="Login">
        <pre></pre>
        <p><a href=registration.php class="links">Need an account?</a>
        </fieldset>
        </form>
        <script>
</script>
    </body>
</html>

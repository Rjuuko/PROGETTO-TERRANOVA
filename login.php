<!DOCTYPE html>
<html>
    <head>
        <title>FIVEHOUSE | Login</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <style>
        <?php include './style/styles.css'; ?>
</style>
    </head>
    <body style=background-color:#2b3031>
        <form style=class:form>
            <fieldset style=class:fieldset>
                <legend style=class:legend>
                    <h1 style=class:h1> Login </h1>
                </legend>
</br>
                <input type="email" id="email" placeholder="email" name="mail" maxlength="50" required>
        <pre></pre>
                <input type="password" id="password" placeholder="Password" name="password" required>
                <pre></pre>
                <input type="submit" value="Send Request" />
        <pre></pre>
        </fieldset>
            <p style=color:#ffffff>already a partner?<a href=registration.php>click me!</a></p>
        </form>
    </body>
</html>

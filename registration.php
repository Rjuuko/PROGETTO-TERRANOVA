<!DOCTYPE html>
<html>
    <head>
        <title>FIVEHOUSE | Registration</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <style>
        <?php include './style/styles.css'; ?>
</style>
    </head>
    <body style=background-color:#2b3031>
        <form style=class:form>
            <fieldset style=class:fieldset>
                <legend style=class:legend>
                    <h1 style=class:h1> Register </h1>
                </legend>
</br>
                <input type="text" id="first_name" placeholder="first name" name="name" maxlength="50" required>
        <pre></pre>
                <input type="text" id="last_name" placeholder="last name" name="surname" maxlength="50" style=class:input-type required>
        <pre></pre>
                <input type="text" id="username" placeholder="Username" name="username" maxlength="50" required>
        <pre></pre>
                <input type="email" id="email" placeholder="email" name="mail" maxlength="50" required>
        <pre></pre>
                <input type="password" id="password" placeholder="Password" name="password" required>
        <pre></pre>
                <input type="submit" value="Sign up" />
        <pre></pre>
        <p><a href=login.php class="links">already a partner?</a>
            </fieldset>
        </form>
    </body>
</html>

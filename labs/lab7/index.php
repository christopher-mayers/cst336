<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel = "stylesheet" href = "css/styles.css" type="text/css">
        <title> Admin Login </title>
    </head>
    <body>

        <form method = "POST" action = "api/loginProcess.php">
            
            Username: <input type = "text" name = "username" id = "username">
            
            <br>
            
            Password: <input type = "password" name = "password">
            
            <br>
            
            <input type = "submit" value = "Login">
            
            <br></br>
            
            <div id = "error">
                
                <?php
                    if ($_GET['error'] == "true")
                    {
                        echo "Error: Username or Password is incorrect";
                    }
                ?>
                
            </div>
            
            
        </form>

    </body>
</html>
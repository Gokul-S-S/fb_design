<?php
    include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method = "post">
        <h2>Welcome to FB</h2>
        username:<br>
        <input type="text" name = "username"><br>
        password:<br>
        <input type="password" name = "password"><br>
        <input type="submit" name = "Login" value = "Login"><br>
    </form>
</body>
</html>
<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($username)){
            echo "please enter a username";
        }
        elseif(empty($password)){
            echo "please enter a strong password";
        }

        else{
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO marriage(people, password)
                    VALUES('$username', '$hash')";

        try{
            mysqli_query($conn, $sql);  
            echo "you are now login";      

        }
        catch(mysqli_sql_exception){
            echo "that username is taken";
        }

        }
       
           
        }

  

    

    mysqli_close($conn);
?>
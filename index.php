<?php
  include("connection.php");
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="form">
        <h1>Login form</h1>
        <form name="form" action="login.php"onsubmit="return invalid()"method="POST">
            <label>Username</label>
            <input type="text" id="user"name="user"></br></br>
            <label>Password</label>
            <input type="password" id="pass"name="pass"></br></br>
            <input type="submit"id="btn"values="Login"name="submit"/>
        </form>
        </div>
        <script>
            function invalid(){
                var user=document.form.user.value;
                var pass=document.form.user.value;
                if(user.length==""&& pass.length){
                    alter("Username and password fields is empty!!!");
                    return false    
                }
                else{
                    if(user.length==""){
                    alter("Username is empty!!!");
                    return false    
                }
                if(pass.length==""){
                    alter("Password is empty!!!");
                    return false    
                }
                }
            }
        </script>
</body>
</html>

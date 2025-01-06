<?php
    include("connection.php");
    echo "LOGIN";
    if(isset($_POST['submit'])){
        echo $username=$_POST['username'];
        echo $password=$_POST['password'];

        echo $sql="select password from login where username='$username'";
        $result=mysqli_query(mysql:$conn,query:$sql);
        $row=mysqli_fetch_assoc(result:$result);
        if($password==$row["password"]){
            session_start();
          echo $_SESSION["userid"]=$username;
        header(header:"Location:request.php");
            exit();
        }
        else{
            $_SESSION['error']='Invalid Username/Password';
            header(header:"Location:index.html");
            exit();
        }
    }
    ?>
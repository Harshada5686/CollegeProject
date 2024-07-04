<?php
        session_start();

     $servername = "localhost";
     $uname = "root";
     $password = "";
     $database = "book_website";
     $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

     $error_email = $error_password =$error_confirmpassword ="";
     $conn = new mysqli($servername, $uname, $password, $database);
     if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
        $email =$_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        if(empty($_POST['email'])) 
        {
            $error_email = "Email is required";
        }
        else if (preg_match($pattern, $_POST['email'])){
            $error_email = "";
        }
        else{
            $error_email = "Please enter valid email id";
        }

    // Check if username is empty
    if(empty($password)) {
        $error_password = "Password is required";

    }
    if(empty($confirmpassword)) {
        $error_confirmpassword = "Confirmpassword is required";

    }
    if (empty($error_email) && empty($error_password) && empty($error_confirmpassword) ) 
    {
        
        if (isset($_POST["LOGIN"])) 
        {

            if ($_SERVER["REQUEST_METHOD"] == "POST")
             {
                $sql = "INSERT INTO login (Email,Password) VALUES ('$email', '$password')";
        
                if ($conn->query($sql) === TRUE) 
                {
                    echo '<script type="text/javascript">';
                    echo ' alert("Login successfully!!")';  //not showing an alert box.
                    echo '</script>';

                    header("Location: store.php");
                    exit();


                } else {
                    echo '<script type="text/javascript">';
                    echo ' alert("faild")';  
                    echo '</script>';
                }
            }
        
        } 
        else if (isset($_POST["signup"])) 
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST")
             {
                $sql = "INSERT INTO signup (Email,Password,Confirmpassword) VALUES ('$email', '$password','$confirmpassword')";
        
                if ($conn->query($sql) === TRUE) 
                {
                    echo '<script type="text/javascript">';
                    echo ' alert("Sign up successfully!!")';  //not showing an alert box.
                    echo '</script>';

                    header("Location: store.php.php");
                    exit();
                } else {
                    echo '<script type="text/javascript">';
                    echo ' alert("faild")';  
                    echo '</script>';
                }
            }
        }
    }
}
    $conn->close();
    ?>
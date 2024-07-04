<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Welcome to iCoder. A blog for coding enthusiasts">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>BookHubWebSite.com</title>
    <?php
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
        
        if (isset($_POST["login"])) 
        {

            if ($_SERVER["REQUEST_METHOD"] == "POST")
             {
                $sql = "INSERT INTO login (Email,Password) VALUES ('$email', '$password')";
        
                if ($conn->query($sql) === TRUE) 
                {
                    echo '<script type="text/javascript">';
                    echo ' alert("Login successfully!!")';  //not showing an alert box.
                    echo '</script>';

                    header("Location: marks.php");
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
                    header("Location: marks.php");
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
</head>
<body>
    <section id="navigationBar">
        <nav class="navbar navbar-expand-lg ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <nav class="navbar navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="../images/Logo.png" alt="" width="34" height="34"
                            class="d-inline-block align-text-top"><span> BookHub</span></a>
                </div>
            </nav>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item nav">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item nav">
                        <a class="nav-link" href="about.html">About</a>
                    </li>

                    <li class="nav-item dropdown nav">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="store.php">Mystery</a>
                            <a class="dropdown-item" href="store.php">Biography</a>
                            <a class="dropdown-item" href="store.php">Fantasy</a>
                            <a class="dropdown-item" href="store.php">Historical fiction</a>
                            <a class="dropdown-item" href="store.php">Literary Fiction</a>
                        </div>
                    </li>
                    <li class="nav-item nav">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item nav">
                        <a class=" nav-link navbar-brand" href="#">
                            <img src="../images/Cart.png" alt="" width="30" height="24">
                        </a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
                </form>
                <div class="mx-2">
                    <button class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>

                    <button class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>
                </div>
            </div>
        </nav>
    </section>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" class="form" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" >Email address</label>

                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                                <label style="color: red;margin-left:-7px;"><?php echo $error_email ?></label>

                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" >Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        <label style="color: red;margin-left:-5px;"><?php echo $error_password ?></label>

                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary" value="login">Login</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>



    <!-- Signup modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupModalLabel">Sign up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" class="form" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail2" class="form-label" name="email">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail2"
                                aria-describedby="emailHelp">
                        <label style="color: red;margin-left:-5px;"><?php echo $error_email ?></label>

                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" >Password</label>
                            <input type="password" class="form-control"name="password" id="exampleInputPassword2">
                             <label style="color: red;margin-left:-5px;"><?php echo $error_password ?></label>

                        </div>
                        <div class="mb-3">
                            <label for="cexampleInputPassword1" class="form-label">Confirm Password</label>
                            <input type="password" name="confirmpassword" class="form-control" id="cexampleInputPassword1">
                            <label style="color: red;margin-left:-5px;"><?php echo $error_confirmpassword ?></label>

                        </div>

                        <button type="submit" class="btn btn-primary" value="signup">Create Account</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Featured -->
    <section class="featuredsec">
        
            <div class="row py-5">
                <div class="col-lg-8 m-auto text-center">
                    <h1>Books</h1>
                </div>
            </div>
      
    </section>
    <!-- Product -->

    <div class="card-container">
        
    </div>
    <!-- Subscriber -->

    <section class="news py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 py-3">
                            <h5 class="pb-3">Our Locations</h5>
                            <p>India</p>
                            <p>USA</p>
                            <p>France</p>
                            <p>Africa</p>

                        </div>
                        <div class="col-lg-3 py-3">
                            <h5 class="pb-3">Quick Links</h5>
                            <p>Home</p>
                            <p>Pages</p>
                            <p>About</p>
                            <p>Services</p>

                        </div>
                        <div class="col-lg-3 py-3">
                            <h5 class="pb-3">CUSTOMER CARE</h5>
                            <p>Regular</p>
                            <p>On Time</p>
                            <p>Always Care</p>
                        </div>
                        <div class="col-lg-3 py-3">

                            <h5 class="pb-3"><a class="navbar-brand pb-3" href="#">
                                    <img src="../images/Logo.png" alt="" width="34" height="34"
                                        class="d-inline-block align-text-top"><span> BookHub</span></a>
                            </h5>
                            <span><i class="fab fa-facebook"></i></span>
                            <span><i class="fab fa-instagram"></i></span>
                            <span><i class="fab fa-twitter"></i></span>
                            <span><i class="fab fa-google-plus"></i></span>

                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <p class="text-center">Copyright 02024 All right reserved</p>
        </div>
    </section>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="../js/demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
</body>

</html>
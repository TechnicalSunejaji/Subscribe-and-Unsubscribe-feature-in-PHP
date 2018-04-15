<?php
 session_start();
    include 'include/db.php'; 
 if(isset($_SESSION['email']))
    {
        header("location:home.php");
    }
     date_default_timezone_set("Asia/Kolkata"); 
?>
<?php
 if(isset($_POST['submit'])) {
        $email = trim($_POST['t1']);
        $pass=  trim(md5($_POST['t2']));
        
        if($stmt = $conn->query("SELECT * FROM users WHERE email='".$email."' AND password='".$pass."'")) {
            
            
            if($stmt->num_rows > 0) {
                $r=$stmt->fetch_array(MYSQLI_ASSOC);
                
                $_SESSION['email'] = $r['email'];
              
                header("location:home.php");
            }
            else {
                header("location:index.php");
            }
        }
    }
?>
<!--End of php script start for login -->



<link href="style.css" rel="stylesheet" id="bootstrap-css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!--Pulling Awesome Font -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
		 <form method="POST" enctype="multipart/form-data">
            <div class="form-login">
            <h4>Welcome back.</h4>
            <input type="text" id="email" name="t1" class="form-control input-sm chat-input" placeholder="Email" />
            </br>
            <input type="password" id="userPassword" name="t2" class="form-control input-sm chat-input" placeholder="password" />
            </br>
            <div class="wrapper">
            <span class="group-btn">     
                <button name="submit" class="btn btn-primary btn-md">Login..<i class="fa fa-sign-in"></i></button>
            </span>
            </div>
            </div>
			</form>
        
        </div>
    </div>
</div>
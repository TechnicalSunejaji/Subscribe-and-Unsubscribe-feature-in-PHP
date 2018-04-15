<?php 
    session_start();
    include 'include/db.php'; 
     date_default_timezone_set("Asia/Kolkata"); 
	  if(!isset($_SESSION['email']))
    {
        header("location:login.php");
    }

?>

<link href="style.css" rel="stylesheet" id="bootstrap-css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script type="text/javascript">
            function unsub()
            {
            var ans=confirm("Are You sure You want to unsubscribe !!");
                if(ans==true)
                {
                    return true;
                }
                else
                {
                    return false;
                }
                return false;
            }
            function sub()
            {
            var ans=confirm("Are You sure You want to Subscribe !!");
                if(ans==true)
                {
                    return true;
                }
                else
                {
                    return false;
                }
                return false;
            }

        </script>

<!--Pulling Awesome Font -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container">
    <div class="row">
	<div class="col-lg-6">
       <h1>Welcome,<?php  echo $_SESSION['email']; ?></h1>
	   </div>
    </div>
	<?php

$values=array();
  if($stmt=$conn->query("SELECT * from reportgame where user_id='".$_SESSION['email']."'"))
        {
        while($r=$stmt->fetch_array(MYSQLI_ASSOC))
        {  
                 $values[]=$r['gameid'];   
                      
        
        }}

?>

	
	 <div class="row">
	<div class="col-lg-6">
        <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Game</th>
        <th>Intereted</th>
      </tr>
    </thead>
    <tbody>



<?php
$ctr=0;
      if($stmt=$conn->query("SELECT * from game"))
        {
        while($r=$stmt->fetch_array(MYSQLI_ASSOC))
        {    
          $ctr++;
           


          ?>
          <tr>
            <td><?php echo $ctr; ?></td>
          <td><?php echo $r['gamet']; ?></td>
          <?php
            if (in_array($r['id'], $values))
            {
              ?>
          <td><a class="btn btn-primary"  href="update.php?user_id=<?php echo $_SESSION['email'];?>&gameid=<?php echo $r['id']; ?>&status=<?php echo $r['status1']; ?>" onclick="return unsub();"><?php echo "Subscribe" ?></a></td>
                     <?php } else { ?>
                     <td><a class="btn btn-danger"  href="update.php?user_id=<?php echo $_SESSION['email'];?>&gameid=<?php echo $r['id']; ?>" onclick="return sub();"><?php echo "Unsubscribe" ?></a></td>
                  </tr>
                     <?php }  } }?>

 
        
                                

             


      
    </tbody>
  </table>
  </br>
   
  </br>
   
  </br>
  <a href="logout.php" class="btn btn-danger">Logout</a
	 </div>
    </div>
	</div>
	
	

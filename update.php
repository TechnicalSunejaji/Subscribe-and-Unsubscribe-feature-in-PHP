<?php 
    session_start();
    include 'include/db.php'; 
     date_default_timezone_set("Asia/Kolkata"); 
?>
<?php
$status="";
if(((null!=$_GET['user_id']) AND (null!=$_GET['gameid'])) AND (null==$_GET['status']))
{

	
	$date=trim(date('F d , Y h:i:s A'));
    


   
          $sql = "insert into reportgame(user_id,gameid,date) values('" . $_GET['user_id'] . "','" . $_GET['gameid'] . "','".$date."')";
         if ($stmt = $conn->query($sql)) {
       header("location:home.php");
    }
}
    else if(((null!=$_GET['user_id']) AND (null!=$_GET['gameid']) AND (null!=$_GET['status'])))
    {
       
        $sql="delete from reportgame where gameid='".$_GET['gameid']."' and user_id='".$_GET['user_id']."'";
        
         if ($stmt = $conn->query($sql)) {
       header("location:home.php");
    }
    }else
    {
        echo "Something......went wrong";
    }
    
	
        
              


    ?>
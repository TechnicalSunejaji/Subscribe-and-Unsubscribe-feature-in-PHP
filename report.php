<?php 
    
    include 'include/db.php'; 
     date_default_timezone_set("Asia/Kolkata"); 
	 

?>

<link href="style.css" rel="stylesheet" id="bootstrap-css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!--Pulling Awesome Font -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<body>

<div class="container">
  <h2>Report</h2>
  <p>Subscribe users Details</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Game Type</th>
        <th>User ID</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
$ctr=0;
      if($stmt=$conn->query("SELECT * from game g JOIN reportgame r on g.id=r.gameid"))
        {
        while($r=$stmt->fetch_array(MYSQLI_ASSOC))
        {    
          $ctr++;
          

          ?>
          <tr>
            <td><?php echo $ctr; ?></td>
          <td><?php echo $r['gamet']; ?></td>
          <td><?php if(isset($r['user_id'])) { echo $r['user_id']; }?></td>
          <td><a href="" class="btn btn-primary">Subscribe</td>
		  </tr>
 
		<?php }} ?>
    </tbody>
  </table>
</div>

</body>
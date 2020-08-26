<!DOCTYPE html>
<?php
	require 'api/config.php';
	
	
	if(!ISSET($_SESSION['user'])){
		header('location:home.php');
	}
?>
<html lang="en">
	<head>
		
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
    <style>div.background {
  background: url(../event/img/15.jpg);
  border: 2px solid black;
   background-repeat: no-repeat!important;  
   background-size: cover;     
}

div.transbox {
  margin: 30px;
  background-color: #ffffff;
  border: 1px solid black;
  opacity: 0.6;
    height:500px;
}

div.transbox p {
  margin: 5%;
  font-weight: bold;
  color: #000000;
}
        .title1{
            text-align: center;
            font-size: 30px;
        }
        .success{
           text-align: center;
            font-size: 20px; 
        }
        .success1{
           text-align: center;
            font-size: 20px; 
            color: black;
            text-decoration: none;
            align-content:center;
            margin-left: 570px;
        }
        .success1 a{
          color: black;
            text-decoration: none;
        }
    </style>
<body>

	<div class="background">
  <div class="transbox">
			<h3 class="title1">Welcome!
			<?php
            $db = getDB();
				$id = $_SESSION['user'];
				$sql = $db->prepare("SELECT * FROM `users` WHERE `user_id`='$id'");
				$sql->execute();
				$fetch = $sql->fetch();
			?>
			<?php echo $fetch['firstname']." ". $fetch['lastname']?></h3>
      <p class="success">You have successfully logged in.<br/>Thank you for choosing our team.</p>
      <button class="success1"><a href = "index.php">Dashboard</a></button>
		
		</div>
	</div>
</body>
</html>
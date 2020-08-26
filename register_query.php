<?php
	require 'api/config.php';
 
	if(ISSET($_POST['register'])){
		if($_POST['firstname'] != "" || $_POST['username'] != "" || $_POST['password'] != ""){
			try{
                $db = getDB();
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$username = $_POST['username'];
                $email = $_POST['email'];
//				$enc_password = hash('sha256', $_POST['password']);
//            $password= $enc_password;
                $password = $_POST['password'];
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO `users` VALUES ('', '$firstname', '$lastname', '$username','$email', '$password')";
				$db->exec($sql);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
	
			$db = null;
			header('location:login.php');
		}else{
			echo "
				<script>alert('Please fill up the required field!')</script>
				<script>window.location = 'registration.php'</script>
			";
		}
	}
?>
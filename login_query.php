<?php
	session_start();
	
	require_once 'api/config.php';
	
	if(ISSET($_POST['login'])){
		if($_POST['username'] != "" || $_POST['password'] != ""){
            $db = getDB();
			$username = $_REQUEST['username'];
			$password = $_POST['password'];
			$sql = "SELECT * FROM `users` WHERE (username=:username or email=:username) AND password=:password ";
			$query = $db->prepare($sql);
			$query->bindValue(":username", $username, PDO::PARAM_STR);
$query->bindValue(":password", $password, PDO::PARAM_STR);
$query->execute();
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
				$_SESSION['user'] = $fetch['user_id'];
				header("location: home.php");
			} else{
				echo "
				<script>alert('Invalid username or password')</script>
				<script>window.location = 'login.php'</script>
				";
			}
		}else{
			echo "
				<script>alert('Please complete the required field!')</script>
				<script>window.location = 'login.php'</script>
			";
		}
	}
//try
//{
//     $db = getDB(); 
//$username=$_POST['username'];
//$password=$_POST['password'];
//$secpss=password_hash($password,PASSWORD_DEFAULT);
//$smt=$db->prepare("SELECT * FROM users WHERE username='$username'");
//$smt->execute();
//$result=$smt->fetch(PDO::FETCH_OBJ);
//$prev=$result->password;
//if(password_verify($password,$prev))
//{
//    echo 'inser';
//}
//else
//{
//    echo "not";
//}
//}
//catch(ErrorException $e)
//{
//    $e->getMessage();
//}
?>

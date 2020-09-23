 
<!DOCTYPE html>
<?php
	require 'api/config.php';
	
	
	if(!ISSET($_SESSION['user'])){
		header('location:index.php');
	}
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simha shastry</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="css/bootstrap-datepicker.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/styles.css" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
<link href="css/index.css" rel="stylesheet">
</head>
    <script src="js/jquery-1.10.2.js"></script>
<script src="js/config.js"></script>
   <script>
    var url = "js/config.js";
    
    $.getScript(url, function(){
        $(document).ready(function(){
            console.log(rootURL); // Prints: Hi there!
            
        });
    });
    </script> 
<style>
.datepicker td, .datepicker th {
    width: 2.5rem;
    height: 2.5rem;
    font-size: 0.85rem;
}

.datepicker {
    margin-bottom: 3rem;
}    
</style>
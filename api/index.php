<?php
error_reporting(0);
ini_set('display_errors', 1);
require 'Slim/Slim.php';
require 'config.php';
require 'helper.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();


$app->post('/view', 'viewGet');
$app->post('/image','image'); 
$app->get('/', 'getImages');
$app->get('/action', 'getIdImages');
$app->get('/inaction', 'getViewImages');
$app->get('/getId/:id','getImage');
$app->put('/update/:id', 'updateImage');
$app->delete('/delete/:id','deleteImage');
$app->post('/logout', 'logout');

$app->run();

function updateImage($id) {
     $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $id = $_REQUEST['id'];
       
        try {
           $db = getDB();
        $name	= $_REQUEST['txt_name'];
	    $description	= $_REQUEST['description'];	
       $action	= $_REQUEST['action'];	
       $start	= $_REQUEST['start'];
       $end	= $_REQUEST['end'];
		$image_file	= $_FILES["txt_file"]["name"];
		$type		= $_FILES["txt_file"]["type"];		
		$size		= $_FILES["txt_file"]["size"];
		$temp		= $_FILES["txt_file"]["tmp_name"];
		$floor_file	= $_FILES["txt_floor"]["name"];
		$path="api/upload/".$image_file; 
       $paths="api/floor_upload/".$floor_file;
             $sql = "UPDATE images SET name=:name,description=:description,start=:start,end=:end,action=:action,image=:image,floor=:floor WHERE id=:id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("name", $name);
             $stmt->bindParam("description", $description);
             $stmt->bindParam("action", $action);
             $stmt->bindParam("start", $start);
             $stmt->bindParam("end", $end);
             $stmt->bindParam("image", $path);
            $stmt->bindParam("floor", $paths);
            $stmt->bindParam("id", $id);
            $stmt->execute();
             move_uploaded_file($_FILES['txt_file']['tmp_name'],"upload/".$_FILES['txt_file']['name']);
            move_uploaded_file($_FILES['txt_floor']['tmp_name'],"upload/".$_FILES['txt_floor']['name']);
            $db = null;
            echo '{"success":{"text":"saved"}}';

        }catch (Exception $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    
}




function image() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    
   try {
        $db = getDB();
        $name	= $_REQUEST['txt_name'];
	    $description	= $_REQUEST['description'];	
       $action	= $_REQUEST['action'];	
       $start	= $_REQUEST['start'];
       $end	= $_REQUEST['end'];
		$image_file	= $_FILES["txt_file"]["name"];
		$type		= $_FILES["txt_file"]["type"];		
		$size		= $_FILES["txt_file"]["size"];
		$temp		= $_FILES["txt_file"]["tmp_name"];
		$floor_file	= $_FILES["txt_floor"]["name"];
		$path="api/upload/".$image_file; 
       $paths="api/floor_upload/".$floor_file;
       
       echo $path;
		if(empty($name)){
			$errorMsg="Please Enter Name";
		}
		else if(empty($image_file)){
			$errorMsg="Please Select Image";
		}
		else if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif') 
		{	
			if(!file_exists($path))
			{
				if($size < 5000000) 
				{
					; //move upload file temperory directory to your upload folder
				}
				else
				{
					$errorMsg="Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
				}
			}
			else
			{	
				$errorMsg="File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
			}
		}
		else
		{
			$errorMsg="Upload JPG , JPEG , PNG & GIF File Formate.....CHECK FILE EXTENSION"; //error message file extension
		}
		
		if(!isset($errorMsg))
		{
            
			$insert_stmt=$db->prepare('INSERT INTO images(name,description,action,start, end ,image,floor) VALUES(:name,:description,:action,:start, :end,:image,:floor)'); //sql insert query					
			$insert_stmt->bindParam(':name',$name);	
            $insert_stmt->bindParam(':description',$description);
            $insert_stmt->bindParam(':action',$action);
             $insert_stmt->bindParam(':start',$start);
             $insert_stmt->bindParam(':end',$end);
			$insert_stmt->bindParam(':image',$path);	  //bind all parameter 
            $insert_stmt->bindParam(':floor',$paths);
		    move_uploaded_file($_FILES['txt_file']['tmp_name'],"upload/".$_FILES['txt_file']['name']);
            move_uploaded_file($_FILES['txt_floor']['tmp_name'],"floor_upload/".$_FILES['txt_floor']['name']);
			if($insert_stmt->execute())
			{
				$insertMsg="File Upload Successfully........"; //execute query success message
				header("refresh:3;home.php"); //refresh 3 second and redirect to index.php page
			}
		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}

function getImages() {
        $request = \Slim\Slim::getInstance()->request();
        $data = json_decode($request->getBody()); 
            $sql = "select * FROM images ORDER BY id";
	try {
		$db = getDB();
		$stmt = $db->query($sql);  
		$images = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"image": ' . json_encode($images) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
           
}

function getIdImages() {
        $request = \Slim\Slim::getInstance()->request();
        $data = json_decode($request->getBody()); 
            $sql = "SELECT * FROM images WHERE action='1' ORDER BY id ASC ";
	try {
		$db = getDB();
		$stmt = $db->query($sql);  
		$images = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"image": ' . json_encode($images) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
           
}
function getViewImages() {
        $request = \Slim\Slim::getInstance()->request();
        $data = json_decode($request->getBody()); 
            $sql = "SELECT * FROM images WHERE action='2' ORDER BY id ASC ";
	try {
		$db = getDB();
		$stmt = $db->query($sql);  
		$images = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"image": ' . json_encode($images) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
           
}
function getImage($id) {
        $request = \Slim\Slim::getInstance()->request();
        $data = json_decode($request->getBody()); 
	$sql = "SELECT * FROM images WHERE id=:id";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$image = $stmt->fetchObject();  
		$db = null;
		echo json_encode($image); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function deleteImage($id) {
    $request = \Slim\Slim::getInstance()->request();
        $data = json_decode($request->getBody()); 
	$sql = "DELETE FROM images WHERE id=:id";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$db = null;
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function logout() {
  
	
	try {
		
	session_destroy();
	header('location: login.php');
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

    ?>

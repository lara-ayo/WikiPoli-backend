<?php
header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Method: *");
        header('Content-Type: application/json');

require_once('../autoloader.php');
use Helper\Database as DB;
if($_SERVER['REQUEST_METHOD'] == 'post'){
	if(isset($_POST['name']) && isset($_POST["comment"]) && !empty($_POST["name"]) && !empty($_POST["comment"]))
	{
		$insertComments = "INSERT INTO comments (comment, post_id, user_id ) VALUES ( '".$_POST["comment"]."', '".$_POST["postId"]."', '".$_POST["name"]."')";
		        $conn=DB::db_connect();
		mysqli_query($conn, $insertComments) or die("database error: ". mysqli_error($conn));
		$message = "Comment posted Successfully.";
		$status = array(
			"error" => 0,
			"successMessage" => $message
			
		); 
		
	} else {
		$message = "Comment not posted.";
		$status = array(
			"error" => 1,
			"errorMessage" => $message
		);
	}

}else{

	$message = "Get Request Not Supported.";
		$status = array(
			"error" => 1,
			"errorMessage" => $message
		);

}
   echo json_encode($status,true);

?>


<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Method: *");
header('Content-Type: application/json');

require_once('../autoloader.php');
use Helper\Database as DB;
$commentQuery = "SELECT * FROM comments ORDER BY comment_id DESC"; 
$conn=DB::db_connect();

$commentsResult = mysqli_query($conn, $commentQuery) or die("database error:". mysqli_error($conn));
$record_set = array();
while ($row = mysqli_fetch_assoc($commentsResult)){
    array_push($record_set, $row);
}

mysqli_close($conn);
echo json_encode(['error'=> 0,'comments'=>$record_set],true);
?>


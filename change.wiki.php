<?php

require("conn.wiki.php");
$query=mysqli_query($conn, "Update users set admin='".$_POST['val']."' where user_id='".$_POST['user_id']."' ");
if ($query) {
	$q=mysql_query($conn, "Select * from users where user_id='".$_POST['user_id']."' ");

	$data=mysqi_fetch_assoc($query);
		echo $data['$admin'];
}
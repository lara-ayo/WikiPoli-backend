<!DOCTYPE html>
<html>
<head>
	<title>status update</title>
</head>
<body>
<!-- php script -->
	<?php
		require("conn.wiki.php");
		$result = mysqli_query($conn, 'select * from users');

	?>
<!--  -->

	<table border="1">

		<tr>
			<th>username</th>
			<th>email</th>
			<th>current status</th>
			<th>change status</th>
		</tr>
		<?php
			while ($row = mysqli_fetch_assoc($result)) {
						
		?>
		<tr>
			<td><?php echo $row["name"]?></td>
			<td><?php echo $row["email"]?></td>
			<td>

				<?php

					if($row["admin"] == 1){
						echo "<p id=str".$row['user_id'].">An Admin</p>";
					}
					else
					{
						echo "<p id=str".$row['user_id'].">A User</p>";
					}

				?>		
			</td>
			<td>
				<select onchange="active_disactive_users(this.value, <?php echo $row['user_id'];?>)">
					<option value="1">An Admin</option>
					<option value="0">A User</option>
				</select>
			</td>
		</tr>
		<?php

		}?>	

	</table>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">	
</script>
<script type="text/javascript">
	function active_disactive_users(val, user_id){
		$.ajax({
			type:'post',
			url:'change.wiki.php',
			data:{val:val,user_id:user_id},
			success: function(result){
				if(result==1)
				{
						$('#str'+user_id).html('An Admin');
				}else{
					$('#str'+user_id).html('A User');
				}
			}
		});
	}
</script>
</html>
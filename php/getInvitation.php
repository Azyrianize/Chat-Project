<?php

	session_start();
	require_once "database_connection.php";
	
	if(!isset($_SESSION['logged_in']))
	{
		header('location: php/logout.php');
		exit();
	}
	
	$my_user_id = $_SESSION['user_id'];	
	$inv_accepted = false;
	$output = "";
			


	$sql_query="SELECT * FROM friends WHERE friend_id = '$my_user_id'";
	$result = mysqli_query($connection, $sql_query);
	$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	
	
	foreach($rows as $row)
	{	
		$how_much = $result->num_rows;
		
		if($how_much > 0)
		{	
			$inv_from_user_id = $row["user_id"];
			
			$sql_query3="SELECT * FROM friends WHERE user_id = '$my_user_id' AND friend_id = '$inv_from_user_id'";
			$result3 = mysqli_query($connection, $sql_query3);
			$rows3 = mysqli_fetch_all($result3, MYSQLI_ASSOC);
			
			$sql_query2="SELECT * FROM login WHERE user_id = '$inv_from_user_id'";
			$result2 = mysqli_query($connection, $sql_query2);
			$rows2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
			
			$how_much3 = $result3->num_rows;
			
			if($how_much3 > 0)
			{
				$inv_accepted = true;
			}
			else
			{
				$inv_accepted = false;
			}
			
			if($inv_accepted!=true)
			{			
				foreach($rows2 as $row2)
				{
					$inv_from_username = $row2["username"];
				}
				
				
				$output .= '
				<div class="dialog_Invitation">
					<label>'.$inv_from_username.'</label>
					<input type="submit" class="dialogInvButton_accept" data-touserid="'.$inv_from_user_id.'" value="Tak">
					<input type="submit" class="dialogInvButton_reject" data-touserid="'.$inv_from_user_id.'" value="Nie">
				</div>			
				';
			}
				
			$result2->close();
			$result3->close();
		}		
	}
	
	$result->close();
	
	if($output=="")
	{
		$output="";
		if(isset($_COOKIE['language']))
		{
			if($_COOKIE['language']=="pl")
			{
				$output = "Brak nowych zaproszeń!";
			}
			else if($_COOKIE['language']=="uk")
			{
				$output = "There aren't any new invitations left";
			}
						
		}	
		
	}
	
	
	echo $output;			
	
?>



<script>
	'use strict';
	
	var my_user_id = "<?php echo $_SESSION['user_id']; ?>";
		
	$('.dialogInvButton_accept').click(function(){
		var from_user_id = $(this).data('touserid');
		
		$.ajax({
			url: "php/acceptInvitation.php",
			type: "POST",
			data: {
					"from_user_id": from_user_id
			}
		});
		
	$('#button_invitation').click();
	});
			
	$('.dialogInvButton_reject').click(function(){
		var from_user_id = $(this).data('touserid');
		
		$.ajax({
			url: "php/rejectInvitation.php",
			type: "POST",
			data: {
					"from_user_id": from_user_id
			}
		});

		$('#button_invitation').click();
	});
	

</script>
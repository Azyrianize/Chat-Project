<?php
	session_start();
	require_once "database_connection.php";
	
	if(!isset($_SESSION['logged_in']))
	{
		header('location: php/logout.php');
		exit();
	}
	
	$from_user_id = $_GET["from_user_id"];
	$to_user_id = $_GET["to_user_id"];
	$to_username = $_GET["to_username"];
	
	$sql_query="SELECT * FROM chat_message WHERE (to_user_id = '$to_user_id' AND from_user_id = '$from_user_id') OR (to_user_id = '$from_user_id' AND from_user_id = '$to_user_id')";
	$result = mysqli_query($connection, $sql_query);
	$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
	

	foreach($rows as $row)
	{			
			if(str_contains($row["chat_message"], "FILE_ID"))
			{	
				$files = scandir('../uploads');
				if($_GET["file_index"]=="true")
				{
					$file_id = $_GET["file_id"];
					$filename = $_GET["filename"];					
				}				
				else
				{
					$file_id = str_replace("FILE_ID:", "", $row["chat_message"]);
					$sql_query2="SELECT * FROM files WHERE (user_from = '$from_user_id' AND user_to = '$to_user_id') OR (user_from = '$to_user_id' AND user_to = '$from_user_id')";
					$result2 = mysqli_query($connection, $sql_query2);
					$rows2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
					foreach($rows2 as $row2)
					{	
						if($row2["file_id"]==$file_id)
						{
							$filename = $row2["filename"];
						}
					}
				}
					
				foreach ($files as $file) 
				{
					if(str_contains($file, $file_id))
					{					
							if($row["from_user_id"]==$from_user_id)
							{
								echo "<div class='Message'>";
								echo "<p class='myMessage'><span class='boldTxt' data-fileid=".$file_id.">Ty: </span>PLIK: [<span class='filename'>".$filename."</span>]</p>";
								echo "<p class='ptimedate'>".$row["timestamp"]."</p>";
								echo "</div>";
							}
							else
							{
								echo "<div class='Message'>";
								echo "<p class='friendMessage'><span class='boldTxt' data-fileid=".$file_id.">".$to_username.": </span>PLIK: [<span class='filename'>".$filename."</span>]</p>";
								echo "<p class='ptimedate'>".$row["timestamp"]."</p>";
								echo "</div>";
							}
							
							
					}
				}
			}
			else
			{
				if($row["from_user_id"]==$from_user_id)
				{
					echo "<div class='Message'>";
					echo "<p class='myMessage'><span class='boldTxt'>Ty: </span>".$row["chat_message"]."</p>";
					echo "<p class='ptimedate'>".$row["timestamp"]."</p>";
					echo "</div>";
				}
				else
				{
					echo "<div class='Message'>";
					echo "<p class='friendMessage'><span class='boldTxt'>".$to_username.": </span>".$row["chat_message"]."</p>";
					echo "<p class='ptimedate'>".$row["timestamp"]."</p>";
					echo "</div>";
				}			
			}				
	}
	
	echo "
            <script type=\"text/javascript\">
				var objDiv = document.getElementById('chat');
				objDiv.scrollTop = objDiv.scrollHeight;
            </script>
        ";
	
	$connection->close();
?>
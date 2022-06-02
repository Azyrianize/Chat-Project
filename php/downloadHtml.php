<?php
	session_start();
	require_once "database_connection.php";
	
	$from_user_id = $_POST["from_user_id"];
	$to_user_id = $_POST["to_user_id"];
	$to_username = $_POST["to_username"];

	$sql_query="SELECT * FROM chat_message WHERE (to_user_id = '$to_user_id' AND from_user_id = '$from_user_id') OR (to_user_id = '$from_user_id' AND from_user_id = '$to_user_id')";
	$result = mysqli_query($connection, $sql_query);
	$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
		
	$myfile = fopen("../downloads/chat-".$to_username.".html", 'w');	
	$output = '
			<table id="Conversation">
				<thead style="border: 1px solid black;">
					<tr style="border: 1px solid black;">
						<td style="border: 1px solid black;">Użytkownik</td>
						<td style="border: 1px solid black;">Wiadomość</td>
						<td style="border: 1px solid black;">Data</td>
					</tr>
				</thead>
			<tbody>
		';

	foreach($rows as $row)
	{			
		if(str_contains($row["chat_message"], "FILE_ID"))
		{	
			if($row["from_user_id"]==$from_user_id)
			{
				$output .= '
					<tr style="border: 1px solid black;">
						<td style="border: 1px solid black;">'."Me: ".'</td>
						<td style="border: 1px solid black;">'."FILE UPLOAD [UNREACHABLE]".'</td>
						<td style="border: 1px solid black;">'.$row["timestamp"].'</td>
					</tr>
			';	
			}
			else
			{
				$output .= '
					<tr style="border: 1px solid black;">
						<td style="border: 1px solid black;">'."Me: ".'</td>
						<td style="border: 1px solid black;">'."FILE UPLOAD [UNREACHABLE]".'</td>
						<td style="border: 1px solid black;">'.$row["timestamp"].'</td>
					</tr>
			';	
			}			
		}
		else
		{
			if($row["from_user_id"]==$from_user_id)
			{
					$output .= '
					<tr style="border: 1px solid black;">
						<td style="border: 1px solid black;">'."Me".'</td>
						<td style="border: 1px solid black;">'.$row["chat_message"].'</td>
						<td style="border: 1px solid black;">'.$row["timestamp"].'</td>
					</tr>
					';		
			}
			else
			{
					$output .= '
					<tr style="border: 1px solid black;">
						<td style="border: 1px solid black;">'.$to_username.'</td>
						<td style="border: 1px solid black;">'.$row["chat_message"].'</td>
						<td style="border: 1px solid black;">'.$row["timestamp"].'</td>
					</tr>
				';
			}									
		}					
	}
									
	$output .= '</tbody></table>';
	
	fwrite($myfile, $output);			
	fclose($myfile);

?>
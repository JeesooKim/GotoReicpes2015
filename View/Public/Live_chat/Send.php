<?php

//Get the user input
$reciever = $_POST['reciever_name'];
$message = $_POST['message_send'];

//validate user input
if(empty($reciever) || empty($message))
{
	print '<script type="text/javascript">'; 
	print 'alert("Please enter a valid text")'; 
	print '</script>'; 
	include('Live_chat.php');
}
else
{
	//if valid, stores it into database
	require_once('../../Shared/DatabaseConn.php');

	$query = "INSERT INTO message
				(msgId, sender, reciever, message)
			  VALUES
			  	('1024', 'Derrick', '$reciever', '$message')";
	$db -> exec($query);

	print '<script type="text/javascript">'; 
	print 'alert("Message has been sent to '. $_POST['reciever_name'].' ")'; 
	print '</script>';


	include ('Live_chat.php');
}


?>
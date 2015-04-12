<?php

	//Get the link to database
	require_once(PATH_DATABASE);

	//Get message from table
	$query = 'SELECT sender, message FROM message
			  WHERE reciever = "Derrick"';
	$message = $db -> query($query);
?>

<?php include PATH_HEADER;  ?>
<link href="../../../Content/css/live_chat_style.css" rel="stylesheet" type="text/css">

		<section id="content">
			<ul class="tabs">
				<li>
					<input type="radio" name="tabs" id="tab1" checked />
					<label for="tab1">Create Message</label>
					<div id="tab-content1" class="tab-content">
						<form method="post" action="send.php">
							<span class="input input--hideo">
								<label id="lbl_reciever" for="input-41">
									<span class="span_reciever">Reciever</span>
								</label>
								<br />
								<input class="txt_reciever" type="text" name="reciever_name" id="input-41" />
							</span>
							<br />
							<br />
							<span class="input input--hideo">
								<label class="lbl_msg" for="input-42">
									<span class="span_msg">Message</span>
								</label>
								<br />
								<textarea name="message_send" cols="40" rows="6" id="input-42"></textarea>
							</span>
							<br />
							<br />
							<input type="submit" name="submit" value="Send">
							<input type="submit" name="discard" value="Discard">
						</form>
					</div>
				</li>

				<li>
					<input type="radio" name="tabs" id="tab2" />
					<label for="tab2">Inbox</label>
					<div id="tab-content2" class="tab-content">
						<table class="table table-responsive table-striped">
						<thead>	
						<tr>
							<th>Sender</th>
							<th>Message</th>
						</tr>
						</thead>

						<tbody>
						<?php foreach ($message as $msg) : ?>
						<tr>
							<td><?php echo $msg['sender']?></td>
							<td><?php echo $msg['message']?></td>
						</tr>
						<?php endforeach; ?>
						</tbody>
						</table>
					</div>
				</li>
			</ul>
		</section>

<?php include PATH_FOOTER; ?>
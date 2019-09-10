<?php
include 'config.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="keyword" content="">
	<meta name="auther" content="">
	<meta name="description" content="">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>Document</title>
</head>
<body>
	<div id="wrapper">
		<h1>Welcome to my document</h1>
		<div class="chat_wrapper">
			<div id="chat"></div>
			<form action="" method="POST" id="messageFrm">
				<textarea name="message" id="" cols="30" rows="10" rows-10="" class="textarea"></textarea>
			</form>
		</div>
	</div>
	<script type="text/javascript">		
		Loadchat();
		setInterval(function(){
			Loadchat();
		},1000);
		function Loadchat() {
			$.post('handler/message.php?action=getMessages',function(response){
				var scrollpos = $('#chat').scrollTop();
				var scrollpos = parseInt(scrollpos);
				var scrollHeight = $('#chat').prop('scrollHeight');

				$('#chat').html(response);
				if (scrollpos<scrollHeight){

				}else{
					$('#chat').scrollTop($('#chat').prop('scrollHeight'));

				}
				
			});
		}
			


		$('.textarea').keyup(function (e) {
			if (e.which==13) {
				$('form').submit();
			}

		});
		$('form').submit(function(){
			var message = $('.textarea').val();
			$.post('handler/message.php?action=sendMessage&message='+message,function(response){

				if(response==1){

					Loadchat();
					document.getElementById('messageFrm').reset();
				}
			});
			return false;
		});


	</script>


</body>
</html>
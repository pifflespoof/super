<?php include("connect.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=windows-1251">
<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
<script type="text/javascript">
$(function() {
	$("#send").click(function(){
		var author = $("#author").val();
		var message = $("#message").val();				
		$.ajax({
			type: "POST",
			url: "sendMessage.php",
			data: {"author": author, "message": message},
			cache: false,						
			success: function(response){
				var messageResp = new Array('Ваше сообщение отправлено','Сообщение не отправлено Ошибка базы данных','Нельзя отправлять пустые сообщения');
				var resultStat = messageResp[Number(response)];
				if(response == 0){
					$("#author").val("");
					$("#message").val("");
					$("#commentBlock").append("<div class='comment'>Автор: <strong>"+author+"</strong><br>"+message+"</div>");
				}
				$("#resp").text(resultStat).show().delay(1500).fadeOut(800);
				
			}
		});
		return false;
				
	});
});
</script>
</head>
<body>

<div id="commentBlock">
<?php
$result = mysql_query("SELECT * FROM messages",$db);
$comment = mysql_fetch_array($result);
do{
echo "<div class='comment'>Автор: <strong>".$comment['author']."</strong><br>".$comment['message']."</div>";
}while($comment = mysql_fetch_array($result));
?>
</div>

<form action="sendMessage.php" method="post" name="form">
	<p>
		Автор:<br> 
		<input name="author" type="text" id="author">
	</p>
	<p>
		Текст сообщения:<br>
		<textarea name="message" rows="5" cols="50" id="message"></textarea>
	</p>
	<input name="js" type="hidden" value="no" id="js">
	<p>
		<input name="button" type="submit" value="Отправить" id="send"> <span id="resp"></span>
	</p>
</form>

</body>
</html>

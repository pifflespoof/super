<?php
$result = mysql_query("SELECT * FROM messages",$db);
$comment = mysql_fetch_array($result);
do{
	echo "<div class='comment'>Автор: <strong>".$comment['author']."</strong><br>".$comment['message']."</div>";
}while($comment = mysql_fetch_array($result));
?>
<link rel="stylesheet/less" href="style/style1.less">
<script type="text/javascript" src="style/less.min.js"></script>
<script type="text/javascript" src="jquery-1.10.2.min.js"></script>

	<div id="commentBlock"></div>

<style>
.comment{
   border:1px solid #666;
   margin:10px;
   padding:10px;
   font-family:Tahoma;
   font-size:12px;
   border-radius:4px;
   box-shadow:2px 2px 2px #999;
}
</style>

<script type="text/javascript">

	$("#commentBlock").append("<div class='comment'>Автор: <strong>"+author+"</strong><br>"+message+"</div>");
</script>
</body>
</html>
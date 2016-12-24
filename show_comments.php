<?php
$result = mysql_query("SELECT * FROM messages",$db);
$comment = mysql_fetch_array($result);
do{
echo "<div class='comment'>Автор: <strong>".$comment['author']."</strong><br>".$comment['message']."</div>";
}while($comment = mysql_fetch_array($result));
?>
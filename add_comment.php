<?php
// Этот блок кода нужен для корректной работы Ajax скрипта
sleep(1); 
header("Content-type: text/plain; charset=windows-1251");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
// Преобразуем полученые данные в нужную кодировку
while(list ($key, $val) = each ($_POST)){$_POST[$key] = iconv("UTF-8","CP1251", $_POST[$key]);}

include("config.php");
mysql_query("insert into comments (id_article, name, mail, text, date_add, public) values ('{$id_article}', '{$name}', '{$mail}', '{$text}', '{$date_add}', '0')") or die ("Error! query - add_comment");
echo '<font color="green">Комментарий добавлен и ожидает проверки!</font>';

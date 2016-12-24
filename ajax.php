<?php
// Этот блок кода нужен для корректной работы Ajax скрипта
sleep(1); 
header("Content-type: text/plain; charset=windows-1251");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
// Преобразуем полученые данные в нужную кодировку
while(list ($key, $val) = each ($_POST)){$_POST[$key] = iconv("UTF-8","CP1251", $_POST[$key]);}
// Устанавливаем значение даты
$date = date('d.m.Yв H:i');
// Устанавливаем параметры валидации                                       
$nl = strlen($_POST['name']);
$ml = strlen($_POST['mail']);
$tl = strlen($_POST['text']);
$id_article = $_GET['id_article'];
$name = $_POST['name'];
$mail = $_POST['mail'];
$text = $_POST['text'];
if($nl<0 or $nl>60 or $ml<0 or $ml>60 or $tl<0 or $tl>500 or $_POST['nr']!='nerobot')
{$validate = false;}
elseif(!eregi('^[a-z0-9]+(([a-z0-9_.-]+)?)@[a-z0-9+](([a-z0-9_.-]+)?)+\.+[a-z]{2,4}$',$_POST['mail']))
{$validate = false;}
else{$validate = true;}
// Если прошли валидацию
if($validate)
{
// Добавляем комментарий
include("config.php");
mysql_query("insert into comments (id_article, name, mail, text, date_add, public) values ('{$id_article}', '{$name}', '{$mail}', '{$text}', '{$date_add}', '0')") or die ("Error! query - add_comment");
echo '<font color="green">Комментарий добавлен и ожидает проверки!</font>';
}
else
{
echo '<font color="red">Заполните правильно поля ввода!</font>';
}
?>
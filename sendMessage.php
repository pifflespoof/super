<?php include("connect.php");
header("Content-type: text/html; charset=windows-1251");

//**********************************************
if(empty($_POST['js'])){
	if($_POST['message'] != '' && $_POST['author'] != ''){

		$author = @iconv("UTF-8", "windows-1251", $_POST['author']);
		$author = addslashes($author);
		$author = htmlspecialchars($author);
		$author = stripslashes($author);
		$author = mysql_real_escape_string($author);
		
		$message = @iconv("UTF-8", "windows-1251", $_POST['message']);
		$message = addslashes($message);
		$message = htmlspecialchars($message);
		$message = stripslashes($message);
		$message = mysql_real_escape_string($message);

		$date = date("d-m-Y � H:i:s");
		$result = mysql_query("INSERT INTO messages (author, message, date) VALUES ('$author', '$message', '$date')");
		if($result == true){
			echo 0; //���� ��������� ������� ����������
		}else{
			echo 1; //��������� �� ����������. ������ ���� ������
		}
	}else{
		echo 2; //������ ���������� ������ ���������
	}
}

//**************************************** ���� �������� JavaScript ************************************

if($_POST['js'] == 'no'){
	if($_POST['message'] != '' && $_POST['author'] != ''){

		$author = $_POST['author'];
		$author = addslashes($author);
		$author = htmlspecialchars($author);
		$author = stripslashes($author);
		$author = mysql_real_escape_string($author);
		
		$message = $_POST['message'];
		$message = addslashes($message);
		$message = htmlspecialchars($message);
		$message = stripslashes($message);
		$message = mysql_real_escape_string($message);

		$date = date("d-m-Y � H:i:s");
		$result = mysql_query("INSERT INTO messages (author, message, date) VALUES ('$author', '$message', '$date')");
		if($result == true){
			echo "���� ��������� ������� ����������"; //���� ��������� ������� ����������
		}else{
			echo "��������� �� ����������. ������ ���� ������"; //��������� �� ����������. ������ ���� ������
		}
	}else{
		echo "������ ���������� ������ ���������"; //������ ���������� ������ ���������
	}
}
?>      	

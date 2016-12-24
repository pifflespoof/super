<?php 
$search = $_POST['search']; 

if($search == ''){ 
	exit("<span style='color:white;'>to search type something</span>"); 
} 
$con = mysqli_connect("localhost","root","","db2_autocommit(connection)"); 

$query = $con->query("SELECT * FROM users WHERE FirstName LIKE '%" .$search. "%'"); 
if(mysqli_num_rows($query) > 0){ 
	$row = mysqli_fetch_array($query); 
do{ 
	echo "<li style='border: 1px solid #ccc;border-top: none;background-color:#333;padding: 3px 5px;color:white;'>" .$row['FirstName']. "</li>"; 
}
while($row = mysqli_fetch_array($query)); 
}
else{ 
	echo "not found"; 
}
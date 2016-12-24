<?php
include("connection.php");
mysqli_select_db($con,'db');
$result=mysqli_query($con,"SELECT * FROM ajax");

echo "
<tr>

<td align=center>Name</td>
<td align=center>Age</td>
<td align=center>Gender</td></tr>";

while($data = mysqli_fetch_row($result))
{   
    echo "<tr>";
    echo "<td align=center>$data[1]</td>";
    echo "<td align=center>$data[2]</td>";
    echo "<td align=center>$data[3]</td>";

    echo "</tr>";
}
echo "</table>";
?>
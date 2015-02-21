<html>
<head> 
<title> List Test </title>
</head>
<body>
<form method = "POST" action="testlist.php">
<?php
$dbcon = mysqli_connect('localhost','root','','test');
$result = mysqli_query($dbcon, "SELECT test_req FROM db_test");
echo "<br><select name='opt1'>";
while ($row = mysqli_fetch_array($result))
{
echo "<option name = \"$row[0]\"> $row[0] 
</option>";
}

echo "</select> <br> <br> ";
echo "<input type=\"submit\" value=\"submit\">";

//$opt1 = $_POST ['opt1'];


?>
</form>
</body>
</html>
<html>
<head>
<title> TrueLab Clinic </title>
<style type="text/css">
#header {
    text-align:center;
	background-color:#003366;
	padding: 1%
}
#nav {
	list-style-type: none;
	font-family: "Calibri";
    line-height:25px;
    background-color:#003366;
	color: white;
    height:65%;
    width:13%;
    float:left;
    padding:15px; 
}
#nav a{
	color: white;
	text-decoration: none;	
}
#section {
	font-family: "Calibri";
	background-color:white;
	width: 100%
	height: 100%
    float:left;
    padding:6px; 
}
ul {
	list-style-type: none;
	float: left;
}
#footer {
    background-color:#003366;
	font-family: "Calibri";
    color:white;
    clear:both;
    text-align:center;
    padding: 4px;
}

</style>
</head>

<div id="header"> <img src = "truelab_logo.jpg" alt="logo" height="23%" width="60%"></div>

<div id="nav">

<ul>
	<a href="login_trial.php" target="section"> <li> Login Page </li> </a>
	<a href="#"> <li> Add New Customer </li> </a>
	<a href="#"> <li> Edit Customer Info </li> </a>
	<a href="#"> <li> Inventory </li> </a>
	<a href="#"> <li> Sales Report </li> </a>
				 <li> <br> </li>
	<a href="#"> <li> Logout </li> </a>
</ul>
</div> <!-- div nav -->


<div id = "section">

<?php

session_start();

if (isset($_POST['submitted'])){

	$username = $_POST['username'];
	$password = $_POST ['password'];
	
	if ($username&&$password){
		$connect = mysqli_connect("localhost","root","") or die ("couldn't connect to server");
		mysqli_select_db($connect,"accessmatrix") or die ("could not find dbase");
		$query = mysqli_query($connect,"SELECT * FROM users WHERE username='$username'");
		$numrows = mysqli_num_rows ($query);
		
		if($numrows!=0){
			while ($row = mysqli_fetch_assoc ($query)){
				$dbusername = $row['username'];
				$dbpassword = $row['password'];
			}	//end of while
			if ($username==$dbusername&&$password==$dbpassword) {
				echo "<center> <br> <br> <font color=green>  <h1> Welcome, ". $dbusername. "!</h1> </font> </center>";
				echo "<center><table name=\"icons\">";
				echo "<tr> <td align=\"center\"> <a href=\"addcustomerinfo.php\"> <img src=\"add record.jpg\" height=\"102\" width=\"102\"> </a> </td> <td> &nbsp &nbsp &nbsp </td>";
				echo "<td align=\"center\"> <img src=\"edit icon.png\" height=\"102\" width=\"102\"> </td> ";
				echo "<tr> <td align=\"center\"> Add Customer Information </td> <td> &nbsp </td> <td align=\"center\"> Edit Customer Information </td>";
				echo "<tr> <td> <br> </td> </tr>";
				echo "<tr> <td align=\"center\"> <img src=\"inventory icon.jpg\" height=\"102\" width=\"102\"> </td> </td> <td> &nbsp &nbsp &nbsp </td> ";
				echo "<td align=\"center\"> <img src=\"sales report.jpg\" height=\"102\" width=\"102\"> </td> ";
				echo "<tr> <td align=\"center\"> Inventory </td> <td> &nbsp </td> <td align=\"center\"> Sales Report </td>";
				echo "</table>";
				//if correct username and password add command here..
			}//end of if validation
			else echo "<center> <br> <br> <font color=red> <h2> Incorrect Password. </h2>  </font> </center>";
		} // end of if numrows
		else echo "<center> <br> <br> <font color=red> <h2> User does not exist! </h2>  </font> </center>";
	} // end of content username and password
	else echo "<center> <br> <br> <font color=red> <h2> Please enter the correct username and password. </h2>  </font> </center>";
} //isset submitted

?>

</body>


<div id = "footer">
Copyright &copy; alexblaze technologies
</div>

</html>
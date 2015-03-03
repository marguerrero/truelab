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
    height:100%;
    width:13%;
    float:left;
    padding:12px; 
}
#nav a{
	color: white;
	text-decoration: none;	
}
#section {
	font-family: "Calibri";
	background-color:white;
	width: 85%;
	height: 100%;
    float:left;
    padding:0px; 
}
ul {
	list-style-type: none;
	float: left;
}
#footer {
	position: relative;
    background-color:#003366;
	width:100%;
	font-family: "Calibri";
    color:white;
    clear:both;
	bottom: 0;
	float:left;
    text-align: center;
	margin-right: auto;
	margin-bottom: 0px;
	margin-left: auto;
}

</style>
</head>

<div id="header"> <img src = "truelab_logo.jpg" alt="logo" height="23%" width="60%"></div> <!-- header div-->

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

 <center> <div id="section">
 <legend> <h2> <font style="bold" face="Calibri"> Personal Information: </h2> </legend>
 <table name = "tblname">
 <form name = "addcust" method="POST">
 <tr> <td> First Name: &nbsp&nbsp </td> <td> <input type="text" name="fname"> <br> </td> </tr>
 <tr> <td> Last Name: &nbsp&nbsp </td> <td>  <input type="text" name="lname"> <br> </td> </tr>
 <tr> <td> Age: &nbsp&nbsp </td> <td> <input type="text" name="age" size="2">&nbsp years old <br> </td> </tr>
 <tr> <td> Sex: &nbsp&nbsp </td> <td> <input type="radio" name="sex" value="M">&nbsp Male &nbsp 
				 <input type="radio" name="sex" value="F">&nbsp Female &nbsp <br> </td> </tr>
 <tr> <td> Birthday: (yyyy-mm-dd) &nbsp &nbsp </td> <td> <input type="text" id="yr" name="date_yyyy" size="4"> &nbsp <input type="text" id="mo" name="date_mm" size="2"> &nbsp <input type="text" id="day" name="date_dd" size="2"> </td> <br>
 </table>
 
 
 <script type="text/javascript">
 
 function getSelectvalue(sel){
	 var value = sel.value;
	 alert (value);
 }
 
 </script>
 
 <table name = "tbl_services">
 <tr> <td> <h3> Services Requested: </h3> </td> </tr>
  <tr> <td align = "center"> Service 1: </td> <td> <select name = "service_1" onchange="getSelectvalue(this)"> <?php 
	session_start();
	$dbcon = mysqli_connect('localhost','root','','db_main_test');
	$sub_cat = mysqli_query($dbcon, "SELECT subcateg FROM subcat");
	
	while ($row = mysqli_fetch_array($sub_cat))
	{
	echo "<option name = $row[0]\"> $row[0]
	</option>";
	}
  echo "</td> <td> </td> ";
  echo "<td>";

  
  
  echo "</td></tr>";
  ?>

  
 </td> </tr>

 <tr> <td> <br> </td> </tr>
 <input type="hidden" name="submitted" value=TRUE>
 <tr> <td> <input type="submit" value="Send Request"> </td> </tr>

 <tr> <td> <br> </td> </tr>
  </table>
 </font> </center> </div> 

<div id = "footer"> Copyright &copy; alexblaze technologies </div> <!-- footer div-->

<?php
	
	if(isset($_POST['submitted'])){
		
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$age = $_POST['age'];
			$sex = isset($_POST['sex']);
			$bday = $_POST['date_yyyy']."-".$_POST['date_mm']."-".$_POST['date_dd'];
			
		if  ((!empty($fname)) AND (!empty($lname)) AND (!empty($age)) AND (!empty($sex)) AND (!empty($bday))){
			$dbcon = mysqli_connect('localhost','root','','customers');
			$sql = "INSERT INTO `cust_list`(`firstname`, `lastname`,`age`, `sex`, `bday`) VALUES ('$fname','$lname','$age','$sex','$bday')";
			
			if(!mysqli_query($dbcon, $sql)){
			 echo "Cannot add data";
			} 
		
		$sqlrow = "SELECT * FROM `cust_list`";
		$result = mysqli_query($dbcon,$sqlrow);
		$row_count = mysqli_num_rows($result);
		echo $row_count;
		
		} else die ("Cannot add!");// if NOT blank
					
	} //end of if isset
  
?>
</form>
</body>


</html>
<html>
<body>
<?php
 session_start();

 session_destroy();
 echo "You have been logged out. \n";
 echo "Click <a href='index.php'> here </a> to login.";

?>
</body>
</html>
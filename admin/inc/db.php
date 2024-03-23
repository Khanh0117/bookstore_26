<?php
define("Host",'127.0.0.1');
define("User",'root');
define("Pass",'');
define("DB_Table",'bookstore');
	$conn = new mysqli(Host,User,Pass,DB_Table);
	// if($conn){
	// 	echo "good";
	// }
	// else{
	// 	echo "bad";
	// }
?>
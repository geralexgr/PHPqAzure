<?php


if (isset($_POST['host']) && isset($_POST['db']) && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['query']) ) {

	$hostname = $_POST['host'];
	$dbname = $_POST['db'];
	$username = $_POST['user'];
	$password = $_POST['pass'];
	$q = $_POST['query'];




	try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    

	if ($dbh->query($q) === TRUE) {
	}  else {
		throw new PDOException($e); 
	}

    $dbh = null;

   }

	catch(PDOException $e)
    {
    		$topass = array();
    	    array_push($topass, $e->getMessage() );
	   		echo json_encode($topass);	
    }

	

	
} else {
	echo "Something is wrong";
}



?>
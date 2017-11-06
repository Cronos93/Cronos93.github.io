<?php
	include 'dbconnect.php';

	$tid = $_POST['tid'];
 	$username = $_POST['username'];
	
  	$result1 = mysqli_query($server, "SELECT `Player1` FROM rezultate WHERE `Player2Q` = '$username' AND `Tid` = '$tid' AND `Score`=''");

	$result2 = mysqli_query($server, "SELECT `Player2` FROM rezultate WHERE `Player1Q` = '$username' AND `Tid` = '$tid' AND `Score`=''");

	if(mysqli_num_rows($result1) == 1){
		$row = mysqli_fetch_assoc($result1);
		echo $row['Player1'];
	}elseif(mysqli_num_rows($result2) == 1){
		$row = mysqli_fetch_assoc($result2);
		echo $row['Player2'];
	}

?>
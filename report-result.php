<?php
	session_start();

	include 'dbconnect.php';

	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$username = $_SESSION["username"];	
	$tournamentErr = $rezultatErr = $set1Err = $set2Err = $set3Err = $set4Err = $set5Err = "";
	
	if (isset($_POST['submit'])) {
		
		$tid = $_POST['tournament'];
		if (empty($tid)) {
			$tournamentErr = "*Choose a tournament!";
		}
		
		$opponent = strtok($_POST['oponent'], " ");
		$rezultat = $_POST['rezultat'];
		
		$winner1 = "";
		$loser = "";
		
		if(empty($_POST['rezultat'])){
			$rezultatErr = "*Choose a result!";
		}else{
			if($rezultat == "I won"){
				$winner = $username;
				$loser = $opponent;
			}elseif($rezultat == "I lost"){
				$winner = $opponent;
				$loser = $username;	
			}
		}		
		
		$s1c1 = $_POST['selects1c1'];
		$s1c2 = $_POST['selects1c2'];
		$s1tb = "";
		if(($s1c1==7 && $s1c2==6)||($s1c1==6 && $s1c2==7)){
			$s1tb = "(".$_POST['selects1tb'].")";
		}		
		$s2c1 = $_POST['selects2c1'];
		$s2c2 = $_POST['selects2c2'];
		$s2tb = "";
		if(($s2c1==7 && $s2c2==6)||($s2c1==6 && $s2c2==7)){
			$s2tb = "(".$_POST['selects2tb'].")";
		}
		$s3c1 = $_POST['selects3c1'];
		$s3c2 = $_POST['selects3c2'];
		$s3tb = "";
		if(($s3c1==7 && $s3c2==6)||($s3c1==6 && $s3c2==7)){
			$s3tb = "(".$_POST['selects3tb'].")";
		}
		$s4c1 = $_POST['selects4c1'];
		$s4c2 = $_POST['selects4c2'];
		$s4tb = "";
		if(($s4c1==7 && $s4c2==6)||($s4c1==6 && $s4c2==7)){
			$s4tb = "(".$_POST['selects4tb'].")";
		}
		$s5c1 = $_POST['selects5c1'];
		$s5c2 = $_POST['selects5c2'];
		$s5tb = "";
		if(($s5c1==7 && $s5c2==6)||($s5c1==6 && $s5c2==7)){
			$s5tb = "(".$_POST['selects5tb'].")";
		}
		if ((empty($s1c1) || empty($s1c2)) && (($s1c1 != 0) && ($s1c2 != 0))) {
			$set1Err = "*Please select set 1!";
		}
		if ((empty($s2c1) || empty($s2c2)) && (($s2c1 != 0) && ($s2c2 != 0))) {
			$set2Err = "*Please select set 2!";
		}
		
			if($rezultat == "I won"){				
				$set1 = $s1c1."-".$s1c2.$s1tb;
				$set2 = $s2c1."-".$s2c2.$s2tb;
				$set3 = $s3c1."-".$s3c2.$s3tb;
				$set4 = $s4c1."-".$s4c2.$s4tb;
				$set5 = $s5c1."-".$s5c2.$s5tb;
				
				$score = $set1." ".$set2;
				if (preg_match('#[0-9]#',$set3)){ 
					$score = $set1." ".$set2." ".$set3; 
				}
				if (preg_match('#[0-9]#',$set4)){ 
					$score = $set1." ".$set2." ".$set3." ".$set4; 
				}
				if (preg_match('#[0-9]#',$set5)){ 
					$score = $set1." ".$set2." ".$set3." ".$set4." ".$set5; 
				}
			}elseif($rezultat == "I lost"){
				$set1 = $s1c2."-".$s1c1.$s1tb;
				$set2 = $s2c2."-".$s2c1.$s2tb;
				$set3 = $s3c2."-".$s3c1.$s3tb;
				$set4 = $s4c2."-".$s4c1.$s4tb;
				$set5 = $s5c2."-".$s5c1.$s5tb;
				
				$score = $set1." ".$set2;
				if (preg_match('#[0-9]#',$set3)){ 
					$score = $set1." ".$set2." ".$set3; 
				}
				if (preg_match('#[0-9]#',$set4)){ 
					$score = $set1." ".$set2." ".$set3." ".$set4; 
				}
				if (preg_match('#[0-9]#',$set5)){ 
					$score = $set1." ".$set2." ".$set3." ".$set4." ".$set5; 
				}
			}		
		
		if(($set1Err == "") && ($set2Err == "")){	
		
			$meci = mysqli_query($server, "SELECT `Draw`,`Meci` FROM rezultate WHERE `Tid`='$tid' AND (`Player1Q` = '$username' OR `Player2Q` = '$username')  AND `Score` = ''");     
			$row = mysqli_fetch_assoc($meci);
			$draw = $row['Draw'];
			$nr_meci = $row['Meci'];
			
			mysqli_query($server, "UPDATE `rezultate` SET `Winner` = '$winner', `Loser` = '$loser', `Score` = '$score' WHERE `Tid`='$tid' AND `Meci` = '$nr_meci'");		

			$query_paranteza = mysqli_query($server, "SELECT `Player1`, `Player2`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Winner` FROM rezultate WHERE `Tid`='$tid' AND `Meci` = '$nr_meci'");     
			$rowP = mysqli_fetch_assoc($query_paranteza);
			$player1P = $rowP['Player1'];
			$player2P = $rowP['Player2'];
			$player1idP = $rowP['Player1id'];
			$player2idP = $rowP['Player2id'];
			$player1countryP = $rowP['Player1country'];
			$player2countryP = $rowP['Player2country'];
			$winnerP = $rowP['Winner'];
			
			$playerid = "";
			$playercountry = "";
			
			if(($winnerP == $player1P) || ($winnerP == strtok($player1P, " "))){
				$winnerP = $player1P;
				$playerid = $player1idP;
				$playercountry = $player1countryP;
			}elseif(($winnerP == $player2P) || ($winnerP == strtok($player2P, " "))){
				$winnerP = $player2P;
				$playerid = $player2idP;
				$playercountry = $player2countryP;
			}
			
			if($draw == 64){
								
			}
			
			if($draw == 32){
				if($nr_meci == 1){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '17'");		
				}elseif($nr_meci == 2){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '17'");		
				}elseif($nr_meci == 3){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '18'");		
				}elseif($nr_meci == 4){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '18'");		
				}elseif($nr_meci == 5){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '19'");		
				}elseif($nr_meci == 6){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '19'");		
				}elseif($nr_meci == 7){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '20'");		
				}elseif($nr_meci == 8){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '20'");		
				}elseif($nr_meci == 9){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '21'");		
				}elseif($nr_meci == 10){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '21'");		
				}elseif($nr_meci == 11){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '22'");		
				}elseif($nr_meci == 12){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '22'");		
				}elseif($nr_meci == 13){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '23'");		
				}elseif($nr_meci == 14){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '23'");		
				}elseif($nr_meci == 15){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '24'");		
				}elseif($nr_meci == 16){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '24'");		
				}elseif($nr_meci == 17){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '25'");		
				}elseif($nr_meci == 18){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '25'");		
				}elseif($nr_meci == 19){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '26'");		
				}elseif($nr_meci == 20){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '26'");		
				}elseif($nr_meci == 21){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '27'");		
				}elseif($nr_meci == 22){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '27'");		
				}elseif($nr_meci == 23){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '28'");		
				}elseif($nr_meci == 24){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '28'");		
				}elseif($nr_meci == 25){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '29'");		
				}elseif($nr_meci == 26){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '29'");		
				}elseif($nr_meci == 27){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '30'");		
				}elseif($nr_meci == 28){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '30'");		
				}elseif($nr_meci == 29){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '31'");		
				}elseif($nr_meci == 30){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '31'");		
				}				
			}

			if($draw == 16){
				if($nr_meci == 1){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '9'");		
				}elseif($nr_meci == 2){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '97'");		
				}elseif($nr_meci == 3){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '10'");		
				}elseif($nr_meci == 4){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '10'");		
				}elseif($nr_meci == 5){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '11'");		
				}elseif($nr_meci == 6){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '11'");		
				}elseif($nr_meci == 7){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '12'");		
				}elseif($nr_meci == 8){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '12'");		
				}elseif($nr_meci == 9){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '13'");		
				}elseif($nr_meci == 10){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '13'");		
				}elseif($nr_meci == 11){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '14'");		
				}elseif($nr_meci == 12){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '14'");		
				}elseif($nr_meci == 13){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '15'");		
				}elseif($nr_meci == 14){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '15'");		
				}				
			}
			
			if($draw == 8){
				if($nr_meci == 1){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '5'");		
				}elseif($nr_meci == 2){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '5'");		
				}elseif($nr_meci == 3){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '6'");		
				}elseif($nr_meci == 4){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '6'");		
				}elseif($nr_meci == 5){
					mysqli_query($server, "UPDATE `rezultate` SET `Player1` = '$winnerP', `Player1Q` = '$winner', `Player1id` = '$playerid', `Player1country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '7'");		
				}elseif($nr_meci == 6){
					mysqli_query($server, "UPDATE `rezultate` SET `Player2` = '$winnerP', `Player2Q` = '$winner', `Player2id` = '$playerid', `Player2country` = '$playercountry' WHERE `Tid`='$tid' AND `Meci`= '7'");		
				}				
			}
				
			echo "
				<script type=\"text/javascript\">
					alert('The result was succesfully reported!');
				</script>";	
		}
		
	}
	?>

<html><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAw4LsAKOK+AAAAAAAZ9N8AFO7PABr26gAW+eoAEfPaACH19QCH//4AGfXlABLszQAk9e0AHevYAB/28wAh9vMAH/X2AB726wBZ5ssANuPNACH24wA33K8AGfb0ABjv1gAX9fcAGu/WABP57AAc8eEAHvfpABP47wBL+NwAHPbsAA/w1AAY7tEAHvThADPdrQAY7dQAY+TJACnisAAy58sAE/ryACftwwAd89wAGvTqAB/z3AAk47YAY//pAGHu3wAe9/IAK8ysACT08gAh9/IAEerVAC/fwQAh9OoAGO3dABz4+AAe9+IAGfjwABr25QAU8uAAD+jTACffqQAN79AAGvfzABX76AAh1qoAI+m/ABr29gA25s8AJem/ABPx2wAW79AAHe7CABT48QAY8tAAJuPIABb48QBE488AIfLYABfx0wAo8eMAJOXLABjjsAAe+PEAH/HTACPt1gAV79EAO+nYADHy2AAk+eYAKO/hAIf+9QAe+uwAG+7UAB774QAb9eoAGvf1ABL58AAa+OIAHO3HABDs2wAS3aoAHuvVACf46gAm5rEAGPjzABT78wAY990ALerPAErrywAe9N0AJda1AHDx4gAe8+AATuTGACLkrwAe8NgAIvfdABP35gAV9+YAHt+tACHw0AAi6sgAHOrAAH3//QAd9+YAM9y1ACDjuwAg6cMAHPDZACXhsAAX6skAJOa7AC3kuAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgICAgJ7QjExQkICAgICAgICAntzf3lTZoMVMUICAgICAnt9fUI+aXQmIzF9QgICAntJSUl9hi2FRoBwfUlCAgJuQ0lJfX0EVyFIXgkAEgIZASl8hF99bAMUOTd9LjVCe3uBZAtffWM7NmArfR4nJXtLelU/X31dVA9hFjx9TC97UE92X319OkAQRBh3fVlxGRksbyp9H01qDzA4Ckl9JRkZG2V9fQwzDggySmhJfTECWFFBfXUGHWsoYhpbSX0CAoKCB1wgOxwRBXh+NElOAgICgm19RQ1aInJnF05OAgICAgKCfXtWPUckUhNOAgICAgICAgJ9Tk5OTk4CAgICAvgfAADgBwAAwAMAAIABAACAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgAEAAIABAADAAwAA4AcAAPgfAAA=" rel="icon" type="image/x-icon">
	<link rel="stylesheet" href="Mycss/RegLog.css">
	<link rel="stylesheet" href="Mycss/stylep.css">
	<title>Report result</title>
	<style>
			.mask {
  overflow: hidden;
  height: 20px;
}
.mask:after {
  content: '';
  display: block;
  margin: -25px auto 0;
  width: 100%;
  height: 25px;
  border-radius: 650px / 6px;
  box-shadow: 0 0 8px black;
}
	.btn_regulament{
border:1px solid #72021c; -webkit-border-radius: 20px; -moz-border-radius: 20px;border-radius: 20px;font-size:23px;font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3); color: #FFFFFF;
 background-color: #a90329; background-image: -webkit-gradient(linear, left top, left bottom, from(#a90329), to(#6d0019));
 background-image: -webkit-linear-gradient(top, #a90329, #6d0019);
 background-image: -moz-linear-gradient(top, #a90329, #6d0019);
 background-image: -ms-linear-gradient(top, #a90329, #6d0019);
 background-image: -o-linear-gradient(top, #a90329, #6d0019);
 background-image: linear-gradient(to bottom, #a90329, #6d0019);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#a90329, endColorstr=#6d0019);
}

.btn_regulament:hover{
 border:1px solid #450111;
 background-color: #77021d; background-image: -webkit-gradient(linear, left top, left bottom, from(#77021d), to(#3a000d));
 background-image: -webkit-linear-gradient(top, #77021d, #3a000d);
 background-image: -moz-linear-gradient(top, #77021d, #3a000d);
 background-image: -ms-linear-gradient(top, #77021d, #3a000d);
 background-image: -o-linear-gradient(top, #77021d, #3a000d);
 background-image: linear-gradient(to bottom, #77021d, #3a000d);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#77021d, endColorstr=#3a000d);
}
#banner { 
        width: 526px;
		height: 663px;
    }


@media only screen and (max-device-width: 800px) {
    #banner { 
        width: 500px;
		height: 640px;
    }
}
</style>
</head>
<body contenteditable="false" style="margin-left: auto;margin-right: auto;margin-top: 0;margin-bottom: 0;background-image: url(Myimages/bk.jpg)!important;background-repeat: no-repeat;background-position: center center;background-attachment: fixed;">
	
	<?php include 'topbar.php';?>	
	
	<div style="margin:0 auto;width:1101px;">
	<div>

<?php include 'meniu.php';?>
<script async="" src="https://www.google-analytics.com/analytics.js"></script><script async="" src="https://www.google-analytics.com/analytics.js"></script>
	</div>
	<div>
		<img src="Myimages/logodmt.jpg" width="1101" height="235" alt="" style="box-shadow: 0 6px 20px -4px black;">
	</div>
	
<div style="background:rgba(43, 125, 166, 0.18);padding-top: 50px;padding-bottom: 70px;min-height: 1300px;"><br><div class="form">
				<h1 style="color: white;margin-bottom: 30px;">Report result</h1>
				<form action="" id="registration" method="post" name="registration">
					<table style=" margin: 0 auto;">
						<tbody>
							
							
							
							
							
							<tr>
								<td style=" padding-bottom: 15px;">
									<div style="color: white;width: 135px;padding-right: 0px;text-align: right;line-height: 24px;margin-bottom: 20px;display: table-cell;">Tournament:&nbsp;</div>
								</td>
								<td style=" padding-bottom: 15px;">
									<select name="tournament" id="tournament" style="font-size: medium;">
										<option value="" selected></option>
										<?php
																				
											$resultT = mysqli_query($server, "SELECT `Tid`, `Tournament` FROM rezultate WHERE (`Player1Q` = '$username' OR `Player2Q` = '$username') AND `Player1Q` != '' AND `Player2Q` != '' AND `Score`=''");

											while($rowT = mysqli_fetch_assoc($resultT)) {
												$tid = $rowT['Tid'];
												$tournament = $rowT['Tournament'];
												echo "<option value='$tid'>
														$tournament
													</option>";
											}
										?>									
									</select>
									<div style="margin-top: 5px;color: white;">
										<?php echo $tournamentErr; ?>
									</div>									
								</td>
							</tr>
							<tr>
								<td style=" padding-bottom: 15px;">
									<div style="color: white;width: 135px;padding-right: 0px;text-align: right;line-height: 24px;margin-bottom: 20px;display: table-cell;">Opponent:&nbsp;</div>
								</td>
								<td style=" padding-bottom: 15px;">
									<input readonly type="text" name="oponent" id="oponent" value="" style="padding: 4px;">									
								</td>
							</tr>
							<tr>
								<td style=" padding-bottom: 15px;">
									<div style="color: white;width: 135px;padding-right: 0px;text-align: right;line-height: 24px;margin-bottom: 20px;display: table-cell;">Result:&nbsp;</div>
								</td>
								<td style=" padding-bottom: 15px;">
									<input type="radio" name="rezultat" value="I won"><span style="color: white;">I won</span>
									<input type="radio" name="rezultat" value="I lost" style="margin-left: 15px;"><span style="color: white;">I lost</span>
									<div style="margin-top: 5px;color: white;">
										<?php echo $rezultatErr; ?>
									</div>
								</td>
							</tr>						
							<tr>
								<td style=" padding-bottom: 15px;">
									<div style="color: white;width: 135px;padding-right: 0px;text-align: right;line-height: 24px;margin-bottom: 20px;display: table-cell;">Set 1:&nbsp;</div>
								</td>
								<td style=" padding-bottom: 15px;">
									<select name="selects1c1" style="font-size: 17px;width: 45px;" size="1">
<option selected=""></option>
<option value="0" >0</option>
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>
<option value="5" >5</option>
<option value="6" >6</option>
<option value="7" >7</option>
</select>
<select name="selects1c2" style="font-size: 17px;width: 45px;margin-left: 5px;">
<option selected=""></option>
<option value="0" >0</option>
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>
<option value="5" >5</option>
<option value="6" >6</option>
<option value="7" >7</option>
</select><div style="color: white;display: inline-block;margin-left: 15px;">Tie-break:</div><select name="selects1tb" style="font-size: 17px;width: 45px;margin-left: 5px;">
<option selected=""></option>
<option value="0" >0</option>
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>
<option value="5" >5</option>
<option value="6" >6</option>
<option value="7" >7</option>
<option value="8" >8</option>
<option value="9" >9</option>
<option value="10" >10</option>
<option value="11" >11</option>
<option value="12" >12</option>
<option value="13" >13</option>
<option value="14" >14</option>
<option value="15" >15</option>
</select>
									<div style="margin-top: 5px;color: white;">
										<?php echo $set1Err; ?>
									</div>
								</td>
							</tr>
							
							
							
							<tr>
								<td style=" padding-bottom: 15px;">
									<div style="color: white;width: 135px;padding-right: 0px;text-align: right;line-height: 24px;margin-bottom: 20px;display: table-cell;">Set 2:&nbsp;</div>
								</td>
								<td style=" padding-bottom: 15px;">
									<select name="selects2c1" style="font-size: 17px;width: 45px;">
<option selected=""></option>
<option value="0" >0</option>
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>
<option value="5" >5</option>
<option value="6" >6</option>
<option value="7" >7</option>
</select>
<select name="selects2c2" style="font-size: 17px;width: 45px;margin-left: 5px;">
<option selected=""></option>
<option value="0" >0</option>
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>
<option value="5" >5</option>
<option value="6" >6</option>
<option value="7" >7</option>
</select><div style="color: white;display: inline-block;margin-left: 15px;">Tie-break:</div><select name="selects2tb" style="font-size: 17px;width: 45px;margin-left: 5px;">
<option selected=""></option>
<option value="0" >0</option>
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>
<option value="5" >5</option>
<option value="6" >6</option>
<option value="7" >7</option>
<option value="8" >8</option>
<option value="9" >9</option>
<option value="10" >10</option>
<option value="11" >11</option>
<option value="12" >12</option>
<option value="13" >13</option>
<option value="14" >14</option>
<option value="15" >15</option>
</select>
									<div style="margin-top: 5px;color: white;">
										<?php echo $set2Err; ?>
									</div>
								</td>
							</tr><tr>
								<td style=" padding-bottom: 15px;">
									<div style="color: white;width: 135px;padding-right: 0px;text-align: right;line-height: 24px;margin-bottom: 20px;display: table-cell;">Set 3:&nbsp;</div>
								</td>
								<td style=" padding-bottom: 15px;">
									<select name="selects3c1" style="font-size: 17px;width: 45px;" size="1">
<option selected=""></option>
<option value="0" >0</option>
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>
<option value="5" >5</option>
<option value="6" >6</option>
<option value="7" >7</option>
</select>
<select name="selects3c2" style="font-size: 17px;width: 45px;margin-left: 5px;">
<option selected=""></option>
<option value="0" >0</option>
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>
<option value="5" >5</option>
<option value="6" >6</option>
<option value="7" >7</option>
</select><div style="color: white;display: inline-block;margin-left: 15px;">Tie-break:</div><select name="selects3tb" style="font-size: 17px;width: 45px;margin-left: 5px;">
<option selected=""></option>
<option value="0" >0</option>
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>
<option value="5" >5</option>
<option value="6" >6</option>
<option value="7" >7</option>
<option value="8" >8</option>
<option value="9" >9</option>
<option value="10" >10</option>
<option value="11" >11</option>
<option value="12" >12</option>
<option value="13" >13</option>
<option value="14" >14</option>
<option value="15" >15</option>
</select>
									<div style="margin-top: 5px;color: white;">
																			</div>
								</td>
							</tr><tr>
								<td style=" padding-bottom: 15px;">
									<div style="color: white;width: 135px;padding-right: 0px;text-align: right;line-height: 24px;margin-bottom: 20px;display: table-cell;">Set 4:&nbsp;</div>
								</td>
								<td style=" padding-bottom: 15px;">
									<select name="selects4c1" style="font-size: 17px;width: 45px;" disabled>
<option selected=""></option>
<option value="0" >0</option>
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>
<option value="5" >5</option>
<option value="6" >6</option>
<option value="7" >7</option>
</select>
<select name="selects4c2" style="font-size: 17px;width: 45px;margin-left: 5px;" disabled>
<option selected=""></option>
<option value="0" >0</option>
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>
<option value="5" >5</option>
<option value="6" >6</option>
<option value="7" >7</option>
</select><div style="color: white;display: inline-block;margin-left: 15px;">Tie-break:</div><select name="selects4tb" style="font-size: 17px;width: 45px;margin-left: 5px;" disabled>
<option selected=""></option>
<option value="0" >0</option>
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>
<option value="5" >5</option>
<option value="6" >6</option>
<option value="7" >7</option>
<option value="8" >8</option>
<option value="9" >9</option>
<option value="10" >10</option>
<option value="11" >11</option>
<option value="12" >12</option>
<option value="13" >13</option>
<option value="14" >14</option>
<option value="15" >15</option>
</select>
									<div style="margin-top: 5px;color: white;">
																			</div>
								</td>
							</tr><tr>
								<td style=" padding-bottom: 15px;">
									<div style="color: white;width: 135px;padding-right: 0px;text-align: right;line-height: 24px;margin-bottom: 20px;display: table-cell;">Set 5:&nbsp;</div>
								</td>
								<td style=" padding-bottom: 15px;">
									<select name="selects5c1" style="font-size: 17px;width: 45px;" disabled>
<option selected=""></option>
<option value="0" >0</option>
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>
<option value="5" >5</option>
<option value="6" >6</option>
<option value="7" >7</option>
<option value="8" >8</option>
<option value="9" >9</option>
<option value="10" >10</option>
<option value="11" >11</option>
<option value="12" >12</option>
<option value="13" >13</option>
<option value="14" >14</option>
<option value="15" >15</option>
<option value="16" >16</option>
<option value="17" >17</option>
<option value="18" >18</option>
<option value="19" >19</option>
<option value="20" >20</option>
<option value="21" >21</option>
<option value="22" >22</option>
<option value="23" >23</option>
<option value="24" >24</option>
<option value="25" >25</option>
</select>
<select name="selects5c2" style="font-size: 17px;width: 45px;margin-left: 5px;" disabled>
<option selected=""></option>
<option value="0" >0</option>
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>
<option value="5" >5</option>
<option value="6" >6</option>
<option value="7" >7</option>
<option value="8" >8</option>
<option value="9" >9</option>
<option value="10" >10</option>
<option value="11" >11</option>
<option value="12" >12</option>
<option value="13" >13</option>
<option value="14" >14</option>
<option value="15" >15</option>
<option value="16" >16</option>
<option value="17" >17</option>
<option value="18" >18</option>
<option value="19" >19</option>
<option value="20" >20</option>
<option value="21" >21</option>
<option value="22" >22</option>
<option value="23" >23</option>
<option value="24" >24</option>
<option value="25" >25</option>
</select>
									<div style="margin-top: 5px;color: white;">
																			</div>
								</td>
							</tr>
							
						</tbody>
					</table><input class="butonreglog" name="submit" style="margin-top: 8px;" type="submit" value="Confirm">
				</form>
				<div style="margin-top: 20px;margin-bottom: 25px;color: white;">
									</div>
			</div>
	</div>	
	</div>
	<div style="margin:0 auto;width:100%;text-align:center;background:linear-gradient(to bottom,#252525 0,#252525 55%,#1E2223 55%,#1E2223 100%)"><img src="Myimages/bottom.jpg" alt="" style="width:1101"></div>
	
<script type="text/javascript">
  $(document).ready(function(){ /* PREPARE THE SCRIPT */
    $("#tournament").change(function(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */

	
		var tid = $(this).val();
		var username = "<?php echo $username; ?>";
		
		$.post("get-opponent.php", { tid: tid, username: username },
		function(data) {
			var result = data
			$("#oponent").attr("value", result);
		});

    });
  });
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-101836512-1', 'auto');
  ga('send', 'pageview');

</script>
	<script src="Myjs/jquery-1.12.0.min.js">
	</script> 
	<script src="Myjs/index.js">
	</script>

</body></html>
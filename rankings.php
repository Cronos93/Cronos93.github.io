<?php
	session_start();

	include 'dbconnect.php';

	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	if(isset($_POST['actualizare'])) {
		//copiere clasament vechi !!!
		mysqli_query($server, "INSERT INTO rankings1 SELECT * FROM rankings");     
		
		//for 32 draws facut
		$result32 = mysqli_query($server, "SELECT COUNT(DISTINCT `Tid`) FROM rezultate WHERE `Meci`='31' AND `Score`!=''");     
		$row32 = mysqli_fetch_row($result32);
		$num_rows32 = $row32[0];

		for($a=1;$a<=$num_rows32;$a++){
			
			$query_type32 = mysqli_query($server, "SELECT `Type` FROM turnee WHERE `id`='$a'");
			$row_type32 = mysqli_fetch_assoc($query_type32);    
			$type32 = $row_type32["Type"];
			
			//DMT 250
			if($type32 == "DMT 250"){
				for($b=1;$b<=31;$b++){
					$query_loser = mysqli_query($server, "SELECT `Loser` FROM rezultate WHERE `Meci`='$b' AND `Tid`='$a'");
					$row_loser = mysqli_fetch_assoc($query_loser);    
					$loser = $row_loser["Loser"];				
					$points = "";			
					$verificare = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$loser'");     
					if(mysqli_num_rows($verificare) == 1){//daca jucatorul deja exista in clasament
						$rowV = mysqli_fetch_assoc($verificare);
						$points = $rowV["Points"];
						if($b<17){
							$points = $points + 5;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+5' WHERE `Username`='$loser'");
						}elseif($b>16 && $b<25){
							$points = $points + 20;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+20' WHERE `Username`='$loser'");
						}elseif($b>24 && $b<29){
							$points = $points + 45;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+45' WHERE `Username`='$loser'");
						}elseif($b>28 && $b<31){
							$points = $points + 90;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+90' WHERE `Username`='$loser'");
						}elseif($b=31){
							$points = $points + 150;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+150' WHERE `Username`='$loser'");
						}
					}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
						$result3 = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$loser'");
						$row3 = mysqli_fetch_assoc($result3);    
						$pid = $row3["id"];
						$pcountry = $row3["Country"];
						$pcharacter = $row3["Character"];					
						if($b<17){
							$points = 5;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+5','$pcharacter')"); 
						}elseif($b>16 && $b<25){
							$points = 20;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+20','$pcharacter')"); 
						}elseif($b>24 && $b<29){
							$points = 45;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+45','$pcharacter')"); 
						}elseif($b>28 && $b<31){
							$points = 90;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+90','$pcharacter')"); 
						}elseif($b==31){
							$points = 150;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+150','$pcharacter')"); 
						}
					}
				}
				//introducere/actualizare winner
				$query_winner = mysqli_query($server, "SELECT `Winner` FROM rezultate WHERE `Meci`='31' AND `Tid`='$a'");
				$row_winner = mysqli_fetch_assoc($query_winner);    
				$winner = $row_winner["Winner"];
				
				$verificare1 = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$winner'");     
				if(mysqli_num_rows($verificare1) == 1){//daca jucatorul deja exista in clasament
					$rowV1 = mysqli_fetch_assoc($verificare1);
					$pointsW = $rowV1["Points"];
					$pointsW = $pointsW + 250;
					mysqli_query($server, "UPDATE rankings SET `Points`='$pointsW', `C`='+250' WHERE `Username`='$winner'");
				}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
					$query_detaliijucator = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$winner'");
					$row_detaliijucator = mysqli_fetch_assoc($query_detaliijucator);    
					$pidW = $row_detaliijucator["id"];
					$pcountryW = $row_detaliijucator["Country"];
					$pcharacterW = $row_detaliijucator["Character"];						
					$pointsW = 250;
					mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$winner','$pidW','$pcountryW','$pointsW','+250','$pcharacterW')"); 
				}						
			}
			//DMT 500
			if($type32 == "DMT 500"){
				for($b=1;$b<=31;$b++){
					$query_loser = mysqli_query($server, "SELECT `Loser` FROM rezultate WHERE `Meci`='$b' AND `Tid`='$a'");
					$row_loser = mysqli_fetch_assoc($query_loser);    
					$loser = $row_loser["Loser"];				
					$points = "";			
					$verificare = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$loser'");     
					if(mysqli_num_rows($verificare) == 1){//daca jucatorul deja exista in clasament
						$rowV = mysqli_fetch_assoc($verificare);
						$points = $rowV["Points"];
						if($b<17){
							$points = $points + 5;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+5' WHERE `Username`='$loser'");
						}elseif($b>16 && $b<25){
							$points = $points + 45;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+45' WHERE `Username`='$loser'");
						}elseif($b>24 && $b<29){
							$points = $points + 90;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+90' WHERE `Username`='$loser'");
						}elseif($b>28 && $b<31){
							$points = $points + 180;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+180' WHERE `Username`='$loser'");
						}elseif($b=31){
							$points = $points + 300;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+300' WHERE `Username`='$loser'");
						}
					}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
						$result3 = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$loser'");
						$row3 = mysqli_fetch_assoc($result3);    
						$pid = $row3["id"];
						$pcountry = $row3["Country"];
						$pcharacter = $row3["Character"];					
						if($b<17){
							$points = 5;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+5','$pcharacter')"); 
						}elseif($b>16 && $b<25){
							$points = 45;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+45','$pcharacter')"); 
						}elseif($b>24 && $b<29){
							$points = 90;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+90','$pcharacter')"); 
						}elseif($b>28 && $b<31){
							$points = 180;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+180','$pcharacter')"); 
						}elseif($b==31){
							$points = 300;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+300','$pcharacter')"); 
						}
					}
				}
				//introducere/actualizare winner
				$query_winner = mysqli_query($server, "SELECT `Winner` FROM rezultate WHERE `Meci`='31' AND `Tid`='$a'");
				$row_winner = mysqli_fetch_assoc($query_winner);    
				$winner = $row_winner["Winner"];
				
				$verificare1 = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$winner'");     
				if(mysqli_num_rows($verificare1) == 1){//daca jucatorul deja exista in clasament
					$rowV1 = mysqli_fetch_assoc($verificare1);
					$pointsW = $rowV1["Points"];
					$pointsW = $pointsW + 500;
					mysqli_query($server, "UPDATE rankings SET `Points`='$pointsW', `C`='+500' WHERE `Username`='$winner'");
				}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
					$query_detaliijucator = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$winner'");
					$row_detaliijucator = mysqli_fetch_assoc($query_detaliijucator);    
					$pidW = $row_detaliijucator["id"];
					$pcountryW = $row_detaliijucator["Country"];
					$pcharacterW = $row_detaliijucator["Character"];						
					$pointsW = 500;
					mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$winner','$pidW','$pcountryW','$pointsW','+500','$pcharacterW')"); 
				}						
			}
			//DMT 1000
			if($type32 == "DMT 1000"){
				for($b=1;$b<=31;$b++){
					$query_loser = mysqli_query($server, "SELECT `Loser` FROM rezultate WHERE `Meci`='$b' AND `Tid`='$a'");
					$row_loser = mysqli_fetch_assoc($query_loser);    
					$loser = $row_loser["Loser"];				
					$points = "";			
					$verificare = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$loser'");     
					if(mysqli_num_rows($verificare) == 1){//daca jucatorul deja exista in clasament
						$rowV = mysqli_fetch_assoc($verificare);
						$points = $rowV["Points"];
						if($b<17){
							$points = $points + 10;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+10' WHERE `Username`='$loser'");
						}elseif($b>16 && $b<25){
							$points = $points + 90;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+90' WHERE `Username`='$loser'");
						}elseif($b>24 && $b<29){
							$points = $points + 180;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+180' WHERE `Username`='$loser'");
						}elseif($b>28 && $b<31){
							$points = $points + 360;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+360' WHERE `Username`='$loser'");
						}elseif($b=31){
							$points = $points + 600;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+600' WHERE `Username`='$loser'");
						}
					}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
						$result3 = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$loser'");
						$row3 = mysqli_fetch_assoc($result3);    
						$pid = $row3["id"];
						$pcountry = $row3["Country"];
						$pcharacter = $row3["Character"];					
						if($b<17){
							$points = 10;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+10','$pcharacter')"); 
						}elseif($b>16 && $b<25){
							$points = 90;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+90','$pcharacter')"); 
						}elseif($b>24 && $b<29){
							$points = 180;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+180','$pcharacter')"); 
						}elseif($b>28 && $b<31){
							$points = 360;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+360','$pcharacter')"); 
						}elseif($b==31){
							$points = 600;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+600','$pcharacter')"); 
						}
					}
				}
				//introducere/actualizare winner
				$query_winner = mysqli_query($server, "SELECT `Winner` FROM rezultate WHERE `Meci`='31' AND `Tid`='$a'");
				$row_winner = mysqli_fetch_assoc($query_winner);    
				$winner = $row_winner["Winner"];
				
				$verificare1 = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$winner'");     
				if(mysqli_num_rows($verificare1) == 1){//daca jucatorul deja exista in clasament
					$rowV1 = mysqli_fetch_assoc($verificare1);
					$pointsW = $rowV1["Points"];
					$pointsW = $pointsW + 1000;
					mysqli_query($server, "UPDATE rankings SET `Points`='$pointsW', `C`='+1000' WHERE `Username`='$winner'");
				}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
					$query_detaliijucator = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$winner'");
					$row_detaliijucator = mysqli_fetch_assoc($query_detaliijucator);    
					$pidW = $row_detaliijucator["id"];
					$pcountryW = $row_detaliijucator["Country"];
					$pcharacterW = $row_detaliijucator["Character"];						
					$pointsW = 1000;
					mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$winner','$pidW','$pcountryW','$pointsW','+1000','$pcharacterW')"); 
				}						
			}
			//DMT Grand Slam
			if($type32 == "Grand Slam"){
				for($b=1;$b<=31;$b++){
					$query_loser = mysqli_query($server, "SELECT `Loser` FROM rezultate WHERE `Meci`='$b' AND `Tid`='$a'");
					$row_loser = mysqli_fetch_assoc($query_loser);    
					$loser = $row_loser["Loser"];				
					$points = "";			
					$verificare = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$loser'");     
					if(mysqli_num_rows($verificare) == 1){//daca jucatorul deja exista in clasament
						$rowV = mysqli_fetch_assoc($verificare);
						$points = $rowV["Points"];
						if($b<17){
							$points = $points + 10;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+10' WHERE `Username`='$loser'");
						}elseif($b>16 && $b<25){
							$points = $points + 180;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+180' WHERE `Username`='$loser'");
						}elseif($b>24 && $b<29){
							$points = $points + 360;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+360' WHERE `Username`='$loser'");
						}elseif($b>28 && $b<31){
							$points = $points + 720;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+720' WHERE `Username`='$loser'");
						}elseif($b=31){
							$points = $points + 1200;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+1200' WHERE `Username`='$loser'");
						}
					}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
						$result3 = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$loser'");
						$row3 = mysqli_fetch_assoc($result3);    
						$pid = $row3["id"];
						$pcountry = $row3["Country"];
						$pcharacter = $row3["Character"];					
						if($b<17){
							$points = 10;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+10','$pcharacter')"); 
						}elseif($b>16 && $b<25){
							$points = 180;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+180','$pcharacter')"); 
						}elseif($b>24 && $b<29){
							$points = 360;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+360','$pcharacter')"); 
						}elseif($b>28 && $b<31){
							$points = 720;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+720','$pcharacter')"); 
						}elseif($b==31){
							$points = 1200;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+1200','$pcharacter')"); 
						}
					}
				}
				//introducere/actualizare winner
				$query_winner = mysqli_query($server, "SELECT `Winner` FROM rezultate WHERE `Meci`='31' AND `Tid`='$a'");
				$row_winner = mysqli_fetch_assoc($query_winner);    
				$winner = $row_winner["Winner"];
				
				$verificare1 = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$winner'");     
				if(mysqli_num_rows($verificare1) == 1){//daca jucatorul deja exista in clasament
					$rowV1 = mysqli_fetch_assoc($verificare1);
					$pointsW = $rowV1["Points"];
					$pointsW = $pointsW + 2000;
					mysqli_query($server, "UPDATE rankings SET `Points`='$pointsW', `C`='+2000' WHERE `Username`='$winner'");
				}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
					$query_detaliijucator = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$winner'");
					$row_detaliijucator = mysqli_fetch_assoc($query_detaliijucator);    
					$pidW = $row_detaliijucator["id"];
					$pcountryW = $row_detaliijucator["Country"];
					$pcharacterW = $row_detaliijucator["Character"];						
					$pointsW = 2000;
					mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$winner','$pidW','$pcountryW','$pointsW','+2000','$pcharacterW')"); 
				}						
			}
		}
	
		//for 16 draws facut
		$result16 = mysqli_query($server, "SELECT COUNT(DISTINCT `Tid`) FROM rezultate WHERE `Meci`='7' AND `Score`!=''");     
		$row16 = mysqli_fetch_row($result16);
		$num_rows16 = $row16[0];

		for($a=1;$a<=$num_rows8;$a++){
			
			$query_type16 = mysqli_query($server, "SELECT `Type` FROM turnee WHERE `id`='$a'");
			$row_type16 = mysqli_fetch_assoc($query_type16);    
			$type16 = $row_type16["Type"];
			
			//DMT 250
			if($type16 == "DMT 250"){
				for($b=1;$b<=15;$b++){
					$query_loser = mysqli_query($server, "SELECT `Loser` FROM rezultate WHERE `Meci`='$b' AND `Tid`='$a'");
					$row_loser = mysqli_fetch_assoc($query_loser);    
					$loser = $row_loser["Loser"];				
					$points = "";			
					$verificare = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$loser'");     
					if(mysqli_num_rows($verificare) == 1){//daca jucatorul deja exista in clasament
						$rowV = mysqli_fetch_assoc($verificare);
						$points = $rowV["Points"];
						if($b<9){
							$points = $points + 10;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+10' WHERE `Username`='$loser'");
						}elseif($b>8 && $b<13){
							$points = $points + 45;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+45' WHERE `Username`='$loser'");
						}elseif($b>12 && $b<15){
							$points = $points + 90;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+90' WHERE `Username`='$loser'");
						}elseif($b==15){
							$points = $points + 150;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+150' WHERE `Username`='$loser'");
						}
					}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
						$result3 = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$loser'");
						$row3 = mysqli_fetch_assoc($result3);    
						$pid = $row3["id"];
						$pcountry = $row3["Country"];
						$pcharacter = $row3["Character"];					
						if($b<9){
							$points = 10;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+10','$pcharacter')"); 
						}elseif($b>8 && $b<13){
							$points = 45;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+45','$pcharacter')"); 
						}elseif($b>12 && $b<15){
							$points = 90;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+90','$pcharacter')"); 
						}elseif($b==15){
							$points = 150;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+150','$pcharacter')"); 
						}
					}
				}
				//introducere/actualizare winner
				$query_winner = mysqli_query($server, "SELECT `Winner` FROM rezultate WHERE `Meci`='15' AND `Tid`='$a'");
				$row_winner = mysqli_fetch_assoc($query_winner);    
				$winner = $row_winner["Winner"];
				
				$verificare1 = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$winner'");     
				if(mysqli_num_rows($verificare1) == 1){//daca jucatorul deja exista in clasament
					$rowV1 = mysqli_fetch_assoc($verificare1);
					$pointsW = $rowV1["Points"];
					$pointsW = $pointsW + 250;
					mysqli_query($server, "UPDATE rankings SET `Points`='$pointsW', `C`='+250' WHERE `Username`='$winner'");
				}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
					$query_detaliijucator = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$winner'");
					$row_detaliijucator = mysqli_fetch_assoc($query_detaliijucator);    
					$pidW = $row_detaliijucator["id"];
					$pcountryW = $row_detaliijucator["Country"];
					$pcharacterW = $row_detaliijucator["Character"];						
					$pointsW = 250;
					mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$winner','$pidW','$pcountryW','$pointsW','+250','$pcharacterW')"); 
				}						
			}
			//DMT 500
			if($type16 == "DMT 500"){
				for($b=1;$b<=15;$b++){
					$query_loser = mysqli_query($server, "SELECT `Loser` FROM rezultate WHERE `Meci`='$b' AND `Tid`='$a'");
					$row_loser = mysqli_fetch_assoc($query_loser);    
					$loser = $row_loser["Loser"];				
					$points = "";			
					$verificare = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$loser'");     
					if(mysqli_num_rows($verificare) == 1){//daca jucatorul deja exista in clasament
						$rowV = mysqli_fetch_assoc($verificare);
						$points = $rowV["Points"];
						if($b<9){
							$points = $points + 10;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+10' WHERE `Username`='$loser'");
						}elseif($b>8 && $b<13){
							$points = $points + 90;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+90' WHERE `Username`='$loser'");
						}elseif($b>12 && $b<15){
							$points = $points + 180;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+180' WHERE `Username`='$loser'");
						}elseif($b==15){
							$points = $points + 300;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+300' WHERE `Username`='$loser'");
						}
					}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
						$result3 = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$loser'");
						$row3 = mysqli_fetch_assoc($result3);    
						$pid = $row3["id"];
						$pcountry = $row3["Country"];
						$pcharacter = $row3["Character"];					
						if($b<9){
							$points = 10;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+10','$pcharacter')"); 
						}elseif($b>8 && $b<13){
							$points = 90;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+90','$pcharacter')"); 
						}elseif($b>12 && $b<15){
							$points = 180;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+180','$pcharacter')"); 
						}elseif($b==15){
							$points = 300;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+300','$pcharacter')"); 
						}
					}
				}
				//introducere/actualizare winner
				$query_winner = mysqli_query($server, "SELECT `Winner` FROM rezultate WHERE `Meci`='15' AND `Tid`='$a'");
				$row_winner = mysqli_fetch_assoc($query_winner);    
				$winner = $row_winner["Winner"];
				
				$verificare1 = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$winner'");     
				if(mysqli_num_rows($verificare1) == 1){//daca jucatorul deja exista in clasament
					$rowV1 = mysqli_fetch_assoc($verificare1);
					$pointsW = $rowV1["Points"];
					$pointsW = $pointsW + 500;
					mysqli_query($server, "UPDATE rankings SET `Points`='$pointsW', `C`='+500' WHERE `Username`='$winner'");
				}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
					$query_detaliijucator = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$winner'");
					$row_detaliijucator = mysqli_fetch_assoc($query_detaliijucator);    
					$pidW = $row_detaliijucator["id"];
					$pcountryW = $row_detaliijucator["Country"];
					$pcharacterW = $row_detaliijucator["Character"];						
					$pointsW = 500;
					mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$winner','$pidW','$pcountryW','$pointsW','+500','$pcharacterW')"); 
				}						
			}
			//DMT 1000
			if($type16 == "DMT 1000"){
				for($b=1;$b<=15;$b++){
					$query_loser = mysqli_query($server, "SELECT `Loser` FROM rezultate WHERE `Meci`='$b' AND `Tid`='$a'");
					$row_loser = mysqli_fetch_assoc($query_loser);    
					$loser = $row_loser["Loser"];				
					$points = "";			
					$verificare = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$loser'");     
					if(mysqli_num_rows($verificare) == 1){//daca jucatorul deja exista in clasament
						$rowV = mysqli_fetch_assoc($verificare);
						$points = $rowV["Points"];
						if($b<9){
							$points = $points + 10;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+10' WHERE `Username`='$loser'");
						}elseif($b>8 && $b<13){
							$points = $points + 180;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+180' WHERE `Username`='$loser'");
						}elseif($b>12 && $b<15){
							$points = $points + 360;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+360' WHERE `Username`='$loser'");
						}elseif($b==15){
							$points = $points + 600;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+600' WHERE `Username`='$loser'");
						}
					}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
						$result3 = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$loser'");
						$row3 = mysqli_fetch_assoc($result3);    
						$pid = $row3["id"];
						$pcountry = $row3["Country"];
						$pcharacter = $row3["Character"];					
						if($b<9){
							$points = 10;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+10','$pcharacter')"); 
						}elseif($b>8 && $b<13){
							$points = 180;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+180','$pcharacter')"); 
						}elseif($b>12 && $b<15){
							$points = 360;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+360','$pcharacter')"); 
						}elseif($b==15){
							$points = 600;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+600','$pcharacter')"); 
						}
					}
				}
				//introducere/actualizare winner
				$query_winner = mysqli_query($server, "SELECT `Winner` FROM rezultate WHERE `Meci`='15' AND `Tid`='$a'");
				$row_winner = mysqli_fetch_assoc($query_winner);    
				$winner = $row_winner["Winner"];
				
				$verificare1 = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$winner'");     
				if(mysqli_num_rows($verificare1) == 1){//daca jucatorul deja exista in clasament
					$rowV1 = mysqli_fetch_assoc($verificare1);
					$pointsW = $rowV1["Points"];
					$pointsW = $pointsW + 1000;
					mysqli_query($server, "UPDATE rankings SET `Points`='$pointsW', `C`='+1000' WHERE `Username`='$winner'");
				}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
					$query_detaliijucator = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$winner'");
					$row_detaliijucator = mysqli_fetch_assoc($query_detaliijucator);    
					$pidW = $row_detaliijucator["id"];
					$pcountryW = $row_detaliijucator["Country"];
					$pcharacterW = $row_detaliijucator["Character"];						
					$pointsW = 1000;
					mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$winner','$pidW','$pcountryW','$pointsW','+1000','$pcharacterW')"); 
				}						
			}
			//Grand Slam
			if($type16 == "Grand Slam"){
				for($b=1;$b<=15;$b++){
					$query_loser = mysqli_query($server, "SELECT `Loser` FROM rezultate WHERE `Meci`='$b' AND `Tid`='$a'");
					$row_loser = mysqli_fetch_assoc($query_loser);    
					$loser = $row_loser["Loser"];				
					$points = "";			
					$verificare = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$loser'");     
					if(mysqli_num_rows($verificare) == 1){//daca jucatorul deja exista in clasament
						$rowV = mysqli_fetch_assoc($verificare);
						$points = $rowV["Points"];
						if($b<9){
							$points = $points + 10;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+10' WHERE `Username`='$loser'");
						}elseif($b>8 && $b<13){
							$points = $points + 360;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+360' WHERE `Username`='$loser'");
						}elseif($b>12 && $b<15){
							$points = $points + 720;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+720' WHERE `Username`='$loser'");
						}elseif($b==15){
							$points = $points + 1200;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+1200' WHERE `Username`='$loser'");
						}
					}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
						$result3 = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$loser'");
						$row3 = mysqli_fetch_assoc($result3);    
						$pid = $row3["id"];
						$pcountry = $row3["Country"];
						$pcharacter = $row3["Character"];					
						if($b<9){
							$points = 10;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+10','$pcharacter')"); 
						}elseif($b>8 && $b<13){
							$points = 360;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+360','$pcharacter')"); 
						}elseif($b>12 && $b<15){
							$points = 720;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+720','$pcharacter')"); 
						}elseif($b==15){
							$points = 1200;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+1200','$pcharacter')"); 
						}
					}
				}
				//introducere/actualizare winner
				$query_winner = mysqli_query($server, "SELECT `Winner` FROM rezultate WHERE `Meci`='15' AND `Tid`='$a'");
				$row_winner = mysqli_fetch_assoc($query_winner);    
				$winner = $row_winner["Winner"];
				
				$verificare1 = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$winner'");     
				if(mysqli_num_rows($verificare1) == 1){//daca jucatorul deja exista in clasament
					$rowV1 = mysqli_fetch_assoc($verificare1);
					$pointsW = $rowV1["Points"];
					$pointsW = $pointsW + 2000;
					mysqli_query($server, "UPDATE rankings SET `Points`='$pointsW', `C`='+2000' WHERE `Username`='$winner'");
				}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
					$query_detaliijucator = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$winner'");
					$row_detaliijucator = mysqli_fetch_assoc($query_detaliijucator);    
					$pidW = $row_detaliijucator["id"];
					$pcountryW = $row_detaliijucator["Country"];
					$pcharacterW = $row_detaliijucator["Character"];						
					$pointsW = 2000;
					mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$winner','$pidW','$pcountryW','$pointsW','+2000','$pcharacterW')"); 
				}						
			}
		}
	
		//for 8 draws facut
		$result8 = mysqli_query($server, "SELECT COUNT(DISTINCT `Tid`) FROM rezultate WHERE `Meci`='7' AND `Score`!=''");     
		$row8 = mysqli_fetch_row($result8);
		$num_rows8 = $row8[0];

		for($a=1;$a<=$num_rows8;$a++){
			
			$query_type8 = mysqli_query($server, "SELECT `Type` FROM turnee WHERE `id`='$a'");
			$row_type8 = mysqli_fetch_assoc($query_type8);    
			$type8 = $row_type8["Type"];
			
			//DMT 250
			if($type8 == "DMT 250"){
				for($b=1;$b<=7;$b++){
					$query_loser = mysqli_query($server, "SELECT `Loser` FROM rezultate WHERE `Meci`='$b' AND `Tid`='$a'");
					$row_loser = mysqli_fetch_assoc($query_loser);    
					$loser = $row_loser["Loser"];				
					$points = "";			
					$verificare = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$loser'");     
					if(mysqli_num_rows($verificare) == 1){//daca jucatorul deja exista in clasament
						$rowV = mysqli_fetch_assoc($verificare);
						$points = $rowV["Points"];
						if($b<5){
							$points = $points + 5;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+5' WHERE `Username`='$loser'");
						}elseif($b>4 && $b<7){
							$points = $points + 90;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+90' WHERE `Username`='$loser'");
						}elseif($b==7){
							$points = $points + 150;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+150' WHERE `Username`='$loser'");
						}
					}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
						$result3 = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$loser'");
						$row3 = mysqli_fetch_assoc($result3);    
						$pid = $row3["id"];
						$pcountry = $row3["Country"];
						$pcharacter = $row3["Character"];					
						if($b<5){
							$points = 5;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+5','$pcharacter')"); 
						}elseif($b>4 && $b<7){
							$points = 90;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+90','$pcharacter')"); 
						}elseif($b==7){
							$points = 150;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+150','$pcharacter')"); 
						}
					}
				}
				//introducere/actualizare winner
				$query_winner = mysqli_query($server, "SELECT `Winner` FROM rezultate WHERE `Meci`='7' AND `Tid`='$a'");
				$row_winner = mysqli_fetch_assoc($query_winner);    
				$winner = $row_winner["Winner"];
				
				$verificare1 = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$winner'");     
				if(mysqli_num_rows($verificare1) == 1){//daca jucatorul deja exista in clasament
					$rowV1 = mysqli_fetch_assoc($verificare1);
					$pointsW = $rowV1["Points"];
					$pointsW = $pointsW + 250;
					mysqli_query($server, "UPDATE rankings SET `Points`='$pointsW', `C`='+250' WHERE `Username`='$winner'");
				}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
					$query_detaliijucator = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$winner'");
					$row_detaliijucator = mysqli_fetch_assoc($query_detaliijucator);    
					$pidW = $row_detaliijucator["id"];
					$pcountryW = $row_detaliijucator["Country"];
					$pcharacterW = $row_detaliijucator["Character"];						
					$pointsW = 250;
					mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$winner','$pidW','$pcountryW','$pointsW','+250','$pcharacterW')"); 
				}						
			}
			//DMT 500
			if($type8 == "DMT 500"){
				for($b=1;$b<=7;$b++){
					$query_loser = mysqli_query($server, "SELECT `Loser` FROM rezultate WHERE `Meci`='$b' AND `Tid`='$a'");
					$row_loser = mysqli_fetch_assoc($query_loser);    
					$loser = $row_loser["Loser"];				
					$points = "";			
					$verificare = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$loser'");     
					if(mysqli_num_rows($verificare) == 1){//daca jucatorul deja exista in clasament
						$rowV = mysqli_fetch_assoc($verificare);
						$points = $rowV["Points"];
						if($b<5){
							$points = $points + 5;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+5' WHERE `Username`='$loser'");
						}elseif($b>4 && $b<7){
							$points = $points + 180;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+180' WHERE `Username`='$loser'");
						}elseif($b==7){
							$points = $points + 300;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+300' WHERE `Username`='$loser'");
						}
					}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
						$result3 = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$loser'");
						$row3 = mysqli_fetch_assoc($result3);    
						$pid = $row3["id"];
						$pcountry = $row3["Country"];
						$pcharacter = $row3["Character"];					
						if($b<5){
							$points = 5;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+5','$pcharacter')"); 
						}elseif($b>4 && $b<7){
							$points = 180;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+180','$pcharacter')"); 
						}elseif($b==7){
							$points = 300;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+300','$pcharacter')"); 
						}
					}
				}
				//introducere/actualizare winner
				$query_winner = mysqli_query($server, "SELECT `Winner` FROM rezultate WHERE `Meci`='7' AND `Tid`='$a'");
				$row_winner = mysqli_fetch_assoc($query_winner);    
				$winner = $row_winner["Winner"];
				
				$verificare1 = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$winner'");     
				if(mysqli_num_rows($verificare1) == 1){//daca jucatorul deja exista in clasament
					$rowV1 = mysqli_fetch_assoc($verificare1);
					$pointsW = $rowV1["Points"];
					$pointsW = $pointsW + 500;
					mysqli_query($server, "UPDATE rankings SET `Points`='$pointsW', `C`='+500' WHERE `Username`='$winner'");
				}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
					$query_detaliijucator = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$winner'");
					$row_detaliijucator = mysqli_fetch_assoc($query_detaliijucator);    
					$pidW = $row_detaliijucator["id"];
					$pcountryW = $row_detaliijucator["Country"];
					$pcharacterW = $row_detaliijucator["Character"];						
					$pointsW = 500;
					mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$winner','$pidW','$pcountryW','$pointsW','+500','$pcharacterW')"); 
				}						
			}
			//DMT 1000
			if($type8 == "DMT 1000"){
				for($b=1;$b<=7;$b++){
					$query_loser = mysqli_query($server, "SELECT `Loser` FROM rezultate WHERE `Meci`='$b' AND `Tid`='$a'");
					$row_loser = mysqli_fetch_assoc($query_loser);    
					$loser = $row_loser["Loser"];				
					$points = "";			
					$verificare = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$loser'");     
					if(mysqli_num_rows($verificare) == 1){//daca jucatorul deja exista in clasament
						$rowV = mysqli_fetch_assoc($verificare);
						$points = $rowV["Points"];
						if($b<5){
							$points = $points + 10;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+10' WHERE `Username`='$loser'");
						}elseif($b>4 && $b<7){
							$points = $points + 360;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+360' WHERE `Username`='$loser'");
						}elseif($b==7){
							$points = $points + 600;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+600' WHERE `Username`='$loser'");
						}
					}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
						$result3 = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$loser'");
						$row3 = mysqli_fetch_assoc($result3);    
						$pid = $row3["id"];
						$pcountry = $row3["Country"];
						$pcharacter = $row3["Character"];					
						if($b<5){
							$points = 10;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+10','$pcharacter')"); 
						}elseif($b>4 && $b<7){
							$points = 360;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+360','$pcharacter')"); 
						}elseif($b==7){
							$points = 600;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+600','$pcharacter')"); 
						}
					}
				}
				//introducere/actualizare winner
				$query_winner = mysqli_query($server, "SELECT `Winner` FROM rezultate WHERE `Meci`='7' AND `Tid`='$a'");
				$row_winner = mysqli_fetch_assoc($query_winner);    
				$winner = $row_winner["Winner"];
				
				$verificare1 = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$winner'");     
				if(mysqli_num_rows($verificare1) == 1){//daca jucatorul deja exista in clasament
					$rowV1 = mysqli_fetch_assoc($verificare1);
					$pointsW = $rowV1["Points"];
					$pointsW = $pointsW + 1000;
					mysqli_query($server, "UPDATE rankings SET `Points`='$pointsW', `C`='+1000' WHERE `Username`='$winner'");
				}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
					$query_detaliijucator = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$winner'");
					$row_detaliijucator = mysqli_fetch_assoc($query_detaliijucator);    
					$pidW = $row_detaliijucator["id"];
					$pcountryW = $row_detaliijucator["Country"];
					$pcharacterW = $row_detaliijucator["Character"];						
					$pointsW = 1000;
					mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$winner','$pidW','$pcountryW','$pointsW','+1000','$pcharacterW')"); 
				}						
			}
			//Grand Slam
			if($type8 == "Grand Slam"){
				for($b=1;$b<=7;$b++){
					$query_loser = mysqli_query($server, "SELECT `Loser` FROM rezultate WHERE `Meci`='$b' AND `Tid`='$a'");
					$row_loser = mysqli_fetch_assoc($query_loser);    
					$loser = $row_loser["Loser"];				
					$points = "";			
					$verificare = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$loser'");     
					if(mysqli_num_rows($verificare) == 1){//daca jucatorul deja exista in clasament
						$rowV = mysqli_fetch_assoc($verificare);
						$points = $rowV["Points"];
						if($b<5){
							$points = $points + 10;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+10' WHERE `Username`='$loser'");
						}elseif($b>4 && $b<7){
							$points = $points + 720;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+720' WHERE `Username`='$loser'");
						}elseif($b==7){
							$points = $points + 1200;
							mysqli_query($server, "UPDATE rankings SET `Points`='$points', `C`='+1200' WHERE `Username`='$loser'");
						}
					}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
						$result3 = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$loser'");
						$row3 = mysqli_fetch_assoc($result3);    
						$pid = $row3["id"];
						$pcountry = $row3["Country"];
						$pcharacter = $row3["Character"];					
						if($b<5){
							$points = 10;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+10','$pcharacter')"); 
						}elseif($b>4 && $b<7){
							$points = 720;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+720','$pcharacter')"); 
						}elseif($b==7){
							$points = 1200;
							mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$loser','$pid','$pcountry','$points','+1200','$pcharacter')"); 
						}
					}
				}
				//introducere/actualizare winner
				$query_winner = mysqli_query($server, "SELECT `Winner` FROM rezultate WHERE `Meci`='7' AND `Tid`='$a'");
				$row_winner = mysqli_fetch_assoc($query_winner);    
				$winner = $row_winner["Winner"];
				
				$verificare1 = mysqli_query($server, "SELECT `Username`,`Points` FROM rankings WHERE `Username`='$winner'");     
				if(mysqli_num_rows($verificare1) == 1){//daca jucatorul deja exista in clasament
					$rowV1 = mysqli_fetch_assoc($verificare1);
					$pointsW = $rowV1["Points"];
					$pointsW = $pointsW + 2000;
					mysqli_query($server, "UPDATE rankings SET `Points`='$pointsW', `C`='+2000' WHERE `Username`='$winner'");
				}elseif(mysqli_num_rows($verificare) == 0){//daca nu exista in clasament
					$query_detaliijucator = mysqli_query($server, "SELECT `id`,`Country`,`Character` FROM utilizatori WHERE `Username`='$winner'");
					$row_detaliijucator = mysqli_fetch_assoc($query_detaliijucator);    
					$pidW = $row_detaliijucator["id"];
					$pcountryW = $row_detaliijucator["Country"];
					$pcharacterW = $row_detaliijucator["Character"];						
					$pointsW = 2000;
					mysqli_query($server, "INSERT INTO rankings (`Username`,`Pid`,`Pcountry`,`Points`,`C`,`Character`) VALUES ('$winner','$pidW','$pcountryW','$pointsW','+2000','$pcharacterW')"); 
				}						
			}
		}
				
		//stabilire rank jucatori dupa calcularea punctelor
		$result6 = mysqli_query($server, "SELECT `Username` FROM rankings ORDER BY `Points` DESC, `Username` ASC");
		$count = 1;		
		while($row6 = mysqli_fetch_assoc($result6)) {
			$username6 = $row6['Username'];			
			mysqli_query($server, "UPDATE rankings SET `Rank`='$count' WHERE `Username`='$username6'");
			$count++;
		}
	}
	
	
	
	
?>

<html>
<head>
	<meta charset="utf-8">
	<link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAw4LsAKOK+AAAAAAAZ9N8AFO7PABr26gAW+eoAEfPaACH19QCH//4AGfXlABLszQAk9e0AHevYAB/28wAh9vMAH/X2AB726wBZ5ssANuPNACH24wA33K8AGfb0ABjv1gAX9fcAGu/WABP57AAc8eEAHvfpABP47wBL+NwAHPbsAA/w1AAY7tEAHvThADPdrQAY7dQAY+TJACnisAAy58sAE/ryACftwwAd89wAGvTqAB/z3AAk47YAY//pAGHu3wAe9/IAK8ysACT08gAh9/IAEerVAC/fwQAh9OoAGO3dABz4+AAe9+IAGfjwABr25QAU8uAAD+jTACffqQAN79AAGvfzABX76AAh1qoAI+m/ABr29gA25s8AJem/ABPx2wAW79AAHe7CABT48QAY8tAAJuPIABb48QBE488AIfLYABfx0wAo8eMAJOXLABjjsAAe+PEAH/HTACPt1gAV79EAO+nYADHy2AAk+eYAKO/hAIf+9QAe+uwAG+7UAB774QAb9eoAGvf1ABL58AAa+OIAHO3HABDs2wAS3aoAHuvVACf46gAm5rEAGPjzABT78wAY990ALerPAErrywAe9N0AJda1AHDx4gAe8+AATuTGACLkrwAe8NgAIvfdABP35gAV9+YAHt+tACHw0AAi6sgAHOrAAH3//QAd9+YAM9y1ACDjuwAg6cMAHPDZACXhsAAX6skAJOa7AC3kuAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgICAgJ7QjExQkICAgICAgICAntzf3lTZoMVMUICAgICAnt9fUI+aXQmIzF9QgICAntJSUl9hi2FRoBwfUlCAgJuQ0lJfX0EVyFIXgkAEgIZASl8hF99bAMUOTd9LjVCe3uBZAtffWM7NmArfR4nJXtLelU/X31dVA9hFjx9TC97UE92X319OkAQRBh3fVlxGRksbyp9H01qDzA4Ckl9JRkZG2V9fQwzDggySmhJfTECWFFBfXUGHWsoYhpbSX0CAoKCB1wgOxwRBXh+NElOAgICgm19RQ1aInJnF05OAgICAgKCfXtWPUckUhNOAgICAgICAgJ9Tk5OTk4CAgICAvgfAADgBwAAwAMAAIABAACAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgAEAAIABAADAAwAA4AcAAPgfAAA=" rel="icon" type="image/x-icon">
	<link href="Mycss/RegLog.css" rel="stylesheet">
	<link href="Mycss/stylep.css" rel="stylesheet">
	<title>Rankings</title>
	<style>
	.demo {
		border:1px solid #C0C0C0;
		border-collapse:collapse;
		padding:5px;
		margin: 0 auto;
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 14px;
		text-align:center;
	}
	.demo th {
		border:1px solid #4c4c4c;
		padding:5px;
		background:#F0F0F0;
		color: white;
		background: -webkit-linear-gradient(top,#939393,#4b4b4b);
		background: -o-linear-gradient(top,#9f3210,#471708);
		background: -moz-linear-gradient(top,#9f3210,#471708);
	}
	.demo td {
		border:1px solid #a8a8a8;
		padding:5px;
	}
</style>
</head>
<body contenteditable="false" style="margin-left: auto;margin-right: auto;margin-top: 0;margin-bottom: 0;background-image: url(Myimages/bk.jpg)!important;background-repeat: no-repeat;background-position: center center;background-attachment: fixed;">
	<?php include 'topbar.php';?>
	<div style="margin:0 auto;width:1101px;">
		<div>
			<?php include 'meniu.php';?>
		</div>
		<div><img alt="" height="235" src="Myimages/logodmt.jpg" style="box-shadow: 0 6px 20px -4px black;" width="1101"></div>
		<div style="background:rgba(43, 125, 166, 0.18);padding-top: 42px;padding-bottom: 70px;min-height: 1000px;text-align: center;">
			<?php
		if((isset($_SESSION["username"])) && ($_SESSION["username"] == "Cronos") && (mysqli_num_rows($query_tablou_existent) == 0)){
			echo "<form action='' method='post'>
					<input id='actualizare' name='actualizare' type='submit' value='Update'>
					</form>";
		}
		?>
			<img src="Myimages/atprankings.png">			
			<div style="
    margin-top: 25px;
    margin-bottom: 15px;
    font-size: 15px;
    font-weight: bold;
    font-family: Verdana, Arial, Helvetica, sans-serif;
            ">Last update: <span style="
    font-weight: normal;
"></span></div><table class="demo">
	
	<thead>
	<tr>
		<th>Rank</th>
		<th style="width: 250px;text-align: left;">Username</th>
		<th>Move</th>
		<th style="
    width: 90px;
">Points</th>
		<th style="
    width: 80px;
">C</th>
		<th>Character</th>
	</tr>
	</thead>
	<tbody>
	<?php
		$afisare = mysqli_query($server, "SELECT * FROM rankings ORDER BY `Rank` ASC");
		
		$counter = 1;
	
		while($rowA = mysqli_fetch_assoc($afisare)) {
			$usernameA = $rowA['Username'];
			$pidA = $rowA['Pid'];
			$pcountryA = $rowA['Pcountry'];
			$moveA = $rowA['Move'];
			$pointsA = $rowA['Points'];
			$cA = $rowA['C'];
			$characterA = $rowA['Character'];
			if($counter % 2 != 0){				
				echo "<tr style='background: #ECF0F1;'>
				<td>$counter</td>
				<td style='text-align: left;'><a href='profile.php?pid=$pidA' style='color: #2e6291;'><img alt='' src='Myimages/Flags/Small/Flag_of_$pcountryA.jpg' style='margin-right: 5px;height: 13px;'>$usernameA</a></td>
				<td>$moveA</td>
				<td style='font-weight: bold;'>$pointsA</td>
				<td>$cA</td>
				<td>$characterA</td>
				</tr>";
			}else{
				echo "<tr style='background: #D0D3D4;'>
				<td>$counter</td>
				<td style='text-align: left;'><a href='profile.php?pid=$pidA' style='color: #2e6291;'><img alt='' src='Myimages/Flags/Small/Flag_of_$pcountryA.jpg' style='margin-right: 5px;height: 13px;'>$usernameA</a></td>
				<td>$moveA</td>
				<td style='font-weight: bold;'>$pointsA</td>
				<td>$cA</td>
				<td>$characterA</td>
				</tr>";
			}
			$counter++;
			
		}
	?>
	</tbody><tbody>
</tbody></table>
		</div>
	</div>
	<div style="margin:0 auto;width:100%;text-align:center;background:linear-gradient(to bottom,#252525 0,#252525 55%,#1E2223 55%,#1E2223 100%)"><img alt="" src="Myimages/bottom.jpg" style="width:1101"></div>
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
</body>
</html>
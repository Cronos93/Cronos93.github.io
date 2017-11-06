<?php
	session_start();
	
	include 'dbconnect.php';

    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    if(isset($_SESSION["username"])){
        $pid = $_SESSION["id"];
        $username = $_SESSION["username"];
		$country = $_SESSION["country"];
    }
	$tid = $_GET['tid'];
    $result = mysqli_query($server, "SELECT * FROM turnee WHERE id='$tid'");
    $row = mysqli_fetch_assoc($result);    
	$competitie = $row["Tournament"];
        
        //data incepere turneu
        $data_incepere = $row["Begin date"];         
        $month_number_incepere = date("m", strtotime($data_incepere));      
        if($month_number_incepere == '01'){
            $luna_incepere = "January";
        }
        if($month_number_incepere == '02'){
            $luna_incepere = "February";
        }
        if($month_number_incepere == '03'){
            $luna_incepere = "March";
        }
        if($month_number_incepere == '04'){
            $luna_incepere = "April";
        }
        if($month_number_incepere == '05'){
            $luna_incepere = "May";
        }
        if($month_number_incepere == '06'){
            $luna_incepere = "June";
        }
        if($month_number_incepere == '07'){
            $luna_incepere = "July";
        }
        if($month_number_incepere == '08'){
            $luna_incepere = "August";
        }
        if($month_number_incepere == '09'){
            $luna_incepere = "September";
        }
        if($month_number_incepere == '10'){
            $luna_incepere = "October";
        }
        if($month_number_incepere == '11'){
            $luna_incepere = "November";
        }
        if($month_number_incepere == '12'){
            $luna_incepere = "December";
        }
        $data_incepere1 = date("d m Y", strtotime($data_incepere));
        $data_incepere2 = (string)$data_incepere1;
        $data_incepere3 = substr_replace($data_incepere2,$luna_incepere,3,2);
        $data_incepere3 = ltrim($data_incepere3, '0');
        
        //data incheiere turneu
        $data_incheiere = $row["End date"];       
        $month_number_incheiere = date("m", strtotime($data_incheiere));
        if($month_number_incheiere == '01'){
            $luna_incheiere = "January";
        }
        if($month_number_incheiere == '02'){
            $luna_incheiere = "February";
        }
        if($month_number_incheiere == '03'){
            $luna_incheiere = "March";
        }
        if($month_number_incheiere == '04'){
            $luna_incheiere = "April";
        }
        if($month_number_incheiere == '05'){
            $luna_incheiere = "May";
        }
        if($month_number_incheiere == '06'){
            $luna_incheiere = "June";
        }
        if($month_number_incheiere == '07'){
            $luna_incheiere = "July";
        }
        if($month_number_incheiere == '08'){
            $luna_incheiere = "August";
        }
        if($month_number_incheiere == '09'){
            $luna_incheiere = "September";
        }
        if($month_number_incheiere == '10'){
            $luna_incheiere = "October";
        }
        if($month_number_incheiere == '11'){
            $luna_incheiere = "November";
        }
        if($month_number_incheiere == '12'){
            $luna_incheiere = "December";
        }
            
        $data_incheiere1 = date("d m Y", strtotime($data_incheiere));
        $data_incheiere2 = (string)$data_incheiere1;
        $data_incheiere3 = substr_replace($data_incheiere2,$luna_incheiere,3,2);
        $data_incheiere3 = ltrim($data_incheiere3, '0');
    
        //data incepere inscrieri
        $data_incepere_inscriere = date( 'Y-m-d', strtotime( $data_incepere . ' -12 day' ) );
        $month_number_incepere_inscriere = date("m", strtotime($data_incepere_inscriere));      
        if($month_number_incepere_inscriere == '01'){
            $luna_incepere_inscriere = "January";
        }
        if($month_number_incepere_inscriere == '02'){
            $luna_incepere_inscriere = "February";
        }
        if($month_number_incepere_inscriere == '03'){
            $luna_incepere_inscriere = "March";
        }
        if($month_number_incepere_inscriere == '04'){
            $luna_incepere_inscriere = "April";
        }
        if($month_number_incepere_inscriere == '05'){
            $luna_incepere_inscriere = "May";
        }
        if($month_number_incepere_inscriere == '06'){
            $luna_incepere_inscriere = "June";
        }
        if($month_number_incepere_inscriere == '07'){
            $luna_incepere_inscriere = "July";
        }
        if($month_number_incepere_inscriere == '08'){
            $luna_incepere_inscriere = "August";
        }
        if($month_number_incepere_inscriere == '09'){
            $luna_incepere_inscriere = "September";
        }
        if($month_number_incepere_inscriere == '10'){
            $luna_incepere_inscriere = "October";
        }
        if($month_number_incepere_inscriere == '11'){
            $luna_incepere_inscriere = "November";
        }
        if($month_number_incepere_inscriere == '12'){
            $luna_incepere_inscriere = "December";
        }
        $data_incepere_inscriere1 = date("d m Y", strtotime($data_incepere_inscriere));
        $data_incepere_inscriere2 = (string)$data_incepere_inscriere1;
        $data_incepere_inscriere3 = substr_replace($data_incepere_inscriere2,$luna_incepere_inscriere,3,2);
        $data_incepere_inscriere3 = ltrim($data_incepere_inscriere3, '0');
        
        //data incheiere inscrieri
        $data_incheiere_inscriere = date( 'Y-m-d', strtotime( $data_incepere . ' -2 day' ) );
        $month_number_incheiere_inscriere = date("m", strtotime($data_incheiere_inscriere));        
        if($month_number_incheiere_inscriere == '01'){
            $luna_incheiere_inscriere = "January";
        }
        if($month_number_incheiere_inscriere == '02'){
            $luna_incheiere_inscriere = "February";
        }
        if($month_number_incheiere_inscriere == '03'){
            $luna_incheiere_inscriere = "March";
        }
        if($month_number_incheiere_inscriere == '04'){
            $luna_incheiere_inscriere = "April";
        }
        if($month_number_incheiere_inscriere == '05'){
            $luna_incheiere_inscriere = "May";
        }
        if($month_number_incheiere_inscriere == '06'){
            $luna_incheiere_inscriere = "June";
        }
        if($month_number_incheiere_inscriere == '07'){
            $luna_incheiere_inscriere = "July";
        }
        if($month_number_incheiere_inscriere == '08'){
            $luna_incheiere_inscriere = "August";
        }
        if($month_number_incheiere_inscriere == '09'){
            $luna_incheiere_inscriere = "September";
        }
        if($month_number_incheiere_inscriere == '10'){
            $luna_incheiere_inscriere = "October";
        }
        if($month_number_incheiere_inscriere == '11'){
            $luna_incheiere_inscriere = "November";
        }
        if($month_number_incheiere_inscriere == '12'){
            $luna_incheiere_inscriere = "December";
        }
        $data_incheiere_inscriere1 = date("d m Y", strtotime($data_incheiere_inscriere));
        $data_incheiere_inscriere2 = (string)$data_incheiere_inscriere1;
        $data_incheiere_inscriere3 = substr_replace($data_incheiere_inscriere2,$luna_incheiere_inscriere,3,2);
        $data_incheiere_inscriere3 = ltrim($data_incheiere_inscriere3, '0');
    
	$location = $row["Location"];
	$city = strtok($location, ',');
    $surface = $row["Surface"];
    $type = $row["Type"];    
    $draw = $row["Draw"]; 
	
		$sets = "";
		if ($type != "Grand Slam"){
			$sets = "Best of 3";
		}else{
			$sets = "Best of 5";
		}
	
		$points1 = array();
		$points2 = array();		
		if($type == "DMT 250"){
			$points1 = array("Winner:", "Runner-up:", "Semi Final:", "Quarter Final:", "R16:", "R32:");
			$points2 = array("250 points", "150 points", "90 points", "45 points", "20 points", "5 points");
		}elseif($type == "DMT 500"){
			$points1 = array("Winner:", "Runner-up:", "Semi Final:", "Quarter Final:", "R16:", "R32:");
			$points2 = array("500 points", "300 points", "180 points", "90 points", "45 points", "5 points");
		}elseif($type == "DMT 1000"){
			$points1 = array("Winner:", "Runner-up:", "Semi Final:", "Quarter Final:", "R16:", "R32:", "R64:");
			$points2 = array("1000 points", "600 points", "360 points", "180 points", "90 points", "45 points", "10 points");
		}elseif($type == "Grand Slam"){
			$points1 = array("Winner:", "Runner-up:", "Semi Final:", "Quarter Final:", "R16:", "R32:", "R64:");
			$points2 = array("2000 points", "1200 points", "720 points", "360 points", "180 points", "90 points", "10 points");
		}elseif($type == "DMT FUN"){
			$points1 = array("Winner:", "Runner-up:", "Semi Final:", "Quarter Final:", "R16:", "R32:");
			$points2 = array("0 points", "0 points", "0 points", "0 points", "0 points", "0 points");
		}
		

	
    $dtz = new DateTimeZone("Europe/Bucharest"); //Your timezone
    $now = new DateTime(date("Y-m-d"), $dtz);
    $data_incepere4 = new DateTime($row["Begin date"]);
    $diff = $data_incepere4->diff($now)->format("%a");  //find difference
    $days = intval($diff);   //rounding days
    
	$registerErr = "";
	
    if(isset($_POST['inscrie-te'])) {
        
		if(!isset($_SESSION["username"])){
			$registerErr = "*Please login to register!";
		}elseif(isset($_SESSION["username"])){
			$pidR = $_POST['pid'];    
			$usernameR = $_POST['username'];
			$countryR = $_POST['country'];
			$tidR = $_POST['tid'];
        
			mysqli_query($server, "INSERT INTO inscrisi (`Pid`, `Username`, `Country`, `Tid`) VALUES ('$pidR', '$usernameR', '$countryR', '$tidR')");     
			mysqli_query($server, "UPDATE turnee SET `Spots` = `Spots`-1 WHERE `id`='$tidR'");     
		
		}
    }
	
	if(isset($_POST['retrage-te'])) {
        
		$pidR = $_POST['pid'];    
		$tidR = $_POST['tid'];
        
		mysqli_query($server, "DELETE FROM inscrisi WHERE `Pid`='$pidR' AND `Tid`='$tidR'");     
		mysqli_query($server, "UPDATE turnee SET `Spots` = `Spots`+1 WHERE `id`='$tidR'");     

    }
	
	//colectare jucatori pentru generare tablou
	if(isset($_POST['generare'])) {
		
		$array_inscrisi = array();	
		
		$result_inscrisi = mysqli_query($server, "SELECT `Username` from inscrisi WHERE `Tid`='$tid' ORDER BY Rank");     

		while($row = mysqli_fetch_assoc($result_inscrisi)) {
			$array_inscrisi[] = $row['Username'];
		}
	
		$nr_inscrisi = count($array_inscrisi);
		
		//generare tablou 64, DE FACUT!!!
		if($nr_inscrisi>32 && $nr_inscrisi<65){
			
			mysqli_query($server, "UPDATE `turnee` SET `Draw`='64'");     
			
		}
		
		//generare tablou 32
		if($nr_inscrisi>16 && $nr_inscrisi<33){
			
			mysqli_query($server, "UPDATE `turnee` SET `Draw`='32' WHERE `id`='$tid'");     
			
			$fav12 = array_slice($array_inscrisi, 0, 2);
			$fav34 = array_slice($array_inscrisi, 2, 2);
			$fav5678 = array_slice($array_inscrisi, 4, 4);
			$nefav = array_slice($array_inscrisi, 8);
		
			$fav12[0] = $fav12[0]." (1)";
			$fav12[1] = $fav12[1]." (2)";
		
			$fav34[0] = $fav34[0]." (3)";
			$fav34[1] = $fav34[1]." (4)";
		
			$fav5678[0] = $fav5678[0]." (5)";
			$fav5678[1] = $fav5678[1]." (6)";	
			$fav5678[2] = $fav5678[2]." (7)";
			$fav5678[3] = $fav5678[3]." (8)";
		
			shuffle($fav34);
			shuffle($fav5678);
			shuffle($nefav);
		
			$fav12Q = array();
			$fav34Q = array();
			$fav5678Q = array();
			$array_inscrisi_id_fav12 = array();
			$array_inscrisi_country_fav12 = array();	
			$array_inscrisi_id_fav34 = array();
			$array_inscrisi_country_fav34 = array();	
			$array_inscrisi_id_fav5678 = array();
			$array_inscrisi_country_fav5678 = array();
			$array_inscrisi_id_nefav = array();
			$array_inscrisi_country_nefav = array();
		
			for ($a=0;$a<2;$a++){
				$fav12Q[$a] = strtok($fav12[$a], " ");
				$result_inscrisi_id_country_fav12 = mysqli_query($server, "SELECT `Pid`, `Country` from inscrisi WHERE `Tid`='$tid' AND `Username`='$fav12Q[$a]'");     
				$row1 = mysqli_fetch_assoc($result_inscrisi_id_country_fav12);
				$array_inscrisi_id_fav12[$a] = $row1['Pid'];
				$array_inscrisi_country_fav12[$a] = $row1['Country'];
			}
			for ($b=0;$b<2;$b++){
				$fav34Q[$b] = strtok($fav34[$b], " ");
				$result_inscrisi_id_country_fav34 = mysqli_query($server, "SELECT `Pid`, `Country` from inscrisi WHERE `Tid`='$tid' AND `Username`='$fav34Q[$b]'");     
				$row2 = mysqli_fetch_assoc($result_inscrisi_id_country_fav34);
				$array_inscrisi_id_fav34[] = $row2['Pid'];
				$array_inscrisi_country_fav34[] = $row2['Country'];
			}
			for ($c=0;$c<4;$c++){
				$fav5678Q[$c] = strtok($fav5678[$c], " ");
				$result_inscrisi_id_country_fav5678 = mysqli_query($server, "SELECT `Pid`, `Country` from inscrisi WHERE `Tid`='$tid' AND `Username`='$fav5678Q[$c]'");     
				$row3 = mysqli_fetch_assoc($result_inscrisi_id_country_fav5678);
				$array_inscrisi_id_fav5678[] = $row3['Pid'];
				$array_inscrisi_country_fav5678[] = $row3['Country'];
			}
			for ($d=0;$d<24;$d++){
				$result_inscrisi_id_country_nefav = mysqli_query($server, "SELECT `Pid`, `Country` from inscrisi WHERE `Tid`='$tid' AND `Username`='$nefav[$d]'");     
				$row4 = mysqli_fetch_assoc($result_inscrisi_id_country_nefav);
				$array_inscrisi_id_nefav[] = $row4['Pid'];
				$array_inscrisi_country_nefav[] = $row4['Country'];
			}
			
			if(count($nefav) == 24){//facut si merge
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '1', '$fav12[0]', '$nefav[0]', '$fav12Q[0]', '$nefav[0]', '$array_inscrisi_id_fav12[0]', '$array_inscrisi_id_nefav[0]', '$array_inscrisi_country_fav12[0]', '$array_inscrisi_country_nefav[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '2', '$nefav[1]', '$nefav[2]', '$nefav[1]', '$nefav[2]', '$array_inscrisi_id_nefav[1]', '$array_inscrisi_id_nefav[2]', '$array_inscrisi_country_nefav[1]', '$array_inscrisi_country_nefav[2]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '3', '$nefav[3]', '$nefav[4]', '$nefav[3]', '$nefav[4]', '$array_inscrisi_id_nefav[3]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_country_nefav[3]', '$array_inscrisi_country_nefav[4]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '4', '$nefav[5]', '$fav5678[0]', '$nefav[5]', '$fav5678Q[0]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_id_fav5678[0]', '$array_inscrisi_country_nefav[5]', '$array_inscrisi_country_fav5678[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '5', '$fav5678[1]', '$nefav[6]', '$fav5678Q[1]', '$nefav[6]', '$array_inscrisi_id_fav5678[1]', '$array_inscrisi_id_nefav[6]', '$array_inscrisi_country_fav5678[1]', '$array_inscrisi_country_nefav[6]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '6', '$nefav[7]', '$nefav[8]', '$nefav[7]', '$nefav[8]', '$array_inscrisi_id_nefav[7]', '$array_inscrisi_id_nefav[8]', '$array_inscrisi_country_nefav[7]', '$array_inscrisi_country_nefav[8]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '7', '$nefav[9]', '$nefav[10]', '$nefav[9]', '$nefav[10]', '$array_inscrisi_id_nefav[9]', '$array_inscrisi_id_nefav[10]', '$array_inscrisi_country_nefav[9]', '$array_inscrisi_country_nefav[10]', '32')"); 
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '8', '$nefav[11]', '$fav34[0]', '$nefav[11]', '$fav34Q[0]', '$array_inscrisi_id_nefav[11]', '$array_inscrisi_id_fav34[0]', '$array_inscrisi_country_nefav[11]', '$array_inscrisi_country_fav34[0]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '9', '$fav34[1]', '$nefav[12]', '$fav34Q[1]', '$nefav[12]', '$array_inscrisi_id_fav34[1]', '$array_inscrisi_id_nefav[12]', '$array_inscrisi_country_fav34[1]', '$array_inscrisi_country_nefav[12]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '10', '$nefav[13]', '$nefav[14]', '$nefav[13]', '$nefav[14]', '$array_inscrisi_id_nefav[13]', '$array_inscrisi_id_nefav[14]', '$array_inscrisi_country_nefav[13]', '$array_inscrisi_country_nefav[14]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '11', '$nefav[15]', '$nefav[16]', '$nefav[15]', '$nefav[16]', '$array_inscrisi_id_nefav[15]', '$array_inscrisi_id_nefav[16]', '$array_inscrisi_country_nefav[15]', '$array_inscrisi_country_nefav[16]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '12', '$nefav[17]', '$fav5678[2]', '$nefav[17]', '$fav5678Q[2]', '$array_inscrisi_id_nefav[17]', '$array_inscrisi_id_fav5678[2]', '$array_inscrisi_country_nefav[17]', '$array_inscrisi_country_fav5678[2]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '13', '$fav5678[3]', '$nefav[18]', '$fav5678Q[3]', '$nefav[18]',  '$array_inscrisi_id_fav5678[3]', '$array_inscrisi_id_nefav[18]', '$array_inscrisi_country_fav5678[3]', '$array_inscrisi_country_nefav[18]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '14', '$nefav[19]', '$nefav[20]', '$nefav[19]', '$nefav[20]', '$array_inscrisi_id_nefav[19]', '$array_inscrisi_id_nefav[20]', '$array_inscrisi_country_nefav[19]', '$array_inscrisi_country_nefav[20]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '15', '$nefav[21]', '$nefav[22]', '$nefav[21]', '$nefav[22]', '$array_inscrisi_id_nefav[21]', '$array_inscrisi_id_nefav[22]', '$array_inscrisi_country_nefav[21]', '$array_inscrisi_country_nefav[22]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '16', '$nefav[23]', '$fav12[1]', '$nefav[23]', '$fav12Q[1]', '$array_inscrisi_id_nefav[23]', '$array_inscrisi_id_fav12[1]', '$array_inscrisi_country_nefav[23]', '$array_inscrisi_country_fav12[1]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '17', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '18', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '19', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '20', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '21', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '22', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '23', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '24', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '25', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '26', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '27', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '28', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '29', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '30', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '31', '32')");
				mysqli_query($server, "DELETE FROM `inscrisi` WHERE `Tid`='$tid'");				
			}elseif(count($nefav) == 23){//facut si merge
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '1', '$fav12[0]', 'Bye', '$fav12Q[0]', 'Bye', '$array_inscrisi_id_fav12[0]', '', '$array_inscrisi_country_fav12[0]', '', '32', '$fav12Q[0]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '2', '$nefav[0]', '$nefav[1]', '$nefav[0]', '$nefav[1]', '$array_inscrisi_id_nefav[0]', '$array_inscrisi_id_nefav[1]', '$array_inscrisi_country_nefav[0]', '$array_inscrisi_country_nefav[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '3', '$nefav[2]', '$nefav[3]', '$nefav[2]', '$nefav[3]', '$array_inscrisi_id_nefav[2]', '$array_inscrisi_id_nefav[3]', '$array_inscrisi_country_nefav[2]', '$array_inscrisi_country_nefav[3]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '4', '$nefav[4]', '$fav5678[0]', '$nefav[4]', '$fav5678Q[0]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_id_fav5678[0]', '$array_inscrisi_country_nefav[4]', '$array_inscrisi_country_fav5678[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '5', '$fav5678[1]', '$nefav[5]', '$fav5678Q[1]', '$nefav[5]', '$array_inscrisi_id_fav5678[1]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_country_fav5678[1]', '$array_inscrisi_country_nefav[5]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '6', '$nefav[6]', '$nefav[7]', '$nefav[6]', '$nefav[7]', '$array_inscrisi_id_nefav[6]', '$array_inscrisi_id_nefav[7]', '$array_inscrisi_country_nefav[6]', '$array_inscrisi_country_nefav[7]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '7', '$nefav[8]', '$nefav[9]', '$nefav[8]', '$nefav[9]', '$array_inscrisi_id_nefav[8]', '$array_inscrisi_id_nefav[9]', '$array_inscrisi_country_nefav[8]', '$array_inscrisi_country_nefav[9]', '32')"); 
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '8', '$nefav[10]', '$fav34[0]', '$nefav[10]', '$fav34Q[0]', '$array_inscrisi_id_nefav[10]', '$array_inscrisi_id_fav34[0]', '$array_inscrisi_country_nefav[10]', '$array_inscrisi_country_fav34[0]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '9', '$fav34[1]', '$nefav[11]', '$fav34Q[1]', '$nefav[11]', '$array_inscrisi_id_fav34[1]', '$array_inscrisi_id_nefav[11]', '$array_inscrisi_country_fav34[1]', '$array_inscrisi_country_nefav[11]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '10', '$nefav[12]', '$nefav[13]', '$nefav[12]', '$nefav[13]', '$array_inscrisi_id_nefav[12]', '$array_inscrisi_id_nefav[13]', '$array_inscrisi_country_nefav[12]', '$array_inscrisi_country_nefav[13]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '11', '$nefav[14]', '$nefav[15]', '$nefav[14]', '$nefav[15]', '$array_inscrisi_id_nefav[14]', '$array_inscrisi_id_nefav[15]', '$array_inscrisi_country_nefav[14]', '$array_inscrisi_country_nefav[15]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '12', '$nefav[16]', '$fav5678[2]', '$nefav[16]', '$fav5678Q[2]', '$array_inscrisi_id_nefav[16]', '$array_inscrisi_id_fav5678[2]', '$array_inscrisi_country_nefav[16]', '$array_inscrisi_country_fav5678[2]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '13', '$fav5678[3]', '$nefav[17]', '$fav5678Q[3]', '$nefav[17]',  '$array_inscrisi_id_fav5678[3]', '$array_inscrisi_id_nefav[17]', '$array_inscrisi_country_fav5678[3]', '$array_inscrisi_country_nefav[17]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '14', '$nefav[18]', '$nefav[19]', '$nefav[18]', '$nefav[19]', '$array_inscrisi_id_nefav[18]', '$array_inscrisi_id_nefav[19]', '$array_inscrisi_country_nefav[18]', '$array_inscrisi_country_nefav[19]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '15', '$nefav[20]', '$nefav[21]', '$nefav[20]', '$nefav[21]', '$array_inscrisi_id_nefav[20]', '$array_inscrisi_id_nefav[21]', '$array_inscrisi_country_nefav[20]', '$array_inscrisi_country_nefav[21]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '16', '$nefav[22]', '$fav12[1]', '$nefav[22]', '$fav12Q[1]', '$array_inscrisi_id_nefav[22]', '$array_inscrisi_id_fav12[1]', '$array_inscrisi_country_nefav[22]', '$array_inscrisi_country_fav12[1]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '17', '$fav12[0]', '$fav12Q[0]', '$array_inscrisi_id_fav12[0]', '$array_inscrisi_country_fav12[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '18', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '19', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '20', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '21', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '22', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '23', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '24', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '25', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '26', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '27', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '28', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '29', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '30', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '31', '32')");
				mysqli_query($server, "DELETE FROM `inscrisi` WHERE `Tid`='$tid'");				
			}elseif(count($nefav) == 22){//facut si merge
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '1', '$fav12[0]', 'Bye', '$fav12Q[0]', 'Bye', '$array_inscrisi_id_fav12[0]', '', '$array_inscrisi_country_fav12[0]', '', '32', '$fav12Q[0]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '2', '$nefav[0]', '$nefav[1]', '$nefav[0]', '$nefav[1]', '$array_inscrisi_id_nefav[0]', '$array_inscrisi_id_nefav[1]', '$array_inscrisi_country_nefav[0]', '$array_inscrisi_country_nefav[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '3', '$nefav[2]', '$nefav[3]', '$nefav[2]', '$nefav[3]', '$array_inscrisi_id_nefav[2]', '$array_inscrisi_id_nefav[3]', '$array_inscrisi_country_nefav[2]', '$array_inscrisi_country_nefav[3]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '4', '$nefav[4]', '$fav5678[0]', '$nefav[4]', '$fav5678Q[0]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_id_fav5678[0]', '$array_inscrisi_country_nefav[4]', '$array_inscrisi_country_fav5678[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '5', '$fav5678[1]', '$nefav[5]', '$fav5678Q[1]', '$nefav[5]', '$array_inscrisi_id_fav5678[1]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_country_fav5678[1]', '$array_inscrisi_country_nefav[5]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '6', '$nefav[6]', '$nefav[7]', '$nefav[6]', '$nefav[7]', '$array_inscrisi_id_nefav[6]', '$array_inscrisi_id_nefav[7]', '$array_inscrisi_country_nefav[6]', '$array_inscrisi_country_nefav[7]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '7', '$nefav[8]', '$nefav[9]', '$nefav[8]', '$nefav[9]', '$array_inscrisi_id_nefav[8]', '$array_inscrisi_id_nefav[9]', '$array_inscrisi_country_nefav[8]', '$array_inscrisi_country_nefav[9]', '32')"); 
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '8', '$nefav[10]', '$fav34[0]', '$nefav[10]', '$fav34Q[0]', '$array_inscrisi_id_nefav[10]', '$array_inscrisi_id_fav34[0]', '$array_inscrisi_country_nefav[10]', '$array_inscrisi_country_fav34[0]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '9', '$fav34[1]', '$nefav[11]', '$fav34Q[1]', '$nefav[11]', '$array_inscrisi_id_fav34[1]', '$array_inscrisi_id_nefav[11]', '$array_inscrisi_country_fav34[1]', '$array_inscrisi_country_nefav[11]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '10', '$nefav[12]', '$nefav[13]', '$nefav[12]', '$nefav[13]', '$array_inscrisi_id_nefav[12]', '$array_inscrisi_id_nefav[13]', '$array_inscrisi_country_nefav[12]', '$array_inscrisi_country_nefav[13]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '11', '$nefav[14]', '$nefav[15]', '$nefav[14]', '$nefav[15]', '$array_inscrisi_id_nefav[14]', '$array_inscrisi_id_nefav[15]', '$array_inscrisi_country_nefav[14]', '$array_inscrisi_country_nefav[15]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '12', '$nefav[16]', '$fav5678[2]', '$nefav[16]', '$fav5678Q[2]', '$array_inscrisi_id_nefav[16]', '$array_inscrisi_id_fav5678[2]', '$array_inscrisi_country_nefav[16]', '$array_inscrisi_country_fav5678[2]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '13', '$fav5678[3]', '$nefav[17]', '$fav5678Q[3]', '$nefav[17]',  '$array_inscrisi_id_fav5678[3]', '$array_inscrisi_id_nefav[17]', '$array_inscrisi_country_fav5678[3]', '$array_inscrisi_country_nefav[17]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '14', '$nefav[18]', '$nefav[19]', '$nefav[18]', '$nefav[19]', '$array_inscrisi_id_nefav[18]', '$array_inscrisi_id_nefav[19]', '$array_inscrisi_country_nefav[18]', '$array_inscrisi_country_nefav[19]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '15', '$nefav[20]', '$nefav[21]', '$nefav[20]', '$nefav[21]', '$array_inscrisi_id_nefav[20]', '$array_inscrisi_id_nefav[21]', '$array_inscrisi_country_nefav[20]', '$array_inscrisi_country_nefav[21]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '16', 'Bye', '$fav12[1]', 'Bye', '$fav12Q[1]', '', '$array_inscrisi_id_fav12[1]', '', '$array_inscrisi_country_fav12[1]', '32', '$fav12Q[1]', 'Bye', 'Bye')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '17', '$fav12[0]', '$fav12Q[0]', '$array_inscrisi_id_fav12[0]', '$array_inscrisi_country_fav12[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '18', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '19', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '20', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '21', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '22', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '23', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '24', '$fav12[1]', '$fav12Q[1]', '$array_inscrisi_id_fav12[1]', '$array_inscrisi_country_fav12[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '25', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '26', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '27', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '28', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '29', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '30', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '31', '32')");
				mysqli_query($server, "DELETE FROM `inscrisi` WHERE `Tid`='$tid'");
			}elseif(count($nefav) == 21){//facut si merge
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '1', '$fav12[0]', 'Bye', '$fav12Q[0]', 'Bye', '$array_inscrisi_id_fav12[0]', '', '$array_inscrisi_country_fav12[0]', '', '32', '$fav12Q[0]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '2', '$nefav[0]', '$nefav[1]', '$nefav[0]', '$nefav[1]', '$array_inscrisi_id_nefav[0]', '$array_inscrisi_id_nefav[1]', '$array_inscrisi_country_nefav[0]', '$array_inscrisi_country_nefav[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '3', '$nefav[2]', '$nefav[3]', '$nefav[2]', '$nefav[3]', '$array_inscrisi_id_nefav[2]', '$array_inscrisi_id_nefav[3]', '$array_inscrisi_country_nefav[2]', '$array_inscrisi_country_nefav[3]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '4', '$nefav[4]', '$fav5678[0]', '$nefav[4]', '$fav5678Q[0]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_id_fav5678[0]', '$array_inscrisi_country_nefav[4]', '$array_inscrisi_country_fav5678[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '5', '$fav5678[1]', '$nefav[5]', '$fav5678Q[1]', '$nefav[5]', '$array_inscrisi_id_fav5678[1]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_country_fav5678[1]', '$array_inscrisi_country_nefav[5]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '6', '$nefav[6]', '$nefav[7]', '$nefav[6]', '$nefav[7]', '$array_inscrisi_id_nefav[6]', '$array_inscrisi_id_nefav[7]', '$array_inscrisi_country_nefav[6]', '$array_inscrisi_country_nefav[7]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '7', '$nefav[8]', '$nefav[9]', '$nefav[8]', '$nefav[9]', '$array_inscrisi_id_nefav[8]', '$array_inscrisi_id_nefav[9]', '$array_inscrisi_country_nefav[8]', '$array_inscrisi_country_nefav[9]', '32')");
				if (strpos($fav34[0], '(4)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '8', '$nefav[10]', '$fav34[0]', '$nefav[10]', '$fav34Q[0]', '$array_inscrisi_id_nefav[10]', '$array_inscrisi_id_fav34[0]', '$array_inscrisi_country_nefav[10]', '$array_inscrisi_country_fav34[0]', '32')");
				}else{
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '8', 'Bye', '$fav34[0]', 'Bye', '$fav34Q[0]', '', '$array_inscrisi_id_fav34[0]', '', '$array_inscrisi_country_fav34[0]', '32', '$fav34Q[0]', 'Bye', 'Bye')");
				}
				if (strpos($fav34[1], '(4)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '9', '$fav34[1]', '$nefav[10]', '$fav34Q[1]', '$nefav[10]', '$array_inscrisi_id_fav34[1]', '$array_inscrisi_id_nefav[10]', '$array_inscrisi_country_fav34[1]', '$array_inscrisi_country_nefav[10]', '32')");
				}else{
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '9', '$fav34[1]', 'Bye', '$fav34Q[1]', 'Bye', '$array_inscrisi_id_fav34[1]', '', '$array_inscrisi_country_fav34[1]', '', '32', '$fav34Q[1]', 'Bye', 'Bye')");     
				}
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '10', '$nefav[11]', '$nefav[12]', '$nefav[11]', '$nefav[12]', '$array_inscrisi_id_nefav[11]', '$array_inscrisi_id_nefav[12]', '$array_inscrisi_country_nefav[11]', '$array_inscrisi_country_nefav[12]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '11', '$nefav[13]', '$nefav[14]', '$nefav[13]', '$nefav[14]', '$array_inscrisi_id_nefav[13]', '$array_inscrisi_id_nefav[14]', '$array_inscrisi_country_nefav[13]', '$array_inscrisi_country_nefav[14]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '12', '$nefav[15]', '$fav5678[2]', '$nefav[15]', '$fav5678Q[2]', '$array_inscrisi_id_nefav[15]', '$array_inscrisi_id_fav5678[2]', '$array_inscrisi_country_nefav[15]', '$array_inscrisi_country_fav5678[2]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '13', '$fav5678[3]', '$nefav[16]', '$fav5678Q[3]', '$nefav[16]',  '$array_inscrisi_id_fav5678[3]', '$array_inscrisi_id_nefav[16]', '$array_inscrisi_country_fav5678[3]', '$array_inscrisi_country_nefav[16]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '14', '$nefav[17]', '$nefav[18]', '$nefav[17]', '$nefav[18]', '$array_inscrisi_id_nefav[17]', '$array_inscrisi_id_nefav[18]', '$array_inscrisi_country_nefav[17]', '$array_inscrisi_country_nefav[18]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '15', '$nefav[19]', '$nefav[20]', '$nefav[19]', '$nefav[20]', '$array_inscrisi_id_nefav[19]', '$array_inscrisi_id_nefav[20]', '$array_inscrisi_country_nefav[19]', '$array_inscrisi_country_nefav[20]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '16', 'Bye', '$fav12[1]', 'Bye', '$fav12Q[1]', '', '$array_inscrisi_id_fav12[1]', '', '$array_inscrisi_country_fav12[1]', '32', '$fav12Q[1]', 'Bye', 'Bye')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '17', '$fav12[0]', '$fav12Q[0]', '$array_inscrisi_id_fav12[0]', '$array_inscrisi_country_fav12[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '18', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '19', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '20', '$fav34[0]', '$fav34Q[0]', '$array_inscrisi_id_fav34[0]', '$array_inscrisi_country_fav34[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '21', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '22', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '23', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '24', '$fav12[1]', '$fav12Q[1]', '$array_inscrisi_id_fav12[1]', '$array_inscrisi_country_fav12[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '25', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '26', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '27', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '28', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '29', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '30', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '31', '32')");
				mysqli_query($server, "DELETE FROM `inscrisi` WHERE `Tid`='$tid'");
			}elseif(count($nefav) == 20){//facut si merge
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '1', '$fav12[0]', 'Bye', '$fav12Q[0]', 'Bye', '$array_inscrisi_id_fav12[0]', '', '$array_inscrisi_country_fav12[0]', '', '32', '$fav12Q[0]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '2', '$nefav[0]', '$nefav[1]', '$nefav[0]', '$nefav[1]', '$array_inscrisi_id_nefav[0]', '$array_inscrisi_id_nefav[1]', '$array_inscrisi_country_nefav[0]', '$array_inscrisi_country_nefav[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '3', '$nefav[2]', '$nefav[3]', '$nefav[2]', '$nefav[3]', '$array_inscrisi_id_nefav[2]', '$array_inscrisi_id_nefav[3]', '$array_inscrisi_country_nefav[2]', '$array_inscrisi_country_nefav[3]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '4', '$nefav[4]', '$fav5678[0]', '$nefav[4]', '$fav5678Q[0]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_id_fav5678[0]', '$array_inscrisi_country_nefav[4]', '$array_inscrisi_country_fav5678[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '5', '$fav5678[1]', '$nefav[5]', '$fav5678Q[1]', '$nefav[5]', '$array_inscrisi_id_fav5678[1]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_country_fav5678[1]', '$array_inscrisi_country_nefav[5]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '6', '$nefav[6]', '$nefav[7]', '$nefav[6]', '$nefav[7]', '$array_inscrisi_id_nefav[6]', '$array_inscrisi_id_nefav[7]', '$array_inscrisi_country_nefav[6]', '$array_inscrisi_country_nefav[7]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '7', '$nefav[8]', '$nefav[9]', '$nefav[8]', '$nefav[9]', '$array_inscrisi_id_nefav[8]', '$array_inscrisi_id_nefav[9]', '$array_inscrisi_country_nefav[8]', '$array_inscrisi_country_nefav[9]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '8', 'Bye', '$fav34[0]', 'Bye', '$fav34Q[0]', '', '$array_inscrisi_id_fav34[0]', '', '$array_inscrisi_country_fav34[0]', '32', '$fav34Q[0]', 'Bye', 'Bye')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '9', '$fav34[1]', 'Bye', '$fav34Q[1]', 'Bye', '$array_inscrisi_id_fav34[1]', '', '$array_inscrisi_country_fav34[1]', '', '32', '$fav34Q[1]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '10', '$nefav[10]', '$nefav[11]', '$nefav[10]', '$nefav[11]', '$array_inscrisi_id_nefav[10]', '$array_inscrisi_id_nefav[11]', '$array_inscrisi_country_nefav[10]', '$array_inscrisi_country_nefav[11]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '11', '$nefav[12]', '$nefav[13]', '$nefav[12]', '$nefav[13]', '$array_inscrisi_id_nefav[12]', '$array_inscrisi_id_nefav[13]', '$array_inscrisi_country_nefav[12]', '$array_inscrisi_country_nefav[13]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '12', '$nefav[14]', '$fav5678[2]', '$nefav[14]', '$fav5678Q[2]', '$array_inscrisi_id_nefav[14]', '$array_inscrisi_id_fav5678[2]', '$array_inscrisi_country_nefav[14]', '$array_inscrisi_country_fav5678[2]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '13', '$fav5678[3]', '$nefav[15]', '$fav5678Q[3]', '$nefav[15]',  '$array_inscrisi_id_fav5678[3]', '$array_inscrisi_id_nefav[15]', '$array_inscrisi_country_fav5678[3]', '$array_inscrisi_country_nefav[15]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '14', '$nefav[16]', '$nefav[17]', '$nefav[16]', '$nefav[17]', '$array_inscrisi_id_nefav[16]', '$array_inscrisi_id_nefav[17]', '$array_inscrisi_country_nefav[16]', '$array_inscrisi_country_nefav[17]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '15', '$nefav[18]', '$nefav[19]', '$nefav[18]', '$nefav[19]', '$array_inscrisi_id_nefav[18]', '$array_inscrisi_id_nefav[19]', '$array_inscrisi_country_nefav[18]', '$array_inscrisi_country_nefav[19]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '16', 'Bye', '$fav12[1]', 'Bye', '$fav12Q[1]', '', '$array_inscrisi_id_fav12[1]', '', '$array_inscrisi_country_fav12[1]', '32', '$fav12Q[1]', 'Bye', 'Bye')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '17', '$fav12[0]', '$fav12Q[0]', '$array_inscrisi_id_fav12[0]', '$array_inscrisi_country_fav12[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '18', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '19', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '20', '$fav34[0]', '$fav34Q[0]', '$array_inscrisi_id_fav34[0]', '$array_inscrisi_country_fav34[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '21', '$fav34[1]', '$fav34Q[1]', '$array_inscrisi_id_fav34[1]', '$array_inscrisi_country_fav34[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '22', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '23', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '24', '$fav12[1]', '$fav12Q[1]', '$array_inscrisi_id_fav12[1]', '$array_inscrisi_country_fav12[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '25', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '26', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '27', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '28', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '29', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '30', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '31', '32')");
				mysqli_query($server, "DELETE FROM `inscrisi` WHERE `Tid`='$tid'");
			}elseif(count($nefav) == 19){//facut si merge
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '1', '$fav12[0]', 'Bye', '$fav12Q[0]', 'Bye', '$array_inscrisi_id_fav12[0]', '', '$array_inscrisi_country_fav12[0]', '', '32', '$fav12Q[0]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '2', '$nefav[0]', '$nefav[1]', '$nefav[0]', '$nefav[1]', '$array_inscrisi_id_nefav[0]', '$array_inscrisi_id_nefav[1]', '$array_inscrisi_country_nefav[0]', '$array_inscrisi_country_nefav[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '3', '$nefav[2]', '$nefav[3]', '$nefav[2]', '$nefav[3]', '$array_inscrisi_id_nefav[2]', '$array_inscrisi_id_nefav[3]', '$array_inscrisi_country_nefav[2]', '$array_inscrisi_country_nefav[3]', '32')");     
				if (strpos($fav5678[0], '(8)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '4', '$nefav[4]', '$fav5678[0]', '$nefav[4]', '$fav5678Q[0]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_id_fav5678[0]', '$array_inscrisi_country_nefav[4]', '$array_inscrisi_country_fav5678[0]', '32')");
				}elseif (strpos($fav5678[0], '(7)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '4', '$nefav[5]', '$fav5678[0]', '$nefav[5]', '$fav5678Q[0]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_id_fav5678[0]', '$array_inscrisi_country_nefav[5]', '$array_inscrisi_country_fav5678[0]', '32')");
				}elseif (strpos($fav5678[0], '(6)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '4', '$nefav[6]', '$fav5678[0]', '$nefav[6]', '$fav5678Q[0]', '$array_inscrisi_id_nefav[6]', '$array_inscrisi_id_fav5678[0]', '$array_inscrisi_country_nefav[6]', '$array_inscrisi_country_fav5678[0]', '32')");
				}else {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '4', 'Bye', '$fav5678[0]', 'Bye', '$fav5678Q[0]', '', '$array_inscrisi_id_fav5678[0]', '', '$array_inscrisi_country_fav5678[0]', '32', '$fav5678Q[0]', 'Bye', 'Bye')");
				}
				if (strpos($fav5678[1], '(8)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '5', '$fav5678[1]', '$nefav[4]', '$fav5678Q[1]', '$nefav[4]', '$array_inscrisi_id_fav5678[1]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_country_fav5678[1]', '$array_inscrisi_country_nefav[4]', '32')");
				}elseif (strpos($fav5678[1], '(7)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '5', '$fav5678[1]', '$nefav[5]', '$fav5678Q[1]', '$nefav[5]', '$array_inscrisi_id_fav5678[1]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_country_fav5678[1]', '$array_inscrisi_country_nefav[5]', '32')");
				}elseif (strpos($fav5678[1], '(6)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '5', '$fav5678[1]', '$nefav[6]', '$fav5678Q[1]', '$nefav[6]', '$array_inscrisi_id_fav5678[1]', '$array_inscrisi_id_nefav[6]', '$array_inscrisi_country_fav5678[1]', '$array_inscrisi_country_nefav[6]', '32')");
				}else {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '5', '$fav5678[1]', 'Bye', '$fav5678Q[1]', 'Bye', '$array_inscrisi_id_fav5678[1]', '', '$array_inscrisi_country_fav5678[1]', '', '32', '$fav5678Q[1]', 'Bye', 'Bye')");     
				}					
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '6', '$nefav[7]', '$nefav[8]', '$nefav[7]', '$nefav[8]', '$array_inscrisi_id_nefav[7]', '$array_inscrisi_id_nefav[8]', '$array_inscrisi_country_nefav[7]', '$array_inscrisi_country_nefav[8]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '7', '$nefav[9]', '$nefav[10]', '$nefav[9]', '$nefav[10]', '$array_inscrisi_id_nefav[9]', '$array_inscrisi_id_nefav[10]', '$array_inscrisi_country_nefav[9]', '$array_inscrisi_country_nefav[10]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '8', 'Bye', '$fav34[0]', 'Bye', '$fav34Q[0]', '', '$array_inscrisi_id_fav34[0]', '', '$array_inscrisi_country_fav34[0]', '32', '$fav34Q[0]', 'Bye', 'Bye')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '9', '$fav34[1]', 'Bye', '$fav34Q[1]', 'Bye', '$array_inscrisi_id_fav34[1]', '', '$array_inscrisi_country_fav34[1]', '', '32', '$fav34Q[1]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '10', '$nefav[11]', '$nefav[12]', '$nefav[11]', '$nefav[12]', '$array_inscrisi_id_nefav[11]', '$array_inscrisi_id_nefav[12]', '$array_inscrisi_country_nefav[11]', '$array_inscrisi_country_nefav[12]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '11', '$nefav[13]', '$nefav[14]', '$nefav[13]', '$nefav[14]', '$array_inscrisi_id_nefav[13]', '$array_inscrisi_id_nefav[14]', '$array_inscrisi_country_nefav[13]', '$array_inscrisi_country_nefav[14]', '32')");
				if (strpos($fav5678[2], '(8)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '12', '$nefav[4]', '$fav5678[2]', '$nefav[4]', '$fav5678Q[2]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_id_fav5678[2]', '$array_inscrisi_country_nefav[4]', '$array_inscrisi_country_fav5678[2]', '32')");
				}elseif (strpos($fav5678[2], '(7)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '12', '$nefav[5]', '$fav5678[2]', '$nefav[5]', '$fav5678Q[2]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_id_fav5678[2]', '$array_inscrisi_country_nefav[5]', '$array_inscrisi_country_fav5678[2]', '32')");
				}elseif (strpos($fav5678[2], '(6)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '12', '$nefav[6]', '$fav5678[2]', '$nefav[6]', '$fav5678Q[2]', '$array_inscrisi_id_nefav[6]', '$array_inscrisi_id_fav5678[2]', '$array_inscrisi_country_nefav[6]', '$array_inscrisi_country_fav5678[2]', '32')");
				}else {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '12', 'Bye', '$fav5678[2]', 'Bye', '$fav5678Q[2]', '', '$array_inscrisi_id_fav5678[2]', '', '$array_inscrisi_country_fav5678[2]', '32', '$fav5678Q[2]', 'Bye', 'Bye')");
				}
				if (strpos($fav5678[3], '(8)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '13', '$fav5678[3]', '$nefav[4]', '$fav5678Q[3]', '$nefav[4]', '$array_inscrisi_id_fav5678[3]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_country_fav5678[3]', '$array_inscrisi_country_nefav[4]', '32')");
				}elseif (strpos($fav5678[3], '(7)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '13', '$fav5678[3]', '$nefav[5]', '$fav5678Q[3]', '$nefav[5]', '$array_inscrisi_id_fav5678[3]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_country_fav5678[3]', '$array_inscrisi_country_nefav[5]', '32')");
				}elseif (strpos($fav5678[3], '(6)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '13', '$fav5678[3]', '$nefav[6]', '$fav5678Q[3]', '$nefav[6]', '$array_inscrisi_id_fav5678[3]', '$array_inscrisi_id_nefav[6]', '$array_inscrisi_country_fav5678[3]', '$array_inscrisi_country_nefav[6]', '32')");
				}else {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '13', '$fav5678[3]', 'Bye', '$fav5678Q[3]', 'Bye', '$array_inscrisi_id_fav5678[3]', '', '$array_inscrisi_country_fav5678[3]', '', '32', '$fav5678Q[3]', 'Bye', 'Bye')");     
				}
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '14', '$nefav[15]', '$nefav[16]', '$nefav[15]', '$nefav[16]', '$array_inscrisi_id_nefav[15]', '$array_inscrisi_id_nefav[16]', '$array_inscrisi_country_nefav[15]', '$array_inscrisi_country_nefav[16]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '15', '$nefav[17]', '$nefav[18]', '$nefav[17]', '$nefav[18]', '$array_inscrisi_id_nefav[17]', '$array_inscrisi_id_nefav[18]', '$array_inscrisi_country_nefav[17]', '$array_inscrisi_country_nefav[18]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '16', 'Bye', '$fav12[1]', 'Bye', '$fav12Q[1]', '', '$array_inscrisi_id_fav12[1]', '', '$array_inscrisi_country_fav12[1]', '32', '$fav12Q[1]', 'Bye', 'Bye')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '17', '$fav12[0]', '$fav12Q[0]', '$array_inscrisi_id_fav12[0]', '$array_inscrisi_country_fav12[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '18', '$fav5678[0]', '$fav5678Q[0]', '$array_inscrisi_id_fav5678[0]', '$array_inscrisi_country_fav5678[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '19', '$fav5678[1]', '$fav5678Q[1]', '$array_inscrisi_id_fav5678[1]', '$array_inscrisi_country_fav5678[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '20', '$fav34[0]', '$fav34Q[0]', '$array_inscrisi_id_fav34[0]', '$array_inscrisi_country_fav34[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '21', '$fav34[1]', '$fav34Q[1]', '$array_inscrisi_id_fav34[1]', '$array_inscrisi_country_fav34[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '22', '$fav5678[3]', '$fav5678Q[3]', '$array_inscrisi_id_fav5678[3]', '$array_inscrisi_country_fav5678[3]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '23', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '24', '$fav12[1]', '$fav12Q[1]', '$array_inscrisi_id_fav12[1]', '$array_inscrisi_country_fav12[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '25', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '26', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '27', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '28', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '29', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '30', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '31', '32')");
				mysqli_query($server, "DELETE FROM `inscrisi` WHERE `Tid`='$tid'");
			}elseif(count($nefav) == 18){//facut si merge
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '1', '$fav12[0]', 'Bye', '$fav12Q[0]', 'Bye', '$array_inscrisi_id_fav12[0]', '', '$array_inscrisi_country_fav12[0]', '', '32', '$fav12Q[0]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '2', '$nefav[0]', '$nefav[1]', '$nefav[0]', '$nefav[1]', '$array_inscrisi_id_nefav[0]', '$array_inscrisi_id_nefav[1]', '$array_inscrisi_country_nefav[0]', '$array_inscrisi_country_nefav[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '3', '$nefav[2]', '$nefav[3]', '$nefav[2]', '$nefav[3]', '$array_inscrisi_id_nefav[2]', '$array_inscrisi_id_nefav[3]', '$array_inscrisi_country_nefav[2]', '$array_inscrisi_country_nefav[3]', '32')");     
				if (strpos($fav5678[0], '(8)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '4', '$nefav[4]', '$fav5678[0]', '$nefav[4]', '$fav5678Q[0]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_id_fav5678[0]', '$array_inscrisi_country_nefav[4]', '$array_inscrisi_country_fav5678[0]', '32')");
				}elseif (strpos($fav5678[0], '(7)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '4', '$nefav[5]', '$fav5678[0]', '$nefav[5]', '$fav5678Q[0]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_id_fav5678[0]', '$array_inscrisi_country_nefav[5]', '$array_inscrisi_country_fav5678[0]', '32')");
				}else {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '4', 'Bye', '$fav5678[0]', 'Bye', '$fav5678Q[0]', '', '$array_inscrisi_id_fav5678[0]', '', '$array_inscrisi_country_fav5678[0]', '32', '$fav5678Q[0]', 'Bye', 'Bye')");
				}
				if (strpos($fav5678[1], '(8)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '5', '$fav5678[1]', '$nefav[4]', '$fav5678Q[1]', '$nefav[4]', '$array_inscrisi_id_fav5678[1]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_country_fav5678[1]', '$array_inscrisi_country_nefav[4]', '32')");
				}elseif (strpos($fav5678[1], '(7)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '5', '$fav5678[1]', '$nefav[5]', '$fav5678Q[1]', '$nefav[5]', '$array_inscrisi_id_fav5678[1]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_country_fav5678[1]', '$array_inscrisi_country_nefav[5]', '32')");
				}else {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '5', '$fav5678[1]', 'Bye', '$fav5678Q[1]', 'Bye', '$array_inscrisi_id_fav5678[1]', '', '$array_inscrisi_country_fav5678[1]', '', '32', '$fav5678Q[1]', 'Bye', 'Bye')");     
				}					
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '6', '$nefav[6]', '$nefav[7]', '$nefav[6]', '$nefav[7]', '$array_inscrisi_id_nefav[6]', '$array_inscrisi_id_nefav[7]', '$array_inscrisi_country_nefav[6]', '$array_inscrisi_country_nefav[7]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '7', '$nefav[8]', '$nefav[9]', '$nefav[8]', '$nefav[9]', '$array_inscrisi_id_nefav[8]', '$array_inscrisi_id_nefav[9]', '$array_inscrisi_country_nefav[8]', '$array_inscrisi_country_nefav[9]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '8', 'Bye', '$fav34[0]', 'Bye', '$fav34Q[0]', '', '$array_inscrisi_id_fav34[0]', '', '$array_inscrisi_country_fav34[0]', '32', '$fav34Q[0]', 'Bye', 'Bye')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '9', '$fav34[1]', 'Bye', '$fav34Q[1]', 'Bye', '$array_inscrisi_id_fav34[1]', '', '$array_inscrisi_country_fav34[1]', '', '32', '$fav34Q[1]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '10', '$nefav[10]', '$nefav[11]', '$nefav[10]', '$nefav[11]', '$array_inscrisi_id_nefav[10]', '$array_inscrisi_id_nefav[11]', '$array_inscrisi_country_nefav[10]', '$array_inscrisi_country_nefav[11]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '11', '$nefav[12]', '$nefav[13]', '$nefav[12]', '$nefav[13]', '$array_inscrisi_id_nefav[12]', '$array_inscrisi_id_nefav[13]', '$array_inscrisi_country_nefav[12]', '$array_inscrisi_country_nefav[13]', '32')");
				if (strpos($fav5678[2], '(8)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '12', '$nefav[4]', '$fav5678[2]', '$nefav[4]', '$fav5678Q[2]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_id_fav5678[2]', '$array_inscrisi_country_nefav[4]', '$array_inscrisi_country_fav5678[2]', '32')");
				}elseif (strpos($fav5678[2], '(7)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '12', '$nefav[5]', '$fav5678[2]', '$nefav[5]', '$fav5678Q[2]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_id_fav5678[2]', '$array_inscrisi_country_nefav[5]', '$array_inscrisi_country_fav5678[2]', '32')");
				}else {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '12', 'Bye', '$fav5678[2]', 'Bye', '$fav5678Q[2]', '', '$array_inscrisi_id_fav5678[2]', '', '$array_inscrisi_country_fav5678[2]', '32', '$fav5678Q[2]', 'Bye', 'Bye')");
				}
				if (strpos($fav5678[3], '(8)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '13', '$fav5678[3]', '$nefav[4]', '$fav5678Q[3]', '$nefav[4]', '$array_inscrisi_id_fav5678[3]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_country_fav5678[3]', '$array_inscrisi_country_nefav[4]', '32')");
				}elseif (strpos($fav5678[3], '(7)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '13', '$fav5678[3]', '$nefav[5]', '$fav5678Q[3]', '$nefav[5]', '$array_inscrisi_id_fav5678[3]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_country_fav5678[3]', '$array_inscrisi_country_nefav[5]', '32')");
				}else {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '13', '$fav5678[3]', 'Bye', '$fav5678Q[3]', 'Bye', '$array_inscrisi_id_fav5678[3]', '', '$array_inscrisi_country_fav5678[3]', '', '32', '$fav5678Q[3]', 'Bye', 'Bye')");     
				}
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '14', '$nefav[14]', '$nefav[15]', '$nefav[14]', '$nefav[15]', '$array_inscrisi_id_nefav[14]', '$array_inscrisi_id_nefav[15]', '$array_inscrisi_country_nefav[14]', '$array_inscrisi_country_nefav[15]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '15', '$nefav[16]', '$nefav[17]', '$nefav[16]', '$nefav[17]', '$array_inscrisi_id_nefav[16]', '$array_inscrisi_id_nefav[17]', '$array_inscrisi_country_nefav[16]', '$array_inscrisi_country_nefav[17]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '16', 'Bye', '$fav12[1]', 'Bye', '$fav12Q[1]', '', '$array_inscrisi_id_fav12[1]', '', '$array_inscrisi_country_fav12[1]', '32', '$fav12Q[1]', 'Bye', 'Bye')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '17', '$fav12[0]', '$fav12Q[0]', '$array_inscrisi_id_fav12[0]', '$array_inscrisi_country_fav12[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '18', '$fav5678[0]', '$fav5678Q[0]', '$array_inscrisi_id_fav5678[0]', '$array_inscrisi_country_fav5678[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '19', '$fav5678[1]', '$fav5678Q[1]', '$array_inscrisi_id_fav5678[1]', '$array_inscrisi_country_fav5678[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '20', '$fav34[0]', '$fav34Q[0]', '$array_inscrisi_id_fav34[0]', '$array_inscrisi_country_fav34[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '21', '$fav34[1]', '$fav34Q[1]', '$array_inscrisi_id_fav34[1]', '$array_inscrisi_country_fav34[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '22', '$fav5678[3]', '$fav5678Q[3]', '$array_inscrisi_id_fav5678[3]', '$array_inscrisi_country_fav5678[3]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '23', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '24', '$fav12[1]', '$fav12Q[1]', '$array_inscrisi_id_fav12[1]', '$array_inscrisi_country_fav12[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '25', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '26', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '27', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '28', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '29', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '30', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '31', '32')");
				mysqli_query($server, "DELETE FROM `inscrisi` WHERE `Tid`='$tid'");
			}elseif(count($nefav) == 17){//facut si merge
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '1', '$fav12[0]', 'Bye', '$fav12Q[0]', 'Bye', '$array_inscrisi_id_fav12[0]', '', '$array_inscrisi_country_fav12[0]', '', '32', '$fav12Q[0]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '2', '$nefav[0]', '$nefav[1]', '$nefav[0]', '$nefav[1]', '$array_inscrisi_id_nefav[0]', '$array_inscrisi_id_nefav[1]', '$array_inscrisi_country_nefav[0]', '$array_inscrisi_country_nefav[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '3', '$nefav[2]', '$nefav[3]', '$nefav[2]', '$nefav[3]', '$array_inscrisi_id_nefav[2]', '$array_inscrisi_id_nefav[3]', '$array_inscrisi_country_nefav[2]', '$array_inscrisi_country_nefav[3]', '32')");     
				if (strpos($fav5678[0], '(8)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '4', '$nefav[4]', '$fav5678[0]', '$nefav[4]', '$fav5678Q[0]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_id_fav5678[0]', '$array_inscrisi_country_nefav[4]', '$array_inscrisi_country_fav5678[0]', '32')");
				}else{
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '4', 'Bye', '$fav5678[0]', 'Bye', '$fav5678Q[0]', '', '$array_inscrisi_id_fav5678[0]', '', '$array_inscrisi_country_fav5678[0]', '32', '$fav5678Q[0]', 'Bye', 'Bye')");
				}
				if (strpos($fav5678[1], '(8)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '5', '$fav5678[1]', '$nefav[4]', '$fav5678Q[1]', '$nefav[4]', '$array_inscrisi_id_fav5678[1]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_country_fav5678[1]', '$array_inscrisi_country_nefav[4]', '32')");
				}else{
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '5', '$fav5678[1]', 'Bye', '$fav5678Q[1]', 'Bye', '$array_inscrisi_id_fav5678[1]', '', '$array_inscrisi_country_fav5678[1]', '', '32', '$fav5678Q[1]', 'Bye', 'Bye')");     
				}					
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '6', '$nefav[5]', '$nefav[6]', '$nefav[5]', '$nefav[6]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_id_nefav[6]', '$array_inscrisi_country_nefav[5]', '$array_inscrisi_country_nefav[6]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '7', '$nefav[7]', '$nefav[8]', '$nefav[7]', '$nefav[8]', '$array_inscrisi_id_nefav[7]', '$array_inscrisi_id_nefav[8]', '$array_inscrisi_country_nefav[7]', '$array_inscrisi_country_nefav[8]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '8', 'Bye', '$fav34[0]', 'Bye', '$fav34Q[0]', '', '$array_inscrisi_id_fav34[0]', '', '$array_inscrisi_country_fav34[0]', '32', '$fav34Q[0]', 'Bye', 'Bye')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '9', '$fav34[1]', 'Bye', '$fav34Q[1]', 'Bye', '$array_inscrisi_id_fav34[1]', '', '$array_inscrisi_country_fav34[1]', '', '32', '$fav34Q[1]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '10', '$nefav[9]', '$nefav[10]', '$nefav[9]', '$nefav[10]', '$array_inscrisi_id_nefav[9]', '$array_inscrisi_id_nefav[10]', '$array_inscrisi_country_nefav[9]', '$array_inscrisi_country_nefav[10]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '11', '$nefav[11]', '$nefav[12]', '$nefav[11]', '$nefav[12]', '$array_inscrisi_id_nefav[11]', '$array_inscrisi_id_nefav[12]', '$array_inscrisi_country_nefav[11]', '$array_inscrisi_country_nefav[12]', '32')");
				if (strpos($fav5678[2], '(8)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '12', '$nefav[4]', '$fav5678[2]', '$nefav[4]', '$fav5678Q[2]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_id_fav5678[2]', '$array_inscrisi_country_nefav[4]', '$array_inscrisi_country_fav5678[2]', '32')");
				}else{
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '12', 'Bye', '$fav5678[2]', 'Bye', '$fav5678Q[2]', '', '$array_inscrisi_id_fav5678[2]', '', '$array_inscrisi_country_fav5678[2]', '32', '$fav5678Q[2]', 'Bye', 'Bye')");
				}
				if (strpos($fav5678[3], '(8)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '13', '$fav5678[3]', '$nefav[4]', '$fav5678Q[3]', '$nefav[4]', '$array_inscrisi_id_fav5678[3]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_country_fav5678[3]', '$array_inscrisi_country_nefav[4]', '32')");
				}else{
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '13', '$fav5678[3]', 'Bye', '$fav5678Q[3]', 'Bye', '$array_inscrisi_id_fav5678[3]', '', '$array_inscrisi_country_fav5678[3]', '', '32', '$fav5678Q[3]', 'Bye', 'Bye')");     
				}
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '14', '$nefav[13]', '$nefav[14]', '$nefav[13]', '$nefav[14]', '$array_inscrisi_id_nefav[13]', '$array_inscrisi_id_nefav[14]', '$array_inscrisi_country_nefav[13]', '$array_inscrisi_country_nefav[14]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '15', '$nefav[15]', '$nefav[16]', '$nefav[15]', '$nefav[16]', '$array_inscrisi_id_nefav[15]', '$array_inscrisi_id_nefav[16]', '$array_inscrisi_country_nefav[15]', '$array_inscrisi_country_nefav[16]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '16', 'Bye', '$fav12[1]', 'Bye', '$fav12Q[1]', '', '$array_inscrisi_id_fav12[1]', '', '$array_inscrisi_country_fav12[1]', '32', '$fav12Q[1]', 'Bye', 'Bye')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '17', '$fav12[0]', '$fav12Q[0]', '$array_inscrisi_id_fav12[0]', '$array_inscrisi_country_fav12[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '18', '$fav5678[0]', '$fav5678Q[0]', '$array_inscrisi_id_fav5678[0]', '$array_inscrisi_country_fav5678[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '19', '$fav5678[1]', '$fav5678Q[1]', '$array_inscrisi_id_fav5678[1]', '$array_inscrisi_country_fav5678[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '20', '$fav34[0]', '$fav34Q[0]', '$array_inscrisi_id_fav34[0]', '$array_inscrisi_country_fav34[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '21', '$fav34[1]', '$fav34Q[1]', '$array_inscrisi_id_fav34[1]', '$array_inscrisi_country_fav34[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '22', '$fav5678[3]', '$fav5678Q[3]', '$array_inscrisi_id_fav5678[3]', '$array_inscrisi_country_fav5678[3]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '23', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '24', '$fav12[1]', '$fav12Q[1]', '$array_inscrisi_id_fav12[1]', '$array_inscrisi_country_fav12[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '25', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '26', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '27', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '28', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '29', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '30', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '31', '32')");
				mysqli_query($server, "DELETE FROM `inscrisi` WHERE `Tid`='$tid'");
			}elseif(count($nefav) == 16){//facut si merge
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '1', '$fav12[0]', 'Bye', '$fav12Q[0]', 'Bye', '$array_inscrisi_id_fav12[0]', '', '$array_inscrisi_country_fav12[0]', '', '32', '$fav12Q[0]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '2', '$nefav[0]', '$nefav[1]', '$nefav[0]', '$nefav[1]', '$array_inscrisi_id_nefav[0]', '$array_inscrisi_id_nefav[1]', '$array_inscrisi_country_nefav[0]', '$array_inscrisi_country_nefav[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '3', '$nefav[2]', '$nefav[3]', '$nefav[2]', '$nefav[3]', '$array_inscrisi_id_nefav[2]', '$array_inscrisi_id_nefav[3]', '$array_inscrisi_country_nefav[2]', '$array_inscrisi_country_nefav[3]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '4', 'Bye', '$fav5678[0]', 'Bye', '$fav5678Q[0]', '', '$array_inscrisi_id_fav5678[0]', '', '$array_inscrisi_country_fav5678[0]', '32', '$fav5678Q[0]', 'Bye', 'Bye')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '5', '$fav5678[1]', 'Bye', '$fav5678Q[1]', 'Bye', '$array_inscrisi_id_fav5678[1]', '', '$array_inscrisi_country_fav5678[1]', '', '32', '$fav5678Q[1]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '6', '$nefav[4]', '$nefav[5]', '$nefav[4]', '$nefav[5]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_country_nefav[4]', '$array_inscrisi_country_nefav[5]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '7', '$nefav[6]', '$nefav[7]', '$nefav[6]', '$nefav[7]', '$array_inscrisi_id_nefav[6]', '$array_inscrisi_id_nefav[7]', '$array_inscrisi_country_nefav[6]', '$array_inscrisi_country_nefav[7]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '8', 'Bye', '$fav34[0]', 'Bye', '$fav34Q[0]', '', '$array_inscrisi_id_fav34[0]', '', '$array_inscrisi_country_fav34[0]', '32', '$fav34Q[0]', 'Bye', 'Bye')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '9', '$fav34[1]', 'Bye', '$fav34Q[1]', 'Bye', '$array_inscrisi_id_fav34[1]', '', '$array_inscrisi_country_fav34[1]', '', '32', '$fav34Q[1]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '10', '$nefav[8]', '$nefav[9]', '$nefav[8]', '$nefav[9]', '$array_inscrisi_id_nefav[8]', '$array_inscrisi_id_nefav[9]', '$array_inscrisi_country_nefav[8]', '$array_inscrisi_country_nefav[9]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '11', '$nefav[10]', '$nefav[11]', '$nefav[10]', '$nefav[11]', '$array_inscrisi_id_nefav[10]', '$array_inscrisi_id_nefav[11]', '$array_inscrisi_country_nefav[10]', '$array_inscrisi_country_nefav[11]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '12', 'Bye', '$fav5678[2]', 'Bye', '$fav5678Q[2]', '', '$array_inscrisi_id_fav5678[2]', '', '$array_inscrisi_country_fav5678[2]', '32', '$fav5678Q[2]', 'Bye', 'Bye')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '13', '$fav5678[3]', 'Bye', '$fav5678Q[3]', 'Bye', '$array_inscrisi_id_fav5678[3]', '', '$array_inscrisi_country_fav5678[3]', '', '32', '$fav5678Q[3]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '14', '$nefav[12]', '$nefav[13]', '$nefav[12]', '$nefav[13]', '$array_inscrisi_id_nefav[12]', '$array_inscrisi_id_nefav[13]', '$array_inscrisi_country_nefav[12]', '$array_inscrisi_country_nefav[13]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '15', '$nefav[14]', '$nefav[15]', '$nefav[14]', '$nefav[15]', '$array_inscrisi_id_nefav[14]', '$array_inscrisi_id_nefav[15]', '$array_inscrisi_country_nefav[14]', '$array_inscrisi_country_nefav[15]', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '16', 'Bye', '$fav12[1]', 'Bye', '$fav12Q[1]', '', '$array_inscrisi_id_fav12[1]', '', '$array_inscrisi_country_fav12[1]', '32', '$fav12Q[1]', 'Bye', 'Bye')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '17', '$fav12[0]', '$fav12Q[0]', '$array_inscrisi_id_fav12[0]', '$array_inscrisi_country_fav12[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '18', '$fav5678[0]', '$fav5678Q[0]', '$array_inscrisi_id_fav5678[0]', '$array_inscrisi_country_fav5678[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '19', '$fav5678[1]', '$fav5678Q[1]', '$array_inscrisi_id_fav5678[1]', '$array_inscrisi_country_fav5678[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '20', '$fav34[0]', '$fav34Q[0]', '$array_inscrisi_id_fav34[0]', '$array_inscrisi_country_fav34[0]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '21', '$fav34[1]', '$fav34Q[1]', '$array_inscrisi_id_fav34[1]', '$array_inscrisi_country_fav34[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '22', '$fav5678[3]', '$fav5678Q[3]', '$array_inscrisi_id_fav5678[3]', '$array_inscrisi_country_fav5678[3]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '23', '$fav5678[4]', '$fav5678Q[4]', '$array_inscrisi_id_fav5678[4]', '$array_inscrisi_country_fav5678[4]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '24', '$fav12[1]', '$fav12Q[1]', '$array_inscrisi_id_fav12[1]', '$array_inscrisi_country_fav12[1]', '32')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '25', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '26', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '27', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '28', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '29', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '30', '32')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '31', '32')");
				mysqli_query($server, "DELETE FROM `inscrisi` WHERE `Tid`='$tid'");
			}				
		}
		
		//generare tablou 16
		if($nr_inscrisi>8 && $nr_inscrisi<17){
			
			mysqli_query($server, "UPDATE `turnee` SET `Draw`='16' WHERE `id`='$tid'");     
			
			$fav12 = array_slice($array_inscrisi, 0, 2);
			$fav34 = array_slice($array_inscrisi, 2, 2);
			$nefav = array_slice($array_inscrisi, 4);
		
			$fav12[0] = $fav12[0]." (1)";
			$fav12[1] = $fav12[1]." (2)";
		
			$fav34[0] = $fav34[0]." (3)";
			$fav34[1] = $fav34[1]." (4)";
		
			shuffle($fav34);
			shuffle($nefav);
		
			$fav12Q = array();
			$fav34Q = array();
			$array_inscrisi_id_fav12 = array();
			$array_inscrisi_country_fav12 = array();	
			$array_inscrisi_id_fav34 = array();
			$array_inscrisi_country_fav34 = array();	
			$array_inscrisi_id_nefav = array();
			$array_inscrisi_country_nefav = array();
		
			for ($a=0;$a<2;$a++){
				$fav12Q[$a] = strtok($fav12[$a], " ");
				$result_inscrisi_id_country_fav12 = mysqli_query($server, "SELECT `Pid`, `Country` from inscrisi WHERE `Tid`='$tid' AND `Username`='$fav12Q[$a]'");     
				$row1 = mysqli_fetch_assoc($result_inscrisi_id_country_fav12);
				$array_inscrisi_id_fav12[$a] = $row1['Pid'];
				$array_inscrisi_country_fav12[$a] = $row1['Country'];
			}
			for ($b=0;$b<2;$b++){
				$fav34Q[$b] = strtok($fav34[$b], " ");
				$result_inscrisi_id_country_fav34 = mysqli_query($server, "SELECT `Pid`, `Country` from inscrisi WHERE `Tid`='$tid' AND `Username`='$fav34Q[$b]'");     
				$row2 = mysqli_fetch_assoc($result_inscrisi_id_country_fav34);
				$array_inscrisi_id_fav34[] = $row2['Pid'];
				$array_inscrisi_country_fav34[] = $row2['Country'];
			}
			for ($d=0;$d<24;$d++){
				$result_inscrisi_id_country_nefav = mysqli_query($server, "SELECT `Pid`, `Country` from inscrisi WHERE `Tid`='$tid' AND `Username`='$nefav[$d]'");     
				$row4 = mysqli_fetch_assoc($result_inscrisi_id_country_nefav);
				$array_inscrisi_id_nefav[] = $row4['Pid'];
				$array_inscrisi_country_nefav[] = $row4['Country'];
			}
			
			if(count($nefav) == 12){//facut si merge
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '1', '$fav12[0]', '$nefav[0]', '$fav12Q[0]', '$nefav[0]', '$array_inscrisi_id_fav12[0]', '$array_inscrisi_id_nefav[0]', '$array_inscrisi_country_fav12[0]', '$array_inscrisi_country_nefav[0]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '2', '$nefav[1]', '$nefav[2]', '$nefav[1]', '$nefav[2]', '$array_inscrisi_id_nefav[1]', '$array_inscrisi_id_nefav[2]', '$array_inscrisi_country_nefav[1]', '$array_inscrisi_country_nefav[2]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '3', '$nefav[3]', '$nefav[4]', '$nefav[3]', '$nefav[4]', '$array_inscrisi_id_nefav[3]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_country_nefav[3]', '$array_inscrisi_country_nefav[4]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '4', '$nefav[5]', '$fav34[0]', '$nefav[5]', '$fav34Q[0]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_id_fav34[0]', '$array_inscrisi_country_nefav[5]', '$array_inscrisi_country_fav34[0]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '5', '$fav34[1]', '$nefav[6]', '$fav34Q[1]', '$nefav[6]', '$array_inscrisi_id_fav34[1]', '$array_inscrisi_id_nefav[6]', '$array_inscrisi_country_fav34[1]', '$array_inscrisi_country_nefav[6]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '6', '$nefav[7]', '$nefav[8]', '$nefav[7]', '$nefav[8]', '$array_inscrisi_id_nefav[7]', '$array_inscrisi_id_nefav[8]', '$array_inscrisi_country_nefav[7]', '$array_inscrisi_country_nefav[8]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '7', '$nefav[9]', '$nefav[10]', '$nefav[9]', '$nefav[10]', '$array_inscrisi_id_nefav[9]', '$array_inscrisi_id_nefav[10]', '$array_inscrisi_country_nefav[9]', '$array_inscrisi_country_nefav[10]', '16')"); 
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '8', '$nefav[11]', '$fav12[1]', '$nefav[11]', '$fav12Q[1]', '$array_inscrisi_id_nefav[11]', '$array_inscrisi_id_fav12[1]', '$array_inscrisi_country_nefav[11]', '$array_inscrisi_country_fav12[1]', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '9', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '10', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '11', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '12', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '13', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '14', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '15', '16')");
				mysqli_query($server, "DELETE FROM `inscrisi` WHERE `Tid`='$tid'");			
			}elseif(count($nefav) == 11){//facut si merge
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '1', '$fav12[0]', 'Bye', '$fav12Q[0]', 'Bye', '$array_inscrisi_id_fav12[0]', '', '$array_inscrisi_country_fav12[0]', '', '16', '$fav12Q[0]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '2', '$nefav[0]', '$nefav[1]', '$nefav[0]', '$nefav[1]', '$array_inscrisi_id_nefav[0]', '$array_inscrisi_id_nefav[1]', '$array_inscrisi_country_nefav[0]', '$array_inscrisi_country_nefav[1]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '3', '$nefav[2]', '$nefav[3]', '$nefav[2]', '$nefav[3]', '$array_inscrisi_id_nefav[2]', '$array_inscrisi_id_nefav[3]', '$array_inscrisi_country_nefav[2]', '$array_inscrisi_country_nefav[3]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '4', '$nefav[4]', '$fav34[0]', '$nefav[4]', '$fav34Q[0]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_id_fav34[0]', '$array_inscrisi_country_nefav[4]', '$array_inscrisi_country_fav34[0]', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '5', '$fav34[1]', '$nefav[5]', '$fav34Q[1]', '$nefav[5]', '$array_inscrisi_id_fav34[1]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_country_fav34[1]', '$array_inscrisi_country_nefav[5]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '6', '$nefav[6]', '$nefav[7]', '$nefav[6]', '$nefav[7]', '$array_inscrisi_id_nefav[6]', '$array_inscrisi_id_nefav[7]', '$array_inscrisi_country_nefav[6]', '$array_inscrisi_country_nefav[7]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '7', '$nefav[8]', '$nefav[9]', '$nefav[8]', '$nefav[9]', '$array_inscrisi_id_nefav[8]', '$array_inscrisi_id_nefav[9]', '$array_inscrisi_country_nefav[8]', '$array_inscrisi_country_nefav[9]', '16')"); 
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '8', '$nefav[10]', '$fav12[1]', '$nefav[10]', '$fav12Q[1]', '$array_inscrisi_id_nefav[10]', '$array_inscrisi_id_fav12[1]', '$array_inscrisi_country_nefav[10]', '$array_inscrisi_country_fav12[1]', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '9', '$fav12[0]', '$fav12Q[0]', '$array_inscrisi_id_fav12[0]', '$array_inscrisi_country_fav12[0]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '10', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '11', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '12', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '13', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '14', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '15', '16')");
				mysqli_query($server, "DELETE FROM `inscrisi` WHERE `Tid`='$tid'");			
			}elseif(count($nefav) == 10){//facut si merge
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '1', '$fav12[0]', 'Bye', '$fav12Q[0]', 'Bye', '$array_inscrisi_id_fav12[0]', '', '$array_inscrisi_country_fav12[0]', '', '16', '$fav12Q[0]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '2', '$nefav[0]', '$nefav[1]', '$nefav[0]', '$nefav[1]', '$array_inscrisi_id_nefav[0]', '$array_inscrisi_id_nefav[1]', '$array_inscrisi_country_nefav[0]', '$array_inscrisi_country_nefav[1]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '3', '$nefav[2]', '$nefav[3]', '$nefav[2]', '$nefav[3]', '$array_inscrisi_id_nefav[2]', '$array_inscrisi_id_nefav[3]', '$array_inscrisi_country_nefav[2]', '$array_inscrisi_country_nefav[3]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '4', '$nefav[4]', '$fav34[0]', '$nefav[4]', '$fav34Q[0]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_id_fav34[0]', '$array_inscrisi_country_nefav[4]', '$array_inscrisi_country_fav34[0]', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '5', '$fav34[1]', '$nefav[5]', '$fav34Q[1]', '$nefav[5]', '$array_inscrisi_id_fav34[1]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_country_fav34[1]', '$array_inscrisi_country_nefav[5]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '6', '$nefav[6]', '$nefav[7]', '$nefav[6]', '$nefav[7]', '$array_inscrisi_id_nefav[6]', '$array_inscrisi_id_nefav[7]', '$array_inscrisi_country_nefav[6]', '$array_inscrisi_country_nefav[7]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '7', '$nefav[8]', '$nefav[9]', '$nefav[8]', '$nefav[9]', '$array_inscrisi_id_nefav[8]', '$array_inscrisi_id_nefav[9]', '$array_inscrisi_country_nefav[8]', '$array_inscrisi_country_nefav[9]', '16')"); 
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '8', 'Bye', '$fav12[1]', 'Bye', '$fav12Q[1]', '', '$array_inscrisi_id_fav12[1]', '', '$array_inscrisi_country_fav12[1]', '16', '$fav12Q[1]', 'Bye', 'Bye')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '9', '$fav12[0]', '$fav12Q[0]', '$array_inscrisi_id_fav12[0]', '$array_inscrisi_country_fav12[0]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '10', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '11', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '12', '$fav12[1]', '$fav12Q[1]', '$array_inscrisi_id_fav12[1]', '$array_inscrisi_country_fav12[1]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '13', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '14', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '15', '16')");
				mysqli_query($server, "DELETE FROM `inscrisi` WHERE `Tid`='$tid'");			
			}elseif(count($nefav) == 9){//facut si merge
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '1', '$fav12[0]', 'Bye', '$fav12Q[0]', 'Bye', '$array_inscrisi_id_fav12[0]', '', '$array_inscrisi_country_fav12[0]', '', '16', '$fav12Q[0]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '2', '$nefav[0]', '$nefav[1]', '$nefav[0]', '$nefav[1]', '$array_inscrisi_id_nefav[0]', '$array_inscrisi_id_nefav[1]', '$array_inscrisi_country_nefav[0]', '$array_inscrisi_country_nefav[1]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '3', '$nefav[2]', '$nefav[3]', '$nefav[2]', '$nefav[3]', '$array_inscrisi_id_nefav[2]', '$array_inscrisi_id_nefav[3]', '$array_inscrisi_country_nefav[2]', '$array_inscrisi_country_nefav[3]', '16')");     
				if (strpos($fav34[0], '(4)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '4', '$nefav[4]', '$fav34[0]', '$nefav[4]', '$fav34Q[0]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_id_fav34[0]', '$array_inscrisi_country_nefav[4]', '$array_inscrisi_country_fav34[0]', '32')");
				}else{
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '4', 'Bye', '$fav34[0]', 'Bye', '$fav34Q[0]', '', '$array_inscrisi_id_fav34[0]', '', '$array_inscrisi_country_fav34[0]', '32', '$fav34Q[0]', 'Bye', 'Bye')");
				}
				if (strpos($fav34[1], '(4)') !== false) {
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '5', '$fav34[1]', '$nefav[4]', '$fav34Q[1]', '$nefav[4]', '$array_inscrisi_id_fav34[1]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_country_fav34[1]', '$array_inscrisi_country_nefav[4]', '32')");
				}else{
					mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '5', '$fav34[1]', 'Bye', '$fav34Q[1]', 'Bye', '$array_inscrisi_id_fav34[1]', '', '$array_inscrisi_country_fav34[1]', '', '32', '$fav34Q[1]', 'Bye', 'Bye')");     
				}
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '6', '$nefav[5]', '$nefav[6]', '$nefav[5]', '$nefav[6]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_id_nefav[6]', '$array_inscrisi_country_nefav[5]', '$array_inscrisi_country_nefav[6]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '7', '$nefav[7]', '$nefav[8]', '$nefav[7]', '$nefav[8]', '$array_inscrisi_id_nefav[7]', '$array_inscrisi_id_nefav[8]', '$array_inscrisi_country_nefav[7]', '$array_inscrisi_country_nefav[8]', '16')"); 
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '8', 'Bye', '$fav12[1]', 'Bye', '$fav12Q[1]', '', '$array_inscrisi_id_fav12[1]', '', '$array_inscrisi_country_fav12[1]', '16', '$fav12Q[1]', 'Bye', 'Bye')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '9', '$fav12[0]', '$fav12Q[0]', '$array_inscrisi_id_fav12[0]', '$array_inscrisi_country_fav12[0]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '10', '$fav34[0]', '$fav34Q[0]', '$array_inscrisi_id_fav34[0]', '$array_inscrisi_country_fav34[0]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '11', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '12', '$fav12[1]', '$fav12Q[1]', '$array_inscrisi_id_fav12[1]', '$array_inscrisi_country_fav12[1]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '13', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '14', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '15', '16')");
				mysqli_query($server, "DELETE FROM `inscrisi` WHERE `Tid`='$tid'");		
			}elseif(count($nefav) == 8){//facut si merge
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '1', '$fav12[0]', 'Bye', '$fav12Q[0]', 'Bye', '$array_inscrisi_id_fav12[0]', '', '$array_inscrisi_country_fav12[0]', '', '16', '$fav12Q[0]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '2', '$nefav[0]', '$nefav[1]', '$nefav[0]', '$nefav[1]', '$array_inscrisi_id_nefav[0]', '$array_inscrisi_id_nefav[1]', '$array_inscrisi_country_nefav[0]', '$array_inscrisi_country_nefav[1]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '3', '$nefav[2]', '$nefav[3]', '$nefav[2]', '$nefav[3]', '$array_inscrisi_id_nefav[2]', '$array_inscrisi_id_nefav[3]', '$array_inscrisi_country_nefav[2]', '$array_inscrisi_country_nefav[3]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '4', 'Bye', '$fav34[0]', 'Bye', '$fav34Q[0]', '', '$array_inscrisi_id_fav34[0]', '', '$array_inscrisi_country_fav34[0]', '16', '$fav34Q[0]', 'Bye', 'Bye')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '5', '$fav34[1]', 'Bye', '$fav34Q[1]', 'Bye', '$array_inscrisi_id_fav34[1]', '', '$array_inscrisi_country_fav34[1]', '', '16', '$fav34Q[1]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '6', '$nefav[4]', '$nefav[5]', '$nefav[4]', '$nefav[5]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_country_nefav[4]', '$array_inscrisi_country_nefav[5]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '7', '$nefav[6]', '$nefav[7]', '$nefav[6]', '$nefav[7]', '$array_inscrisi_id_nefav[6]', '$array_inscrisi_id_nefav[7]', '$array_inscrisi_country_nefav[6]', '$array_inscrisi_country_nefav[7]', '16')"); 
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '8', 'Bye', '$fav12[1]', 'Bye', '$fav12Q[1]', '', '$array_inscrisi_id_fav12[1]', '', '$array_inscrisi_country_fav12[1]', '16', '$fav12Q[1]', 'Bye', 'Bye')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '9', '$fav12[0]', '$fav12Q[0]', '$array_inscrisi_id_fav12[0]', '$array_inscrisi_country_fav12[0]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '10', '$fav34[0]', '$fav34Q[0]', '$array_inscrisi_id_fav34[0]', '$array_inscrisi_country_fav34[0]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '11', '$fav34[1]', '$fav34Q[1]', '$array_inscrisi_id_fav34[1]', '$array_inscrisi_country_fav34[1]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '12', '$fav12[1]', '$fav12Q[1]', '$array_inscrisi_id_fav12[1]', '$array_inscrisi_country_fav12[1]', '16')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '13', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '14', '16')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '15', '16')");
				mysqli_query($server, "DELETE FROM `inscrisi` WHERE `Tid`='$tid'");		
			}
		}
		
		//generare tablou 8
		if($nr_inscrisi>4 && $nr_inscrisi<9){
			
			mysqli_query($server, "UPDATE `turnee` SET `Draw`='8' WHERE `id`='$tid'");     
			
			$fav12 = array_slice($array_inscrisi, 0, 2);
			$nefav = array_slice($array_inscrisi, 2);
		
			$fav12[0] = $fav12[0]." (1)";
			$fav12[1] = $fav12[1]." (2)";
		
			shuffle($nefav);
		
			$fav12Q = array();
			$array_inscrisi_id_fav12 = array();
			$array_inscrisi_country_fav12 = array();	
			$array_inscrisi_id_nefav = array();
			$array_inscrisi_country_nefav = array();
		
			for ($a=0;$a<2;$a++){
				$fav12Q[$a] = strtok($fav12[$a], " ");
				$result_inscrisi_id_country_fav12 = mysqli_query($server, "SELECT `Pid`, `Country` from inscrisi WHERE `Tid`='$tid' AND `Username`='$fav12Q[$a]'");     
				$row1 = mysqli_fetch_assoc($result_inscrisi_id_country_fav12);
				$array_inscrisi_id_fav12[$a] = $row1['Pid'];
				$array_inscrisi_country_fav12[$a] = $row1['Country'];
			}
			for ($d=0;$d<6;$d++){
				$result_inscrisi_id_country_nefav = mysqli_query($server, "SELECT `Pid`, `Country` from inscrisi WHERE `Tid`='$tid' AND `Username`='$nefav[$d]'");     
				$row4 = mysqli_fetch_assoc($result_inscrisi_id_country_nefav);
				$array_inscrisi_id_nefav[] = $row4['Pid'];
				$array_inscrisi_country_nefav[] = $row4['Country'];
			}
			
			if(count($nefav) == 6){//facut si merge
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '1', '$fav12[0]', '$nefav[0]', '$fav12Q[0]', '$nefav[0]', '$array_inscrisi_id_fav12[0]', '$array_inscrisi_id_nefav[0]', '$array_inscrisi_country_fav12[0]', '$array_inscrisi_country_nefav[0]', '8')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '2', '$nefav[1]', '$nefav[2]', '$nefav[1]', '$nefav[2]', '$array_inscrisi_id_nefav[1]', '$array_inscrisi_id_nefav[2]', '$array_inscrisi_country_nefav[1]', '$array_inscrisi_country_nefav[2]', '8')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '3', '$nefav[3]', '$nefav[4]', '$nefav[3]', '$nefav[4]', '$array_inscrisi_id_nefav[3]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_country_nefav[3]', '$array_inscrisi_country_nefav[4]', '8')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '4', '$nefav[5]', '$fav12[1]', '$nefav[5]', '$fav12Q[1]', '$array_inscrisi_id_nefav[5]', '$array_inscrisi_id_fav12[1]', '$array_inscrisi_country_nefav[5]', '$array_inscrisi_country_fav12[1]', '8')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '5', '8')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '6', '8')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '7', '8')");
				mysqli_query($server, "DELETE FROM `inscrisi` WHERE `Tid`='$tid'");				
			}elseif(count($nefav) == 5){//facut si merge
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '1', '$fav12[0]', 'Bye', '$fav12Q[0]', 'Bye', '$array_inscrisi_id_fav12[0]', '', '$array_inscrisi_country_fav12[0]', '', '8', '$fav12Q[0]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '2', '$nefav[0]', '$nefav[1]', '$nefav[0]', '$nefav[1]', '$array_inscrisi_id_nefav[0]', '$array_inscrisi_id_nefav[1]', '$array_inscrisi_country_nefav[0]', '$array_inscrisi_country_nefav[1]', '8')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '3', '$nefav[2]', '$nefav[3]', '$nefav[2]', '$nefav[3]', '$array_inscrisi_id_nefav[2]', '$array_inscrisi_id_nefav[3]', '$array_inscrisi_country_nefav[2]', '$array_inscrisi_country_nefav[3]', '8')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '4', '$nefav[4]', '$fav12[1]', '$nefav[4]', '$fav12Q[1]', '$array_inscrisi_id_nefav[4]', '$array_inscrisi_id_fav12[1]', '$array_inscrisi_country_nefav[4]', '$array_inscrisi_country_fav12[1]', '8')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '5', '$fav12[0]', '$fav12Q[0]', '$array_inscrisi_id_fav12[0]', '$array_inscrisi_country_fav12[0]', '8')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '6', '8')");
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '7', '8')");
				mysqli_query($server, "DELETE FROM `inscrisi` WHERE `Tid`='$tid'");				
			}elseif(count($nefav) == 4){//facut si merge
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '1', '$fav12[0]', 'Bye', '$fav12Q[0]', 'Bye', '$array_inscrisi_id_fav12[0]', '', '$array_inscrisi_country_fav12[0]', '', '8', '$fav12Q[0]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '2', '$nefav[0]', '$nefav[1]', '$nefav[0]', '$nefav[1]', '$array_inscrisi_id_nefav[0]', '$array_inscrisi_id_nefav[1]', '$array_inscrisi_country_nefav[0]', '$array_inscrisi_country_nefav[1]', '8')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '3', '$nefav[2]', '$nefav[3]', '$nefav[2]', '$nefav[3]', '$array_inscrisi_id_nefav[2]', '$array_inscrisi_id_nefav[3]', '$array_inscrisi_country_nefav[2]', '$array_inscrisi_country_nefav[3]', '8')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player2`, `Player1Q`, `Player2Q`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Draw`, `Winner`, `Loser`, `Score`) VALUES ('$tid', '$competitie', '4', 'Bye', '$fav12[1]', 'Bye', '$fav12Q[1]', '', '$array_inscrisi_id_fav12[1]', '', '$array_inscrisi_country_fav12[1]', '8', '$fav12Q[1]', 'Bye', 'Bye')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player1`, `Player1Q`, `Player1id`, `Player1country`, `Draw`) VALUES ('$tid', '$competitie', '5', '$fav12[0]', '$fav12Q[0]', '$array_inscrisi_id_fav12[0]', '$array_inscrisi_country_fav12[0]', '8')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Player2`, `Player2Q`, `Player2id`, `Player2country`, `Draw`) VALUES ('$tid', '$competitie', '6', '$fav12[1]', '$fav12Q[1]', '$array_inscrisi_id_fav12[1]', '$array_inscrisi_country_fav12[1]', '8')");     
				mysqli_query($server, "INSERT INTO `rezultate` (`Tid`, `Tournament`, `Meci`, `Draw`) VALUES ('$tid', '$competitie', '7', '8')");
				mysqli_query($server, "DELETE FROM `inscrisi` WHERE `Tid`='$tid'");
			}			
		}
	}	
	
	//display Round1
	
	$array_player = array();
	
	for ($e=1;$e<=32;$e++){
		$meci = mysqli_query($server, "SELECT `Player1`, `Player2`, `Player1id`, `Player2id`, `Player1country`, `Player2country` FROM rezultate WHERE `Tid`='$tid' AND `Meci`='$e'");     
		$rowM = mysqli_fetch_assoc($meci);
		$Player1 = $rowM['Player1'];
		$Player2 = $rowM['Player2'];
		$Player1id = $rowM['Player1id'];
		$Player2id = $rowM['Player2id'];
		$Player1country = $rowM['Player1country'];
		$Player2country = $rowM['Player2country'];
		
		if (($Player1 == trim($Player1) && strpos($Player1, ' ') !== false) && ($Player2 == trim($Player2) && strpos($Player2, ' ') == false) && ($Player1 != "Bye") && ($Player2 != "Bye")) {
			$array_player[$e-1] = "<a href='profile.php?pid=$Player1id' style='color: #2e6291;font-weight:bold;'><img alt='' src='Myimages/Flags/Small/$Player1country.png' style='margin-right: 5px;vertical-align: text-top;'>$Player1</a><br><a href='profile.php?pid=$Player2id' style='color: #2e6291;'><img alt='' src='Myimages/Flags/Small/$Player2country.png' style='margin-right: 5px;vertical-align: text-top;'>$Player2</a>";
		}elseif (($Player1 == trim($Player1) && strpos($Player1, ' ') == false)  && ($Player2 == trim($Player2) && strpos($Player2, ' ') !== false) && ($Player1 != "Bye") && ($Player2 != "Bye")){
			$array_player[$e-1] = "<a href='profile.php?pid=$Player1id' style='color: #2e6291;'><img alt='' src='Myimages/Flags/Small/$Player1country.png' style='margin-right: 5px;vertical-align: text-top;'>$Player1</a><br><a href='profile.php?pid=$Player2id' style='color: #2e6291;font-weight:bold;'><img alt='' src='Myimages/Flags/Small/$Player2country.png' style='margin-right: 5px;vertical-align: text-top;'>$Player2</a>";
		}elseif (($Player1 == trim($Player1) && strpos($Player1, ' ') == false)  && ($Player2 == trim($Player2) && strpos($Player2, ' ') == false) && ($Player1 != "Bye") && ($Player2 != "Bye")){
			$array_player[$e-1] = "<a href='profile.php?pid=$Player1id' style='color: #2e6291;'><img alt='' src='Myimages/Flags/Small/$Player1country.png' style='margin-right: 5px;vertical-align: text-top;'>$Player1</a><br><a href='profile.php?pid=$Player2id' style='color: #2e6291;'><img alt='' src='Myimages/Flags/Small/$Player2country.png' style='margin-right: 5px;vertical-align: text-top;'>$Player2</a>";
		}elseif (($Player1 == trim($Player1) && strpos($Player1, ' ') !== false) && ($Player2 == "Bye")) {
			$array_player[$e-1] = "<a href='profile.php?pid=$Player1id' style='color: #2e6291;font-weight:bold;'><img alt='' src='Myimages/Flags/Small/$Player1country.png' style='margin-right: 5px;vertical-align: text-top;'>$Player1</a><br><div>Bye</div>";
		}elseif (($Player1 == trim($Player1) && strpos($Player1, ' ') == false) && ($Player2 == "Bye")) {
			$array_player[$e-1] = "<a href='profile.php?pid=$Player1id' style='color: #2e6291;'><img alt='' src='Myimages/Flags/Small/$Player1country.png' style='margin-right: 5px;vertical-align: text-top;'>$Player1</a><br><div>Bye</div>";
		}elseif (($Player2 == trim($Player2) && strpos($Player2, ' ') !== false) && ($Player1 == "Bye")) {
			$array_player[$e-1] = "<div>Bye</div><a href='profile.php?pid=$Player2id' style='color: #2e6291;font-weight:bold;'><img alt='' src='Myimages/Flags/Small/$Player2country.png' style='margin-right: 5px;vertical-align: text-top;'>$Player2</a>";
		}elseif (($Player2 == trim($Player2) && strpos($Player2, ' ') == false) && ($Player1 == "Bye")) {
			$array_player[$e-1] = "<div>Bye</div><a href='profile.php?pid=$Player2id' style='color: #2e6291;'><img alt='' src='Myimages/Flags/Small/$Player2country.png' style='margin-right: 5px;vertical-align: text-top;'>$Player2</a>";
		}

	}
	
	//display winners
	$array_winner = array();
	$array_score = array();
	
	for ($e=1;$e<=31;$e++){		
		$username_paranteza = mysqli_query($server, "SELECT `Player1`, `Player2`, `Player1id`, `Player2id`, `Player1country`, `Player2country`, `Winner`, `Score` FROM rezultate WHERE `Tid`='$tid' AND `Meci`='$e'");     
		$rowP = mysqli_fetch_assoc($username_paranteza);
		$player1 = $rowP['Player1'];
		$player2 = $rowP['Player2'];
		$player1id = $rowP['Player1id'];
		$player2id = $rowP['Player2id'];
		$player1country = $rowP['Player1country'];
		$player2country = $rowP['Player2country'];
		$winner = $rowP['Winner'];
		
		if($winner == $player1 && $winner != "" && $player1 != ""){
			$array_winner[$e-1] = "<a href='profile.php?pid=$player1id' style='color: #2e6291;'><img alt='' src='Myimages/Flags/Small/$player1country.png' style='margin-right: 5px;vertical-align: text-top;'>$player1</a>";
		}elseif($winner == $player2 && $winner != "" && $player2 != ""){
			$array_winner[$e-1] = "<a href='profile.php?pid=$player2id' style='color: #2e6291;'><img alt='' src='Myimages/Flags/Small/$player2country.png' style='margin-right: 5px;vertical-align: text-top;'>$player2</a>";
		}elseif($winner == strtok($player1, " ") && $winner != "" && $player1 != ""){
			$array_winner[$e-1] = "<a href='profile.php?pid=$player1id' style='color: #2e6291;font-weight: bold;'><img alt='' src='Myimages/Flags/Small/$player1country.png' style='margin-right: 5px;vertical-align: text-top;'>$player1</a>";		
		}elseif($winner == strtok($player2, " ") && $winner != "" && $player2 != ""){
			$array_winner[$e-1] = "<a href='profile.php?pid=$player2id' style='color: #2e6291;font-weight: bold;'><img alt='' src='Myimages/Flags/Small/$player2country.png' style='margin-right: 5px;vertical-align: text-top;'>$player2</a>";		
		}

		$array_score[$e-1] = $rowP['Score'];
	}
	
	?>

<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAw4LsAKOK+AAAAAAAZ9N8AFO7PABr26gAW+eoAEfPaACH19QCH//4AGfXlABLszQAk9e0AHevYAB/28wAh9vMAH/X2AB726wBZ5ssANuPNACH24wA33K8AGfb0ABjv1gAX9fcAGu/WABP57AAc8eEAHvfpABP47wBL+NwAHPbsAA/w1AAY7tEAHvThADPdrQAY7dQAY+TJACnisAAy58sAE/ryACftwwAd89wAGvTqAB/z3AAk47YAY//pAGHu3wAe9/IAK8ysACT08gAh9/IAEerVAC/fwQAh9OoAGO3dABz4+AAe9+IAGfjwABr25QAU8uAAD+jTACffqQAN79AAGvfzABX76AAh1qoAI+m/ABr29gA25s8AJem/ABPx2wAW79AAHe7CABT48QAY8tAAJuPIABb48QBE488AIfLYABfx0wAo8eMAJOXLABjjsAAe+PEAH/HTACPt1gAV79EAO+nYADHy2AAk+eYAKO/hAIf+9QAe+uwAG+7UAB774QAb9eoAGvf1ABL58AAa+OIAHO3HABDs2wAS3aoAHuvVACf46gAm5rEAGPjzABT78wAY990ALerPAErrywAe9N0AJda1AHDx4gAe8+AATuTGACLkrwAe8NgAIvfdABP35gAV9+YAHt+tACHw0AAi6sgAHOrAAH3//QAd9+YAM9y1ACDjuwAg6cMAHPDZACXhsAAX6skAJOa7AC3kuAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgICAgJ7QjExQkICAgICAgICAntzf3lTZoMVMUICAgICAnt9fUI+aXQmIzF9QgICAntJSUl9hi2FRoBwfUlCAgJuQ0lJfX0EVyFIXgkAEgIZASl8hF99bAMUOTd9LjVCe3uBZAtffWM7NmArfR4nJXtLelU/X31dVA9hFjx9TC97UE92X319OkAQRBh3fVlxGRksbyp9H01qDzA4Ckl9JRkZG2V9fQwzDggySmhJfTECWFFBfXUGHWsoYhpbSX0CAoKCB1wgOxwRBXh+NElOAgICgm19RQ1aInJnF05OAgICAgKCfXtWPUckUhNOAgICAgICAgJ9Tk5OTk4CAgICAvgfAADgBwAAwAMAAIABAACAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgAEAAIABAADAAwAA4AcAAPgfAAA=" rel="icon" type="image/x-icon">
	<link href="Mycss/stylep.css" rel="stylesheet">
	<link href="Mycss/RegLog.css" rel="stylesheet">
	<title>Tournament info</title>
	<style>
	   #inscrie-te, #regulament {
	   background-color: #00c000;
	   color: white;
	   text-shadow: 0 -1px rgba(0, 0, 0, 0.25);
	   background-image: linear-gradient(rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0.1));
	   background-origin: border-box;
	   border: 1px solid rgba(0, 0, 0, 0.1);
	   box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1), 0 1px rgba(255, 255, 255, 0.1) inset;
	   border-radius: 0.25em;
	   cursor: pointer;
	   display: inline-block;
	   font-size: 16px;
	   line-height: 1.5;
	   margin: 0.5em 0.5em 0 0;
	   padding: 0.25em 1em;
	   text-align: center;
	   white-space: nowrap;
	   font-weight: bold;
	}
	#inscrie-te:hover, #regulament:hover{
	       background-image: -webkit-linear-gradient(rgba(128, 128, 128, 0.1), rgba(0, 0, 0, 0.1));
	       background-image: linear-gradient(rgba(128, 128, 128, 0.1), rgba(0, 0, 0, 0.1));
	   }

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
			<script async src="https://www.google-analytics.com/analytics.js">
			</script>
			<script async src="https://www.google-analytics.com/analytics.js">
			</script>
			<script src="Myjs/jquery-1.12.0.min.js">
			</script> 
			<script src="Myjs/index.js">
			</script>
		</div>
		<div><img alt="" height="235" src="Myimages/logodmt.jpg" style="box-shadow: 0 6px 20px -4px black;" width="1101"></div>
		<div style="background:rgba(43, 125, 166, 0.18);padding-top: 50px;padding-bottom: 70px;min-height: 1300px;">
			<br>
			<div id="alb" style="padding-bottom: 20px;background: white;padding-top: 25px;box-shadow: 0 0px 8px #656565;width: 87%;margin: 0 auto;padding-left: 30px;font-family: 'Arial',Helvetica,Arial,Sans-Serif;">
				<table>
				<tr>
				<td style="width: 49%;">
					<div style=" font-size: 20px; font-weight: bold;">
					<?php echo $competitie;?>
					</div><br><br>
					<div style=" font-size: 15px; display: inline-block; font-weight: bold; width: 132px; text-align: right; margin-right: 5px;vertical-align: text-top; margin-bottom: 20px;">
						Period:
					</div>
					<div style=" display: inline-block;">
						<?php echo $data_incepere3." - ".$data_incheiere3;?>
					</div><br>
					<div style=" font-size: 15px; display: inline-block; font-weight: bold; width: 132px; text-align: right; margin-right: 5px;vertical-align: text-top; margin-bottom: 20px;">
						Signup period:
					</div>
					<div style=" display: inline-block;">
						<?php echo $data_incepere_inscriere3." - ".$data_incheiere_inscriere3;?>
					</div><br>
					<div style=" font-size: 15px; display: inline-block; font-weight: bold; text-align: right; margin-right: 5px;vertical-align: text-top; margin-bottom: 20px; width: 132px;">
						Location:
					</div>
					<div style=" font-size: 15px; display: inline-block;">
						<?php echo $location;?>
					</div><br>
					<div style=" font-size: 15px; display: inline-block; font-weight: bold; text-align: right; margin-right: 5px;vertical-align: text-top; margin-bottom: 20px; width: 132px;">
						Surface:
					</div>
					<div style=" font-size: 15px; display: inline-block;">
						<?php echo $surface;?>
					</div><br>	
					<div style=" font-size: 15px; display: inline-block; font-weight: bold; text-align: right; margin-right: 5px;vertical-align: text-top; margin-bottom: 20px; width: 132px;">
						Sets:
					</div>
					<div style=" font-size: 15px; display: inline-block;">
						<?php echo $sets;?>
					</div><br>	
					<div style=" font-size: 15px; display: inline-block; font-weight: bold; text-align: right; margin-right: 5px;vertical-align: text-top; margin-bottom: 20px; width: 132px;">
						Type:
					</div>
					<div style=" font-size: 15px; display: inline-block;">
						<?php echo $type;?>
					</div><br>					
					<div style=" font-size: 15px; display: inline-block; font-weight: bold; text-align: right; margin-right: 5px;vertical-align: text-top; vertical-align: top; width: 132px;">
						Points:
					</div>
					<div style=" font-size: 15px; display: inline-block; width: 300px; margin-bottom: 40px;">
					<?php
					$len1=count($points1);
					for ($i=0;$i<$len1;$i++){
						if($i%2==0){
							echo "<div style='width: 110px;display:inline-block;font-weight:bold;'>$points1[$i]</div><span>$points2[$i]</span><br>";
						}else{
							echo "<div style='width: 110px;display:inline-block;font-weight:bold;line-height: 2;'>$points1[$i]</div><span style='line-height: 2;'>$points2[$i]</span><br>";
						}
					}
					?>
					</div><br>

					<?php
					//afisare buton register/retire
					$result1 = mysqli_query($server, "SELECT `Tid` FROM rezultate WHERE `Tid` = '$tid'");
 
					if(mysqli_num_rows($result1) == 0){
						$query_inscris = mysqli_query($server, "SELECT `Pid`, `Tid` FROM inscrisi WHERE `Pid`='$pid' AND `Tid`='$tid'");
						$query_tablou_existent = mysqli_query($server, "SELECT `Tid` FROM rezultate WHERE `Tid`='$tid'");
						if((mysqli_num_rows($query_inscris) == 0) && (mysqli_num_rows($query_tablou_existent) == 0)){
							echo "<form action='' method='post' style='display:inline-block;margin-bottom: 30px;'>
								<input type='hidden' name='pid' value='$pid'>
								<input type='hidden' name='username' value='$username'>
								<input type='hidden' name='country' value='$country'>
								<input type='hidden' name='tid' value='$tid'>
								<input id='inscrie-te' name='inscrie-te' type='submit' value='Register'>
								</form>
								<div style='display:inline-block;margin-top: 5px;color: red;'>$registerErr</div>";
						}elseif((mysqli_num_rows($query_inscris) == 1) && (mysqli_num_rows($query_tablou_existent) == 0)){
							echo "<form action='' method='post' style='display: inline-block;margin-bottom: 30px;'>
								<input type='hidden' name='pid' value='$pid'>
								<input type='hidden' name='tid' value='$tid'>
								<input id='regulament' name='retrage-te' type='submit' value='Retire' style='background-color: #d24500;'>
								</form>";							
						}
						if((isset($_SESSION["username"])) && ($_SESSION["username"] == "Cronos") && (mysqli_num_rows($query_tablou_existent) == 0)){
							echo "<form action='' method='post' style='margin-left: 260px;display: inline-block;'>
								<input id='generare' name='generare' type='submit' value='Set draw'>
							</form>";
						}
					}					
					?>

				</td>
				<td>
					<img alt="" src="Myimages/TLOGOS/<?php echo $city; ?>-logo.jpg" style="width: 286px;height: 150px;"><img alt="" src="Myimages/TLOGOS/<?php if($type=="DMT 250"){echo "250.png";}elseif($type=="DMT 500"){echo "500.png";}elseif($type=="DMT 1000"){echo "1000.png";}elseif($type=="Grand Slam"){echo "grandslam.png";}elseif($type=="DMT FUN"){echo "fun.png";} ?>" style="width: 135px;height: 150px;margin-left: 25px;">
					<img alt="" src="Myimages/TLOGOS/<?php echo $city; ?>.jpg" style="width: 446px;height: 286px;margin-top: 25px;box-shadow: 0 0px 10px #040404;">
				</td>
				</tr>
				<tr>
				<td colspan="2">
				<?php
					//afisare lista jucatori inscrisi
					$query_lista_inscrisi = mysqli_query($server, "SELECT `Pid`, `Username`, `Country` FROM inscrisi WHERE Tid='$tid' ORDER BY Rank");
					$counter = 1;
					while($rowR = mysqli_fetch_assoc($query_lista_inscrisi)) {
						
						$pidL = $rowR["Pid"];
						$usernameL = $rowR["Username"];
						$countryL = $rowR["Country"];
												
						if ($counter % 8 == 1){
							echo "<div style='margin-right: 25px;vertical-align: top;display:inline-block;'>";
						}
						echo "<img alt='' src='Myimages/Flags/Small/$countryL.png' style='margin-right: 5px;vertical-align: text-top;'><a href='profile.php?pid=$pidL' style='color: #2e6291;'>$usernameL</a><br>";
						if ($counter % 8 == 0){
							echo "</div>";
						}
						$counter++;
					}
		
				?>
				</td>
				</tr>
				</table>
			</div>
			
			
			
			<div style=" font-size: 20px; font-weight: bold; font-family: 'Arial',Helvetica,Arial,Sans-Serif; margin-top: 50px; margin-bottom: 20px; margin-left: 60px;">
				Draw <span style="font-size:18px;"></span>
			</div>
			
			<?php if($draw == 32){
			
			echo "<table cellpadding='3' style='width: 90%;margin-left: 60px;font-family:Arial,Helvetica,Arial,Sans-Serif;font-size: 15px;border-spacing: 0px;box-shadow: 0 0px 8px #656565;'>
    <tbody>
        <tr style='text-align: center; font-weight: bold; color: white; background: -webkit-linear-gradient(top,#939393,#4b4b4b); background: -o-linear-gradient(top,#9f3210,#471708); background: -moz-linear-gradient(top,#9f3210,#471708);'>
            <td style='width: 16.66666667%; padding-top: 13px; padding-bottom: 13px; border-right: 1px solid #4c4c4c; border-bottom: 1px solid #1c6184;'>R32</td>

            <td style='width: 16.66666667%; border-right: 1px solid #4c4c4c;'>R16</td>

            <td style='width: 16.66666667%; border-right: 1px solid #4c4c4c;'>Q-Final</td>

            <td style='width: 16.66666667%; border-right: 1px solid #4c4c4c;'>S-Final</td>

            <td style='width: 16.66666667%; border-right: 1px solid #4c4c4c;'>Final</td>

            <td style=' width: 16.66666667%;'>Winner</td>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style='background: #ECF0F1; border-right: 1px solid #959595; border-bottom: 1px solid #959595;'>".$array_player[0]."</td>

            <td colspan='1' rowspan='4' style='padding-top:7px;background: #ECF0F1;border-right: 1px solid #959595;border-bottom: 1px solid #959595;text-align:center;'>
                ".$array_winner[0]."<br>

                <div style='margin-bottom: 3px;'>
                    ".$array_score[0]."
                </div>".$array_winner[1]."<br>

                <div>
                    ".$array_score[1]."
                </div>
            </td>

            <td colspan='1' rowspan='8' style='padding-top: 7px;text-align:center;background: #ECF0F1;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>
                ".$array_winner[16]."<br>

                <div style='margin-bottom: 29px;'>
                    ".$array_score[16]."
                </div>".$array_winner[17]."<br>

                <div>
                    ".$array_score[17]."
                </div>
            </td>

            <td colspan='1' rowspan='16' style='text-align:center;background: #ECF0F1;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>
                ".$array_winner[24]."<br>

                <div style='margin-bottom: 90px;'>
                    ".$array_score[24]."
                </div>".$array_winner[25]."<br>

                <div>
                    ".$array_score[25]."
                </div>
            </td>

            <td colspan='1' rowspan='32' style='text-align:center;background: #ECF0F1;border-right: 1px solid #959595;'>
                ".$array_winner[28]."<br>

                <div style='margin-bottom: 243px;'>
                    ".$array_score[28]."
                </div>".$array_winner[29]."<br>

                <div>
                    ".$array_score[29]."
                </div>
            </td>

            <td rowspan='32' style='text-align:center;background: #D0D3D4;'>
                <div style='vertical-align: middle;height: 36px;'>
                    ".$array_winner[30]."<br>

                    <div style='margin-bottom: 243px;'>
                        ".$array_score[30]."
                    </div>
                </div>
            </td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style='background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>".$array_player[1]."</td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style=' background: #ECF0F1; border-right: 1px solid #959595; border-bottom: 1px solid #959595;'>".$array_player[2]."</td>

            <td colspan='1' rowspan='4' style='background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;text-align:center;padding-top:7px;'>
                ".$array_winner[2]."<br>

                <div style='margin-bottom: 3px;'>
                    ".$array_score[2]."
                </div>".$array_winner[3]."<br>

                <div>
                    ".$array_score[3]."
                </div>
            </td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style='background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>".$array_player[3]."</td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style=' background: #ECF0F1; border-right: 1px solid #959595; border-bottom: 1px solid #959595;'>".$array_player[4]."</td>

            <td colspan='1' rowspan='4' style='text-align:center;padding-top:7px;background: #ECF0F1;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>
                ".$array_winner[4]."<br>

                <div style='margin-bottom: 3px;'>
                    ".$array_score[4]."
                </div>".$array_winner[5]."<br>

                <div>
                    ".$array_score[5]."
                </div>
            </td>

            <td colspan='1' rowspan='8' style='padding-top: 7px;text-align:center;background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>
                ".$array_winner[18]."<br>

                <div style='margin-bottom: 29px;'>
                    ".$array_score[18]."
                </div>".$array_winner[19]."<br>

                <div>
                    ".$array_score[19]."
                </div>
            </td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style='background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>".$array_player[5]."</td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style=' background: #ECF0F1; border-right: 1px solid #959595; border-bottom: 1px solid #959595;'>".$array_player[6]."</td>

            <td colspan='1' rowspan='4' style='text-align:center;padding-top:7px;background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>
                ".$array_winner[6]."<br>

                <div style='margin-bottom: 3px;'>
                    ".$array_score[6]."
                </div>".$array_winner[7]."<br>

                <div>
                    ".$array_score[7]."
                </div>
            </td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style='background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>".$array_player[7]."</td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style=' background: #ECF0F1; border-right: 1px solid #959595; border-bottom: 1px solid #959595;'>".$array_player[8]."</td>

            <td colspan='1' rowspan='4' style='text-align:center;padding-top:7px;background: #ECF0F1;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>
                ".$array_winner[8]."<br>

                <div style='margin-bottom: 3px;'>
                    ".$array_score[8]."
                </div>".$array_winner[9]."<br>

                <div>
                    ".$array_score[9]."
                </div>
            </td>

            <td colspan='1' rowspan='8' style='padding-top: 7px;text-align:center;background: #ECF0F1;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>
                ".$array_winner[20]."<br>

                <div style='margin-bottom: 29px;'>
                    ".$array_score[20]."
                </div>".$array_winner[21]."<br>

                <div>
                    ".$array_score[21]."
                </div>
            </td>

            <td colspan='1' rowspan='16' style='text-align:center;background: #D0D3D4;border-right: 1px solid #959595;'>
                ".$array_winner[26]."<br>

                <div style='margin-bottom: 90px;'>
                    ".$array_score[26]."
                </div>".$array_winner[27]."<br>

                <div>
                    ".$array_score[27]."
                </div>
            </td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style='background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>".$array_player[9]."</td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style=' background: #ECF0F1; border-right: 1px solid #959595; border-bottom: 1px solid #959595;'>".$array_player[10]."</td>

            <td colspan='1' rowspan='4' style='text-align:center;padding-top:7px;background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>
                ".$array_winner[10]."<br>

                <div style='margin-bottom: 3px;'>
                    ".$array_score[10]."
                </div>".$array_winner[11]."<br>

                <div>
                    ".$array_score[11]."
                </div>
            </td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style='background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>".$array_player[11]."</td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style=' background: #ECF0F1; border-right: 1px solid #959595; border-bottom: 1px solid #959595;'>".$array_player[12]."</td>

            <td colspan='1' rowspan='4' style='text-align:center;padding-top:7px;background: #ECF0F1;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>
                ".$array_winner[12]."<br>

                <div style='margin-bottom: 3px;'>
                    ".$array_score[12]."
                </div>".$array_winner[13]."<br>

                <div>
                    ".$array_score[13]."
                </div>
            </td>

            <td colspan='1' rowspan='8' style='background: #D0D3D4;border-right: 1px solid #959595;padding-top: 7px;text-align:center;'>
                ".$array_winner[22]."<br>

                <div style='margin-bottom: 29px;'>
                    ".$array_score[22]."
                </div>".$array_winner[23]."<br>

                <div>
                    ".$array_score[23]."
                </div>
            </td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style='background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>".$array_player[13]."</td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style=' background: #ECF0F1; border-right: 1px solid #959595; border-bottom: 1px solid #959595;'>".$array_player[14]."</td>

            <td colspan='1' rowspan='4' style='background: #D0D3D4;border-right: 1px solid #959595;text-align:center;padding-top: 7px;'>
                ".$array_winner[14]."<br>

                <div style='margin-bottom: 3px;'>
                    ".$array_score[14]."
                </div>".$array_winner[15]."<br>

                <div>
                    ".$array_score[15]."
                </div>
            </td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style='background: #D0D3D4;border-right: 1px solid #959595;'>".$array_player[15]."</td>
        </tr>

        <tr>
        </tr>
    </tbody>
</table>";			
		}elseif($draw == 16){
			
			echo "<table cellpadding='3' style='margin-left: 60px;font-family:Arial,Helvetica,Arial,Sans-Serif;font-size: 15px;border-spacing: 0px;box-shadow: 0 0px 8px #656565;'>
    <tbody>
        <tr style='text-align: center; font-weight: bold; color: white; background: -webkit-linear-gradient(top,#939393,#4b4b4b); background: -o-linear-gradient(top,#9f3210,#471708); background: -moz-linear-gradient(top,#9f3210,#471708);'>
            <td style='width: 172px;padding-top: 13px; padding-bottom: 13px; border-right: 1px solid #4c4c4c; border-bottom: 1px solid #1c6184;'>R16</td>

            <td style='width: 172px;border-right: 1px solid #4c4c4c;'>Q-Final</td>

            <td style='width: 172px;border-right: 1px solid #4c4c4c;'>S-Final</td>

            <td style='width: 172px;border-right: 1px solid #4c4c4c;'>Final</td>
 
            <td style='width: 172px;border-right: 1px solid #4c4c4c;'>Winner</td>
 
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style='background: #ECF0F1; border-right: 1px solid #959595; border-bottom: 1px solid #959595;'>".$array_player[0]."</td>

            <td colspan='1' rowspan='4' style='padding-top:7px;background: #ECF0F1;border-right: 1px solid #959595;border-bottom: 1px solid #959595;text-align:center;'>
                ".$array_winner[0]."<br>

                <div style='margin-bottom: 3px;'>
                    ".$array_score[0]."
                </div>".$array_winner[1]."<br>

                <div>
                    ".$array_score[1]."
                </div>
            </td>

            <td colspan='1' rowspan='8' style='padding-top: 7px;text-align:center;background: #ECF0F1;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>
                ".$array_winner[16]."<br>

                <div style='margin-bottom: 29px;'>
                    ".$array_score[16]."
                </div>".$array_winner[17]."<br>

                <div>
                    ".$array_score[17]."
                </div>
            </td>

            <td colspan='1' rowspan='16' style='text-align:center;background: #ECF0F1;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>
                ".$array_winner[24]."<br>

                <div style='margin-bottom: 90px;'>
                    ".$array_score[24]."
                </div>".$array_winner[25]."<br>

                <div>
                    ".$array_score[25]."
                </div>
            </td>

            <td rowspan='16' style='text-align:center;background: #D0D3D4;'>
                <div style='vertical-align: middle;height: 36px;'>
                    ".$array_winner[30]."<br>

                    <div style='margin-bottom: 243px;'>
                        ".$array_score[30]."
                    </div>
                </div>
            </td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style='background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>".$array_player[1]."</td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style=' background: #ECF0F1; border-right: 1px solid #959595; border-bottom: 1px solid #959595;'>".$array_player[2]."</td>

            <td colspan='1' rowspan='4' style='background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;text-align:center;padding-top:7px;'>
                ".$array_winner[2]."<br>

                <div style='margin-bottom: 3px;'>
                    ".$array_score[2]."
                </div>".$array_winner[3]."<br>

                <div>
                    ".$array_score[3]."
                </div>
            </td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style='background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>".$array_player[3]."</td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style=' background: #ECF0F1; border-right: 1px solid #959595; border-bottom: 1px solid #959595;'>".$array_player[4]."</td>

            <td colspan='1' rowspan='4' style='text-align:center;padding-top:7px;background: #ECF0F1;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>
                ".$array_winner[4]."<br>

                <div style='margin-bottom: 3px;'>
                    ".$array_score[4]."
                </div>".$array_winner[5]."<br>

                <div>
                    ".$array_score[5]."
                </div>
            </td>

            <td colspan='1' rowspan='8' style='padding-top: 7px;text-align:center;background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>
                ".$array_winner[18]."<br>

                <div style='margin-bottom: 29px;'>
                    ".$array_score[18]."
                </div>".$array_winner[19]."<br>

                <div>
                    ".$array_score[19]."
                </div>
            </td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style='background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>".$array_player[5]."</td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style=' background: #ECF0F1; border-right: 1px solid #959595; border-bottom: 1px solid #959595;'>".$array_player[6]."</td>

            <td colspan='1' rowspan='4' style='text-align:center;padding-top:7px;background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>
                ".$array_winner[6]."<br>

                <div style='margin-bottom: 3px;'>
                    ".$array_score[6]."
                </div>".$array_winner[7]."<br>

                <div>
                    ".$array_score[7]."
                </div>
            </td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style='background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>".$array_player[7]."</td>
        </tr>

        <tr>
        </tr>
    </tbody>
</table>";			
		}elseif($draw == 8){
	echo "<table cellpadding='3' style='margin-left: 60px;font-family:Arial,Helvetica,Arial,Sans-Serif;font-size: 15px;border-spacing: 0px;box-shadow: 0 0px 8px #656565;'>
    <tbody>
        <tr style='text-align: center; font-weight: bold; color: white; background: -webkit-linear-gradient(top,#939393,#4b4b4b); background: -o-linear-gradient(top,#9f3210,#471708); background: -moz-linear-gradient(top,#9f3210,#471708);'>
            <td style='width: 16.66666667%; padding-top: 13px; padding-bottom: 13px; border-right: 1px solid #4c4c4c; border-bottom: 1px solid #1c6184;'>Q-Final</td>

            <td style='width: 16.66666667%; border-right: 1px solid #4c4c4c;'>S-Final</td>

            <td style='width: 16.66666667%; border-right: 1px solid #4c4c4c;'>Final</td>

			<td style='width: 16.66666667%;'>Winner</td>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style='background: #ECF0F1; border-right: 1px solid #959595; border-bottom: 1px solid #959595; width: 103px;'>".$array_player[0]."</td>

            <td colspan='1' rowspan='4' style='text-align:center;padding-top:7px;background: #ECF0F1;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>
                ".$array_winner[0]."<br>

                <div style='margin-bottom: 3px;'>
                    ".$array_score[0]."
                </div>".$array_winner[1]."<br>

                <div>
                    ".$array_score[1]."
                </div>
            </td>

            <td colspan='1' rowspan='8' style='padding-top: 7px;text-align:center;background: #ECF0F1;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>
                ".$array_winner[4]."<br>

                <div style='margin-bottom: 29px;'>
                    ".$array_score[4]."
                </div>".$array_winner[5]."<br>

                <div>
                    ".$array_score[5]."
                </div>
            </td>

			<td rowspan='16' style='text-align:center;background: #D0D3D4;'>
			".$array_winner[6]."<br>

                <div style='margin-bottom: 90px;'>
                    ".$array_score[6]."
                </div>
            </td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style='background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>".$array_player[1]."</td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style=' background: #ECF0F1; border-right: 1px solid #959595; border-bottom: 1px solid #959595;'>".$array_player[2]."</td>

            <td colspan='1' rowspan='4' style='text-align:center;padding-top:7px;background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>
                ".$array_winner[2]."<br>

                <div style='margin-bottom: 3px;'>
                    ".$array_score[2]."
                </div>".$array_winner[3]."<br>

                <div>
                    ".$array_score[3]."
                </div>
            </td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td colspan='1' rowspan='2' style='background: #D0D3D4;border-right: 1px solid #959595;border-bottom: 1px solid #959595;'>".$array_player[3]."</td>
        </tr>

        <tr>
        </tr>
    </tbody>
</table>";
		}
?>		
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
	<script>
	if (navigator.appVersion.indexOf("Chrome/") != -1) {
	document.getElementById('alb').setAttribute("style","padding-bottom: 20px;background: white;padding-top: 25px;box-shadow: 0 0px 8px #656565;width: 87%;margin: 0 auto;padding-left: 30px;font-family: 'Arial',Helvetica,Arial,Sans-Serif;");
	}
	</script> 
	<script src="Myjs/jquery-1.12.0.min.js">
	</script> 
	<script src="Myjs/index.js">
	</script> 
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVsKHn9tVp_UPppmsJ6zoJZRo31HGuYh4&callback=initialize">
	</script>
</body>
</html>
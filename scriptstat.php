	<?php
	$server = mysqli_connect("sql210.unaux.com", "unaux_20711759", "ronaldo07"); 
	$db = mysqli_select_db($server, "unaux_20711759_DMT");
	
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
/* 	$actualizare = "TRUNCATE TABLE utilizatori";
	mysqli_query($server, $actualizare);  */
	
	for ($x = 1; $x <= 188; $x++) {
		echo "M".$x."P1 VARCHAR(50) NOT NULL, M".$x."P2 VARCHAR(50) NOT NULL, M".$x."W VARCHAR(50) NOT NULL, M".$x."L VARCHAR(50) NOT NULL, M".$x."S VARCHAR(50) NOT NULL,<br>";
	}
	
	
/* 	$query="SELECT * FROM utilizatori";
	$result = mysqli_query($server, $query);

 while($row = mysqli_fetch_array($result)){
      echo $row['nume']." ";
	  echo $row['prenume']."<br>";
 	  echo $row['email']."<br>";
	  echo $row['telefon']."<br>";
	  echo $row['parola']."<br>";
	  echo $row['judet']."<br>";
	  echo $row['localitate']."<br>";
	  echo $row['inaltime']."<br>";
	  echo $row['greutate']."<br>";
	  echo $row['mana']."<br>";
	  echo $row['rever']."<br>";
	  echo $row['racheta']."<br>";
	  echo $row['nastere']."<br>";
	  echo $row['sex']."<br><br>";
  } */
 
/*  	$query="SELECT * FROM competitii";
$result = mysqli_query($server, $query);

 while($row = mysqli_fetch_array($result)){
      echo $row['competitie']."<br>";
	  echo $row['data incepere']."<br>";
	  echo $row['data incheiere']."<br>";
	  echo $row['castigatorS']."<br>";
	  echo $row['castigatorD']."<br>";
 } */
	
	

	
/*   	$actualizare = "ALTER TABLE `inscrisi` CHANGE `data_incheiere_inscriere` `data_incheiere_inscriere` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;";
	mysqli_query($server, $actualizare); */ 

 /* 	$actualizare = "UPDATE `competitii` SET `data incheiere` = '2017-10-15' WHERE competitie='Campionatul rachetelor'";
	mysqli_query($server, $actualizare);  */
	
/* 	$actualizare = "UPDATE `meciurilive` SET `Turneu` = 'Cupa APT'";
	mysqli_query($server, $actualizare);  */
	
/* 	$actualizare = "INSERT INTO `competitii` (`id`, `competitie`, `data incepere`, `data incheiere`, `locatie`, `localitate`) VALUES (NULL, 'Turneu Invitational 2', '2017-09-23', '2017-09-24', 'T.C. Pamira', 'Sibiu')";
	mysqli_query($server, $actualizare); */
/* 	
  	$actualizare = "UPDATE `competitii` SET `castigatorS` = 'Daniel IFTIME,Marius TROANCA', `castigatorD` = '' WHERE `competitie` = 'Turneu invitational 1'";
	mysqli_query($server, $actualizare); */
	
/* 	$actualizare = "UPDATE `competitii` SET `competitie` = 'Turneu invitational 2' WHERE `competitie` = 'Turneu Invitational 2'";
	mysqli_query($server, $actualizare); */
	

	
	
/* 		$actualizare = "DELETE FROM competitii WHERE competitie='Campionatul APT 2017'";
	mysqli_query($server, $actualizare); */
	
/* 	$actualizare = "SHOW columns FROM competitii;";
	$ac = mysqli_query($server, $actualizare);
	while($row = mysqli_fetch_array($ac)){
echo $row['Field']."<br>";
} */
	

	
	/* $actualizare = "UPDATE camp SET Jucator = 'Ciprian BELDEAN 0766510586' WHERE Jucator='Ciprian BELDEAN' AND Grupa='GOLD'";
	mysqli_query($server, $actualizare);
	
	$actualizare = "UPDATE camp SET Jucator = 'Alex DAMIAN 0758262960' WHERE Jucator='Alex DAMIAN' AND Grupa='SILVER'";
	mysqli_query($server, $actualizare); */
	
	//$actualizare = "UPDATE grupabronze SET Victorii = 0, SeturiCastigate = 0,Infrangeri =0, SeturiPierdute = 0, Puncte = 0";
	//mysqli_query($server, $actualizare);
	
// $query = "SELECT COUNT(*) FROM rezultatecamp";
// $result = mysqli_query($server,$query);
// $rows = mysqli_fetch_row($result);
// echo $rows[0];
	
		//$actualizare = "UPDATE meciurilive SET Ziua = '20 august' WHERE Ziua='19 august'";
		//mysqli_query($server, $actualizare);
	
	//$actualizare = "ALTER TABLE `meciurilive` ADD `Serveste` VARCHAR(30) NOT NULL AFTER `Ora`";
	//mysqli_query($server, $actualizare);
	
	//$actualizare = "CREATE TABLE `widevisi_rez`.`camp` ( `id` INT(3) NOT NULL AUTO_INCREMENT , `Jucator` VARCHAR(30) NOT NULL , `Grupa` VARCHAR(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
	//mysqli_query($server, $actualizare);
	
	/*$query=mysqli_query($server,"SELECT * FROM meciurilive");
	while ($row = mysqli_fetch_array($query)) {
		echo $row['id'];
		echo $row['Jucator1'];
	}*/
	
	// mysqli_query($server,"ALTER TABLE `rezultatecamp`
  // MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;");
	
// $result = mysqli_query($server,"show tables"); // run the query and assign the result to $result
// while($table = mysqli_fetch_array($result)) { // go through each row that was returned in $result
    // echo($table[0] . "<BR>");    // print the table that was returned on that row.
// }


	//mysqli_query($server,"TRUNCATE TABLE statistici");
	
	 /*$result = mysqli_query($server,"SELECT * FROM statistici");
		while($row = mysqli_fetch_array($result)){
      echo $row['Jucator'];
	  echo $row['Victorii'];
	  echo $row['Infrangeri'];
	}
	
	$queryc = mysqli_query($server,"SELECT Invingator FROM rezultategrupevalorice");
	$queryp = mysqli_query($server,"SELECT Invins FROM rezultategrupevalorice");
	
	while ($rowc = mysqli_fetch_array($queryc)) {
		$jucatorc = $rowc['Invingator'];
		$arrjucatorc[] = $jucatorc;
	}
	
	while ($rowp = mysqli_fetch_array($queryp)) {
		$jucatorp = $rowp['Invins'];
		$arrjucatorp[] = $jucatorp;
	}
	
	$arrcountc = array_count_values($arrjucatorc);
	arsort($arrcountc);
	$arrkeyc = array_keys($arrcountc);
	
	$arrcountp = array_count_values($arrjucatorp);
	arsort($arrcountp);
	$arrkeyp = array_keys($arrcountp);
	
	foreach($arrkeyc as $jc){
	$querycnrv = mysqli_query($server,"SELECT COUNT(Invingator) AS countv FROM rezultategrupevalorice WHERE Invingator='$jc'");
	$counternrv = mysqli_fetch_assoc($querycnrv);
	$counternrv=$counternrv['countv'];
	mysqli_query($server,"INSERT INTO statistici (Jucator, Victorii) VALUES ('$jc','$counternrv')");
	}
	
	
	foreach($arrkeyp as $jp){
	$querycnri = mysqli_query($server,"SELECT COUNT(Invins) AS counti FROM rezultategrupevalorice WHERE Invins='$jp'");
	$counternri = mysqli_fetch_assoc($querycnri);
	$counternri=$counternri['counti'];
	if(mysqli_num_rows(mysqli_query($server,"SELECT Invingator FROM rezultategrupevalorice WHERE Invingator = '$jp'"))<1){
		mysqli_query($server,"INSERT INTO statistici (Jucator, Infrangeri) VALUES ('$jp','$counternri')");
	}else{
		mysqli_query($server,"UPDATE statistici SET Infrangeri = '$counternri' WHERE Jucator = '$jp'");
	}
	}
	
	mysqli_query($server,"UPDATE statistici SET Turneu = 'GRV'");
	*/
	
	
	
	
	?>
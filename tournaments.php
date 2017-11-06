<?php
	session_start();

	include 'dbconnect.php';

	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$result = mysqli_query($server, "SELECT * FROM turnee WHERE `Begin Date` >= CURDATE() ORDER by `Begin Date`");

	?>

<html><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAw4LsAKOK+AAAAAAAZ9N8AFO7PABr26gAW+eoAEfPaACH19QCH//4AGfXlABLszQAk9e0AHevYAB/28wAh9vMAH/X2AB726wBZ5ssANuPNACH24wA33K8AGfb0ABjv1gAX9fcAGu/WABP57AAc8eEAHvfpABP47wBL+NwAHPbsAA/w1AAY7tEAHvThADPdrQAY7dQAY+TJACnisAAy58sAE/ryACftwwAd89wAGvTqAB/z3AAk47YAY//pAGHu3wAe9/IAK8ysACT08gAh9/IAEerVAC/fwQAh9OoAGO3dABz4+AAe9+IAGfjwABr25QAU8uAAD+jTACffqQAN79AAGvfzABX76AAh1qoAI+m/ABr29gA25s8AJem/ABPx2wAW79AAHe7CABT48QAY8tAAJuPIABb48QBE488AIfLYABfx0wAo8eMAJOXLABjjsAAe+PEAH/HTACPt1gAV79EAO+nYADHy2AAk+eYAKO/hAIf+9QAe+uwAG+7UAB774QAb9eoAGvf1ABL58AAa+OIAHO3HABDs2wAS3aoAHuvVACf46gAm5rEAGPjzABT78wAY990ALerPAErrywAe9N0AJda1AHDx4gAe8+AATuTGACLkrwAe8NgAIvfdABP35gAV9+YAHt+tACHw0AAi6sgAHOrAAH3//QAd9+YAM9y1ACDjuwAg6cMAHPDZACXhsAAX6skAJOa7AC3kuAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgICAgJ7QjExQkICAgICAgICAntzf3lTZoMVMUICAgICAnt9fUI+aXQmIzF9QgICAntJSUl9hi2FRoBwfUlCAgJuQ0lJfX0EVyFIXgkAEgIZASl8hF99bAMUOTd9LjVCe3uBZAtffWM7NmArfR4nJXtLelU/X31dVA9hFjx9TC97UE92X319OkAQRBh3fVlxGRksbyp9H01qDzA4Ckl9JRkZG2V9fQwzDggySmhJfTECWFFBfXUGHWsoYhpbSX0CAoKCB1wgOxwRBXh+NElOAgICgm19RQ1aInJnF05OAgICAgKCfXtWPUckUhNOAgICAgICAgJ9Tk5OTk4CAgICAvgfAADgBwAAwAMAAIABAACAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgAEAAIABAADAAwAA4AcAAPgfAAA=" rel="icon" type="image/x-icon">
	<link rel="stylesheet" href="Mycss/RegLog.css">
	<link rel="stylesheet" href="Mycss/stylep.css">
	<title>Tournaments</title>
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
	    padding-left: 10px;
		padding-right: 10px;
	}
</style>
	<style>
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
	
#tournamentlink { 
    font-weight: bold;
	color: #2e6291;
	text-decoration: underline;
    }	
	
#tournamentlink:hover { 
    text-decoration:none;
    }
	
#spaces { 
    color: green;
    font-weight: bold;
    text-decoration: underline;
    }
	
#spaces:hover { 
        text-decoration:none;
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
	
<div style="text-align: center;background:rgba(43, 125, 166, 0.18);padding-top: 50px;padding-bottom: 70px;min-height: 1300px;"><br><div style="
    width: 90%;
    margin: 0 auto;
">	
		

<div style="
    font: 15px Arial, Helvetica, sans-serif;
    font-size: 25px;
    font-weight: bold;
">Upcoming tournaments</div><br><br>
	
	<?php 
	echo "<table class='demo'>	
	<thead>
	<tr>
		<th>Type</th>
		<th>Start Date</th>
		<th></th>
		<th style='width: 250px;'>Tournament</th>
		<th>Draw</th>
		<th>Surface</th>
		<th>Spots</th>
	</tr>
	</thead>";
	
	$nr = 1;
	$num_rows = mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)) {
	$tid = $row["id"];
	$tournament = $row["Tournament"];
	$draw = $row["Draw"];
	$type = $row["Type"];
	$location = $row["Location"];
	$spots = $row["Spots"];
	$country = trim(substr($location, strpos($location, ",") + 1));
	$dtz = new DateTimeZone("Europe/Bucharest"); //Your timezone
	$now = new DateTime(date("Y-m-d"), $dtz);
		
		$data_incepere = $row["Begin date"];		
		$month_number = date("m", strtotime($data_incepere));
		if($month_number == '01'){
			$luna = "January";
		}
		if($month_number == '02'){
			$luna = "February";
		}
		if($month_number == '03'){
			$luna = "March";
		}
		if($month_number == '04'){
			$luna = "April";
		}
		if($month_number == '05'){
			$luna = "May";
		}
		if($month_number == '06'){
			$luna = "June";
		}
		if($month_number == '07'){
			$luna = "July";
		}
		if($month_number == '08'){
			$luna = "August";
		}
		if($month_number == '09'){
			$luna = "September";
		}
		if($month_number == '10'){
			$luna = "October";
		}
		if($month_number == '11'){
			$luna = "November";
		}
		if($month_number == '12'){
			$luna = "December";
		}
		$data_incepere1 = date("d m Y", strtotime($data_incepere));
		$data_incepere2 = (string)$data_incepere1;
		$data_incepere3 = substr_replace($data_incepere2,$luna,3,2);
		$data_incepere3 = ltrim($data_incepere3, '0');
		
		$data_incheiere = $row["End date"];		
		$month_number = date("m", strtotime($data_incheiere));
		if($month_number == '01'){
			$luna = "January";
		}
		if($month_number == '02'){
			$luna = "February";
		}
		if($month_number == '03'){
			$luna = "March";
		}
		if($month_number == '04'){
			$luna = "April";
		}
		if($month_number == '05'){
			$luna = "May";
		}
		if($month_number == '06'){
			$luna = "June";
		}
		if($month_number == '07'){
			$luna = "July";
		}
		if($month_number == '08'){
			$luna = "August";
		}
		if($month_number == '09'){
			$luna = "September";
		}
		if($month_number == '10'){
			$luna = "October";
		}
		if($month_number == '11'){
			$luna = "November";
		}
		if($month_number == '12'){
			$luna = "December";
		}
		$data_incheiere1 = date("d m Y", strtotime($data_incheiere));
		$data_incheiere2 = (string)$data_incheiere1;
		$data_incheiere3 = substr_replace($data_incheiere2,$luna,3,2);
		$data_incheiere3 = ltrim($data_incheiere3, '0');
		
		$data_incepere_inscriere = date( 'd.m.Y', strtotime( $data_incepere . ' -12 day' ) );
		$month_number = date("m", strtotime($data_incepere_inscriere));
		if($month_number == '01'){
			$luna = "January";
		}
		if($month_number == '02'){
			$luna = "February";
		}
		if($month_number == '03'){
			$luna = "March";
		}
		if($month_number == '04'){
			$luna = "April";
		}
		if($month_number == '05'){
			$luna = "May";
		}
		if($month_number == '06'){
			$luna = "June";
		}
		if($month_number == '07'){
			$luna = "July";
		}
		if($month_number == '08'){
			$luna = "August";
		}
		if($month_number == '09'){
			$luna = "September";
		}
		if($month_number == '10'){
			$luna = "October";
		}
		if($month_number == '11'){
			$luna = "November";
		}
		if($month_number == '12'){
			$luna = "December";
		}
		$data_incepere_inscriere1 = date("d m Y", strtotime($data_incepere_inscriere));
		$data_incepere_inscriere2 = (string)$data_incepere_inscriere1;
		$data_incepere_inscriere3 = substr_replace($data_incepere_inscriere2,$luna,3,2);
		$data_incepere_inscriere3 = ltrim($data_incepere_inscriere3, '0');
		
		$data_incheiere_inscriere = date( 'd.m.Y', strtotime( $data_incepere . ' -2 day' ) );
		$month_number = date("m", strtotime($data_incheiere_inscriere));
		if($month_number == '01'){
			$luna = "January";
		}
		if($month_number == '02'){
			$luna = "February";
		}
		if($month_number == '03'){
			$luna = "March";
		}
		if($month_number == '04'){
			$luna = "April";
		}
		if($month_number == '05'){
			$luna = "May";
		}
		if($month_number == '06'){
			$luna = "June";
		}
		if($month_number == '07'){
			$luna = "July";
		}
		if($month_number == '08'){
			$luna = "August";
		}
		if($month_number == '09'){
			$luna = "September";
		}
		if($month_number == '10'){
			$luna = "October";
		}
		if($month_number == '11'){
			$luna = "November";
		}
		if($month_number == '12'){
			$luna = "December";
		}
		$data_incheiere_inscriere1 = date("d m Y", strtotime($data_incheiere));
		$data_incheiere_inscriere2 = (string)$data_incheiere_inscriere1;
		$data_incheiere_inscriere3 = substr_replace($data_incheiere_inscriere2,$luna,3,2);
		$data_incheiere_inscriere3 = ltrim($data_incheiere_inscriere3, '0');
		
	$data_incepere4 = new DateTime($row["Begin date"]);
	$surface = $row["Surface"];
	

	$diff = $data_incepere4->diff($now)->format("%a");  //find difference
	$days = intval($diff);   //rounding days
 
 	$result1 = mysqli_query($server, "SELECT `Tid` FROM rezultate WHERE `Tid` = '$tid'");
 
if($days<12 && mysqli_num_rows($result1)<1){
	if ($type == "DMT 250"){
		$img_type = '250';
	}
	if ($type == "DMT 500"){
		$img_type = '500';
	}
	if ($type == "DMT 1000"){
		$img_type = '1000';
	}
	if ($type == "DMT 2000"){
		$img_type = 'grandslam';
	}
	if ($type == "DMT FUN"){
		$img_type = 'fun';
	}
	if ($spots > 0){
		$tdspots = "<td><a href='tournament-details.php?tid=$tid' id='spaces'>$spots open spaces</a></td>";
	}elseif($spots == 0){
		$tdspots = "<td><a href='tournament-details.php?tid=$tid' id='spaces'>$spots open spaces</a></td>";
	}
	if($nr % 2 != 0){		
		echo "<tr style='background: #ECF0F1;'>
			<td><img alt='' src='Myimages/TLOGOS/$img_type.jpg'></td>
			<td>$data_incepere3</td>
			<td><img alt='' src='Myimages/Flags/Medium-tournaments/$country.png'></td>
			<td><a href='tournament-details.php?tid=$tid' id='tournamentlink'>$tournament</a></td>
			<td>$draw</td>
			<td>$surface</td>
			$tdspots
			</tr>";
	}else{
		echo "<tr style='background: #D0D3D4;'>
			<td><img alt='' src='Myimages/TLOGOS/$img_type.jpg'></td>
			<td>$data_incepere3</td>
			<td><img alt='' src='Myimages/Flags/Medium-tournaments/$country.png'></td>
			<td><a href='tournament-details.php?tid=$tid' id='tournamentlink'>$tournament</a></td>
			<td>$draw</td>
			<td>$surface</td>
			$tdspots
			</tr>";
		}
	$nr++;		
}
}
echo "</table>";
if($num_rows < 1){
	echo "<div style='
    font: 19px Arial, Helvetica, sans-serif;
    margin-top: 15px;
    padding-bottom: 20px;
'>No competition found!</div>";
}

	?>
	
		
	</div>
	</div>
	
	</div>
	<div style="margin:0 auto;width:100%;text-align:center;background:linear-gradient(to bottom,#252525 0,#252525 55%,#1E2223 55%,#1E2223 100%)"><img src="Myimages/bottom.jpg" alt="" style="width:1101"></div>
	
<script>
	$("#proba").bind("change", function() {
	if ($("#proba option:selected").attr("id") == "SM") {
		$("#SimpluM1").show();
		$("#SimpluM2").hide();
		$("#Dublu").hide()
	} else {
		if ($("#proba option:selected").attr("id") == "DB") {
				$("#SimpluM1").hide();
				$("#SimpluM2").hide();
				$("#Dublu").show()
			}
	}
}); 

$('#maideparte1').click(function(){
    $("#SimpluM1").hide();
	$("#SimpluM2").show();
	$("#Dublu").hide()
});
$('#maideparte2').click(function(){
    $("#SimpluM1").hide();
	$("#SimpluM2").show();
	$("#Dublu").hide()
});
$('#maideparte3').click(function(){
    $("#SimpluM1").hide();
	$("#SimpluM2").show();
	$("#Dublu").hide()
});
$('#maideparte4').click(function(){
    $("#SimpluM1").hide();
	$("#SimpluM2").show();
	$("#Dublu").hide()
});

$('#inapoi').click(function(){
    $("#SimpluM1").show();
	$("#SimpluM2").hide();
	$("#Dublu").hide()
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
<script>
 // tabbed content
    // http://www.entheosweb.com/tutorials/css/tabs.asp
    $(".tab_content").hide();
    $(".tab_content:first").show();

  /* if in tab mode */
    $("ul.tabs li").click(function() {
		
      $(".tab_content").hide();
      var activeTab = $(this).attr("rel"); 
      $("#"+activeTab).fadeIn();		
		
      $("ul.tabs li").removeClass("active");
      $(this).addClass("active");

	  $(".tab_drawer_heading").removeClass("d_active");
	  $(".tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active");
	  
	  initialize();
    });
	/* if in drawer mode */
	$(".tab_drawer_heading").click(function() {
      
      $(".tab_content").hide();
      var d_activeTab = $(this).attr("rel"); 
      $("#"+d_activeTab).fadeIn();
	  
	  $(".tab_drawer_heading").removeClass("d_active");
      $(this).addClass("d_active");
	  
	  $("ul.tabs li").removeClass("active");
	  $("ul.tabs li[rel^='"+d_activeTab+"']").addClass("active");
    
	  initialize()
	});
	
	
	/* Extra class "tab_last" 
	   to add border to right side
	   of last tab */
	$('ul.tabs li').last().addClass("tab_last");
	
	</script>
</body></html>
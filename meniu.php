<?php
	
	    $ok="";
		
		if(!isset($_SESSION["username"])){
			$ok="no";
		}elseif(isset($_SESSION["username"])){
			$ok="yes";
		}
			
?>

<html>
<head>
<link rel="stylesheet" href="stylep.css">
</head>
<body>
<nav>
<div class="container">
<ul>
<li style="padding-left:10px"><a href="http://tenisapt.ro/" title="Tenis APT" rel="home" class="main-logo">
<img src="Myimages/logo_text_white.png" alt="Tenis APT" data-no-retina="">
</a></li>
<div style="display: inline-block;width: 52%;float: right;margin-top: 15px;">
<li><a href="index.php">Home</a></li>
<li style="">
<a href="#" style="padding-right:37">Tournaments<img src="../Myimages/arr.png" style="height:30px;margin-left:3px;position:absolute;top:10px"></a>
<ul style="z-index: 10; padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px; height: 245px; display: none;">
<li><a href="tournaments.php">Signup</a></li>
<li><a href="draws.php">Draws</a></li>
<li><a href="#" id="myLink">Report Result</a></li>
<li><a href="calendar.php">Calendar</a></li>
</ul>
</li>
<li><a href="rankings.php">Rankings</a></li>
<li><a href="players.php">Players</a></li>
<li><a href="http://dmttour.freecluster.eu/Forum">Forum</a></li>
</div>
</ul>
</div>
</nav>
<script type="text/javascript">

	var ok = "<?php echo $ok; ?>";
	
  document.getElementById("myLink").onclick = function() {
    if(ok == "no"){
		alert("Please login to report result!");
	}else if(ok == "yes"){
		window.location.href="report-result.php";
	}
  };
</script>
<script src="Myjs/jquery-1.12.0.min.js"></script>
<script src="Myjs/index.js"></script>
</body></html>
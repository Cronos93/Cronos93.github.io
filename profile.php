<?php
	session_start();

	include 'dbconnect.php';

    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $pid = $_GET['pid'];
	$result = mysqli_query($server, "SELECT * FROM utilizatori WHERE id='$pid'");
	$row = mysqli_fetch_assoc($result);
	$username1 = $row["Username"];
	$email1 = $row["Email"];
	$skype = $row["Skype"];
	$character = $row["Character"];
	$country = $row["Country"];
	$city = $row["City"];
	$host = $row["Host"];
	$unique_name = $row["Unique Name"];
	//calculate age
	$now = new DateTime();	
	$birth = new DateTime($row["Birth"]);
	$interval = $now->diff($birth);
	$age = $interval->format('%y years');
	
	$imagine = "";
		
	$filename = 'Myimages/Avatars/'.$username1.".jpg";
	
	if (file_exists($filename)) {
		$imagine = $username1;
	} else {
		$imagine = "standard";
	}
	
	$titles32 = mysqli_query($server, "SELECT `Winner` FROM rezultate WHERE `Pid`='$pid' AND `Meci`='31'");
	//$titles64 = mysqli_query($server, "SELECT `Winner` FROM utilizatori WHERE `Pid`='$pid' AND `Meci`='31'");

	//$titles = mysqli_num_rows($titles32);
	$titles = 0;
    ?>

<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAw4LsAKOK+AAAAAAAZ9N8AFO7PABr26gAW+eoAEfPaACH19QCH//4AGfXlABLszQAk9e0AHevYAB/28wAh9vMAH/X2AB726wBZ5ssANuPNACH24wA33K8AGfb0ABjv1gAX9fcAGu/WABP57AAc8eEAHvfpABP47wBL+NwAHPbsAA/w1AAY7tEAHvThADPdrQAY7dQAY+TJACnisAAy58sAE/ryACftwwAd89wAGvTqAB/z3AAk47YAY//pAGHu3wAe9/IAK8ysACT08gAh9/IAEerVAC/fwQAh9OoAGO3dABz4+AAe9+IAGfjwABr25QAU8uAAD+jTACffqQAN79AAGvfzABX76AAh1qoAI+m/ABr29gA25s8AJem/ABPx2wAW79AAHe7CABT48QAY8tAAJuPIABb48QBE488AIfLYABfx0wAo8eMAJOXLABjjsAAe+PEAH/HTACPt1gAV79EAO+nYADHy2AAk+eYAKO/hAIf+9QAe+uwAG+7UAB774QAb9eoAGvf1ABL58AAa+OIAHO3HABDs2wAS3aoAHuvVACf46gAm5rEAGPjzABT78wAY990ALerPAErrywAe9N0AJda1AHDx4gAe8+AATuTGACLkrwAe8NgAIvfdABP35gAV9+YAHt+tACHw0AAi6sgAHOrAAH3//QAd9+YAM9y1ACDjuwAg6cMAHPDZACXhsAAX6skAJOa7AC3kuAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgICAgJ7QjExQkICAgICAgICAntzf3lTZoMVMUICAgICAnt9fUI+aXQmIzF9QgICAntJSUl9hi2FRoBwfUlCAgJuQ0lJfX0EVyFIXgkAEgIZASl8hF99bAMUOTd9LjVCe3uBZAtffWM7NmArfR4nJXtLelU/X31dVA9hFjx9TC97UE92X319OkAQRBh3fVlxGRksbyp9H01qDzA4Ckl9JRkZG2V9fQwzDggySmhJfTECWFFBfXUGHWsoYhpbSX0CAoKCB1wgOxwRBXh+NElOAgICgm19RQ1aInJnF05OAgICAgKCfXtWPUckUhNOAgICAgICAgJ9Tk5OTk4CAgICAvgfAADgBwAAwAMAAIABAACAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgAEAAIABAADAAwAA4AcAAPgfAAA=" rel="icon" type="image/x-icon">
	<link href="Mycss/stylep.css" rel="stylesheet">
	<link href="Mycss/RegLog.css" rel="stylesheet">
	<title>Profile</title>
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
	   margin-left: 20px;
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
	/* The Modal (background) */
	.modal {
	   display: none; /* Hidden by default */
	   position: fixed; /* Stay in place */
	   z-index: 1; /* Sit on top */
	   padding-top: 350px; /* Location of the box */
	   left: 0;
	   top: 0;
	   width: 100%; /* Full width */
	   height: 100%; /* Full height */
	   overflow: auto; /* Enable scroll if needed */
	   background-color: rgb(0,0,0); /* Fallback color */
	   background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	/* Modal Content */
	.modal-content {
	       background-color: #ffebe3;
	   margin: auto;
	   border: 1px solid #888;
	   width: 50%;
	   padding-left: 25px;
	   height: 170px;
	   padding-right: 15px;
	   padding-bottom: 15px;
	   padding-top: 5px;
	}

	/* The Close Button */
	.close, .close1, .close2 {
	   color: #aaaaaa;
	   float: right;
	   font-size: 28px;
	   font-weight: bold;
	}

	.close:hover,.close1:hover,.close2:hover,
	.close:focus,.close1:focus,.close2:focus {
	   color: #000;
	   text-decoration: none;
	   cursor: pointer;
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
			<div id="alb" style="padding-bottom: 20px;position: relative;background: white;box-shadow: 0 0px 8px #656565;width: 90%;margin: 0 auto;height: 495px;font-family: 'Arial',Helvetica,Arial,Sans-Serif;">
				<div style="
    height: 130px;
    background: #EFF0F2;
    border-bottom: 1px solid #949494;
            "><div style="
    color: #636C72;
    font-size: 47px;
    margin-left: 300px;
    font-weight: bold;
    padding-top: 50px;
"><img alt="" src="Myimages/Flags/Big/onlineimageresize_com_Flag_of_<?php echo $country;?>.png" style="margin-right: 16px;"><?php echo $username1;?></div></div><div style="width: 30%;display: inline-block;vertical-align: top;">
					
					<img alt="" src="Myimages/Avatars/<?php echo $imagine;?>.jpg" style="width: 200px;height: 250px;box-shadow: 0 0px 10px #040404;position: absolute;top: 40px;left: 60px;">
<div class="block6" style="
    width: 215px;
    height: 60px;
    margin: 0px 0px 2px 0px;
    padding: 10px 10px 10px 10px;
    background: -webkit-linear-gradient(top,#2b7da6,#0f4075);
    background: -o-linear-gradient(top,#9f3210,#471708);
    background: -moz-linear-gradient(top,#9f3210,#471708);
    box-shadow: 0 0px 10px #040404;
    position: absolute;
    top: 325px;
    left: 25px;
">
			<div class="stat_title_pos" style="
    color: #f1edec;
    font-size: 14px;
    text-align: left;
    text-shadow: 1px 1px 1px #17343d;
">Current Ranking</div>
			<div class="stat_content_pos style1" style="
    color: #ffffff;
    font-size: 30px;
    text-align: left;
    font-weight: bold;
    text-shadow: 1px 1px 1px #07243a;
    /* float: left; */
    padding: 7px 0px 0px 0px;
">Position: #</div>
		</div>
				</div><div style="width: 45%;display: inline-block;">
					<div style=" font-size: 20px; font-weight: bold;">
										</div><br><br><div style="font-size: 15px;display: inline-block;font-weight: bold;width: 150px;text-align: right;margin-right: 5px;margin-bottom: 20px;">Age&nbsp;&nbsp;&nbsp;:
					</div>&nbsp;&nbsp;<?php echo $age;?><br>
					<div style="font-size: 15px;display: inline-block;font-weight: bold;width: 150px;text-align: right;margin-right: 5px;margin-bottom: 20px;">
						City, Country&nbsp;&nbsp;&nbsp;:
					</div>
					<div style=" display: inline-block;">&nbsp;<?php echo $city.", ".$country;?></div><br>
					<div style="font-size: 15px;display: inline-block;font-weight: bold;text-align: right;margin-right: 5px;margin-bottom: 20px;width: 150px;">
						Unique Name&nbsp;&nbsp;&nbsp;:
					</div>&nbsp;&nbsp;<?php echo $unique_name;?><div style=" font-size: 15px; display: inline-block;">
											</div><br>
					<div style="font-size: 15px;display: inline-block;font-weight: bold;text-align: right;margin-right: 5px;margin-bottom: 20px;width: 150px;">
						Character&nbsp;&nbsp;&nbsp;:
					</div>&nbsp;&nbsp;<?php echo $character;?><div style=" font-size: 15px; display: inline-block;">
											</div><br>	
					<div style="font-size: 15px;display: inline-block;font-weight: bold;text-align: right;margin-right: 5px;margin-bottom: 20px;width: 150px;">
						Email&nbsp;&nbsp;&nbsp;:
					</div>&nbsp;
<?php echo $email1;?><br>	
					<div style="font-size: 15px;display: inline-block;font-weight: bold;text-align: right;margin-right: 5px;margin-bottom: 20px;width: 150px;">
						Skype&nbsp;&nbsp;&nbsp;:
					</div>&nbsp;
<?php echo $skype;?><br>	
					<div style="font-size: 15px;display: inline-block;font-weight: bold;text-align: right;margin-right: 5px;margin-bottom: 20px;width: 150px;">
						Host&nbsp;&nbsp;&nbsp;:			</div>&nbsp;&nbsp;<?php echo $host;?><br>	
					<div style="font-size: 15px;display: inline-block;font-weight: bold;text-align: right;margin-right: 5px;margin-bottom: 20px;width: 150px;">Highest ranking&nbsp;&nbsp;&nbsp;:</div>&nbsp;&nbsp;#<br>	
					<div style="font-size: 15px;display: inline-block;font-weight: bold;text-align: right;margin-right: 5px;margin-bottom: 20px;width: 150px;">Titles&nbsp;&nbsp;&nbsp;:</div>&nbsp;&nbsp;<?php echo $titles;?></div>
				
			</div>
			
			
			
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
	// Get the modal
	var zile = "<?php echo $days ?>";
	var val = "<?php echo $prenume ?>";

	if (zile < 20) {
	   if (val == "") {
	       var modal = document.getElementById('myModalnelogat');
	   }else if (val != "") {
	       var modal = document.getElementById('myModalincepute');
	   }
	}else {
	   var modal = document.getElementById('myModalneincepute');
	}

	// Get the button that opens the modal
	var btn = document.getElementById("inscrie-te");

	// Get the <span> element that closes the modal
	if (zile < 20) {
	       if (val == "") {
	       var span = document.getElementsByClassName("close2")[0];
	   }else if (val != "") {
	       var span = document.getElementsByClassName("close")[0];
	   }
	}else {
	   var span = document.getElementsByClassName("close1")[0];
	}

	// When the user clicks the button, open the modal 
	btn.onclick = function() {    
	   modal.style.display = "block";  
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	   modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	   if (event.target == modal) {
	       modal.style.display = "none";
	   }
	}
	</script> 
	<script>
	$(document).ready(function() {

	//Start Buttons
	   $(this).find(':input[type=submit]').prop('disabled', true);
	   
	   $('#probainscriere').change(function() {
	       if ($('#probainscriere').val() == "Selecteaza proba") {
	         $(':input[type="submit"]').prop('disabled', true);
	       } else {
	         $(':input[type="submit"]').prop('disabled', false);
	       }
	   });

	});
	</script>  
	<script src="Myjs/jquery-1.12.0.min.js">
	</script> 
	<script src="Myjs/index.js">
	</script> 
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVsKHn9tVp_UPppmsJ6zoJZRo31HGuYh4&callback=initialize">
	</script>
</body>
</html>
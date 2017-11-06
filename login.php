<?php
	session_start();
	
	include 'dbconnect.php';
	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
	}
	
	$logErr = "";
	
	if (isset($_POST['submit'])) {
		// removes backslashes
		$username = stripslashes($_POST['username']);
		//escapes special characters in a string
		$username = mysqli_real_escape_string($server, $username);
		$parola = stripslashes($_POST['parola']);
		$parola = mysqli_real_escape_string($server, $parola);
		//Checking is user existing in the database or not
		$query = "SELECT * FROM `utilizatori` WHERE Username='$username' AND Password='$parola'";
		$result = mysqli_query($server, $query) or die(mysql_error());
		$row = mysqli_fetch_array($result);
		$rows = mysqli_num_rows($result);
		if ($rows == 1) {
			$pid = $row['id'];
			$_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $row['Username'];
			$_SESSION['country'] = $row['Country'];
			$_SESSION['email'] = $row['Email'];
			// Redirect user to index.php
			header("Location: profile.php?pid=".$pid."");
		} else {
			$logErr = "*Incorrect username or password!";
		}
	}
?>


<html>
<head>
	<meta charset="utf-8">
	<link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAw4LsAKOK+AAAAAAAZ9N8AFO7PABr26gAW+eoAEfPaACH19QCH//4AGfXlABLszQAk9e0AHevYAB/28wAh9vMAH/X2AB726wBZ5ssANuPNACH24wA33K8AGfb0ABjv1gAX9fcAGu/WABP57AAc8eEAHvfpABP47wBL+NwAHPbsAA/w1AAY7tEAHvThADPdrQAY7dQAY+TJACnisAAy58sAE/ryACftwwAd89wAGvTqAB/z3AAk47YAY//pAGHu3wAe9/IAK8ysACT08gAh9/IAEerVAC/fwQAh9OoAGO3dABz4+AAe9+IAGfjwABr25QAU8uAAD+jTACffqQAN79AAGvfzABX76AAh1qoAI+m/ABr29gA25s8AJem/ABPx2wAW79AAHe7CABT48QAY8tAAJuPIABb48QBE488AIfLYABfx0wAo8eMAJOXLABjjsAAe+PEAH/HTACPt1gAV79EAO+nYADHy2AAk+eYAKO/hAIf+9QAe+uwAG+7UAB774QAb9eoAGvf1ABL58AAa+OIAHO3HABDs2wAS3aoAHuvVACf46gAm5rEAGPjzABT78wAY990ALerPAErrywAe9N0AJda1AHDx4gAe8+AATuTGACLkrwAe8NgAIvfdABP35gAV9+YAHt+tACHw0AAi6sgAHOrAAH3//QAd9+YAM9y1ACDjuwAg6cMAHPDZACXhsAAX6skAJOa7AC3kuAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgICAgJ7QjExQkICAgICAgICAntzf3lTZoMVMUICAgICAnt9fUI+aXQmIzF9QgICAntJSUl9hi2FRoBwfUlCAgJuQ0lJfX0EVyFIXgkAEgIZASl8hF99bAMUOTd9LjVCe3uBZAtffWM7NmArfR4nJXtLelU/X31dVA9hFjx9TC97UE92X319OkAQRBh3fVlxGRksbyp9H01qDzA4Ckl9JRkZG2V9fQwzDggySmhJfTECWFFBfXUGHWsoYhpbSX0CAoKCB1wgOxwRBXh+NElOAgICgm19RQ1aInJnF05OAgICAgKCfXtWPUckUhNOAgICAgICAgJ9Tk5OTk4CAgICAvgfAADgBwAAwAMAAIABAACAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgAEAAIABAADAAwAA4AcAAPgfAAA=" rel="icon" type="image/x-icon">
	<link href="Mycss/RegLog.css" rel="stylesheet">
	<link href="Mycss/stylep.css" rel="stylesheet">
	<title>Sign-in</title>
</head>
<body style="margin-left: auto;margin-right: auto;margin-top: 0;margin-bottom: 0;background-image: url(Myimages/bk.jpg)!important;background-repeat: no-repeat;background-position: center center;background-attachment: fixed;">
		
	<?php include 'topbar.php';?>
	<div style="margin:0 auto;width:1101px;">
	<div>
		<?php include("meniu.php");	?>
	</div>
	<div>
		<img src="Myimages/logodmt.jpg" width="1101" height="235" alt="" style="box-shadow: 0 6px 20px -4px black;">
	</div>
	
	<div style="background:rgba(43, 125, 166, 0.18);padding-top: 70px;padding-bottom: 70px;min-height: 1000px;">
		<div style="width: 389px;" class="form">
			<h1 style="color: white;margin-bottom: 30px;">Login</h1>
			<form action="" id="login" method="post" name="login">
				<input style="margin-bottom: 20px;" name="username" placeholder="Username" type="text"> 
				<input style="margin-bottom: 25px;" name="parola" placeholder="Parola" type="password"> 
				<input name="submit" type="submit" class="butonreglog" value="Login">
			</form>
			<div style="margin-top: 5px;color: white;">
				<?php echo $logErr;?>
			</div>
			<p><a href="reset-password.php" id="link_inregistrare">Reset password</a></p>
			<p><a href="register.php" id="link_inregistrare">Creeate new account</a></p>
		</div>
	</div>
	</div>
	<div style="margin:0 auto;width:100%;text-align:center;background:linear-gradient(to bottom,#252525 0,#252525 55%,#1E2223 55%,#1E2223 100%)"><img src="Myimages/bottom.jpg" alt="" style="width:1101"></div>
	<script src="Myjs/jquery-1.12.0.min.js">
	</script> 
	<script src="Myjs/index.js">
	</script>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-101836512-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
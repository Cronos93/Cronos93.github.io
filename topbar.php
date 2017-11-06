<?php
	    if(!isset($_SESSION["username"])){
	echo "<div style='background: -webkit-linear-gradient(top, #484848, #272727);'>
	    <div style='width:1101px;text-align: right;background: -webkit-linear-gradient(top, #484848, #272727);margin: 0 auto;line-height: 45px;/* font-family: arial, sans-serif; */font-family: &quot;Trebuchet MS&quot;, Helvetica, sans-serif;'>
			<img src='http://cycles-plus.com/catalog/view/theme/optimus/images/large-icon-user.png' width='18' height='18' alt='' style='box-shadow: 0 6px 20px -4px black;margin-right: 8px;vertical-align: sub;'><a href='register.php' style='color:white;'>Register</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='http://nabzeroz.ir/images/large-icon-lock.png' width='18' height='18' alt='' style='box-shadow: 0 6px 20px -4px black;margin-right: 8px;vertical-align: sub;'><a href='login.php' style='color:white;margin-right: 20px;'>Login</a>
	    </div>
	    </div>";
	}elseif(isset($_SESSION["username"])){
			$pid = $_SESSION["id"];
	        $username = $_SESSION["username"];
	        $email = $_SESSION["email"];
	echo "<div class='topbar'>
	    <div class='dropdown'>
	        <div class='dropdown1'>
	            <img src='http://www.zyliss.co.uk/skin/frontend/zyliss/default/images/account-icon.png' width='18' height='18' alt='' style='box-shadow: 0 6px 20px -4px black;margin-right: 8px;vertical-align: sub;'><span style='margin-right: 20px;color:white;'>My account ("; echo $_SESSION['username']; echo ")</span>
	            <div class='dropdown-content'>
	                    <a href='profile.php?pid=".$pid."'>My profile</a>
	                    <a href='settings.php'>Settings</a>
	                    <a href='logout.php'>Logout</a>
	            </div>
	        </div>
	    </div>
	    </div>";    
	}
	
	    ?>
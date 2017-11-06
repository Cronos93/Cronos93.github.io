<?php
	include 'dbconnect.php';

	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$usernameErr = $emailErr = $skypeErr = $characterErr = $countryErr = $parolaErr = $cityErr = $birthErr = $unique_nameErr = $hostErr = "";

	if (isset($_POST['submit'])){
	$username = stripslashes($_POST['username']);
	$username = mysqli_real_escape_string($server,$username);
	if (empty($username)) {
		$usernameErr = "*Type the username!";
	}	
	$query_username_exists = mysqli_query($server, "SELECT `Username` FROM utilizatori WHERE `Username`='$username'");
	if(mysqli_num_rows($query_username_exists) == 1){
		$usernameErr = "*Username already exists!";
	}
	$email = stripslashes($_POST['email']);
	$email = mysqli_real_escape_string($server,$email);
	if (empty($email)) {
		$emailErr = "*Type the email!";
	}
	$query_email_exists = mysqli_query($server, "SELECT `Email` FROM utilizatori WHERE `Email`='$email'");
	if(mysqli_num_rows($query_email_exists) == 1){
		$emailErr = "*Email already exists!";
	}
	$skype = stripslashes($_POST['skype']);
	$skype = mysqli_real_escape_string($server,$skype);
	if (empty($skype)) {
		$skypeErr = "*Type the skype address!";
	}
	//data nasterii
	$zi = stripslashes($_POST['zi']);
	$zi = mysqli_real_escape_string($server,$zi);
	$luna = stripslashes($_POST['luna']);
	$luna = mysqli_real_escape_string($server,$luna);
	$an = stripslashes($_POST['an']);
	$an = mysqli_real_escape_string($server,$an);
	if (($zi == "day") || ($luna == "month") || ($an == "year")) {
		$birthErr = "*Choose date of birth!";
	}	
	$nastere = $an."-".$luna."-".$zi;
	$nastere = strtotime($nastere);
	$newformat = date('Y-m-d',$nastere);

	//character
	$character = stripslashes($_POST['character']);
	$character = mysqli_real_escape_string($server,$character);
	if ($character == "Choose") {
		$characterErr = "*Choose a character!";
	}
	//country
	$country = stripslashes($_POST['country']);
	$country = mysqli_real_escape_string($server,$country);
	if ($country == "Choose") {
		$countryErr = "*Choose a country!";
	}
	//city
	$city = stripslashes($_POST['city']);
	$city = mysqli_real_escape_string($server,$city);
	if ($city == "Choose") {
		$cityErr = "*Choose a city!";
	}
	//host
	$host = stripslashes($_POST['host']);
	$host = mysqli_real_escape_string($server,$host);
	if ($host == "Choose") {
		$hostErr = "*Choose a host!";
	}
	//unique_name
	$unique_name = stripslashes($_POST['unique_name']);
	$unique_name = mysqli_real_escape_string($server,$unique_name);
	if (empty($unique_name)) {
		$unique_nameErr = "*Type the Unique Name!";
	}
	//parola
	$password = stripslashes($_POST['parola']);
	$password = mysqli_real_escape_string($server,$password);
	$password1 = stripslashes($_POST['parola1']);
	$password1 = mysqli_real_escape_string($server,$password1);
	if (empty($password) || empty($password1)) {
		$passwordErr = "*Type the password!";
	}elseif ($password != $password1){
		$passwordErr = "*Password is invalid!";
	}
	
	
	if(($usernameErr == "") && ($emailErr == "") && ($skypeErr == "") && ($birthErr == "") && ($characterErr == "") && ($countryErr == "") && ($cityErr == "") && ($passwordErr == "") && ($hostErr == "") && ($unique_nameErr == "")){	
		mysqli_query($server, "INSERT INTO `utilizatori`(`Username`, `Email`, `Skype`, `Birth`, `Character`, `Country`, `City`, `Host`, `Unique Name`, `Password`) VALUES ('$username', '$email', '$skype', '$newformat', '$character', '$country', '$city', '$host', '$unique_name', '$password')");		
		echo "
            <script type=\"text/javascript\">
				alert('Your account was succesfully created!');
            </script>
        ";	
	} 
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAw4LsAKOK+AAAAAAAZ9N8AFO7PABr26gAW+eoAEfPaACH19QCH//4AGfXlABLszQAk9e0AHevYAB/28wAh9vMAH/X2AB726wBZ5ssANuPNACH24wA33K8AGfb0ABjv1gAX9fcAGu/WABP57AAc8eEAHvfpABP47wBL+NwAHPbsAA/w1AAY7tEAHvThADPdrQAY7dQAY+TJACnisAAy58sAE/ryACftwwAd89wAGvTqAB/z3AAk47YAY//pAGHu3wAe9/IAK8ysACT08gAh9/IAEerVAC/fwQAh9OoAGO3dABz4+AAe9+IAGfjwABr25QAU8uAAD+jTACffqQAN79AAGvfzABX76AAh1qoAI+m/ABr29gA25s8AJem/ABPx2wAW79AAHe7CABT48QAY8tAAJuPIABb48QBE488AIfLYABfx0wAo8eMAJOXLABjjsAAe+PEAH/HTACPt1gAV79EAO+nYADHy2AAk+eYAKO/hAIf+9QAe+uwAG+7UAB774QAb9eoAGvf1ABL58AAa+OIAHO3HABDs2wAS3aoAHuvVACf46gAm5rEAGPjzABT78wAY990ALerPAErrywAe9N0AJda1AHDx4gAe8+AATuTGACLkrwAe8NgAIvfdABP35gAV9+YAHt+tACHw0AAi6sgAHOrAAH3//QAd9+YAM9y1ACDjuwAg6cMAHPDZACXhsAAX6skAJOa7AC3kuAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgICAgJ7QjExQkICAgICAgICAntzf3lTZoMVMUICAgICAnt9fUI+aXQmIzF9QgICAntJSUl9hi2FRoBwfUlCAgJuQ0lJfX0EVyFIXgkAEgIZASl8hF99bAMUOTd9LjVCe3uBZAtffWM7NmArfR4nJXtLelU/X31dVA9hFjx9TC97UE92X319OkAQRBh3fVlxGRksbyp9H01qDzA4Ckl9JRkZG2V9fQwzDggySmhJfTECWFFBfXUGHWsoYhpbSX0CAoKCB1wgOxwRBXh+NElOAgICgm19RQ1aInJnF05OAgICAgKCfXtWPUckUhNOAgICAgICAgJ9Tk5OTk4CAgICAvgfAADgBwAAwAMAAIABAACAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgAEAAIABAADAAwAA4AcAAPgfAAA=" rel="icon" type="image/x-icon">
	<link href="Mycss/RegLog.css" rel="stylesheet">
	<link href="Mycss/stylep.css" rel="stylesheet">
	<title>Registration</title>
</head>
<body contenteditable="false" style="margin-left: auto;margin-right: auto;margin-top: 0;margin-bottom: 0;background-image: url(Myimages/bk.jpg)!important;background-repeat: no-repeat;background-position: center center;background-attachment: fixed;">
	<?php include 'topbar.php';?>
	<div style="margin:0 auto;width:1101px;">
		<div>
			<?php include 'meniu.php';?>
		</div>
		<div><img alt="" height="235" src="Myimages/logodmt.jpg" style="box-shadow: 0 6px 20px -4px black;" width="1101"></div>
		<div style="background:rgba(43, 125, 166, 0.18);padding-top: 70px;padding-bottom: 70px;min-height: 1000px;">
			<div class="form">
				<h1 style="color: white;margin-bottom: 30px;">Registration</h1>
				<form action="" id="registration" method="post" name="registration">
					<table style=" margin: 0 auto;">
						<tbody>
							
							<tr>
								<td style=" padding-bottom: 15px;">
									<div style="color: white;width: 135px;padding-right: 7px;text-align: right;line-height: 24px;margin-bottom: 20px;display: table-cell;">Username:
									</div>
								</td>
								<td style=" padding-bottom: 15px;">
									<input name="username" placeholder="Username" type="text">
									<div style="margin-top: 5px;color: white;">
										<?php echo $usernameErr;?>
									</div>
								</td>
							</tr>
							<tr>
								<td style=" padding-bottom: 15px;">
									<div style="color: white;width: 135px;padding-right: 7px;text-align: right;line-height: 24px;margin-bottom: 20px;display: table-cell;">
										Email:
									</div>
								</td>
								<td style=" padding-bottom: 15px;">
									<input name="email" placeholder="Email" type="email">
									<div style="margin-top: 5px;color: white;">
										<?php echo $emailErr;?>
									</div>
								</td>
							</tr><tr>
								<td style=" padding-bottom: 15px;">
									<div style="color: white;width: 135px;padding-right: 7px;text-align: right;line-height: 24px;margin-bottom: 20px;display: table-cell;">Skype</div>
								</td>
								<td style=" padding-bottom: 15px;">
									<input name="skype" placeholder="Skype address" type="text">
									<div style="margin-top: 5px;color: white;">
										<?php echo $skypeErr;?>
									</div>
								</td>
							</tr>
							
							<tr>
								<td style=" padding-bottom: 15px;">
									<div style="color: white;width: 135px;padding-right: 0px;text-align: right;line-height: 24px;margin-bottom: 20px;display: table-cell;">Birth date:
									</div>
								</td>
								<td style=" padding-bottom: 15px;">
									<select name="zi" onblur="this.size=1;" onchange="this.size=1; this.blur();" onfocus="this.size=10;" size="1" style=" font-size: 15px; margin-right: 10px; width: 70px;">
										<option label="day" selected="selected" value="day">day</option>
										<option label="01" value="1">
											01
										</option>
										<option label="02" value="2">
											02
										</option>
										<option label="03" value="3">
											03
										</option>
										<option label="04" value="4">
											04
										</option>
										<option label="05" value="5">
											05
										</option>
										<option label="06" value="6">
											06
										</option>
										<option label="07" value="7">
											07
										</option>
										<option label="08" value="8">
											08
										</option>
										<option label="09" value="9">
											09
										</option>
										<option label="10" value="10">
											10
										</option>
										<option label="11" value="11">
											11
										</option>
										<option label="12" value="12">
											12
										</option>
										<option label="13" value="13">
											13
										</option>
										<option label="14" value="14">
											14
										</option>
										<option label="15" value="15">
											15
										</option>
										<option label="16" value="16">
											16
										</option>
										<option label="17" value="17">
											17
										</option>
										<option label="18" value="18">
											18
										</option>
										<option label="19" value="19">
											19
										</option>
										<option label="20" value="20">
											20
										</option>
										<option label="21" value="21">
											21
										</option>
										<option label="22" value="22">
											22
										</option>
										<option label="23" value="23">
											23
										</option>
										<option label="24" value="24">
											24
										</option>
										<option label="25" value="25">
											25
										</option>
										<option label="26" value="26">
											26
										</option>
										<option label="27" value="27">
											27
										</option>
										<option label="28" value="28">
											28
										</option>
										<option label="29" value="29">
											29
										</option>
										<option label="30" value="30">
											30
										</option>
										<option label="31" value="31">
											31
										</option>
									</select><select name="luna" onblur="this.size=1;" onchange="this.size=1; this.blur();" onfocus="this.size=10;" size="1" style=" font-size: 15px; margin-right: 10px; width: 70px;">
										<option label="month" selected="selected" value="month">month</option>
										<option label="01" value="1">
											01
										</option>
										<option label="02" value="2">
											02
										</option>
										<option label="03" value="3">
											03
										</option>
										<option label="04" value="4">
											04
										</option>
										<option label="05" value="5">
											05
										</option>
										<option label="06" value="6">
											06
										</option>
										<option label="07" value="7">
											07
										</option>
										<option label="08" value="8">
											08
										</option>
										<option label="09" value="9">
											09
										</option>
										<option label="10" value="10">
											10
										</option>
										<option label="11" value="11">
											11
										</option>
										<option label="12" value="12">
											12
										</option>
									</select><select name="an" onblur="this.size=1;" onchange="this.size=1; this.blur();" onfocus="this.size=10;" size="1" style=" font-size: 15px; width: 70px;">
										<option label="year" selected="selected" value="year">year</option>
										<option label="1917" value="1917">
											1917
										</option>
										<option label="1918" value="1918">
											1918
										</option>
										<option label="1919" value="1919">
											1919
										</option>
										<option label="1920" value="1920">
											1920
										</option>
										<option label="1921" value="1921">
											1921
										</option>
										<option label="1922" value="1922">
											1922
										</option>
										<option label="1923" value="1923">
											1923
										</option>
										<option label="1924" value="1924">
											1924
										</option>
										<option label="1925" value="1925">
											1925
										</option>
										<option label="1926" value="1926">
											1926
										</option>
										<option label="1927" value="1927">
											1927
										</option>
										<option label="1928" value="1928">
											1928
										</option>
										<option label="1929" value="1929">
											1929
										</option>
										<option label="1930" value="1930">
											1930
										</option>
										<option label="1931" value="1931">
											1931
										</option>
										<option label="1932" value="1932">
											1932
										</option>
										<option label="1933" value="1933">
											1933
										</option>
										<option label="1934" value="1934">
											1934
										</option>
										<option label="1935" value="1935">
											1935
										</option>
										<option label="1936" value="1936">
											1936
										</option>
										<option label="1937" value="1937">
											1937
										</option>
										<option label="1938" value="1938">
											1938
										</option>
										<option label="1939" value="1939">
											1939
										</option>
										<option label="1940" value="1940">
											1940
										</option>
										<option label="1941" value="1941">
											1941
										</option>
										<option label="1942" value="1942">
											1942
										</option>
										<option label="1943" value="1943">
											1943
										</option>
										<option label="1944" value="1944">
											1944
										</option>
										<option label="1945" value="1945">
											1945
										</option>
										<option label="1946" value="1946">
											1946
										</option>
										<option label="1947" value="1947">
											1947
										</option>
										<option label="1948" value="1948">
											1948
										</option>
										<option label="1949" value="1949">
											1949
										</option>
										<option label="1950" value="1950">
											1950
										</option>
										<option label="1951" value="1951">
											1951
										</option>
										<option label="1952" value="1952">
											1952
										</option>
										<option label="1953" value="1953">
											1953
										</option>
										<option label="1954" value="1954">
											1954
										</option>
										<option label="1955" value="1955">
											1955
										</option>
										<option label="1956" value="1956">
											1956
										</option>
										<option label="1957" value="1957">
											1957
										</option>
										<option label="1958" value="1958">
											1958
										</option>
										<option label="1959" value="1959">
											1959
										</option>
										<option label="1960" value="1960">
											1960
										</option>
										<option label="1961" value="1961">
											1961
										</option>
										<option label="1962" value="1962">
											1962
										</option>
										<option label="1963" value="1963">
											1963
										</option>
										<option label="1964" value="1964">
											1964
										</option>
										<option label="1965" value="1965">
											1965
										</option>
										<option label="1966" value="1966">
											1966
										</option>
										<option label="1967" value="1967">
											1967
										</option>
										<option label="1968" value="1968">
											1968
										</option>
										<option label="1969" value="1969">
											1969
										</option>
										<option label="1970" value="1970">
											1970
										</option>
										<option label="1971" value="1971">
											1971
										</option>
										<option label="1972" value="1972">
											1972
										</option>
										<option label="1973" value="1973">
											1973
										</option>
										<option label="1974" value="1974">
											1974
										</option>
										<option label="1975" value="1975">
											1975
										</option>
										<option label="1976" value="1976">
											1976
										</option>
										<option label="1977" value="1977">
											1977
										</option>
										<option label="1978" value="1978">
											1978
										</option>
										<option label="1979" value="1979">
											1979
										</option>
										<option label="1980" value="1980">
											1980
										</option>
										<option label="1981" value="1981">
											1981
										</option>
										<option label="1982" value="1982">
											1982
										</option>
										<option label="1983" value="1983">
											1983
										</option>
										<option label="1984" value="1984">
											1984
										</option>
										<option label="1985" value="1985">
											1985
										</option>
										<option label="1986" value="1986">
											1986
										</option>
										<option label="1987" value="1987">
											1987
										</option>
										<option label="1988" value="1988">
											1988
										</option>
										<option label="1989" value="1989">
											1989
										</option>
										<option label="1990" value="1990">
											1990
										</option>
										<option label="1991" value="1991">
											1991
										</option>
										<option label="1992" value="1992">
											1992
										</option>
										<option label="1993" value="1993">
											1993
										</option>
										<option label="1994" value="1994">
											1994
										</option>
										<option label="1995" value="1995">
											1995
										</option>
										<option label="1996" value="1996">
											1996
										</option>
										<option label="1997" value="1997">
											1997
										</option>
										<option label="1998" value="1998">
											1998
										</option>
										<option label="1999" value="1999">
											1999
										</option>
										<option label="1999" value="1999">
											2000
										</option>
										<option label="1999" value="1999">
											2001
										</option>
										<option label="1999" value="1999">
											2002
										</option>
										<option label="1999" value="1999">
											2003
										</option>
										<option label="1999" value="1999">
											2004
										</option>
										<option label="1999" value="1999">
											2005
										</option>
										<option label="1999" value="1999">
											2006
										</option>
										<option label="1999" value="1999">
											2007
										</option>
										<option label="1999" value="1999">
											2008
										</option>
										<option label="1999" value="1999">
											2009
										</option>
										<option label="1999" value="1999">
											2010
										</option>
										<option label="1999" value="1999">
											2011
										</option>
										<option label="1999" value="1999">
											2012
										</option>
										<option label="1999" value="1999">
											2013
										</option>
										<option label="1999" value="1999">
											2014
										</option>
										<option label="1999" value="1999">
											2015
										</option>
									</select>
									<div style="margin-top: 5px;color: white;">
										<?php echo $birthErr;?>
									</div>
								</td>
							</tr>
							<tr>
								<td style=" padding-bottom: 15px;">
									<div style="color: white;width: 135px;padding-right: 0px;text-align: right;line-height: 24px;margin-bottom: 20px;display: table-cell;">Character:</div>
								</td>
								<td style=" padding-bottom: 15px;">
									<select name="character" onblur="this.size=1;" onchange="this.size=1; this.blur();" onfocus="this.size=10;" size="1" style=" font-size: 15px; width: 140px;">
										<option value="Choose">Choose</option>
										<option value="Ford">
											Ford
										</option>
										<option value="Nelson">
											Nelson
										</option>
										<option value="Scott">
											Scott
										</option>
										<option value="Arnold ">
											Arnold
										</option>
										<option value="Evans">
											Evans
										</option>
										<option value="Baron">
											Baron
										</option>
										<option value="Richmond">
											Richmond
										</option>
										<option value="Leach">
											Leach
										</option>
										<option value="Cooper">
											Cooper
										</option>
										<option value="Mason">
											Mason
										</option>
										<option value="Gibson">
											Gibson
										</option>
										<option value="Cain">
											Cain
										</option>
										<option value="Banks">
											Banks
										</option>
									</select>
									<div style="margin-top: 5px;color: white;">
										<?php echo $characterErr;?>
									</div>
								</td>
							</tr>
							<tr>
								<td style=" padding-bottom: 15px;">
									<div style="color: white;width: 135px;padding-right: 0px;text-align: right;line-height: 24px;margin-bottom: 20px;display: table-cell;">
										Country:</div>
								</td>
								<td style=" padding-bottom: 15px;">
									<select name="country" onblur="this.size=1;" onchange="this.size=1; this.blur();" onfocus="this.size=10;" size="1" style="font-size: 15px;width: 140px;">
										<option value="Choose">Choose</option>
										<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
									</select>
									<div style="margin-top: 5px;color: white;">
										<?php echo $countryErr;?>
									</div>
								</td>
							</tr>
							<tr>
								<td style=" padding-bottom: 15px;">
									<div style="color: white;width: 135px;padding-right: 0px;text-align: right;line-height: 24px;margin-bottom: 20px;display: table-cell;">
										City:
									</div>
								</td>
								<td style=" padding-bottom: 15px;">
									<input name="city" placeholder="City" type="text">
									<div style="margin-top: 5px;color: white;">
										<?php echo $cityErr;?>
									</div>
								</td>
							</tr>
							<tr>
								<td style=" padding-bottom: 15px;">
									<div style="color: white;width: 135px;padding-right: 0px;text-align: right;line-height: 24px;margin-bottom: 20px;display: table-cell;">Host:</div>
								</td>
								<td style=" padding-bottom: 15px;">
									<select name="host" style=" font-size: 15px; width: 140px;" size="1">
										<option value="Choose">Choose</option>
										<option value="Yes">Yes</option>
										<option value="No">No</option>										
									</select>
									<div style="margin-top: 5px;color: white;">
										<?php echo $hostErr;?>
									</div>
								</td>
							</tr>
							<tr>
								<td style=" padding-bottom: 15px;">
									<div style="color: white;width: 135px;padding-right: 0px;text-align: right;line-height: 24px;margin-bottom: 20px;display: table-cell;">
										Unique Name:
									</div>
								</td>
								<td style=" padding-bottom: 15px;">
									<input name="unique_name" placeholder="Unique Name" type="text">
									<div style="margin-top: 5px;color: white;">
										<?php echo $unique_nameErr;?>
									</div>
								</td>
							</tr>
							<tr>
								<td style=" padding-bottom: 15px;">
									<div style="color: white;width: 135px;padding-right: 7px;text-align: right;line-height: 24px;margin-bottom: 20px;display: table-cell;">
										Password:
									</div>
								</td>
								<td style=" padding-bottom: 15px;"><input name="parola" placeholder="Password" type="password"></td>
							</tr>
							<tr>
								<td style=" padding-bottom: 15px;">
									<div style="color: white;width: 135px;padding-right: 0px;text-align: right;line-height: 24px;margin-bottom: 20px;display: table-cell;">Confirm password:
									</div>
								</td>
								<td style=" padding-bottom: 15px;">
									<input name="parola1" placeholder="Confirm password" type="password">
									<div style="margin-top: 5px;color: white;">
										<?php echo $passwordErr;?>
									</div>
								</td>
							</tr>
						</tbody>
					</table><input class="butonreglog" name="submit" style="margin-top: 8px;" type="submit" value="Register">
				</form>
				<div style="margin-top: 20px;margin-bottom: 25px;color: white;">
									</div>
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
	<script src="Myjs/jquery-1.12.0.min.js">
	</script> 
	<script src="Myjs/index.js">
	</script>
</body>
</html>
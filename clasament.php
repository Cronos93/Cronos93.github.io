<?php
	session_start();

	include 'dbconnect.php';

	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$result = mysqli_query($server, "SELECT * FROM competitii WHERE status='Inscrieri neincepute'");
?>

<html><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAw4LsAKOK+AAAAAAAZ9N8AFO7PABr26gAW+eoAEfPaACH19QCH//4AGfXlABLszQAk9e0AHevYAB/28wAh9vMAH/X2AB726wBZ5ssANuPNACH24wA33K8AGfb0ABjv1gAX9fcAGu/WABP57AAc8eEAHvfpABP47wBL+NwAHPbsAA/w1AAY7tEAHvThADPdrQAY7dQAY+TJACnisAAy58sAE/ryACftwwAd89wAGvTqAB/z3AAk47YAY//pAGHu3wAe9/IAK8ysACT08gAh9/IAEerVAC/fwQAh9OoAGO3dABz4+AAe9+IAGfjwABr25QAU8uAAD+jTACffqQAN79AAGvfzABX76AAh1qoAI+m/ABr29gA25s8AJem/ABPx2wAW79AAHe7CABT48QAY8tAAJuPIABb48QBE488AIfLYABfx0wAo8eMAJOXLABjjsAAe+PEAH/HTACPt1gAV79EAO+nYADHy2AAk+eYAKO/hAIf+9QAe+uwAG+7UAB774QAb9eoAGvf1ABL58AAa+OIAHO3HABDs2wAS3aoAHuvVACf46gAm5rEAGPjzABT78wAY990ALerPAErrywAe9N0AJda1AHDx4gAe8+AATuTGACLkrwAe8NgAIvfdABP35gAV9+YAHt+tACHw0AAi6sgAHOrAAH3//QAd9+YAM9y1ACDjuwAg6cMAHPDZACXhsAAX6skAJOa7AC3kuAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgICAgJ7QjExQkICAgICAgICAntzf3lTZoMVMUICAgICAnt9fUI+aXQmIzF9QgICAntJSUl9hi2FRoBwfUlCAgJuQ0lJfX0EVyFIXgkAEgIZASl8hF99bAMUOTd9LjVCe3uBZAtffWM7NmArfR4nJXtLelU/X31dVA9hFjx9TC97UE92X319OkAQRBh3fVlxGRksbyp9H01qDzA4Ckl9JRkZG2V9fQwzDggySmhJfTECWFFBfXUGHWsoYhpbSX0CAoKCB1wgOxwRBXh+NElOAgICgm19RQ1aInJnF05OAgICAgKCfXtWPUckUhNOAgICAgICAgJ9Tk5OTk4CAgICAvgfAADgBwAAwAMAAIABAACAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgAEAAIABAADAAwAA4AcAAPgfAAA=" rel="icon" type="image/x-icon">
	<link href="css/RegLog.css" rel="stylesheet">
	<link rel="stylesheet" href="css/stylep.css">
	<link rel="stylesheet" href="css/aptC1.css">
	<title>Competitii</title>
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
<body contenteditable="false" style="margin-left: auto;margin-right: auto;margin-top: 0;margin-bottom: 0;background-image: url(images/bk.jpg)!important;background-repeat: no-repeat;background-position: center center;background-attachment: fixed;">
	
	<?php
	if(!isset($_SESSION["nume"]) && !isset($_SESSION["prenume"])){
echo "<div style='background: -webkit-linear-gradient(top, #484848, #272727);'>
	<div style='width:1101px;text-align: right;background: -webkit-linear-gradient(top, #484848, #272727);margin: 0 auto;line-height: 45px;/* font-family: arial, sans-serif; */font-family: &quot;Trebuchet MS&quot;, Helvetica, sans-serif;'>
		<img src='http://cycles-plus.com/catalog/view/theme/optimus/images/large-icon-user.png' width='18' height='18' alt='' style='box-shadow: 0 6px 20px -4px black;margin-right: 8px;vertical-align: sub;'><a href='inregistrare.php' style='color:white;'>Inregistrare</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='http://nabzeroz.ir/images/large-icon-lock.png' width='18' height='18' alt='' style='box-shadow: 0 6px 20px -4px black;margin-right: 8px;vertical-align: sub;'><a href='logare.php' style='color:white;margin-right: 20px;'>Autentificare</a>
	</div>
	</div>";
}elseif(isset($_SESSION["nume"]) && isset($_SESSION["prenume"])){
		$prenume = $_SESSION["prenume"];
		$nume = $_SESSION["nume"];
		$email = $_SESSION["email"];
		if(($email == "cristi.beu93@gmail.com") || ($email == "simonrazvanro@yahoo.com")){
echo "<div class='topbar'>
	<div class='dropdown'>
		<div class='dropdown1'>
			<img src='http://www.zyliss.co.uk/skin/frontend/zyliss/default/images/account-icon.png' width='18' height='18' alt='' style='box-shadow: 0 6px 20px -4px black;margin-right: 8px;vertical-align: sub;'><span style='margin-right: 20px;color:white;'>Contul meu ("; echo $_SESSION['prenume'] . ' ' . $_SESSION['nume']; echo ")</span>
			<div class='dropdown-content'>
					<a href='#'>Profil personal</a>
					<a href='competitiile-mele-viitoare.php'>Competitii</a>
					<a href='setari-cont.php'>Setari cont</a>
					<a href='pagina-admin.php'>Panou administrator</a>
					<a href='logout.php'>Logout</a>
			</div>
		</div>
	</div>
	</div>";	
}elseif(($email != "cristi.beu93@gmail.com") && ($email != "simonrazvanro@yahoo.com")){
echo "<div class='topbar'>
	<div class='dropdown'>
		<div class='dropdown1'>
			<img src='http://www.zyliss.co.uk/skin/frontend/zyliss/default/images/account-icon.png' width='18' height='18' alt='' style='box-shadow: 0 6px 20px -4px black;margin-right: 8px;vertical-align: sub;'><span style='margin-right: 20px;color:white;'>Contul meu ("; echo $_SESSION['prenume'] . ' ' . $_SESSION['nume']; echo ")</span>
			<div class='dropdown-content'>
					<a href='#'>Profil personal</a>
					<a href='competitiile-mele-viitoare.php'>Competitii</a>
					<a href='setari-cont.php'>Setari cont</a>
					<a href='logout.php'>Logout</a>
			</div>
		</div>
	</div>
	</div>";	
}
}
	?>
	
	
	<div style="margin:0 auto;width:1101px;">
	<div>

<?php include 'meniu.php';?>
<script async="" src="https://www.google-analytics.com/analytics.js"></script><script async="" src="https://www.google-analytics.com/analytics.js"></script><script src="jquery-1.12.0.min.js"></script>
<script src="js/index.js"></script>
	</div>
	<div>
		<img src="images/backP.jpg" width="1101" height="235" alt="" style="box-shadow: 0 6px 20px -4px black;">
	</div>
	
<div style="background:#ffebe3;padding-top: 50px;padding-bottom: 70px;min-height: 1300px;text-align: center;"><br><table style="
    width: 402px;
    margin: 0 auto;
    margin-top: 10px;
    display: inline-block;
    margin-right: 40px;
">
<thead>

<tr>
<td colspan="4" class="PozitieVerde" style="
    BACKGROUND: TRANSPARENT;
    border: none;
    padding-bottom: 15px;
"><span style="
    font: 15px Arial, Helvetica, sans-serif;
    font-size: 25px;
    font-weight: bold;
">Clasament simplu 2017 (Open)<br></span></td>











</tr><tr style="
">
<th class="Diez" style="padding-top: 15px;padding-bottom: 15px;padding-left: 10px;padding-right: 10px;background: -webkit-linear-gradient(top,#9f3210,#471708);background: -o-linear-gradient(top,#9f3210,#471708);background: -moz-linear-gradient(top,#9f3210,#471708);color: white;">#</th>
<th class="Jucator" style="
    padding-top: 15px;
    padding-bottom: 15px;
    background: -webkit-linear-gradient(top,#9f3210,#471708);
    background: -o-linear-gradient(top,#9f3210,#471708);
    background: -moz-linear-gradient(top,#9f3210,#471708);
    color: white;
">Jucator</th>



<th class="Cifre" style="padding: 6px 3px;padding-top: 15px;padding-bottom: 15px;padding-left: 10px;padding-right: 10px;background: -webkit-linear-gradient(top,#9f3210,#471708);background: -o-linear-gradient(top,#9f3210,#471708);background: -moz-linear-gradient(top,#9f3210,#471708);color: white;">Turnee</th>
<th class="Cifre" style="
    padding-top: 15px;
    padding-bottom: 15px;
    padding-left: 10px;
    padding-right: 10px;
    background: -webkit-linear-gradient(top,#9f3210,#471708);
    background: -o-linear-gradient(top,#9f3210,#471708);
    background: -moz-linear-gradient(top,#9f3210,#471708);
    color: white;
">Puncte</th>



</tr>
</thead>
<tbody>
<tr>
<td class="PozitieVerde" style="background: white;">1</td>
<td class="JucatorL" style="
    background: white;
">Mircea HABEAN</td>



<td class="noBold" style="
    background: white;
">3</td>
<td class="Cifre" style="background: white;">390</td>





</tr>
<tr>
<td class="PozitieVerde" style="background: #e7e7e7;">2</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Dragos DUCEAC</td>



<td class="noBold" style="background: #e7e7e7;">1</td>
<td class="Cifre" style="background: #e7e7e7;">320</td>





</tr>
<tr>
<td class="PozitieVerde" style="
    background: white;
">3</td>
<td class="JucatorL" style="
    background: white;
">Ionut FULEA</td>



<td class="noBold" style="
    background: white;
">4</td>
<td class="Cifre" style="
    background: white;
">220</td>





</tr>
<tr>
<td class="PozitieVerde" style="background: #e7e7e7;">4</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Cristian BEU</td>



<td class="noBold" style="
    background: #e7e7e7;
">3</td>
<td class="Cifre" style="
    background: #e7e7e7;
">210</td>





</tr>
<tr>
<td class="PozitieVerde" style="
    background: white;
">5</td>
<td class="JucatorL" style="
    background: white;
">Razvan SIMON</td>



<td class="noBold" style="
    background: white;
">3</td>
<td class="Cifre" style="
    background: white;
">200</td>





</tr>
<tr>
<td class="PozitieVerde" style="
    background: #e7e7e7;
">6</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Vicentiu MICLAUS</td>



<td class="noBold" style="
    background: #e7e7e7;
">2</td>
<td class="Cifre" style="
    background: #e7e7e7;
">200</td>





</tr>
<tr>
<td class="PozitieVerde" style="
    background: white;
">7</td>
<td class="JucatorL" style="
    background: white;
">Daniel IFTIME</td>



<td class="noBold" style="
    background: white;
">3</td>
<td class="Cifre" style="
    background: white;
">160</td>





</tr>
<tr>
<td class="PozitieVerde" style="
    background: #e7e7e7;
">8</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Bogdan RIZZOLO</td>



<td class="noBold" style="
    background: #e7e7e7;
">1</td>
<td class="Cifre" style="
    background: #e7e7e7;
">160</td>





</tr>
<tr>
<td class="PozitieRosu" style="
    background: white;
">9</td>
<td class="JucatorL" style="
    background: white;
">Romulus BANCIU</td>



<td class="noBold" style="
    background: white;
">4</td>
<td class="Cifre" style="
    background: white;
">130</td>





</tr>
<tr>
<td class="PozitieRosu" style="
    background: #e7e7e7;
">10</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Marius TROANCA</td>



<td class="noBold" style="
    background: #e7e7e7;
">4</td>
<td class="Cifre" style="
    background: #e7e7e7;
">120</td>





</tr>
<tr>
<td class="PozitieRosu" style="
    background: white;
">11</td><td class="JucatorL" style="
    background: white;
">Liviu MURARIU</td>



<td class="noBold" style="
    background: white;
">2</td>
<td class="Cifre" style="
    background: white;
">90</td>





</tr>
<tr>
<td class="PozitieRosu" style="
    background: #e7e7e7;
">12</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Tudor FANTANARIU</td>



<td class="noBold" style="
    background: #e7e7e7;
">1</td>
<td class="Cifre" style="
    background: #e7e7e7;
">80</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: white;
">13</td>
<td class="JucatorL" style="
    background: white;
">Lavinius ALBU</td>



<td class="noBold" style="
    background: white;
">3</td>
<td class="Cifre" style="
    background: white;
">70</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: #e7e7e7;
">14</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Cosmin COCA</td>



<td class="noBold" style="
    background: #e7e7e7;
">2</td>
<td class="Cifre" style="
    background: #e7e7e7;
">70</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: white;
">15</td>
<td class="JucatorL" style="
    background: white;
">Cristian MUREANU</td>



<td class="noBold" style="
    background: white;
">3</td>
<td class="Cifre" style="
    background: white;
">65</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: #e7e7e7;
">16</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Onut CIUBAN</td>



<td class="noBold" style="
    background: #e7e7e7;
">4</td>
<td class="Cifre" style="
    background: #e7e7e7;
">55</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: white;
">17</td>
<td class="JucatorL" style="
    background: white;
">Georgian CIMPOERU</td>



<td class="noBold" style="
    background: white;
">2</td>
<td class="Cifre" style="
    background: white;
">50</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: #e7e7e7;
">18</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Constantin BADEA</td>



<td class="noBold" style="
    background: #e7e7e7;
">1</td>
<td class="Cifre" style="
    background: #e7e7e7;
">40</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: white;
">19</td>
<td class="JucatorL" style="
    background: white;
">Ovidiu POSTELNICU</td>



<td class="noBold" style="
    background: white;
">3</td><td class="Cifre" style="
    background: white;
">40</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: #e7e7e7;
">20</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Marcel BACILA</td>



<td class="noBold" style="
    background: #e7e7e7;
">1</td>
<td class="Cifre" style="
    background: #e7e7e7;
">40</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: white;
">21</td>
<td class="JucatorL" style="
    background: white;
">Eugen GASPAR</td>



<td class="noBold" style="
    background: white;
">2</td>
<td class="Cifre" style="
    background: white;
">30</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: #e7e7e7;
">22</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Stefan MARGINEAN</td>



<td class="noBold" style="
    background: #e7e7e7;
">1</td>
<td class="Cifre" style="
    background: #e7e7e7;
">30</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: white;
">23</td><td class="JucatorL" style="
    background: white;
">Tiberiu BANCIU</td>



<td class="noBold" style="
    background: white;
">2</td>
<td class="Cifre" style="
    background: white;
">30</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: #e7e7e7;
">24</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Thibaut DESMONS</td>



<td class="noBold" style="
    background: #e7e7e7;
">1</td>
<td class="Cifre" style="
    background: #e7e7e7;
">20</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: white;
">25</td>
<td class="JucatorL" style="
    background: white;
">Adrian BACEA</td>



<td class="noBold" style="
    background: white;
">1</td>
<td class="Cifre" style="
    background: white;
">20</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: #e7e7e7;
">26</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Alexander GRAFFIUS</td>



<td class="noBold" style="
    background: #e7e7e7;
">2</td>
<td class="Cifre" style="
    background: #e7e7e7;
">20</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: white;
">27</td>
<td class="JucatorL" style="
    background: white;
">Alexandru VASILE</td>



<td class="noBold" style="
    background: white;
">1</td>
<td class="Cifre" style="
    background: white;
">20</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: #e7e7e7;
">28</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Patric ORDEAN</td>



<td class="noBold" style="
    background: #e7e7e7;
">1</td>
<td class="Cifre" style="
    background: #e7e7e7;
">15</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: white;
">29</td>
<td class="JucatorL" style="
    background: white;
">Virgil NICULA</td>



<td class="noBold" style="
    background: white;
">1</td>
<td class="Cifre" style="
    background: white;
">15</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: #e7e7e7;
">30</td><td class="JucatorL" style="
    background: #e7e7e7;
">Adnana POPA</td>



<td class="noBold" style="
    background: #e7e7e7;
">1</td>
<td class="Cifre" style="
    background: #e7e7e7;
">10</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: white;
">31</td>
<td class="JucatorL" style="
    background: white;
">Alex DAMIAN</td>



<td class="noBold" style="
    background: white;
">1</td>
<td class="Cifre" style="
    background: white;
">10</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: #e7e7e7;
">32</td><td class="JucatorL" style="
    background: #e7e7e7;
">Ciprian BELDEAN</td>



<td class="noBold" style="
    background: #e7e7e7;
">1</td>
<td class="Cifre" style="
    background: #e7e7e7;
">10</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: white;
">33</td>
<td class="JucatorL" style="
    background: white;
">Eugen CRUCEAT</td>



<td class="noBold" style="
    background: white;
">1</td>
<td class="Cifre" style="
    background: white;
">10</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: #e7e7e7;
">34</td><td class="JucatorL" style="
    background: #e7e7e7;
">Florin STOICA</td>



<td class="noBold" style="
    background: #e7e7e7;
">1</td>
<td class="Cifre" style="
    background: #e7e7e7;
">10</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: white;
">35</td>
<td class="JucatorL" style="
    background: white;
">Gabriel LINTE</td>



<td class="noBold" style="
    background: white;
">1</td>
<td class="Cifre" style="
    background: white;
">10</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: #e7e7e7;
">36</td><td class="JucatorL" style="
    background: #e7e7e7;
">Ionut MOCANU</td>



<td class="noBold" style="
    background: #e7e7e7;
">1</td>
<td class="Cifre" style="
    background: #e7e7e7;
">10</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: white;
">37</td>
<td class="JucatorL" style="
    background: white;
">Lucian SECELEAN</td>



<td class="noBold" style="
    background: white;
">1</td>
<td class="Cifre" style="
    background: white;
">10</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: #e7e7e7;
">38</td><td class="JucatorL" style="
    background: #e7e7e7;
">Radu HASEGAN</td>



<td class="noBold" style="
    background: #e7e7e7;
">1</td>
<td class="Cifre" style="
    background: #e7e7e7;
">10</td>

</tr><tr>
<td class="PozitieRosu" style="
    background: white;
">39</td>
<td class="JucatorL" style="
    background: white;
">Virgil CHECEC</td>



<td class="noBold" style="
    background: white;
">1</td>
<td class="Cifre" style="
    background: white;
">10</td>

</tr>


</tbody>
</table><table style="
    width: auto;
    margin: 0 auto;
    margin-top: 10px;
    display: inline-block;
    margin-left: 40px;
    vertical-align: top;
">
<thead style="
">

<tr>
<td colspan="4" class="PozitieVerde" style="
    BACKGROUND: TRANSPARENT;
    border: none;
    padding-bottom: 15px;
"><span style="
    font: 15px Arial, Helvetica, sans-serif;
    font-size: 25px;
    font-weight: bold;
">Clasament dublu 2017<br></span></td>











</tr><tr style="
">
<th class="Diez" style="padding-top: 15px;padding-bottom: 15px;padding-left: 10px;padding-right: 10px;background: -webkit-linear-gradient(top,#9f3210,#471708);background: -o-linear-gradient(top,#9f3210,#471708);background: -moz-linear-gradient(top,#9f3210,#471708);color: white;">#</th>
<th class="Jucator" style="
    padding-top: 15px;
    padding-bottom: 15px;
    background: -webkit-linear-gradient(top,#9f3210,#471708);
    background: -o-linear-gradient(top,#9f3210,#471708);
    background: -moz-linear-gradient(top,#9f3210,#471708);
    color: white;
">Jucator</th>



<th class="Cifre" style="padding: 6px 3px;padding-top: 15px;padding-bottom: 15px;padding-left: 10px;padding-right: 10px;background: -webkit-linear-gradient(top,#9f3210,#471708);background: -o-linear-gradient(top,#9f3210,#471708);background: -moz-linear-gradient(top,#9f3210,#471708);color: white;">Turnee</th>
<th class="Cifre" style="
    padding-top: 15px;
    padding-bottom: 15px;
    padding-left: 10px;
    padding-right: 10px;
    background: -webkit-linear-gradient(top,#9f3210,#471708);
    background: -o-linear-gradient(top,#9f3210,#471708);
    background: -moz-linear-gradient(top,#9f3210,#471708);
    color: white;
">Puncte</th>



</tr>
</thead>
<tbody>
<tr>
<td class="PozitieVerde" style="background: white;">1</td>
<td class="JucatorL" style="
    background: white;
">Razvan SIMON</td>



<td class="noBold" style="
    background: white;
">3</td>
<td class="Cifre" style="background: white;">80</td>





</tr>
<tr>
<td class="PozitieVerde" style="background: #e7e7e7;">2</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Cristian BEU</td>



<td class="noBold" style="background: #e7e7e7;">3</td>
<td class="Cifre" style="background: #e7e7e7;">70</td>





</tr>
<tr>
<td class="PozitieVerde" style="
    background: white;
">3</td>
<td class="JucatorL" style="
    background: white;
">Tudor FANTANARIU</td>



<td class="noBold" style="
    background: white;
">3</td>
<td class="Cifre" style="
    background: white;
">70</td>





</tr>
<tr>
<td class="PozitieVerde" style="
    background: #e7e7e7;
">4</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Alexandru VASILE</td>



<td class="noBold" style="
    background: #e7e7e7;
">2</td>
<td class="Cifre" style="
    background: #e7e7e7;
">50</td>





</tr><tr>
<td class="PozitieVerde" style="background: white;">5</td>
<td class="JucatorL" style="
    background: white;
">Daniel IFTIME</td>



<td class="noBold" style="
    background: white;
">1</td>
<td class="Cifre" style="
    background: white;
">20</td>





</tr>
<tr>
<td class="PozitieVerde" style="
    background: #e7e7e7;
">6</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Mircea HABEAN</td>



<td class="noBold" style="
    background: #e7e7e7;
">1</td>
<td class="Cifre" style="
    background: #e7e7e7;
">20</td>





</tr>
<tr>
<td class="PozitieVerde" style="
    background: white;
">7</td>
<td class="JucatorL" style="
    background: white;
">Onut CIUBAN</td>



<td class="noBold" style="
    background: white;
">2</td>
<td class="Cifre" style="
    background: white;
">20</td>





</tr>
<tr>
<td class="PozitieVerde" style="
    background: #e7e7e7;
">8</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Lavinius ALBU</td>



<td class="noBold" style="
    background: #e7e7e7;
">1</td>
<td class="Cifre" style="
    background: #e7e7e7;
">10</td>





</tr>
<tr>
<td class="PozitieVerde" style="
    background: white;
">9</td>
<td class="JucatorL" style="
    background: white;
">Marius TROANCA</td>



<td class="noBold" style="
    background: white;
">1</td>
<td class="Cifre" style="
    background: white;
">10</td>





</tr><tr>
<td class="PozitieVerde" style="
    background: #e7e7e7;
">10</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Georgian CIMPOERU</td>



<td class="noBold" style="
    background: #e7e7e7;
">1</td>
<td class="Cifre" style="
    background: #e7e7e7;
">10</td>





</tr><tr>
<td class="PozitieVerde" style="
    background: white;
">11</td>
<td class="JucatorL" style="
    background: white;
">Romulus BANCIU</td>



<td class="noBold" style="
    background: white;
">1</td>
<td class="Cifre" style="
    background: white;
">10</td>





</tr><tr>
<td class="PozitieVerde" style="
    background: #e7e7e7;
">12</td>
<td class="JucatorL" style="
    background: #e7e7e7;
">Stefan MARGINEAN</td>



<td class="noBold" style="
    background: #e7e7e7;
">1</td>
<td class="Cifre" style="
    background: #e7e7e7;
">10</td>





</tr>






</tbody>
</table>
	</div>
	
	</div>
	<div style="margin:0 auto;width:100%;text-align:center;background:linear-gradient(to bottom,#252525 0,#252525 55%,#1E2223 55%,#1E2223 100%)"><img src="images/bottom.jpg" alt="" style="width:1101"></div>
	
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
	<script src="jquery-1.12.0.min.js">
	</script> 
	<script src="js/index.js">
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
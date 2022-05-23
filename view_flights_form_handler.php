<?php
	session_start();
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Railways</title>

  <link rel="stylesheet" href="css/main2.css">
  <link rel="icon" href="RAILWAIT.png">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
  <header>
    <div id="logo" onclick="slowScroll('#top')">
     <span>AITU Railways</span>
    </div>
    <div id="about">

      <a href="#" onclick="slowScroll('#contacts')" title="Contacts">Contacts/a>
      <a href="#" onclick="slowScroll('#faq')" title="FAQ">FAQ</a>
      <a href="customer_homepage.php" onclick="slowScroll('#profile')" title="Profile">Profile page</a>


    </div>
  </header>
<div id="top" style="padding-top: 300px">
	<div style="background-color: white; border-radius: 50px; margin-left: 300px; margin-right: 300px; height: 230px">
		<h2>AVAILABLE RAILWAYS</h2>
		<?php
			if(isset($_POST['Search']))
			{
				$data_missing=array();
				if(empty($_POST['origin']))
				{
					$data_missing[]='Origin';
				}
				else
				{
					$origin=$_POST['origin'];
				}
				if(empty($_POST['destination']))
				{
					$data_missing[]='Destination';
				}
				else
				{
					$destination=$_POST['destination'];
				}

				if(empty($_POST['dep_date']))
				{
					$data_missing[]='Departure Date';
				}
				else
				{
					$dep_date=trim($_POST['dep_date']);
				}
				if(empty($_POST['no_of_pass']))
				{
					$data_missing[]='No. of Passengers';
				}
				else
				{
					$no_of_pass=trim($_POST['no_of_pass']);
				}

				if(empty($_POST['class']))
				{
					$data_missing[]='Class';
				}
				else
				{
					$class=trim($_POST['class']);
				}

				if(empty($data_missing))
				{
					$_SESSION['no_of_pass']=$no_of_pass;
					$_SESSION['class']=$class;
					$count=1;
					$_SESSION['count']=$count;
					$_SESSION['journey_date']=$dep_date;
					require_once('Database Connection file/mysqli_connect.php');
					if($class=="economy")
					{
						$query="SELECT railway_no,from_city,to_city,departure_date,departure_time,arrival_date,arrival_time,price_economy FROM Railway_Details where from_city=? and to_city=? and departure_date=? and seats_economy>=? ORDER BY  departure_time";
						$stmt=mysqli_prepare($dbc,$query);
						mysqli_stmt_bind_param($stmt,"sssi",$origin,$destination,$dep_date,$no_of_pass);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$railway_no,$from_city,$to_city,$departure_date,$departure_time,$arrival_date,$arrival_time,$price_economy);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt)==0)
						{
							echo "<h3 style=\"padding-top: 40px; color: black\">No railways are available !</h3>";
						}
						else
						{
							echo "<form action=\"book_tickets2.php\" method=\"post\" style=\"padding-left: 30px; padding-top: 15px\">";
							echo "<table cellpadding=\"10\"";
							echo "<tr><th>Railway No.</th>
							<th>Origin</th>
							<th>Destination</th>
							<th>Departure Date</th>
							<th>Departure Time</th>
							<th>Arrival Date</th>
							<th>Arrival Time</th>
							<th>Price(Economy)</th>
							<th>Select</th>
							</tr>";
							while(mysqli_stmt_fetch($stmt)) {
        						echo "<tr>
        						<td>".$railway_no."</td>
        						<td>".$from_city."</td>
								<td>".$to_city."</td>
								<td>".$departure_date."</td>
								<td>".$departure_time."</td>
								<td>".$arrival_date."</td>
								<td>".$arrival_time."</td>
								<td>&#x20b8; ".$price_economy."</td>
								<td><input type=\"radio\" name=\"select_railway\" value=\"".$railway_no."\"></td>
        						</tr>";
    						}
    						echo "</table> <br>";
    						echo "<input type=\"submit\" value=\"Select Railway\" name=\"Select\" style=\"margin-right: 50px; padding-left: 17px\">";
    						echo "</form>";
    					}
					}
					else if($class="business")
					{
						$query="SELECT railway_no,from_city,to_city,departure_date,departure_time,arrival_date,arrival_time,price_business FROM Railway_Details where from_city=? and to_city=? and departure_date=? and seats_business>=? ORDER BY  departure_time";
						$stmt=mysqli_prepare($dbc,$query);
						mysqli_stmt_bind_param($stmt,"sssi",$origin,$destination,$dep_date,$no_of_pass);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$railway_no,$from_city,$to_city,$departure_date,$departure_time,$arrival_date,$arrival_time,$price_business);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt)==0)
						{
							echo "<h3>No railways are available !</h3>";
						}
						else
						{
							echo "<form action=\"book_tickets2.php\" method=\"post\" style=\"padding-left: 300px\">";
							echo "<table cellpadding=\"10\"";
							echo "<tr><th>Railway No.</th>
							<th>Origin</th>
							<th>Destination</th>
							<th>Departure Date</th>
							<th>Departure Time</th>
							<th>Arrival Date</th>
							<th>Arrival Time</th>
							<th>Price(Business)</th>
							<th>Select</th>
							</tr>";
							while(mysqli_stmt_fetch($stmt)) {
        						echo "<tr>
        						<td>".$railway_no."</td>
        						<td>".$from_city."</td>
								<td>".$to_city."</td>
								<td>".$departure_date."</td>
								<td>".$departure_time."</td>
								<td>".$arrival_date."</td>
								<td>".$arrival_time."</td>
								<td>&#x20b8; ".$price_business."</td>
								<td><input type=\"radio\" name=\"select_railway\" value=".$railway_no."></td>
        						</tr>";
    						}
    						echo "</table> <br>";
    						echo "<input type=\"submit\" value=\"Select Railway\" name=\"Select\" style=\"margin-right: 290px\">";
    						echo "</form>";
    					}
					}	
					mysqli_stmt_close($stmt);
					mysqli_close($dbc);
					// else
					// {
					// 	echo "Submit Error";
					// 	echo mysqli_error();
					// }
				}
				else
				{
					echo "The following data fields were empty! <br>";
					foreach($data_missing as $missing)
					{
						echo $missing ."<br>";
					}
				}
			}
			else
			{
				echo "Search request not received";
			}
		?>
	</div>
</div>

	 <footer id="footer" class="footer-1">
<div class="main-footer widgets-dark typo-light">
<div class="container">
<div class="row">

<div class="col-xs-12 col-sm-6 col-md-3">
<div class="widget subscribe no-box">
<h5 class="widget-title">AITU Railways<span></span></h5>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
</div>
</div>

<div class="col-xs-12 col-sm-6 col-md-3">
<div class="widget no-box">
<h5 class="widget-title">Quick Links<span></span></h5>
<ul class="thumbnail-widget">

<li>
<div class="thumb-content"><a href="dev.html">About developers</a></div>
</li>

<li>
<div class="thumb-content"><a href="#.">Tickets</a></div>
</li>
<li>
<div class="thumb-content"><a href="news.html">News</a></div>
</li>
</ul>
</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-3">
<div class="widget no-box">
<h5 class="widget-title">Get Started<span></span></h5>
<p>Search and Buy Ralway tickets.</p>
<a class="btn" href="#." target="_blank">Register Now</a>
</div>
</div>



<div class="col-xs-12 col-sm-6 col-md-3">

<div class="widget no-box">
<h5 class="widget-title">Contact Us<span></span></h5>

<p><a href="mailto:info@domain.com" title="glorythemes">aiturailways@gmail.com</a></p>
<ul class="social-footer2">
<li class=""><a href="" target="_blank" title="Facebook"><img src="facebook.png" width="30" height="30" ></a></li>
<li class=""><a href="https://t.me/Obitosdespair" target="_blank" title="Telegram"><img src="telegram.png" width="30" height="30" ></a></li>
<li class=""><a title="instagram" target="_blank" href=""><img src="instagram.png" width="30" height="30" ></a></li>
</ul>
</div>
</div>

</div>
</div>
</div>

<div class="footer-copyright">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<p>LLC AITU Railways © 2021. All rights reserved.</p>
</div>
</div>
</div>
</div>
</footer>
	</body>
</html>
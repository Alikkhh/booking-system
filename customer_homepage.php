<?php
  session_start();
?>

<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Railways</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
  <header>
    <div id="logo" onclick="slowScroll('#top')">
       <span href="login_page.php" target="_blank">AITU Railways</span>
    </div>
    <div id="about">

      <a href="#" onclick="slowScroll('#contacts')" title="Contacts">Contacts</a>
      <a href="#" onclick="slowScroll('#faq')" title="FAQ">FAQ</a>
        <a href="#" onclick="slowScroll('#profile')" title="Profile">Pofile page</a>
    </div>
  </header>

  <div id="top" style="padding-top: 200px">
    <div class="box" style="background-color: white; border-radius: 20px; margin-left: 600px; margin-right: 600px; height: 200px">
      <?php
      echo "<h1>Welcome, ".$_SESSION['login_user']."!</h1>"; 
      require_once('Database Connection file/mysqli_connect.php');
      $query="SELECT count(*),frequent_psng_no,mileage FROM Frequent_Psng_Details WHERE customer_id=?";
      $stmt=mysqli_prepare($dbc,$query);
      mysqli_stmt_bind_param($stmt,"s",$_SESSION['login_user']);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_bind_result($stmt,$cnt,$frequent_psng_no,$mileage);
      mysqli_stmt_fetch($stmt);
      if($cnt==1)
      {
        echo "<h4 style='padding-left: 20px;'>Frequent Passenger No.: ".$frequent_psng_no."&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Mileage: ".$mileage." points</h4><br>";
      }
      mysqli_stmt_close($stmt);
      mysqli_close($dbc);
    ?>
    <table cellpadding="5" style="margin-left: 70px">
      <tr>
        <td class="admin_func"><a href="home_page.php" >Book Railway Tickets</a>
        </td>
      </tr>
      <tr>
        <td class="admin_func"><a href="view_booked_tickets.php">View Booked Railway Tickets</a>
        </td>
      </tr>
      <tr>
        <td class="admin_func"><a href="cancel_booked_tickets.php">Cancel Booked Railway Tickets</a>
        </td>
      </tr>
      <tr>
        <td class="admin_func"><a href="changepwd.php">Change Password</a>
        </td>
        <tr>
        <td class="admin_func"><a href="logout_handler.php">Log Out</a>
        </td>
      </tr>
    </table>
  </div>

  </div>

  <footer id="footer" class="footer-1">
  <div class="main-footer widgets-dark typo-light">
  <div class="container">
  <div class="row">

  <div class="col-xs-12 col-sm-6 col-md-3">
  <div class="widget subscribe no-box">
  <h5 class="widget-title">AITU Railways<span></span></h5>
  <p>Aitu railways are always cheap tickets and comfortable travel. Buy tickets only from us. </p>
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
    <div class="thumb-content"><a href="news.html">News</a></div>
    </li>
  </ul>
  </div>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-3">
  <div class="widget no-box">
  <h5 class="widget-title">Get Started<span></span></h5>
  <p>Search and Buy Ralway tickets..</p>
  <a class="btn" href="login_page.php" target="_blank">Register Now</a>
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
  <p>Copyright AITU Railways © 2021. All rights reserved.</p>
  </div>
  </div>
  </div>
  </div>
  </footer>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
     function slowScroll(id) {
       $('html, body').animate({
         scrollTop: $(id).offset().top
       }, 500);
     }

     $(document).on("scroll", function () {
       if($(window).scrollTop() === 0)
         $("header").removeClass("fixed");
       else
         $("header").attr("class", "fixed");
     });
   </script>



</body>
</html>

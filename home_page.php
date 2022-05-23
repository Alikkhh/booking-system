<?php
  session_start();
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Railways</title>

  <link rel="stylesheet" href="css/main.css">
  <link rel="icon" href="RAILWAIT.png">

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
      <a href="customer_homepage.php" onclick="slowScroll('#profile')" title="Profile">Profile page</a>


    </div>
  </header>


  <div id="top">
    <form action="view_flights_form_handler.php" method="post" style="padding-top: 300px">
      <h2 style="color: white">SEARCH FOR AVAILABLE RAILWAYS</h2>

          <td class="fix_table">
            <input list="origins" name="origin" placeholder="From" required>
              <datalist id="origins">
              <option value="Nur-Sultan">
              <option value="Semey">
              <option value="Uralsk">
              <option value="Almaty">
              </datalist>
           </td>
          <td class="fix_table">
            <input list="destinations" name="destination" placeholder="To" required>
              <datalist id="destinations">
                  <option value="Almaty">
                  <option value="Shymkent">
                  <option value="Aktau">
                  <option value="Nur-Sultan">
                  <option value="Pavlodar">
              </datalist>
           </td>

      <br>
      <br>

          <td class="fix_table"><input type="date" placeholder="Departure Date" name="dep_date" min=
            <?php 
              $todays_date=date('Y-m-d'); 
              echo $todays_date;
            ?> 
            max=
            <?php 
              $max_date=date_create(date('Y-m-d'));
              date_add($max_date,date_interval_create_from_date_string("90 days")); 
              echo date_format($max_date,"Y-m-d");
            ?> required></td>
          <td class="fix_table"><input type="number" name="no_of_pass" placeholder="Number of pass" required></td>
    
      <br>
        <tr>
          <p style="color: white">Enter the Class</p>
        </tr>
        <tr>
          <td class="fix_table">
            <select name="class">
                <option value="economy">Economy</option>
                <option value="business">Business</option>
              </select>
            </td>
        </tr>
      <br>
      <input type="submit" value="Search" name="Search">
    </form>
  </div>


    <div id="contacts">
    <center><h5>Contacts</h5></center>
    <form id="form_input">
      <label for="name">Name <span>*</span></label><br>
      <input type="text" placeholder="Enter name" name="name" id="name"><br>
      <label for="email">Email <span>*</span></label><br>
      <input type="email" placeholder="Enter email" name="email" id="email"><br>
      <label for="message">Message <span>*</span></label><br>
      <textarea placeholder="Enter your message" name="message" id="message"></textarea><br>
      <div id="mess_send" class="btn">Submit</div>
    </form>
  </div>


  <div id="faq">
   <div>
     <span class="title">Payment</span><br>
     <span class="heading">How will the payment be processed?</span>
     <p>Payment on the site will be through bank cards or through online banking. To pay for the booked tickets, you need to enter in the appropriate fields of the form.</p>

   </div>
   <div>
     <span class="title">Information</span><br>
     <span class="heading">What is included in the service</span>
     <p>Our service offers railway tickets to the directions of Kazakhstan. The passenger can choose the common or luxury class. In accordance with these classes, our offers various additional services such as food, entertainment and more.</p>

   </div>
   <div>
     <span class="title">Warranty</span><br>
     <span class="heading">What guarantees are there</span>
     <p>Our site guarantees that you can quickly buy a ticket for your trip. Also, in case of any error on the part of the site, we guarantee a refund of the money you paid.</p>
 
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
<p>Search and Buy Ralway tickets.</p>
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
<p>LLC AITU Railways © 2021. All rights reserved.</p>
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

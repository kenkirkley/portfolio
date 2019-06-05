<?php

if ($_POST["submit"]) {

      
      
     if (!$_POST['name']) {

       $error="<br />Please enter your name";

     }
      
     if (!$_POST['email']) {

       $error.="<br />Please enter your email address";

     }
     
     
     if (!$_POST['phone']) {
     
      $error.="<br /> Please enter your phone number";
     
     }
     
      
     if (!$_POST['message']) {

       $error.="<br />Please enter a message";

     }
      
     if ($_POST['email']!="" AND !filter_var($_POST['email'],
FILTER_VALIDATE_EMAIL)) {
      
     $error.="<br />Please enter a valid email address";

     }
     
      
     if ($error) {

 $result='<div class="alert alert-danger"><strong>There were error(s)
in your form:</strong>'.$error.'</div>';

     } else {


      /* THE EMAIL WHERE YOU WANT TO RECIEVE THE CONTACT MESSAGES */
 if (mail("info@youremailaddress.com", "Message from Your Website Name",
  
 
"Name: ".$_POST['name']."
Email: ".$_POST['email']."
Phone: ".$_POST['phone']." 
Message: ".$_POST['message'])) {
$result='<div class="alert alert-success"> <strong> Thank
you!</strong> We\'ll get back to you shortly.</div>';
} else {
$result='<div class="alert alert-danger">Sorry, there was
an error sending your message. Please try again later.</div>';
}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1" name="viewport">

  <meta content="" name="description">
  <!-- Meta Description -->


  <title>Contact Air Conditioners Company</title>

      <!--CSS Stylesheets -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <link href="css/navbar.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/contact-page-styling.css" />


  <!--Google Font styles -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">

  <!--Favicon goes here -->
  <link href="images/xyz-favicon.png" rel="icon">
  
</head>

<body>

  <div id="top-banner">

    <p class="contactnumber">Contact Number</p>
    <!--contact number of the company goes here-->

    <div class="row">

      <div align="center" class="col-md-6 col-md-offset-3">

        <a href="https://www.kenkirkley.com/ProductWebsite/"><img alt="xyz-logo" class="img-responsive" src="images/xyz-logo.jpg"></a>

        <h1>Quality Air Conditioners</h1>

      </div><!--end col-md-6-->

    </div><!--end row-->

  </div><!--end top-banner-->


  <nav class="navbar navbar-default navbar-static-top" id="topnavbar" role="navigation">

    <div class="navbar-header">

        <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">

            <span class="sr-only">Toggle navigation</span> 

                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span>

        </button>

    </div><!--- /.navbar-header-->


    <div align="center" class="collapse navbar-collapse">

        <ul class="nav navbar-nav">

            <li><a href="https://www.kenkirkley.com/ProductWebsite/air-conditioners.html">AIR CONDITIONERS</a></li>

            <li><a href="https://www.kenkirkley.com/ProductWebsite/about.html">ABOUT</a></li>

            <li><a href="https://www.kenkirkley.com/ProductWebsite/place-an-order.php">PLACE AN ORDER</a></li>

            <li><a href="https://www.kenkirkley.com/ProductWebsite/blog.html">BLOG</a></li>

            <li><a href="https://www.kenkirkley.com/ProductWebsite/contact.php">CONTACT</a></li>

        </ul>

    </div>

  </nav>



   <div class="contact-banner">

        <div class="row">

            <div class="col-md-6 col-md-offset-3">

                  <h3 align="center">CONTACT US <br><br>

                        <!--Form Success Message will display here-->
                      <p align="center" id="result"><?php echo $result; ?></p>
                  
                  </h3>

            </div> <!--- /.col-md -->

        </div>  <!--- /.row -->

</div><!--- /.contact-banner-->


<div class="contactusform">

    <div class="row">

        <div class="col-md-1"></div>

            <div class="col-md-5 contact-details"><br />

                  <div class="contact-info">

                      <p class="contact-heading">CONTACT</p><br />

                          
          <p class="info">We value our clients. If you have any questions or you would like to place an order with us directly you can either call us or just fill the form and we will get back to you.</p><br /><br />

            <p class="info">

            <strong><u>OFFICE TEL</u> -</strong>+202-555-0122<br /><br />

            <strong><u>EMAIL</u> -</strong> info@yourwebsite.com<br /><br />

            <strong><u>ADDRESS</u> -</strong> C/o Lorem ipsum dolor sit amet<br />La La Land<br />
            Cape of Hope<br />
            2222</p> <br />



            <div class="socialmedia">

            <!--- Your Social Media Accounts go here-->

          
                  <!--- INSTAGRAM --> 
            <a href="#" target="_blank"><svg style="width:40px; height:40px" viewbox="0 0 24 24"><path d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" fill="#1F3E50"></path></svg></a> 


                <!--- FACEBOOK -->
            <a href="#" target="_blank"><svg style="width:40px;height:40px" viewbox="0 0 24 24">
            <path d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z" fill="#1F3E50"></path></svg></a>
    
          </div><!--- /.socialmedia--> <hr>

                
                  </div><!--end contact-info-->

            </div><!--end contact-details-->





        <div class="col-md-6 emailForm" align="center">

              <h4 align="center"> If you have any questions, please fill in the form and we will get back to you asap.</h4>

                  <form method="post">

                    <div class="form-group">

                                <input type="text" name="name" class="form-control" placeholder="Your Name" required value="<?php echo $_POST['name']; ?>" />

                    </div><!--end form-group-->

                    <div class="form-group">

                                <input type="email" name="email" class="form-control" placeholder="Your Email" required value="<?php echo $_POST['email']; ?>" />

                    </div><!--end form-group-->

                    <div class="form-group">

                                <input type="tel" name="phone" class="form-control" required placeholder="Your Phone" value="<?php echo $_POST['phone']; ?>" />

                    </div><!--end form-group-->


                    <div class="form-group">

                                <textarea class="form-control" id="message" name="message" placeholder="Message">

                                    <?php echo $_POST['message']; ?> </textarea>

                    </div><!--end form-group-->   <br /><br />



                    <p align="center" ><input type="submit" name="submit" class="btn btn-success btn-lg" value="Send Message" /></p><br />


                  </form>

        </div><!--end emailForm-->

    </div><!--end row-->

</div><!--end contactusform-->



 <footer class="footer">

      <div align="center" class="footerlinks">

          <a href="https://www.kenkirkley.com/ProductWebsite/about.html">ABOUT</a> 
          <a href="https://www.kenkirkley.com/ProductWebsite/air-conditioners.html">AIR CONDITIONERS</a> 
          <a href="https://www.kenkirkley.com/ProductWebsite/place-an-order.php">PLACE AN ORDER</a> 
          <a href="https://www.kenkirkley.com/ProductWebsite/blog.html">BLOG</a> 
          <a href="https://www.kenkirkley.com/ProductWebsite/contact.php">CONTACT</a>

      </div>  <!--- /.footerlinks-->


      <div align="center" class="policy-links">

          <a href="https://www.kenkirkley.com/ProductWebsite/faqs.html">FAQs</a> 
          <a href="https://www.kenkirkley.com/ProductWebsite/terms-and-conditions.html">Terms &amp; Conditions</a>

      </div>  <!--- /.policy-links-->

    <p align="center" class="text-muted copyright">&copy; XYZ Company</p>

  </footer>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
  </script> <!-- Include all compiled plugins (below), or include individual files as needed -->
   
  <script src="js/bootstrap.min.js">
  </script> 


  <!-- Navbar Affix Script-->
  <script>
  $('#topnavbar').affix({
     offset: {
         top: $('#top-banner').height()
     }   
  }); 
  </script>

</body>

</html>
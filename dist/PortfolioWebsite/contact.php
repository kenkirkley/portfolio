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
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <meta content="" name="description">
        <!-- Meta Description -->

    
    <title>Contact Coffee Shop Marketing Agency</title>

        <!-- CSS Stylesheets -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="css/contact-page-styling.css" /> 
   


      <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Lato|Raleway" rel="stylesheet">
    
    <!-- Favicon -->
   <link rel="icon" href="images/coffee-website-favicon.jpg">


  </head>


 <body>


 <div class="contact-banner">


        <nav class="navbar navbar-default navbar-static navbar-transparent" role="navigation">
      
              <div class="container">

                  <div class="navbar-header">

                      <a class="navbar-brand" href="https://kenkirkley.com/PortfolioWebsite">
                            
                            <img alt="Brand" src="images/coffee-shop-logo.png" class="logo"></a>

         
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=" .navbar-collapse">
      
                                    <span class="sr-only">Toggle navigation </span>
          
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
          
                                </button>

                  </div><!--end navbar-header-->

                      <div class="collapse navbar-collapse" align="center">
      
                          <ul class="nav navbar-nav">

                              <li align="center"> <a href="https://kenkirkley.com/PortfolioWebsite/growth-tips.html">Growth Tips for Coffee Shops</a></li>

                              <li align="center"> <a href="https://kenkirkley.com/PortfolioWebsite/contact.php">Contact</a></li>

                          </ul>

                      </div><!--end navbar-collapse-->

              </div><!--end container-->

        </nav><!--end nav-->


        <div class="row" id="contact-heading">

            <div class="col-md-4 col-md-offset-4">

                  <h3 align="center">CONTACT US</h3><br /><br />

                  <p align="center" id="result"><?php echo $result; ?></p>

            </div><!--- /.col-md-->

        </div><!--- /#contact-heading-->

</div><!--end contact-banner-->



<div class="contactusform">

    <div class="row">

        <div class="col-md-1"></div>

            <div class="col-md-5 contact-details"><br />

                  <div class="contact-info">

                      <p class="contact-heading">CONTACT</p><br />

                          
          <p class="info">We value our clients. If you have any questions or you would like to place an order with us directly you can either call us or just fill the form and we will get back to you.</p><br /><br />

          

            <p class="info">

            <strong><u>OFFICE TEL</u>:</strong> +1-202-555-0168<br /><br />

            <strong><u>EMAIL</u>:</strong> info@yourwebsite.com</p> <br /><br /><br /><hr>

                
                  </div><!--end contact-info-->

            </div><!--end contact-details-->





        <div class="col-md-6 emailForm" align="center">

              <h4 align="center"> If you have any questions, please fill in the form and we will get back to you asap.</h4>

                  <form method="post">

                    <div class="form-group">

                                <input type="text" name="name" class="form-control" placeholder="Your Name" value="<?php echo $_POST['name']; ?>" />

                    </div><!--end form-group-->

                    <div class="form-group">

                                <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $_POST['email']; ?>" />

                    </div><!--end form-group-->

                    <div class="form-group">

                                <input type="tel" name="phone" class="form-control" placeholder="Your Phone" value="<?php echo $_POST['phone']; ?>" />

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


<div class="exclusive-group" align="center">

      <p>Join my Exclusive Facebook Group for Coffee Shop Owners - <a href="#"><span style="color: white">Click here to apply</span></a></p>

</div><!--end exclusive-group-->



<div id="footer" align="center">

            <a href="https://kenkirkley.com/PortfolioWebsite/growth-tips.html">GROWTH TIPS</a>
            <a href="https://kenkirkley.com/PortfolioWebsite/about.html">ABOUT ME</a>
            <a href="https://kenkirkley.com/PortfolioWebsite/contact.php">CONTACT</a>



</div><!--end of footer-->


<p align="center" class="text-muted copyright">&copy; YourWebsite.com</p> 


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

 

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="js/bootstrap.min.js"></script>



  </body>

</html>

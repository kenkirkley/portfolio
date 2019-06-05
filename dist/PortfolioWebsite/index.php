<?php

if ($_POST["submit"]) {

      
      
     if (!$_POST['name']) {

       $error="<br />Please enter your name";

     }
      
     if (!$_POST['email']) {

       $error.="<br />Please enter your email address";

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
        <meta name="description" content="Coffee shop growth: websites, SEO, social media and online marketing."/>
    
    
    <title>Coffee Shop Growth: Websites, SEO and More</title>

       <!-- CSS Stylesheets -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="css/get-a-quote-form.css" />

  <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Lato|Raleway" rel="stylesheet">
    
  <!-- Favicon -->
   <link rel="icon" href="images/coffee-website-favicon.jpg">
   

  </head>

 <body>


 <div class="topbanner">
  
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

      </div>

</nav><!--end nav-->


  <h1 align="center">I Help Coffee Shops <br /><span class="cursive">Get More Customers</span></h1>

      <div class="row">

          <div class="col-md-6 col-md-offset-3" id="result" align="center">

                 <!--- Form Success/ Failure Message will display here-->
             <p align="center"><strong><?php echo $result; ?> </strong></p>


          </div> <!--- /.col-md -->

      </div>  <!--- /.row -->

</div><!--end topbanner-->



<div id="growbusiness">

  <div class="container">

      <div class="row">

        <div class="col-md-6" align="center">

           <img src="images/grow-your-coffee-show-img.jpg" alt="grow-your-coffee-show-img" class="img-responsive">

           <h2 class="article-name">How to Grow Your Coffee Shop Online in 5 Easy Steps</h2>

        </div><!--end col-md-6-->

        <div class="col-md-6" align="center" id="read-article">

           <button type="submit" class="btn btn-lg center-block articlelink" hvr-float-shadow><a href="https://kenkirkley.com/PortfolioWebsite/actionable-tips-to-maximize-your-coffee-shops-profit.html">Read the Article</button></a>

        </div><!--- /.col-md-->

      </div><!--- /.row-->

  </div><!--- /.container-->

</div><!--- /#grow-business-->


<div class="growsales"> 

        <p align="center">Make great coffee while I take care of your online presence!</p>

</div><!--end growsales-->


<div id="morecustomers">

  <div class="container">

    <h3 align="center">I Help Coffee Shops With:</h3>

      <div class="row">

              <div class="col-md-4" align="center">

                    <img src="images/website-design-for-coffee-shop.jpg" alt="website-design-for-coffee-shop" class="img-responsive">

                        <h2>Website Design</h2>

                            <p>Text about Website goes here</p>

              </div>

              <div class="col-md-4" align="center">

                    <img src="images/seo-for-coffee-shop.jpg" alt="seo-for-coffee-shop-websites" class="img-responsive">

                        <h2>SEO</h2>
                          
                          <p>Text about SEO goes here</p>

              </div>

              <div class="col-md-4" align="center">

                   <img src="images/social-media.jpg" alt="social-media" class="img-responsive">

                        <h2>Social Media</h2>

                          <p>Text about Social Media goes here</p>

              </div>

        </div><!--- /.row-->

    </div><!-- /.container-->

</div><!--- /.morecustomers-->



<div class="testimonials"> 

    <h4 align="center">Client Testimonials</h4>

      <div class="container">

          <div class="row">

             <div class="col-md-1"></div>

             <div class="col-md-5">

            <p align="center"><img src="images/client1.png" alt="happy-client" class="img-responsive"></p>

             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eleifend quis augue nec efficitur. Fusce elit mauris, porttitor euismod viverra non, condimentum ut velit. Nunc in purus nibh. In non consectetur sapien.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eleifend quis augue nec efficitur. Fusce elit mauris, porttitor euismod viverra non, condimentum ut velit. Nunc in purus nibh. In non consectetur sapien. </p>

             <p class="client-review">- Mary Ann, Brewtiful</p>

             </div>

             <div class="col-md-5 client2">

            <p align="center"><img src="images/client2.png" alt="happy-client" class="img-responsive"></p>

             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eleifend quis augue nec efficitur. Fusce elit mauris, porttitor euismod viverra non, condimentum ut velit. Nunc in purus nibh. In non consectetur sapien.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eleifend quis augue nec efficitur. Fusce elit mauris, porttitor euismod viverra non, condimentum ut velit. Nunc in purus nibh. In non consectetur sapien. </p>

             <p class="client-review">- Elinor Olsen, Greenside Cafe</p>

             </div>

             <div class="col-md-1"></div>

          </div>  <!--- /.row-->

      </div>  <!--- /.container-->

</div>  <!--- /.testimonials-->


<div class="portfolio">

  <h4 align="center">Some of My Work</h4>

  <div class="container">

      <div class="row">

              <div class="col-md-4 col-sm-4" align="center">

                    <a href="#"><img src="images/portfolio-website.jpg" alt="portfolio-website" class="img-responsive"></a>


              </div>

              <div class="col-md-4 col-sm-4" align="center">

                    <a href="#"><img src="images/portfolio-website.jpg" alt="portfolio-website" class="img-responsive"></a>


              </div>

              <div class="col-md-4 col-sm-4 col-sm-4" align="center">

                   <a href="#"><img src="images/portfolio-website.jpg" alt="portfolio-website" class="img-responsive"></a>

              </div>

        </div><!--end row-->

    </div><!--end container-->

</div><!--end portfolio-->


<div class="request-quote"> <br>

  <h4>Request a Quote</h4>

    <div class="container">

      <div class="row">

        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2"> <br />


        <form method="post"><br />
      

            <div align="center" class="form-group center-block">
              
                   <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $_POST['name']; ?>" />
                   
             
           </div>

            <div align="center" class="form-group center-block">
               
                      <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $_POST['email']; ?>" />
                      
                
            </div>



            <div align="center" class="form-group center-block">

                <textarea class="form-control" name="message"><?php echo $_POST['message']; ?> </textarea><br /> <br />

            </div>
                    
                    <br>

                    <p align="center" ><input type="submit" name="submit" class="btn btn-success btn-lg submit" value="Request a Quote" /> </p><br />

          </form> <!--- /form-->

      </div><!--- /.col-md-->
    
    </div><!--- /.row-->


        <div class="row">

          <div class="col-md-6 col-md-offset-3"> <br />
            <p class="havewebsite" align="center">If you already have an existing website and <br />you'd like to see how I can help you, <a href="https://kenkirkley.com/PortfolioWebsite/growth-tips.html">click here</a></p>
            
            <br>

          </div> <!--- /.col-md--> 

        </div>  <!--- /.row-->  
    
    </div><!--- /.container--><br><br><br>
 
</div><!--- /.request-quote-->

        
        <div class="social-links" align="center">

            <a href="https://www.linkedin.com/"><svg  width="35" height="35" viewBox="0 0 24 24">
            <path fill="#454867" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>

      </div> <!--end social-link-->



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

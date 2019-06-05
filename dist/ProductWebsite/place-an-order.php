
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

     if (!$_POST['delivery-address']) {
     
      $error.="<br /> Please enter your delivery address";
     
     } 


     if (!$_POST['product-name']) {
     
      $error.="<br /> Please enter the product's name";

     
     } 

     if (!$_POST['product-quantity']) {
     
      $error.="<br /> Please enter the quantity of the products you want";
     
     }


      if (!$_POST['comments']) {

       $error.="<br />Please enter a comments";

     }

     if (!$_POST['checkbox']) {
     
      $error.="<br /> Please tick the checkbox";
     
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
 if (mail("info@youremailaddress.com", "New Order from Website Name",
  
 
"Name: ".$_POST['name']." 
Email: ".$_POST['email']."
Phone: ".$_POST['phone']."
Delivery Address: ".$_POST['delivery-address']."
Product's Name: ".$_POST['product-name']."
Product's Quantity: ".$_POST['product-quantity']."
checkbox: ".$_POST['1']." 
Comments: ".$_POST['comments'])) {
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


   <title>Place an Order</title>

      <!--CSS Stylesheets -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <link href="css/navbar.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/form-styling.css" type="text/css" />

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


<div class="order">

  <div class="row">

      <div class="col-md-8 col-md-offset-2">

      <h4>PLACE AN ORDER</h4>

      <p>Thank you for choosing us, please place your order below <br />and a representative will contact you shortly for payment.</p>

      </div>

   </div><!--row-->

</div><!--order--><br><br><br>


  <div class="row">

      <div class="col-md-6 col-md-offset-3">

               <!--Form Success Message will display here-->
          <p align="center" id="result"> <?php echo $result; ?></p>


      </div>

  </div>




<div id="contact-form"> 
  
        <form class="form-basic" method="post" action="#">

            <div class="form-row">
                <label>
                    <span>Full Name</span>
                    <input type="text" name="name" class="form-control required" value="<?php echo $_POST['name']; ?>" />

                </label>
            </div>  <!--- /Name-->



            <div class="form-row">
                <label>
                    <span>Email Address</span>
                    <input type="email" name="email" class="form-control" required value="<?php echo $_POST['email']; ?>" />
                </label>
            </div>  <!--- /Email -->




            <div class="form-row">
                <label>
                    <span>Contact Number</span>
                    <input type="tel" name="phone" class="form-control" required value="<?php echo $_POST['phone']; ?>" />
                </label>
            </div>  <!--- /Contact Number -->



            <div class="form-row">
                <label>
                    <span>Delivery Address</span>
                    <textarea class="form-control" required name="delivery-address"><?php echo $_POST['delivery-address']; ?> </textarea><br /> 
                </label>
            </div><!--- /Delivery Address -->


            <h3 id="product-details">SELECT PRODUCT(S)</h3>

            <div class="form-row">
                <label>
                    <span>Product Name</span>
                    <select name="product-name" required class="product-name" value="<?php echo $_POST['product-name']; ?>" >

                        <option disabled selected><strong>Select</strong></option>
                        <option>PRODUCT 1</option>
                        <option>PRODUCT 2</option>
                        <option>PRODUCT 3</option>
                        <option>PRODUCT 4</option>
                    </select>

                </label>

            </div>  <!--- /Product Name-->



            <div class="form-row" align="center">
                <label>
                    <span>Quantity:</span>
                    <select align="center" name="product-quantity" required class="product-quantity" value="<?php echo $_POST['product-quantity']; ?>" >
                        <option disabled selected><strong>Select</strong></option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>more than 4</option>
                        
                        
                    </select>
                </label>

            </div>    <!--- /Product Quantity-->



            <div class="form-row">
                <label>
                    <span>Comments:</span>
                    <textarea class="form-control" name="comments"><?php echo $_POST['comments']; ?> </textarea><br /> 
                </label>

            </div>  <!--- /Comments-->

            

            <div class="checkbox">
      
                <label>
          
                    <input type="checkbox" name="checkbox" value='1'>

                        <span class="check">I have read and agree to the <a href="https://www.kenkirkley.com/ProductWebsite/terms-and-conditions.html" rel="nofollow">Terms &amp; Conditions</a></span> 

                </label>

            </div>  <!--- /Checkbox-->


           <p align="center" ><input type="submit" name="submit" class="btn btn-success btn-lg ordering" value="PLACE ORDER" /> </p>


      </form>

</div>  <!--- /#contact-form-->




<br /> <br /> <br /> <br /> 




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
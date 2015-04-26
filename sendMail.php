<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <title>KW INSTAL - instalacje cieplne i sanitarne</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- font awesome-->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <!-- google fonts -->
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald:700,400&subset=latin-ext,latin' rel='stylesheet' type='text/css'>
  
  <!-- main css -->
  <link rel="stylesheet" href="style/main.css">
  <!-- bxSlider CSS file -->
  <link href="style/jquery.bxslider.css" rel="stylesheet" />

  <!-- jquery -->
  <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
  <!-- mobile menu slick nav plugin-->
  <script src="js/jquery.slicknav.min.js"></script>  
  <!-- bxSlider Javascript file -->
  <script src="js/jquery.bxslider.min.js"></script>
  <!-- images loaded script -->
  <script src="js/imagesloaded.pkgd.min.js"></script>

</head>
<body>

  <!-- header section -->
  <header>
    <!-- logo -->
    <div class="container">
      <div class="logo">
        <a href="index.html"><img src="images/logo.png" alt="logo kw instal"></a>
      </div>
    </div>
    
    <!-- top bar with phone -->

    <div class="headerPhoneNumberBar">
      <div class="container"><i class="fa fa-phone"></i> 518 097 054</div>
    </div>
  
    <!-- navigation bar -->
    <nav>
      <div class="container">
        <div class="mainMenuContent">
          <!--<div class="menuMobileIcon" id="mobile-menu"><i class="fa fa-bars"></i></div>-->
          <ul id="my-main-menu">
            <li><a href="index.html#about">O firmie</a></li>
            <li><a href="index.html#services">Usługi</a></li>
            <li><a href="index.html#gallery">Galeria</a></li>
            <li><a href="index.html#testimonials">Referencje</a></li>
            <li><a href="index.html#contact">Kontakt</a></li>
          </ul>
        </div>
      </div>
      <div id="attach-mobile-menu"></div>  
    </nav>
  </header>



<?php
 
if(isset($_POST['mail'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "monika.dembek@gmail.com";
 
    $email_subject = "Wiadomość wysłana ze strony www";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "<p>Przepraszamy, ale formularz został błędnie wypełniony.";
 
        echo "Błędy znajdują się poniżej.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Proszę cofnij się i ponownie wypełnij formularz.<br /><br /></p>";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['topic']) ||
 
        !isset($_POST['mail']) ||
 
        !isset($_POST['phone']) ||
 
        !isset($_POST['message'])) {
 
        died('Przepraszamy, ale formularz został błędnie wypełniony.');       
 
    }
 
     
 
    $name = $_POST['name']; // required
 
    $topic = $_POST['topic']; // required
 
    $email_from = $_POST['mail']; // required
 
    $telephone = $_POST['phone']; // not required
 
    $message = $_POST['message']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'Wprowadziłeś błędny adres e-mail.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
 
    $error_message .= 'Błędne imię.<br />';
 
  }
 
  if(!preg_match($string_exp,$topic)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($message) < 2) {
 
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Imię i nazwisko: ".clean_string($name)."\n";
 
    $email_message .= "Temat: ".clean_string($topic)."\n";
 
    $email_message .= "E-mail: ".clean_string($email_from)."\n";
 
    $email_message .= "Telefon: ".clean_string($telephone)."\n";
 
    $email_message .= "Wiadomość: ".clean_string($message)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- include your own success html here -->
 
 
 
<p>Dziękujemy za wiadomość. Skontaktujemy się wkrótce.</p>
 
 
 
<?php
 
}
 
?>

</body>
</html>
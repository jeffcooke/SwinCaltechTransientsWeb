<?PHP


  define (ADMIN_EMAIL, "ajameson@swin.edu.au");
  define (TO_EMAIL, "EThackray@groupwise.swin.edu.au");
  define (CC_EMAIL, "jcooke@astro.swin.edu.au");
  define (FROM_EMAIL, "jcooke@astro.swin.edu.au");

  $header  = "From: SCTW Web Registration<".FROM_EMAIL.">\r\n";
  $header .= "MIME-Version: 1.0\r\n";
  $header .= "MIME-Version: 1.0\r\nContent-type:text/html;charset=iso-8859-1\r\n";

  $reg_info_table = 
    "<table cellpadding=4px>".
    "<tr><td>Name</td><td>".$_GET["Name"]."</td></tr>".
    "<tr><td>Instituion</td><td>".$_GET["Institution"]."</td></tr>".
    "<tr><td>Email Address</td><td>".$_GET["Email_Address"]."</td></tr>".
    "<tr><td valign='top'>Comments</td><td>".stripslashes($_GET["Comments"])."</td></tr>".
    "<tr><td>Talk Title</td><td>".$_GET["Talk_Title"]."</td></tr>".
    "<tr><td valign='top'>Talk Abstract</td><td>".stripslashes($_GET["Talk_Abstract"])."</td></tr>".
    "</table>";

  $subject = "[SKSW] New Registration ".$_GET["Name"];
  $text = 
    "Liz and Duncan,<br><br>".
    
    "A person has registered for the <b>Swinburne Keck Science Workshop</b> Meeting<br>".
    "via the website. Their registration details are:<br><br>".
    $reg_info_table."<br><br>".
  
    "--<br>".
    "Automated notification<br>".
    "SKSW Web Registration<br>";

  // send the email admin peoples
  $admin_header = "Cc: ".CC_EMAIL."\r\n".$header;
  if (!mail(TO_EMAIL, $subject, $text, $admin_header, " -f ".FROM_EMAIL)) {

    // load the failed to register page
    header("location: regfailed.html");
    exit(0);

  }

  // that worked, now email the applicant
  $subject = "[SKSW] Registration Received";
  $text = 
    "Dear ".$_GET["Name"].",<br><br>".
    
    "Thank you for registering for the <b>Swinburne CalTech Transients Workshop</b> Meeting.<br><br>".
    "Your registration information has been sent to the Organising Committee<br>".
    "and is also shown below for your reference:<br><br>".
    $reg_info_table.
    "--<br>".
    "Automated notification<br>".
    "SKSW Web Registration<br>";

  if (!mail($_GET["Email_Address"], $subject, $text, $header, " -f ".FROM_EMAIL)) {

    // load the failed to register page
    header("location: regfailed.html");
    exit(0);

  } 

  header("location: regsuccess.html");
  exit(0);


  /*
    header("location: regclosed.html");
    exit(0);
  */


?>

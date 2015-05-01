<?PHP 

$menu = array( 
  "home" => "SwinCal Transients Workshop", "committee" => "Organising Committee", 
  "program" => "Programme", "registration" => "Registration", "speakers" => "Invited Speakers",
  "participants" => "Participants", "venue" => "Venue and Accommodation", 
  "contact" => "Contact Us");

$other = array("regfailed" => "Registration Failed", 
               "regsuccess" => "Registration Successful",
               "regclosed" => "Registration Closed",
                "sparklertalks" => "Sparkler Talks");

$all = array_merge($menu, $other);

$akeys = array_keys($all);
$mkeys = array_keys($menu);

if (count($_GET) == 0) {
  $akey = "home";
  $akey_page = "home.html";
} 
for ($i=0; $i<count($akeys); $i++) {
  if (isset($_GET[$akeys[$i]])) {
    $akey = $akeys[$i];
    $akey_page = $akey.".html";
  }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

<head>
  <title>SKSW - <?echo $all[$akey]?></title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div id="background"></div>
  <div id="page">
    <div id="menu">
      <? include("menu.php"); ?>
    </div>
    <div id="main">
      <table class="wrapper" style="width: 662px; height: 600px;">
        <tr style="display: none;"><th></th></tr>
        <tr><td id="keck_sunset">
          <div class="content">
          <?include($akey_page);?>
          </div>
        <img src="images/spacer.gif" height="200px" width="1px" alt="spacer">
        </td></tr>
      </table>
          <?summary($akey_page)?> 
    </div>
  </div>
</body>
</html>

<?
function summary($page){


  $unixtime = filemtime ( $page );
  $strtime = date ("M d Y", $unixtime);

  echo "<div align='center' style='margin-top:5px;'>";
  echo "<font size=-2>";
  print "Last Updated: ".$strtime;
  //print " | ".$page;
  //print " | ";
  //print "<a href='privacy.html'>Privacy Statement</a>";
  //print " | ";
  //print "Maintained by <a href='mailto:ajameson@swin.edu.au'>ajameson@swin.edu.au</a>";
  echo "</font>";
  echo "</div>";

}
?>

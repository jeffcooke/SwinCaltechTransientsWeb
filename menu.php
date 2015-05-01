
<table class="wrapper" cellpadding="0" cellspacing="0" border="0" width="250px">
<tr>
  <th></th>
</tr>
<tr>
  <td>
    <div class="content">
<?
for ($i=0; $i<count($mkeys); $i++) {
  echo "<p style='vertical-align: middle;'>";
  if ($i > 0) {
    echo "<img src='images/arrow5.gif' alt='arrow'>&nbsp;";
  }
  if ($akey == $mkeys[$i]) {
    echo "<font color='#ff9d3d'>".$menu[$mkeys[$i]]."</font>\n";
  } else {
    echo "<a href='".$mkeys[$i].".html'>".$menu[$mkeys[$i]]."</a>\n";
  }
  echo "</p>\n";
}
?>
    </div>
  </td>
</tr>
</table>

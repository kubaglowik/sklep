<?php
$conn = mysqli_connect('localhost','root','','sklep');
$q="SELECT nazwa FROM `towary` WHERE promocja=1";
$result = mysqli_query($conn,$q );
var_dump($result);
$l=mysqli_num_rows($result);
for($i=0;$i<$l;$i++)
{
  $results2=mysqli_fetch_row($result);
  echo "<br>";
  var_dump($results2);
}




?>
<?php
session_start();
//export.php  
require_once('./library.php');
     $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
     // Check connection
     if (mysqli_connect_errno()) {
           echo("Can't connect to MySQL Server. Error code: " .
mysqli_connect_error());
           return null;
     }
$output = '';
if(isset($_POST["exportActor"]))
{
 $searchStringActor = '%' . $_SESSION['searchValActor'] . '%';
 $query = "SELECT firstName, lastName, screenName, title FROM actors NATURAL JOIN movie_cast NATURAL JOIN Movies WHERE LastName LIKE '" . $searchStringActor . "'";
 $result = mysqli_query($con, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>First Name</th>
                         <th>Last Name</th>
                         <th>Screen Name</th>  
                         <th>Title</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["firstName"].'</td>
                         <td>'.$row["lastName"].'</td> 
                         <td>'.$row["screenName"].'</td>  
                         <td>'.$row["title"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=exportActor.xls');
  echo $output;
 }
}
?>

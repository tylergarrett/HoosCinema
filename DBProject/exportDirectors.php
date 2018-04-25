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
if(isset($_POST["exportDirectors"]))
{
 $searchStringDirector = '%' . $_SESSION['searchValDirector'] . '%';
 $query = "SELECT * FROM directors WHERE lastName LIKE '" . $searchStringDirector . "'";
 $result = mysqli_query($con, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Director ID</th>  
                         <th>First Name</th>  
                         <th>Last Name</th>  
                         <th>Title</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["director_id"].'</td>  
                         <td>'.$row["firstName"].'</td>  
                         <td>'.$row["lastName"].'</td>  
                         <td>'.$row["title"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=exportDirectors.xls');
  echo $output;
 }
}
?>

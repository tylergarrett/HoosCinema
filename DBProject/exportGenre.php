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
if(isset($_POST["exportGenre"]))
{
 $searchStringGenre = '%' . $_SESSION['searchValGenre'] . '%';
 $query = "SELECT * FROM genre NATURAL JOIN Movies WHERE name LIKE '" . $searchStringGenre . "'";
 $result = mysqli_query($con, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Genre ID</th>
                         <th>Genre</th>
                         <th>Movie ID</th>  
                         <th>Title</th>  
                         <th>Rating</th>  
                         <th>Run Time</th>
                         <th>Release Year</th>
                         <th>Director ID</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["genre_id"].'</td>
                         <td>'.$row["name"].'</td> 
                         <td>'.$row["movie_id"].'</td>  
                         <td>'.$row["title"].'</td>  
                         <td>'.$row["rating"].'</td>  
                         <td>'.$row["run_time"].'</td>  
                         <td>'.$row["release_year"].'</td>
                         <td>'.$row["director_id"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=exportGenre.xls');
  echo $output;
 }
}
?>

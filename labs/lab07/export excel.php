<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	
$connect = mysqli_connect("localhost", "root", "", "mydb");
$output = '';

$query = "SELECT staffno,fname,lname,position,max(salary) FROM staff GROUP BY position";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0){
  	$output .= 
   			'<table class="table" bordered="1">  
            <tr>  
               	<th>Staff NO.</th>  
                <th>First Name</th>  
                <th>Last Name</th>  
       			<th>Position</th>
       			<th>Max Salary</th>
            </tr>';
while($row = mysqli_fetch_array($result)){
	$output .= 
    		'<tr>  
                <td>'.$row["staffno"].'</td>  
                <td>'.$row["fname"].'</td>  
                <td>'.$row["lname"].'</td>  
       			<td>'.$row["position"].'</td>  
       			<td>'.$row["max(salary)"].'</td>
            </tr>';
}
  	$output .= '</table>';
  	header('Content-Type: application/xls');
  	header('Content-Disposition: attachment; filename=excel export.xls');
  	echo $output;
}


?>


</body>
</html>
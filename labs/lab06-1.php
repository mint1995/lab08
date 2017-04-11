<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;
}

$id = $first = $last = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id = test_input($_POST["id"]);
  		$first = "'".test_input($_POST["first"])."'";
		$last = "'".test_input($_POST["last"])."'";
		
		$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webtech";
$tabName = "customers";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO $tabName (id, firstname, lastname)
    VALUES ($id, $first, $last)";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
	}


?>	

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  ID:<br>
  <input type="int" name="id" >
  <br>
  First name:<br>
  <input type="text" name="first" >
  <br>
  Last name:<br>
  <input type="text" name="last">
  <br><br>
  <input type="submit" value="Submit">

</form> 
</body>
</html>
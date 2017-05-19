<html>
	<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/normalize.css">
</head>
<body>
<?php
// define variables and set to empty values
$fname = $lname = $addy = $City = $State = $Phone = $uname = $pword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$fname = test_input($_POST["fname"]);
	$lname = test_input($_POST["lname"]);
	$addy = test_input($_POST["addy"]);
	$City = test_input($_POST["City"]);
	$State = test_input($_POST["State"]);
	$Phone = test_input($_POST["Phone"]);
	$uname = test_input($_POST["uname"]);
	$passw = test_input($_POST["pword"]);
	//echo "Welcome $name, <br>";
	//echo "Your Username is: $username<br>Your password is: $passw";
}

// prevent hacking
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
 <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col">
                    <header>
                        <h1>RollinCommo</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
	<div class="container">
		<div class="col-6">
			<div class="table-bordered table-hover table-responsive">
			<table class="table">
				<thead>
				<tr>
					<th  colspan="2"><h3>User Information</h3></th>
				</tr>
				</thead>
				<tr>
					<td>Full Name</td><td><?php echo "$lname, $fname"; ?></td>
				</tr>
				<tr>
					<td>Address</td><td><?php echo "$addy<br>$City, $State"; ?></td>
				</tr>
				<tr>
					<td>Phone</td><td><?php echo "$Phone"; ?></td>
				</tr>
				<tr>
					<td>User Name</td><td><?php echo "$uname"; ?></td>
				</tr>
				<tr>
					<td>Password</td><td><?php echo "$passw"; ?></td>
				</tr>
			</table>
			<br><br>
<?php
                
// create random id number
$digits = 3;
$randomInt = rand(pow(10, $digits-1), pow(10, $digits)-1);

// Database Connection Info
require_once 'login.php';

// Create connection
$conn = mysqli_connect($servername, $un, $pw, $dbname);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `RC_Users` (PersonID, LastName, FirstName, Address, City, Phone)
VALUES ('$randomInt', '$lname', '$fname', '$addy', '$City', '$Phone')";

$sql1 = "INSERT INTO `RC_User_Security` (PersonID, UserName, Password)
VALUES ('$randomInt', '$uname', '$passw')";

if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql1)) {
	echo "<h4>New account created successfully</h4>";
}
else {
	echo "<h4>Error: " . $sql . "<br>" . mysqli_error($conn)."</h4>";
}

mysqli_close($conn);
?>
			<br><br>
			<p>Be sure to write this information down, then click to continue</p>
			<div class="btn-group btn-group-lg">
			<a type="button" class="btn btn-primary" href="login.php"><span class="glyphicon glyphicon-ok"></span> Continue</a>
			</div>
		</div>
		</div>
	</div>
	<!-- Page change script -->

	<!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>

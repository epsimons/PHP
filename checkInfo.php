<!DOCTYPE html>
<html lang='en'>
<head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css' integrity='sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ' crossorigin='anonymous'>
    <link rel='stylesheet' href='/css/normalize.css'>
</head>
<body>
	<div class='jumbotron'>
		<div class='container'>
			<div class='row'>
				<div class= 'col'>
					<header>
						<h1>RollinCommo</h1>
					</header>
				</div>
			</div>
		</div>
	</div>

<?php


// define variables and set to empty values
$uname = $pword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$uname = test_input($_POST["uname"]);
	$pword = test_input($_POST["pword"]);
	//e	cho "received names: ".$uname." ".$pword;
	get_user($uname, $pword);
}
else {
	echo "<br><p>Please retry your request. Click <a href='login.html'>here</a> to go back.</p>";
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function get_user($uname,$pword)
{
	require_once 'login.php';
	$conn = mysqli_connect($servername, $un, $pw, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql_PID = "SELECT `PersonID` FROM `RC_User_Security` WHERE UserName='$uname' AND Password='$pword'";
	$result_uid = mysqli_query($conn,$sql_PID);
	$row_check = mysqli_fetch_array($result_uid);
	$uid = $row_check['PersonID'];

	if ($uid) {

		echo "<div class='container'><div class='row'><h4>Found User:</h4></div>";
		$sql = "SELECT * FROM RC_Users WHERE RC_Users.PersonID = '$uid'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);

		$lname = $row['LastName'];
		$fname = $row['FirstName'];
		$addy = $row['Address'];
		$city = $row['City'];
		//$		state = $row['State'];
		$phone = $row['Phone'];
		echo "<div class=‘container’><div class='row'><div class=‘col-6’><div class=‘table-bordered table-hover table-responsive’><table class=‘table’><thead><tr><th  colspan=‘2’><h3>User Information</h3></th></tr></thead><tr><td>Full Name</td><td>$lname, $fname</td></tr><tr><td>Address</td><td>$addy, $city</td></tr><tr><td>Phone</td><td>$phone</td></tr></table></div></div><!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src='https://code.jquery.com/jquery-3.1.1.slim.min.js' integrity='sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js' integrity='sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb' crossorigin='anonymous'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js' integrity='sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn' crossorigin='anonymous'></script></body></html>";

	}
	else {
		echo "<div class=‘jumbotron’><div class=‘container’><div class=‘row’><div class=‘col’><header><h1>RollinCommo</h1></header></div</div></div></div><h4>Error: " . $sql . "<br>" . mysqli_error($conn)."</h4>";
		echo "<br><p>Please retry your request. Click <a href='login.html'>here</a> to go back.</p>";
	}
	mysqli_close($conn);
}

?>
        </body>
</html>

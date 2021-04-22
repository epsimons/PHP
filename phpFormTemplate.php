<?php
    if(isset($_POST['Submit']))
    {
	    //When user clicks <submit> this code will run
      echo $_POST['name'];
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <h1>Template</h1>
  <p>A simple PHP template that checks when a form has been submitted</p>
  <form id='myform' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method='post'>
    <label for='name'>Enter your name:</label>
    <input type='text' name='name' id='name'>
    <input type='submit' value='submit'>
  </form>
</body>
</html>

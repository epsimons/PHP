<!DOCTYPE html>
<html>
<body>

<?php
define("cars", [
  "Alfa Romeo",
  "BMW",
  "Toyota"
]);

// For Loop
for ($i=0; $i < 3; $i++)
{
echo cars[$i]."<br>";
}

echo "<br>";
// do...while
$i = 0;
do {
  echo cars[$i]."<br>";
  $i++;
} while ($i <= 3);


// while
$i=0;
while ($i <= 3)
{
  echo cars[$i]."<br>";
  $i++;
}
?> 

</body>
</html>
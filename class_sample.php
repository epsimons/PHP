<!DOCTYPE html>
<html>
<body>

<?php
class furniture {
  public $material;
  public $type;
  public function __construct($material, $type) {
    $this->material = $material;
    $this->type = $type;
  }
  public function message() {
    return "<p>I just bought a " . $this->material . " " . $this->type . "!</p>";
  }
}

$myFurniture = new furniture("steel", "chair");
echo $myFurniture -> message();
echo "<br>";
$myFurniture = new furniture("wooden", "Table");
echo $myFurniture -> message();
?>

</body>
</html>
<!DOCTYPE html>
<html>
<body>

<?php
class Cfurniture {
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

$myCar = new Car("steel", "chair");
echo $myCar -> message();
echo "<br>";
$myCar = new Car("wooden", "Table");
echo $myCar -> message();
?>

</body>
</html>
<!DOCmaterial html>
<html>
<body>

<?php
class Cfurniture {
  public $color;
  public $material;
  public function __construct($color, $material) {
    $this->color = $color;
    $this->material = $material;
  }
  public function message() {
    return "<p>I just bought a " . $this->color . " " . $this->material . "!</p>";
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
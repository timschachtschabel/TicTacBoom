<?php
include 'components/head.php';
?>

<p>Aantal tijd = <?php echo $_GET ['aantalTijd']; ?> minuten </p>


<?php 

$names = $_GET['fname'];

$colors = array("red", "green", "blue", "yellow", "orange", "purple");

foreach ($names as $name) {
    if (!empty($name)) {
    $playerColor = array_rand($colors);
    
?>

    <div id="speler" style="background-color:<?php echo $colors[$playerColor]; ?>;">
        <p> <?php echo $name; ?> </p>
    </div>

<?php

    }
}
?>


<?php
include 'components/foot.php';
?>
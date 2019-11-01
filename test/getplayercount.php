<?php
include 'components/head.php';
require_once 'components/database.php';
?>

<?php 

$result=mysqli_query($conn, "SELECT COUNT(naam) FROM naam");


while($data = mysqli_fetch_row($result))
{   
    ?>
    
    <h3 style="text-align: center; font-weight: bold;">Aantal spelers:</h3>
    <h3 style="text-align: center; font-weight: bold;"> <?php echo $data[0]; ?> </h3>

   <?php 
}

?>

<?php
include 'components/foot.php';
?>
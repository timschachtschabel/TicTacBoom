<?php
include 'components/head.php';
require_once 'components/database.php';
?>

<?php 

$result=mysqli_query($conn, "SELECT * FROM naam");


while($data = mysqli_fetch_row($result))
{   
    echo $data[0]."<br>";
}

?>

<?php
include 'components/foot.php';
?>
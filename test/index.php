<?php
include 'components/head.php';
include 'components/database.php';
?>

<div class="logo">
    <img src="img/transparant.png" alt="tiktakboem">
</div>

<div class="namefield">
    <form action="form.php" method="get">
        <div class="form-group col-md-8 col-md-offset-4 nameInput">
            <input type="text" class="form-control" name="playername" id="naam" placeholder="Typ hier je naam">
        </div>
        <div class="form-group text-center">
            <input type="submit" class="btn btn-danger btn-lg startscreensubmit" value="Start" name="start" id="">
        </div>
    </form>
</div>

<?php
    if (isset($_GET['backtostart'])) {
        $deleteCurrentUser = ("DELETE FROM naam WHERE naam = '".$_GET["currentuser"]."'");

        if (mysqli_query($conn, $deleteCurrentUser)) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $deleteCurrentUser . "<br>" . mysqli_error($conn);
          }
      }
?>

<?php
include 'components/foot.php';
?>
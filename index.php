<?php
include 'includes/head.php';
//@ CHECK IF SESSION IS SET
if (isset($_SESSION['sid'])) { header("Location: game.php"); }
?>

<div class="logo">
    <img src="assets/images/transparant.png" alt="tiktakboem">
</div>

<div class="namefield">
    <form name="login" class="name-form text-center" action="#" method="POST" accept-charset="utf-8">
        <div class="form-group col-md-4 col-md-offset-4 col-centered nameInput">
            <input type="text" class="form-control" name="player" id="name" placeholder="Kies een naam">
        </div>
        <div class="form-group text-center">
            <input type="submit" class="btn btn-danger btn-lg startscreensubmit" value="Start" name="start">
        </div>
    </form>
</div>

<?php
include 'includes/foot.php';
?>
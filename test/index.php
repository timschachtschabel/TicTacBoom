<?php
include 'components/head.php';
include 'components/database.php';
?>
    
    <div class="logo">
        <img src="img/transparant.png" alt="tiktakboem">
    </div>

    <div class="namefield">
        <form action="">
            <div class="form-group col-md-8 col-md-offset-4 nameInput">
                <input type="text" class="form-control" id="naam" placeholder="Typ hier je naam">
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-danger btn-lg startscreensubmit" value="Start" name="" id="">
            </div>
        </form>
    </div>

<?php
include 'components/foot.php';
?>
<?php
include 'components/head.php';
include 'components/database.php';
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body class="startbackground">

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
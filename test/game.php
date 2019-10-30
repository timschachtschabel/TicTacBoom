<?php
include 'components/head.php';
?>
</head>
<body>

<p>Aantal tijd = <?php echo $_GET ['aantalTijd']; ?> minuten </p>

<div class="playerAmount flex">

<?php 
$countdowntime = $_GET['aantalTijd'] * 60;

$names = $_GET['fname'];

$colors = array("red", "green", "blue", "yellow", "orange", "purple");
$usedColors = array();
$int = 0;
foreach ($names as $name) {
    if (!empty($name)) {

        $playerColor = $colors[$int];
        $int = $int + 1;

    
?>

    <div id="speler" style="background-color:<?php echo $playerColor; ?>;">
        <h2> <?php echo $name; ?> </h2>
    </div>

<?php

    }
}
?>

</div>


<div class="timebomb">
    <h1>Nog</h1>
    <h1 id="time" style="text-align: center;"> <?php echo $_GET['aantalTijd']; ?></h1>

</div>


<script>

var timeAmount = <?php echo json_encode($_GET['aantalTijd']); ?>

    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = duration;
            }
        }, 1000);
    }

    window.onload = function () {
        var fiveMinutes = 60 * timeAmount,
            display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
    };

</script>

<?php
include 'components/foot.php';
?>
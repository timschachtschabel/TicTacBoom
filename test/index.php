<?php
include 'components/head.php';
?>

<div class="container">
    <form action="game.php" method="get">
        <fieldset>
        <legend>Instellingen</legend>

        <h2>Gamemode</h2>
        <br>
        <input type="radio" name="mode" value="classic"> Classic
        <input type="radio" name="mode" value="tijdbom"> Tijdbom

        <br> <br>
        <hr>
        <br>
        <h2>Spelers (2-6)</h2>
        <h5>Aantal spelers</h5>
        <input class="inputnumber" id="spelers" type="number" maxlength="1" name="aantalspelers" min="2" max="6" placeholder="2-6" >
        <div>

        <input type="text" name="fname[]" placeholder="Naam">
        <input type="text" name="fname[]" placeholder="Naam">
        <input type="text" name="fname[]" placeholder="Naam">
        <input type="text" name="fname[]" placeholder="Naam">
        <input type="text" name="fname[]" placeholder="Naam">
        <input type="text" name="fname[]" placeholder="Naam">
        </div>
        <br>

        <hr>

        <h2>Tijd</h2>
        <h5>Tijd in minuten:</h5>
        <input type="number" name="aantalTijd" min="1" max="10" placeholder="Tijd">
        <br>
        <hr>
        <input type="submit">

        </fieldset>
    </form>
</div>

<?php
include 'components/foot.php';
?>
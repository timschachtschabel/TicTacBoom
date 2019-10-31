<?php
include 'components/head.php';
?>

<div class="container">
  <div class="dataform">

    <form action="game.php" method="get">
      <legend>Instellingen</legend>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Categorie</label>
        <select class="form-control" id="exampleFormControlSelect1">

          <option>Topografie</option>
          <option>Dieren</option>

        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Aanstal spelers</label>
        <select class="form-control" id="exampleFormControlSelect1">

          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
        </select>
        <br>
        <input type="text" class="form-control" name="fname[]" placeholder="Naam">
        <input type="text" class="form-control" name="fname[]" placeholder="Naam">
        <input type="text" class="form-control" name="fname[]" placeholder="Naam">
        <input type="text" class="form-control" name="fname[]" placeholder="Naam">
        <input type="text" class="form-control" name="fname[]" placeholder="Naam">
        <input type="text" class="form-control" name="fname[]" placeholder="Naam">
      </div>

      <div class="form-group row">
        <label for="example-number-input" name="aantalTijd" placeholder="Tijd" class="col-2 col-form-label" min="2">Tijd in minuten</label>
        <div class="col-10">
          <input class="form-control" type="number" name="aantalTijd" id="example-number-input">
          <br>
          <input type="submit">
        </div>

    </form>
  
    <div class="playernames">
      <?php
          $insertname = "INSERT INTO naam (naam, isadmin)
          VALUES ($_GET[naam], '0', 'john@example.com')";

          echo $_GET['naam'];
      ?>  



    </div>
</div>


<?php
include 'components/foot.php';
?>
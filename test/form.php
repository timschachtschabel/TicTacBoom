<?php
include 'components/head.php';
require_once 'components/database.php';
?>

<div class="container">
  <div class="dataform hoi">

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

        <!-- <input type="text" class="form-control" name="fname[]" placeholder="Naam">
        <input type="text" class="form-control" name="fname[]" placeholder="Naam">
        <input type="text" class="form-control" name="fname[]" placeholder="Naam">
        <input type="text" class="form-control" name="fname[]" placeholder="Naam">
        <input type="text" class="form-control" name="fname[]" placeholder="Naam">
        <input type="text" class="form-control" name="fname[]" placeholder="Naam"> -->

        <div class="playeramount">
          <div id="playercount">

          </div>
        </div>    
          
        <div id="playernames">

        </div>
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
      if (isset($_GET['start'])) {
        $sql = "INSERT INTO naam (naam)
        VALUES ('" . $_GET["playername"] . "')";
      }

      if (mysqli_query($conn, $sql)) {
        // echo "New record created successfully";
      } else {
        // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      ?>

      <p id="playpername"></p>

    </div>
  </div>
  <div class="backtostart">
    <form action="index.php" method="get">
        <input type="submit" value="Terug naar start" class="btn btn-warning" name="backtostart">
        <input type="hidden" name="currentuser" value="<?php echo $_GET['playername'] ?>">
    </form>
  </div>  
</div>

<script type="text/javascript">
    $(document).ready(function () {

function load() {
    $.ajax({ 
        type: "GET",
        url: "getnames.php",
        dataType: "html",                
        success: function (response) {
            $("#playernames").html(response);
            setTimeout(load, 5000)
        }
    });
}

function loadcount() {
    $.ajax({ 
        type: "GET",
        url: "getplayercount.php",
        dataType: "html",                
        success: function (response) {
            $("#playercount").html(response);
            setTimeout(loadcount, 5000)
        }
    });
}
loadcount();
load();
});
</script>

<?php
include 'components/foot.php';
?>
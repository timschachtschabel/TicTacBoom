<?php
include 'components/head.php';
require_once 'components/database.php';
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

      <?php if($_GET['playername'] == 'admin') { ?>  

        <label for="example-number-input" name="aantalTijd" placeholder="Tijd" class="col-2 col-form-label" min="2">Tijd in minuten</label>
        <div class="col-10">
          <input class="form-control" type="number" name="aantalTijd" id="example-number-input">
          <br>
          <input type="submit">
        </div>
    <?php } ?>   

    </form>

    <div class="playernames">
      <?php
      if (isset($_GET['start'])) {
        $sql = "INSERT INTO naam (naam, isadmin)
        VALUES ('" . $_GET["playername"] . "','0')";
      }

      if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      ?> 

    <p id="playpername"></p>

    </div>

    <!-- <div class="back">
      <button class="btn btn-warning"><a href="index.php"> Terug naar start</a></button>
    </div> -->

    <form action="index.php" method="get">
        <input type="submit" value="Terug naar start" class="btn btn-warning" name="backtostart">
        <input type="hidden" name="currentuser" value="<?php echo $_GET['playername'] ?>">
    </form>
  </div>
</div> 

<script type="text/javascript">
   $(function () 
  {
    document.getElementById("disp").innerHTML ="hi";
        $.ajax({
        url:"components/database.php ",
        method:"POST",
        data:{
          name: "name",
          isadmin: "0" 
        },
        success:function(response) {
         document.getElementById("playername").innerHTML =response;
       },
       error:function(){
        alert("error");
       }

      });
  }); 
</script>
      
<?php
include 'components/foot.php';
?>
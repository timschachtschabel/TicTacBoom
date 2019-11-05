<?php
include 'includes/head.php';
//@ CHECK IF SESSION IS SET
if (!isset($_SESSION['sid'])) { header("Location: index.php"); }
?>
<div class="container">
    <div class="dataform">
        <form action="#" method="post">
            <legend>Instellingen</legend>
            <div class="form-group">
                <label for="cat-select">Categorie</label>
                <select class="form-control" id="cat-select">
                    <option value="" disabled selected>Selecteer categorie</option>
                    <option value="topo">Topografie</option>
                    <option value="dieren">Dieren</option>
                </select>
            </div>
            <label for="player-amount">Aanstal spelers</label>
            <div class="form-inline">
                <select class="form-control col-7" id="player-amount">
                    <option value="" selected disabled>Selecteer aantal spelers</option>
                    <option value="2">2 spelers</option>
                    <option value="3">3 spelers</option>
                    <option value="4">4 spelers</option>
                    <option value="5">5 spelers</option>
                    <option value="6">6 spelers</option>
                </select>
                <input class="form-control col-5" type="number" name="time" placeholder="Tijd in minuten" min="2">
            </div>
            <label for="players">Online spelers</label>
            <div class="form-group">
                <div class="players col-12">
                    <div class="players-content">
                        <!-- <p class="prpl">[Admin] naam</p> -->
                        
                    </div>
                </div>
            </div>
            <label for="player-amount">Status info</label>
            <div class="form-group">
                <div class="info col-12">
                    <div class="info-content">
                        <!-- <p class="grnp">Looking foor players</p>
                        <p class="orgp">Waiting for game...</p> -->
                    </div>
                </div>
            </div>
            <div class="startgame">
                <button>Start spel</button>
            </div>
        </form>
    </div>
</div>

<?php
include 'includes/foot.php';
?>
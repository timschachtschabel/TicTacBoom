$(document).ready(function() {
  var players = $(".players-content");
  var info = $(".info-content");
  //# GAME VARS
  var url = "includes/handlers/game.php";
  var resp = null;
  var gameStarted = false;
  var timer = true;

  //@ GAME LOOP
  setInterval(() => {
    if (timer) {
      //> CHECK GAMESTATE
      gameState();

      //@ FOLLOW UP
      //? Hier was ik gebleven met coderen
      //? Eventuele TODOS (taakverdeling):
      //! CSS OPSCHONEN en UI evt verbeteren.
      //! Game structuur aanleggen
      //! Game pagina en instellingen komen op een pagina:
      //! Als game is gestopt laat de pagina (game.php) instellingen div zien
      //! En als de game start wordt de game div geshowd, alles adv javascript requests naar includes/handlers/game.php
      //# Als er vragen zijn, app mij en probeer zoveel mogelijk OOP prorgrammeren, dat versneld het process.
      //# index.php is klaar, dat is de login. die communiceert met includes/handlers/login.php/-logout.php
      //# en met controller.js/app.js.
      //# Voor de rest moet er gewerkt worden aan game.php en game.js middels $.post requests
      //# tot slot is de database verbonden met mijn eigen domein (zie config.php voor loging creds).
      //# dus er is verbinding en de inlogfuncties zouden moeten werken bij jullie allemaal.

      //TODO debugging
      $.post(url, { name: "no" }, function(response) {}, "json");
    }
  }, 1000);

  //TODO hoeren neuken, nooit meer werken
  function checkTable() {}

  function gameState() {
    $.post(
      url,
      response => {
        gameStarted = response["state"] ? true : false;
        update(response["color"], response["message"]);
        resp = response;
      },
      "json"
    );
  }
});

$(document).ready(function() {
  //@ LOGIN FUNCTION
  $("form[name=login]").on("submit", function(e) {
    e.preventDefault();
    var player = $("input[name=player]");
    $.post(
      "includes/handlers/login.php",
      { name: esql(player.val()) },
      function(response) {
        // console.log(response);
        if (response["type"] == "success") {
          window.location.href = "game.php";
        } else {
          out(response["type"], response["message"]);
        }
      },
      "json"
    );
  });

  //> LOGOUT FUNCTION
  $("input[name=logout]").on("click", function(e) {
    e.preventDefault();
    $.post(
      "includes/handlers/logout.php",
      { data: esql("logout"), logout: true },
      function(response) {
        // console.log(response);
        if (response["type"] == "success") {
          window.location.href = "index.php";
        } else {
          alert(response["message"]);
        }
      },
      "json"
    );
  });
});

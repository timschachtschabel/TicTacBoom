$(document).ready(function() {
  setInterval(function() {
    console.log("timer");
  }, 1000);

  //@ FIRST PAGE NAME FORM
  document.querySelector(".name-form").addEventListener("submit", function(e) {
    e.preventDefault();
    var naam = document.getElementById("name");
    var url = "includes/handlers/login.php";
    var create = {
      cmd: "c",
      table: "users",
      args: { name: esql(naam.value) }
    };
    var read = {
      cmd: "r",
      table: "users"
    };

    if (naam.value.length > 2) {
      ajax(url, create)
        .done(function(result) {
          if (result["type"] !== "success") {
            out(result["type"], result["description"]);
          } else {
            //@ NO ERRORS OR DUPLICATIONS
            ajax(url, read)
              .done(function(result) {
                var update = {
                  cmd: "u",
                  table: "users",
                  args: {
                    isadmin: result[0]["results"] > 1 ? 0 : 1,
                    sid: result[0]["sid"]
                  },
                  clause: "name = '" + esql(naam.value) + "'"
                };
                ajax(url, update)
                  .done(function(result) {
                    out("success", "Nice!");
                  })
                  .fail(function(err) {
                    out("error", url + " " + err.statusText);
                  });
                window.location.href = "../../no.php";
              })
              .fail(function(err) {
                out("error", url + " " + err.statusText);
              });
          }
        })
        .fail(function(err) {
          out("error", url + " " + err.statusText);
        });
    } else {
      out("error", "Veel te kort...");
    }
  });
});

$(document).ready(function() {

  setInterval(() => {
    
    var url = "includes/handlers/getnames.php"

    $.post(url, {}, function(response) {console.log(response)}, "json");

  }, 1000);

});
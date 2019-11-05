function out(type, msg) {
  var nameIn = $("input[name=player]"),
    curVal = nameIn.val(),
    color;

  //? DISABLE CONTROL
  nameIn.prop("disabled", true);
  switch (type) {
    case "success":
      color = "green";
      break;
    case "warning":
      color = "orange";
      break;
    case "error":
      color = "red";
      break;
    default:
      color = "blue";
      break;
  }
  nameIn.css({
    "border-style": "solid",
    "border-width": "2px",
    "border-color": color
  });
  nameIn.attr("placeholder", msg);
  nameIn.val("");
  setTimeout(function() {
    /// ENABLE CONTROL
    nameIn.prop("disabled", false);
    nameIn.focus();
    nameIn.css({
      "border-style": "none",
      "border-width": "0 0 0 0",
      "border-color": "transparent"
    });
    nameIn.val(curVal);
    nameIn.attr("placeholder", "Try me");
  }, 1500);
}

function esql(str) {
  return str.replace(/[\0\x08\x09\x1a\n\r"'\\\%]/g, function(char) {
    switch (char) {
      case "\0":
        return "\\0";
      case "\x08":
        return "\\b";
      case "\x09":
        return "\\t";
      case "\x1a":
        return "\\z";
      case "\n":
        return "\\n";
      case "\r":
        return "\\r";
      case '"':
      case "'":
      case "\\":
      case "%":
        return "\\" + char;
      default:
        return char;
    }
  });
}

//# GAME METHODS
var players = $(".players-content");
var info = $(".info-content");
function update(color, msg) {
  info.prepend("<p class='" + color + "'>" + msg + "</p>");
  info.parent().css({
    "border-color": $(".info-content p")
      .first()
      .css("background-color")
  });
  setTimeout(() => {
    info.parent().css({ "border-color": "transparent" });
  }, 200);
  info.parent().animate({ scrollTop: 0 }, "fast");
}
function addPlayer(name) {
  players.append("<p class='bluep'>" + name + "</p>");
}

// ajax.js file

$(function() {
  $(".fadeout").click(function () {
    $(this).parent(".bad").fadeOut(500);
  });
});
$(function() {
  $(".fadeout").click(function () {
    $(this).parent(".good").fadeOut(500);
  });
});


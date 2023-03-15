$(document).ready(function () {
  $(".slide__img").click(function () {
    var img = $(this);
    var src = img.attr("src");
    $("body").append(
      "<div class='photoView'>" +
        "<div class='photoView__block'>" +
        "<img src='" +
        src +
        "' class='photoView_img' />" +
        "</div>" +
        "</div>"
    );
    $(".photoView").fadeIn(800);
    $(".photoView").click(function () {
      $(".popup").fadeOut(800);
      $(".photoView").remove();
    });
  });
});

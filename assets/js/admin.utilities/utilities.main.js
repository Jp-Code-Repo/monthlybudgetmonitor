$(".load-content").on("click", function (e) {
  e.preventDefault(); // Prevent the default link behavior
  const url = $(this).data("url"); // Get the URL from data attribute

  $("#main").load(url, function (response, status, xhr) {
    if (status == "error") {
      $("#main-content").html(
        window.location.replace("../../public/404.php")
      );
    }
  });
});
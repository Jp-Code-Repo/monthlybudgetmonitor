// Check Authentication
if (!localStorage.getItem("userData")) {
    window.location.href = "../../index.php"; // Force login
}

function logout() {
    localStorage.removeItem("userData"); // Remove user data
    localStorage.clear(); // Clears all localStorage data (optional)
    window.location.href = "../../index.php"; // Redirect to login page
}

// Retrieving user data
let userData = localStorage.getItem("userData");

if(userData.role === "nurse"){
  localStorage.removeItem("userData"); // Remove user data
  localStorage.clear(); // Clears all localStorage data (optional)
  window.location.href = "../../index.php";
}

// On load
$(document).ready(function() {


  // Assign User Details
  let user = JSON.parse(userData);

  $("#user-name").text(user.firstname + " " + user.lastname);
  $("#user-nickname").text(user.firstname);
  $("#user-role").text(user.role);



});


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

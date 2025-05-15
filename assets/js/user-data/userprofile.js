$(document).ready(function() {
    // alert("Load!")

    // Assign User Details
  let user = JSON.parse(userData);

  $("#user-complete-name").text(user.firstname + " " + user.lastname);
  $("#userrole").text(user.role);

  
  

});
// Check Authentication
if (localStorage.getItem("userData")) {
    window.location.href = "../../index.php"; // Force login
  }

$("#btn-login").click(function (e) {      
    e.preventDefault();
  
    loginUser();

});


function ajaxCall(params = {}) {
    return new Promise((resolve, reject) => {
      $.ajax({
        url: params.url,
        method: params.method,
        data: params.data,
        dataType: "json",
        success: function (response) {
          resolve(response);
        },
        error: function (error) {
          reject(error);
        },
      });
    });
  }
  
  async function loginUser() {
      
    try {
      let user = await ajaxCall({
        data: $("#frm-login").serialize() + "&action=login",
        method: "post",
        url: "../app/routers/AdminRouter.php",
      });
      
        if ( user.userData.success === true)
        {
          Swal.fire({
            title: "Login Success",
            text: "Welcome " + JSON.stringify(user.userData.user.firstname),
            icon: "success",
            confirmButtonText: "Ok",
          });
        

            // Store Data in localStorage
            localStorage.setItem("userData", JSON.stringify({
                uid: user.userData.user.uid,
                firstname: user.userData.user.firstname,
                lastname: user.userData.user.lastname,
                gender: user.userData.user.gender,
                email: user.userData.user.email,
                role: user.userData.user.role,
                status: user.userData.user.status,
            }));
    
          if (user.userData.user.role === "admin") {
            window.location.href = "../app/admin/index.php";
          } else if (user.userData.user.role === "nurse") {
            window.location.href = "../app/local-apps/clinic/nurse/index.php";
          } else {
            window.location.href = "views/nurse/index.php";
          }
        } else {
  
          Swal.fire({
            title: "Warning",
            text: JSON.stringify(user.userData.error),
            icon: "warning",
            confirmButtonText: "Ok",
          });
  
        }
        
      // console.log(localStorage);
  
    } catch (e) {
      
      Swal.fire({
        title: "Error",
        text: e.message,
        icon: "error",
        confirmButtonText: "Try again",
      });
  
    }
  
  }
$(document).ready(function() {
    // alert("Load!")
    // Load Data to table
    getUsers();

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
  
  async function getUsers() {
      
    try {
      let list = await ajaxCall({
        data: "&action=get&request=users",
        method: "post",
        url: "../../app/routers/AdminRouter.php",
      });
      
    //   console.log(JSON.stringify(list));
    
        var tableRows = '';
        // Loop through data and create table rows
        $.each(list.result.result_list, function(index, item) {
            tableRows += '<tr>';
            tableRows += '<td>' + item.firstname + " " + item.lastname + '</td>';
            tableRows += '<td>' + item.gender + '</td>';
            tableRows += '<td>' + item.email + '</td>';
            tableRows += '<td>' + item.role + '</td>';
            tableRows += '<td>' + item.status + '</td>';
            tableRows += '<td>' + item.username + '</td>';
            tableRows += '<td>' + item.password + '</td>';
            tableRows += '<td>' + item.created_at + '</td>';
            tableRows += '<td>';
            tableRows += '<button type="button" class="btn btn-info rounded-pill" data-id="' + item.uid + '"><i class="bi bi-info-circle"></i>&nbspUpdate</button> ';
            tableRows += '<button type="button" class="btn btn-danger rounded-pill" data-id="' + item.uid + '"><i class="bi bi-exclamation-octagon"></i>&nbspRemove</button> ';
            tableRows += '</td>';
            tableRows += '</tr>';
        });

        $('#tbl_users tbody').html(tableRows); // Insert rows into table body

        Swal.fire({
            toast: true,
            position: "bottom-end",
            icon: "success",
            title: "Users loaded successfully!",
            showConfirmButton: false,
            timer: 3000,
          });
                        
  
    } catch (e) {
      
      Swal.fire({
        title: "Error",
        text: e.message,
        icon: "error",
        confirmButtonText: "Try again",
      });
  
    }
  
  }

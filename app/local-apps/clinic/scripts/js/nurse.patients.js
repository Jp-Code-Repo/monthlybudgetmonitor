$(document).ready(function() {
    // alert("Load!")
    // Load Data to table
    getPatients();

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
  
  async function getPatients() {
      
    try {
      let patientList = await ajaxCall({
        data: "&action=getPatients",
        method: "post",
        url: "../routers/Router.php",
      });
      
      // console.log(JSON.stringify(usersList));
    
        var tableRows = '';
       
        $.each(patientList.result.patientList, function(index, item) {
            tableRows += '<tr>';
            tableRows += '<td>' + item.pat_firstname + " " + item.pat_lastname + '</td>';
            tableRows += '<td>' + item.pat_email + '</td>';
            tableRows += '<td>' + item.pat_contact + '</td>';
            tableRows += '<td>' + item.pat_address + '</td>';
            tableRows += '<td>' + item.dept_level + '</td>';
            tableRows += '<td>' + item.position_section + '</td>';
            tableRows += '<td>' + item.created_at + '</td>';
            // tableRows += '<td>';
            // tableRows += '<button type="button" class="btn btn-info rounded-pill" data-id="' + item.vid + '"><i class="bi bi-info-circle"></i>&nbspUpdate</button> ';
            // tableRows += '<button type="button" class="btn btn-danger rounded-pill" data-id=" style="text-color:#000;"' + item.vid + '"><i class="bi bi-exclamation-octagon"></i>&nbspRemove</button> ';
            // tableRows += '</td>';
            // tableRows += '</tr>';
        });

        $('#tbl_patients tbody').html(tableRows); // Insert rows into table body

        Swal.fire({
            toast: true,
            position: "bottom-end",
            icon: "success",
            title: "Patients loaded successfully!",
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

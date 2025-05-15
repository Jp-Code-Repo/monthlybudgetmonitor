$(document).ready(function() {
    // alert("Load!")
    // Load Data to table
    getVisitationsLog();

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
  
  async function getVisitationsLog() {
      
    try {
      let visitsList = await ajaxCall({
        data: "&action=getVisitationLogs",
        method: "post",
        url: "../routers/Router.php",
      });
      
    //   console.log(JSON.stringify(visitsList));
    
        var tableRows = '';
       
        $.each(visitsList.result.visitList, function(index, item) {
            tableRows += '<tr>';
            tableRows += '<td>' + item.patient_firstname + " " + item.patient_lastname + '</td>';
            tableRows += '<td>' + item.patient_gender + '</td>';
            tableRows += '<td>' + item.patient_classification + '</td>';
            tableRows += '<td>' + item.patient_grade_dept + '</td>';
            tableRows += '<td>' + item.patient_sec_pos + '</td>';
            tableRows += '<td>' + item.chief_complaint + '</td>';
            tableRows += '<td>' + item.treatment_remarks + '</td>';
            tableRows += '<td>' + item.medicine + '</td>';
            tableRows += '<td>' + (item.issue_gp == 0 ? 'No' : 'Yes') + '</td>';
            tableRows += '<td>' + item.created_at + '</td>';

        });

        $('#tbl_visitations tbody').html(tableRows); // Insert rows into table body

        Swal.fire({
            toast: true,
            position: "bottom-end",
            icon: "success",
            title: "Visitaions loaded successfully!",
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

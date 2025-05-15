$(document).ready(function() {
    // alert("Loaded!")
  $("#btn-dropdown-export").hide();

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

let studentList = {};

async function getStudentList() {

    let sy = $("#sy").val();
      
    // try {
      let studentList = await ajaxCall({
        data: "sy="+ sy + "&action=get&request=studentsvoters",
        method: "post",
        url: "../../app/routers/AdminRouter.php",
      });
      
        if (!studentList.results || !Array.isArray(studentList.results.voters) || studentList.results.voters.length === 0) {
          
          Swal.fire({
              toast: true,
              position: "center",
              icon: "error",
              title: "No student data received from the server!",
              showConfirmButton: false,
              timer: 3000,
          });

            return;
        }else{
          $("#btn-dropdown-export").show();
        }
          


       // Export as PDF
    $("#export-pdf").click(function (e) {
        e.preventDefault();
        

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        let data = studentList.results.voters;
        doc.text("User Credentials", 10, 10);

        let y = 20;
        data.forEach(row => {
            let rowData = [
                row.lastname,
                row.firstname,
                row.middlename,
                row.level,
                row.section,
                row.username,
                row.password
            ].join("  |  ");
            doc.text(rowData, 10, y);
            y += 10;
        });

        doc.save("voters.pdf");
    });

    // Export as CSV (Standard)
    $("#export-csv").click(function (e) {
        e.preventDefault();
        
        let data = studentList.results.voters;
        let csvContent = "ID,Lastname,Firstname,Middlename,Level,Section,Username,Password\n"; // Headers included

        let id = 1;
        data.forEach(row => {
            let rowData = [
                id++,
                row.lastname,
                row.firstname,
                row.middlename,
                row.level,
                row.section,
                row.username,
                row.password
            ].join(",");
            csvContent += rowData + "\n";
        });

        let blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });
        let link = document.createElement("a");
        link.href = URL.createObjectURL(blob);
        link.download = "voters.csv";
        link.click();
    });

    // Export as CSV (MySQL Format - No Headers)
    $("#export-csv-mysql").click(function (e) {
        e.preventDefault();
        

        let data = studentList.results.voters;
        let csvContent = ""; // No headers

        let id = 1;
        data.forEach(row => {
            let rowData = [
                id++,
                row.lastname,
                row.firstname,
                row.middlename,
                row.level,
                row.section,
                row.username,
                row.password
            ].join(",");
            csvContent += rowData + "\n";
        });

        let blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });
        let link = document.createElement("a");
        link.href = URL.createObjectURL(blob);
        link.download = "voters_mysql.csv";
        link.click();
    
    });



      // Showing data in the table  
      var tableRows = '';
      var id = 1;
      var status = 0;

        // Loop through data and create table rows
        $.each(studentList.results.voters, function(index, item) {
            tableRows += '<tr>';
            tableRows += '<td>' + id++ + '</td>';
            tableRows += '<td>' + item.lastname + '</td>';
            tableRows += '<td>' + item.firstname + '</td>';
            tableRows += '<td>' + item.middlename + '</td>';
            tableRows += '<td>' + item.level + '</td>';
            tableRows += '<td>' + item.section + '</td>';
            tableRows += '<td>' + item.username + '</td>';
            tableRows += '<td>' + item.password + '</td>';
            tableRows += '<td>' + status + '</td>';
            tableRows += '</tr>';
        });

        $('#tbl_voters tbody').html(tableRows); // Insert rows into table body
    
        // console.log(studentList);
        Swal.fire({
            toast: true,
            position: "bottom-end",
            icon: "success",
            title: "Voters loaded!",
            showConfirmButton: false,
            timer: 3000,
          });
                        
  
    // } catch (e) {

    //   console.log(JSON.stringify(e))

    //   Swal.fire({
    //     title: "Error",
    //     text: e.message,
    //     icon: "error",
    //     confirmButtonText: "Try again",
    //   });
  
    // }
  
  }

    // Set School Year Button Click
    $("#btn-setsy").click(function (e) {      
        e.preventDefault();
        
        let sy = $("#sy").val();

        if(sy  === ""){

            Swal.fire({
                toast: true,
                position: "center",
                icon: "warning",
                title: "School Year not given.",
                showConfirmButton: false,
                timer: 2000,
            });
        }else{
            
            getStudentList(sy);

        }

    });

    
    // Export btn
    $("#btn-export").click(function (e) {
        e.preventDefault();

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        if (!studentList.results || !studentList.results.voters) {
            Swal.fire({
                toast: true,
                position: "center",
                icon: "error",
                title: "No student data available!",
                showConfirmButton: false,
                timer: 3000,
            });
            return;
        }

        let data = studentList.results.voters;

        doc.text("User Credentials", 10, 10);

        let y = 20;
        data.forEach(row => {
            doc.text(`${row.lastname} | ${row.firstname} | ${row.middlename} | ${row.level} | ${row.section} | ${row.username} | ${row.password}`, 10, y);
            y += 10;
        });

        doc.save("voters.pdf");
    });
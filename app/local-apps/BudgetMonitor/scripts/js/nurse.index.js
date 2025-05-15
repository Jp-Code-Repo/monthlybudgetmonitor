  if (!localStorage.getItem("userData")) {
    window.location.href = "../../../../index.php"; // Force login
  }
  
  $(".load-content").on("click", function (e) {
    e.preventDefault(); // Prevent the default link behavior
    const url = $(this).data("url"); // Get the URL from data attribute

    $("#main-content").load(url, function (response, status, xhr) {
      if (status == "error") {
        $("#main-content").html(
          "<p>Error loading content. Please try again.</p>"
        );
      }
    });
  });

  function logout() {
    localStorage.removeItem("userData"); 
    localStorage.clear(); 
    window.location.href = "../../../../index.php"; 
  }

 

  // On load of modal
  $("#visits-modal").on("shown.bs.modal", function () {

    // Load Medicine List
    getMeds();

    // Load Medicine List
    getComplaints();
    
    // Give focus on barcode
    $("#patient-barcode").focus();

  });
  
  $("#gate-pass-modal").on("shown.bs.modal", function () {

    // Set the User Data for use
    let user = JSON.parse(localStorage.getItem('userData'));

    $("#patient-barcode").focus();

    $("#prep_by_name").innerHTML += JSON.stringify(user.firstname);
    $("#prep_by_position").val(user.role);

  });
  


  $("#patient-barcode").on("change", async (e) => {
    e.preventDefault();

      let patientID = $("#patient-barcode").val();

      getPatientData(patientID);

  });


  // Checking for empty fields
  function checkFields() {
    let isValid = true;

    // Loop through each required input field
    $(".required").each(function () {
      if ($(this).val().trim() === "") {
        isValid = false;
      }
    });

    // Enable button if all fields are filled, disable if any are blank
    $("#btn_save_visit_log").prop("disabled", !isValid);
  }

  // Saving Visit
  $("#btn_save_visit_log").on("click", function (e) {
    e.preventDefault();
    checkFields();
   
    $('[name="patient-barcode"]').val($("#patient-barcode").val());

    insertVisitData();

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

  

    async function getPatientData(patientID) {

      try {
        
        let patientData = await ajaxCall({
          data: {
            patientID: patientID,
            action: "getPatient",
          },
          method: "post",
          url: "../routers/Router.php",
        });

        let patient = patientData.result.patientData;

        $('input[name="patient-id"]').val(patient.pat_id);
        $('input[name="patient-gender"]').val(patient.pat_gender);
        $('input[name="patient-firstname"]').val(patient.pat_firstname);
        $('input[name="patient-lastname"]').val(patient.pat_lastname);
        $('input[name="patient-classification"]').val(patient.patient_type); 
        $('input[name="patient-grade-dept"]').val(patient.dept_level); 
        $('input[name="patient-sec-pos"]').val(patient.position_section);

        Swal.fire({
          toast: true,
          position: "bottom-end",
          icon: "success",
          title: "Patient data loaded",
          showConfirmButton: false,
          timer: 3000,
        });
        

      } catch (e) {
       
        Swal.fire({
          toast: true,
          position: "bottom-end",
          icon: "error",
          title: e,
          showConfirmButton: false,
          timer: 3000,
        });

      }
    }




    async function getMeds() {
      try {
        let meds = await ajaxCall({
          data: "&action=getMeds",
          method: "post",
          url: "../routers/Router.php",
        });

        Swal.fire({
          toast: true,
          position: "bottom-end",
          icon: "success",
          title: "Meds loaded successfully!",
          showConfirmButton: false,
          timer: 5000,
        });

        let select = $("#select_meds");
        select.empty(); // Clear existing options
        select.append('<option value="">Select Medicine</option>'); 
        select.append('<option value="none">None</option>'); 
        // JSON.stringify(meds["result"]["medList"]);
        $.each(meds.result.medList, function (index, medicine) {
          select.append(
            '<option value="' +
              medicine.med_id +
              '"> ' +
              medicine.name +
              " </option>"
          );  
        });

      } catch (e) {

        Swal.fire({
          toast: true,
          position: "bottom-end",
          icon: "error",
          title: "Meds failed to load",
          showConfirmButton: false,
          timer: 5000,
        });

      }
    }

    async function getComplaints() {
      try {
        let complaints = await ajaxCall({
          data: "&action=getComplaints",
          method: "post",
          url: "../routers/Router.php",
        });

        Swal.fire({
          toast: true,
          position: "bottom-end",
          icon: "success",
          title: "Complaints loaded!",
          showConfirmButton: false,
          timer: 5000,
        });

        let select = $("#select_complaints");
        select.empty(); // Clear existing options
        select.append('<option value="">Select Chief Complaint</option>'); 
        select.append('<option value="none">None</option>'); 
        // JSON.stringify(meds["result"]["medList"]);
        $.each(complaints.result.complaintList, function (index, complaint) {
          select.append(
            '<option value="' +
            complaint.ccid +
              '"> ' +
              complaint.complaint +
              " </option>"
          );  
        });

      } catch (e) {

        Swal.fire({
          toast: true,
          position: "bottom-end",
          icon: "error",
          title: "Failed to load complaints",
          showConfirmButton: false,
          timer: 5000,
        });

      }
    }

    async function insertVisitData() {

      try {

        if(!$('[name="issue_gp"]').val()){

          Swal.fire({
              title: "Missing Information",
              text: "Please fill out issuance of Gate Pass.",
              icon: "warning",
              confirmButtonColor: "#ffc107",
              confirmButtonText: "OK"
            });

        }
        
        let user = JSON.parse(localStorage.getItem('userData'));

        let visitData = await ajaxCall({
          data: $("#frm-patient-visit").serialize() + "&action=logVisit" + "&user=" + user.uid ,
          method: "post",
          url: "../routers/Router.php",
        });

        let issueGatepass = $('[name="issue_gp"]').val();
        
        let patientBarcode = $("#patient-barcode").val();

        if(issueGatepass === "1"){

          Swal.fire({
          title: "Saving Data Success",
          text: "Proceeding to issue gate-pass.",
          icon: "success",
          // showCancelButton: true,
          confirmButtonColor: "#28a745", 
          // cancelButtonColor: "#dc3545",  
          confirmButtonText: "Yes, proceed!",
          }).then((result) => {
            if (result.isConfirmed) {
              $("#visits-modal").modal("hide");

              // Clear input fields inside the modal after closing
              $("#visits-modal").on("hidden.bs.modal", function () {
                $(this).find("input").val(""); // Clears all input fields
              });

              // Define the URL and pass patient ID as a query parameter
              const url = `./pages/gatepass.php?patientBarcode=${encodeURIComponent(patientBarcode)}`;

              $("#main-content").load(url, function (response, status, xhr) {
                if (status == "error") {
                  $("#main-content").html(
                    "<p>Error loading content. Please try again.</p>"
                  );
                }else {
                  // Update the URL without reloading the page
                  history.pushState({}, "", url);
                }
              });
            }
          });

        }else{

           Swal.fire({
            title: "Saving Data Success",
            text: "Process Complete.",
            icon: "success",
            confirmButtonColor: "#28a745", // Green for proceed
            confirmButtonText: "Ok",
            });

            $("#visits-modal").modal("hide");

              // Clear input fields inside the modal after closing
              $("#visits-modal").on("hidden.bs.modal", function () {
                $(this).find("input").val(""); // Clears all input fields
              });

        }
        


      } catch (e) {
        console.log(e);
      }
    }
    $(document).ready(function() {
        const urlParams = new URLSearchParams(window.location.search);
        const patientBarcodeFromVisit = urlParams.get("patientBarcode");

        //console.log("Extracted Patient Barcode:", patientBarcodeFromVisit); // Debugging

        // Ensure the parameter exists and set the value in the input field
        if (patientBarcodeFromVisit) {
            $("#patient-barcodegp").val(patientBarcodeFromVisit);
            
            // Call the function to fetch patient data
            getPatientData(patientBarcodeFromVisit);
        }else{

          let patientID = $("#patient-barcodegp").val();
         
        }

        let user = JSON.parse(localStorage.getItem('userData'));

        $("#prep_by_name").text(function(index, currentValue) {
            return currentValue + " " + user.firstname + " " + user.lastname;
        });

        $("#prep_role").text(user.role);
        $("#prep_by_name_inp").val(user.firstname + " " + user.lastname);
        $("#prepared_by_role_inp").val(user.role);
        

        // Allow only one checkbox selection at a time
      $('input[name="remarks"]').on('change', function() {
        $('input[name="remarks"]').not(this).prop('checked', false);
      });

        
    });

    $("#patient-barcodegp").on("change", async (e) => {
      // e.preventDefault();
      let patientID = $("#patient-barcodegp").val();
      getPatient(patientID);
  
    });

    

    
    $("#btn_issue_gp").on("click", function (e) {
        e.preventDefault();

        let selectedValue = $('input[name="remarks"]:checked').val(); // Get the selected checkbox value
        
        if (!selectedValue) {

          Swal.fire({
            title: "Missing Information",
            text: "Please select a remarks.",
            icon: "warning",
            confirmButtonColor: "#ffc107",
            confirmButtonText: "OK"
          });
          
          return;
        }

        insertGatePassDataGPPage();

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
          url: "../../routers/Router.php",
        });

        let patient = patientData.result.patientData;

        if(!patient){

          Swal.fire({
            toast: true,
            position: "bottom-end",
            icon: "error",
            title: patientData.result.success,
            showConfirmButton: false,
            timer: 5000,
          });

        }else{

          $('input[name="patient-id"]').val(patient.pat_id);
          $('input[name="patient-barcode"]').val(patient.school_id);
          $('input[name="patient-firstname"]').val(patient.pat_firstname);
          $('input[name="patient-lastname"]').val(patient.pat_lastname);
          $('input[name="patient-classification"]').val(patient.patient_type); 
          $('input[name="patient-grade-dept"]').val(patient.dept_level); 
          $('input[name="patient-sec-pos"]').val(patient.position_section);
        }
 
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
          timer: 5000,
        });

      }
    }

    async function getPatient(patientID) {

      try {
        
        let patientData = await ajaxCall({
          data: {
            patientID: patientID,
            action: "getPatientFromGPPage",
          },
          method: "post",
          url: "../routers/Router.php",
        });

        let patient = patientData.result.patientData;

        $('input[name="patient-id"]').val(patient.pat_id);
        $('input[name="patient-barcode"]').val(patient.school_id);
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
          timer: 5000,
        });

      }
    }


  async function insertGatePassDataGPPage() {
      
    const urlParams = new URLSearchParams(window.location.search);
    const patientBarcodeFromVisit = urlParams.get("patientBarcode");

    let url = patientBarcodeFromVisit?"../../routers/Router.php" : "../routers/Router.php";

    try {
      let gatepassData = await ajaxCall({
        data: $("#frm-gate-pass").serialize() + "&action=insertGatePassDataGPPage" ,
        method: "post",
        url: url,
      });
      
      // console.log(JSON.stringify(gatepassData));

      Swal.fire({
        toast: true,
        position: "bottom-end",
        icon: "success",
        title: "Process Complete!",
        showConfirmButton: false,
        timer: 2000,
        didClose: () => {
          setTimeout(() => {
            printSection('printArea');
            setTimeout(() => {
              window.location.href = '../index.php';
            }, 300); 
          }, 200);
        }
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

  function printSection(formId) {
    let form = document.getElementById(formId).cloneNode(true); // Clone the form
    let inputs = form.querySelectorAll("input, select, textarea"); // Get all form elements

    inputs.forEach(input => {
        let wrapper = document.createElement("div"); // Create a wrapper
        wrapper.innerHTML = `<strong>${input.placeholder || input.name}:</strong> ${input.value || "N/A"}`; // Label format

        if (input.type === "checkbox") {
            if (input.checked) {
                wrapper.innerHTML = `✅ <strong>${input.value}</strong>`;
            } else {
                input.parentElement.style.display = "none"; // Hide unchecked checkboxes
            }
        }

        if (input.type !== "hidden") {
            input.replaceWith(wrapper); // Replace the input with the formatted label
        }
    });

    // Hide buttons and elements marked as .no-print
    form.querySelectorAll(".no-print").forEach(el => el.remove());

    // Open new print window
    let printWindow = window.open('', '', 'width=800,height=600');
    printWindow.document.write('<html><head><title>Print Gate Pass</title>');
    printWindow.document.write('<style>@media print { .no-print { display: none !important; } }</style>'); // Apply CSS
    printWindow.document.write('</head><body>');
    printWindow.document.write(form.innerHTML); // Insert updated form content
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
  }




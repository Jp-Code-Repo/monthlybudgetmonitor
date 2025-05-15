 function openReport (verb, url, data, target) {
    var form = document.createElement("form");
    form.action = url;
    form.method = verb;
    form.target = target || "_self";
    if (data) {
        for (var key in data) {
          var input = document.createElement("textarea");
          input.name = key;
          input.value = typeof data[key] === "object" ? JSON.stringify(data[key]) : data[key];
          form.appendChild(input);
        }
    }
    form.style.display = 'none';
    document.body.appendChild(form);
    form.submit();
}


  const date = new Date();
  const currentYear = date.getFullYear();
  const currentMonth = date.getMonth() + 1; // Months are 0-based, so add 1

  // Get the first day of the month at 00:00:00
  const firstDay = `${currentYear}-${String(currentMonth).padStart(2, '0')}-01 00:00:00`;

  // Get today's date and time
  const today = `${currentYear}-${String(currentMonth).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')} ` +
                `${String(date.getHours()).padStart(2, '0')}:${String(date.getMinutes()).padStart(2, '0')}:${String(date.getSeconds()).padStart(2, '0')}`;

  // console.log(`Report Range: ${firstDay} to ${today}`);


  async function report01(){
    

      let p = await getRMR();
      // console.log(p)
      openReport("post", "./reports/reports.visits.template.php",{data: p.result.reportData}, "_blank");
  }


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
  
  async function getRMR() {
      
        try {
            
            let reportData = await ajaxCall({
                data: {
                  strDate: firstDay,
                  endDate: today,
                  action: "getRMR"
                },
                method: "post",
                url: "../routers/Router.php",
            });

            Swal.fire({
                toast: true,
                position: "bottom-end",
                icon: "success",
                title: "Report Data loaded success!",
                showConfirmButton: false,
                timer: 3000,
            });         
            // console.log(reportData)
            return reportData;

        } catch (e) {
        
        Swal.fire({
            title: "Error",
            text: e.message,
            icon: "error",
            confirmButtonText: "Try again",
        });
    
        }
    }
